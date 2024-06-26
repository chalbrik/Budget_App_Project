<?php

session_start();
require_once "database.php";

//pobierz dane użytkownika o danej sesyjnej

if(isset($_SESSION['logged_id']) && isset($_SESSION['logged_name'])){

  $logged_user_id = $_SESSION['logged_id'];
  $logged_user_name = $_SESSION['logged_name'];

  if (isset($_POST['date'])) {
    $selectedTimeFrame = $_POST['date'];
    // Zapisanie wybranej opcji do sesji
    $_SESSION['selectedTimePeriod'] = $selectedTimeFrame;

    // Bazowe zapytania SQL
    $baseQueryIncome = 
      'SELECT
        incomes_category_assigned_to_users.income_category_name,
        incomes.user_id,
        SUM(incomes.income_amount) AS overall_income
        FROM incomes_category_assigned_to_users
        INNER JOIN incomes ON incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.income_category_assigned_to_user_id
        WHERE incomes.user_id = :logged_user_id';

    $baseQueryExpenses = 
      'SELECT
        expenses_category_assigned_to_users.expense_category_name,
        expenses.user_id,
        SUM(expenses.expense_amount) AS overall_expense
        FROM expenses_category_assigned_to_users
        INNER JOIN expenses ON expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.expense_category_assigned_to_user_id
        WHERE expenses.user_id = :logged_user_id';

    // Dodanie warunków w zależności od wybranego okresu
    switch ($selectedTimeFrame) {
        case 'all-history':
            // Nie wymaga dodatkowych warunków
            break;
        case 'current-month':
            $startDate = date("Y-m-01");
            $endDate = date('Y-m-t');
            break;
        case 'previous-month':
            $startDate = date("Y-m-01", strtotime("-1 month"));
            $endDate = date('Y-m-t', strtotime("-1 month"));
            break;
    }

    // Rozszerzenie zapytań, jeśli potrzeba
    if (isset($startDate) && isset($endDate)) {
        $dateCondition = " AND incomes.income_date BETWEEN '$startDate' AND '$endDate'";
        $sqlQueryIncomePhrase = $baseQueryIncome . $dateCondition . ' GROUP BY incomes_category_assigned_to_users.income_category_name ORDER BY overall_income DESC';

        $dateCondition = " AND expenses.expense_date BETWEEN '$startDate' AND '$endDate'";
        $sqlQueryExpensesPhrase = $baseQueryExpenses . $dateCondition . ' GROUP BY expenses_category_assigned_to_users.expense_category_name ORDER BY overall_expense DESC';
    } else {
        $sqlQueryIncomePhrase = $baseQueryIncome . ' GROUP BY incomes_category_assigned_to_users.income_category_name ORDER BY overall_income DESC';
        $sqlQueryExpensesPhrase = $baseQueryExpenses . ' GROUP BY expenses_category_assigned_to_users.expense_category_name ORDER BY overall_expense DESC';
    }
} else {
    $sqlQueryIncomePhrase = 
    'SELECT
    incomes_category_assigned_to_users.income_category_name,
    incomes.user_id,
    SUM(incomes.income_amount) AS overall_income
    FROM
    incomes_category_assigned_to_users
    INNER JOIN
    incomes ON incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.income_category_assigned_to_user_id
    WHERE
    incomes.user_id = :logged_user_id
    GROUP BY incomes_category_assigned_to_users.income_category_name
    ORDER BY overall_income DESC';

    $sqlQueryExpensesPhrase = 
    'SELECT
    expenses_category_assigned_to_users.expense_category_name,
    expenses.user_id,
    SUM(expenses.expense_amount) AS overall_expense
    FROM
    expenses_category_assigned_to_users
    INNER JOIN
    expenses ON expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.expense_category_assigned_to_user_id
    WHERE
    expenses.user_id = :logged_user_id
    GROUP BY expenses_category_assigned_to_users.expense_category_name
    ORDER BY overall_expense DESC';
  }

  // ----Incomes----
  //kwerenda do stworzenia tabeli pobierającej wszystkie kategorie i ich warotść
  $overallIncomesQuery = $db->prepare($sqlQueryIncomePhrase);
  $overallIncomesQuery->bindValue(':logged_user_id', $logged_user_id, PDO::PARAM_INT);
  $overallIncomesQuery->execute();

  $overallIncomesData = $overallIncomesQuery->fetchAll();

  $incomesLabels = [];
  $incomesVlues = [];

  foreach($overallIncomesData as $overallIncomeData){
    $incomesLabels[] = $overallIncomeData['income_category_name'];
    $incomesVlues[] = $overallIncomeData['overall_income'];
  }

  //sumuj wszystkie wartości
  $totalIncomesAmount = array_sum($incomesVlues);

  // ----Expenses----
  //kwerenda do stworzenia tabeli pobierającej wszystkie kategorie i ich warotść
  $overallExpensesQuery = $db->prepare($sqlQueryExpensesPhrase);
  $overallExpensesQuery->bindValue(':logged_user_id', $logged_user_id, PDO::PARAM_INT);
  $overallExpensesQuery->execute();

  $overallExpensesData = $overallExpensesQuery->fetchAll();

  $expensesLabels = [];
  $expensesVlues = [];

  foreach($overallExpensesData as $overallExpenseData){
    $expensesLabels[] = $overallExpenseData['expense_category_name'];
    $expensesVlues[] = $overallExpenseData['overall_expense'];
  }

  //sumuj wszystkie wartości
  $totalExpensesAmount = array_sum($expensesVlues);

} else {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Check balance</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-bg-color custom-position">
        <button
          class="navbar-toggler navbar-toggler-custom"
          type="button"
          data-toggle="collapse"
          data-target="#navbarsExample08"
          aria-controls="navbarsExample08"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="navbar-collapse-custom-background collapse navbar-collapse justify-content-md-center custom-position"
          id="navbarsExample08"
        >
          <ul class="navbar-nav custom-width">
            <li class="nav-item active custom-layout-logo">
              <img class="logo" src="./assets/pie-chart-logo.svg" alt="Logo" />
              <a class="nav-link custom-font-logo" href="./userpage.php"
                >spy <br />budget</span> </a
              >
            </li>
            <li class="nav-item dropdown nav-item-custom-postion">
              <img id="add" class="nav-icon" src="./assets/plus-lg.svg" alt="Add" />
              <a
                class="nav-link dropdown-toggle custom-font nav-name-add"
                href="#"
                id="dropdown08"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                hidden
                >Add</a
              >
              <div class="dropdown-menu dropdown-menu-custom-bg-color dropdown-menu-custom-position custom-font" aria-labelledby="dropdown08">
                <a class="dropdown-item custom-font" href="./add-income.php">Add income</a>
                <a class="dropdown-item custom-font" href="./add-expense.php">Add expense</a>
              </div>
            </li>
            <li class="nav-item nav-item-custom-postion">
              <img id="check-balance" class="nav-icon" src="./assets/graph-up-arrow.svg" alt="Check balance" />
              <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="./check-balance.php" hidden>Check balance</a>
            </li>
            <li class="nav-item nav-item-custom-postion">
              <img id="settings" class="nav-icon" src="./assets/gear.svg" alt="Settings" />
              <a class="nav-link custom-font nav-name-settings" href="./settings.html" hidden>Settings</a>
            </li>
            <li class="nav-item nav-item-custom-postion">
              <img id="log-out" class="nav-icon" src="./assets/box-arrow-right.svg" alt="Log out" />
              <a class="nav-link custom-font nav-name-log-out" href="./log-out.php" hidden>Log out</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main class="check-balance-page">
      <div class="check-balance-main-container">
        
        <form id="time-frame-form" class="period-for-data" action="./check-balance.php" method="post">
          <label for="time-period">Select desired period for data</label>
            <select id="time-period" name="date" onchange="submitForm()">
              <option value="all-history" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'all-history') ? 'selected' : ''; ?>>All history</option>
              <option value="current-month" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'current-month') ? 'selected' : ''; ?>>Current month</option>
              <option value="previous-month" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'previous-month') ? 'selected' : ''; ?>>Previous month</option>
              <!-- <option value="current-year">Current year</option> -->
              <!-- <option value="custom-date">Custom date</option> -->
            </select>
          </form>
        <div class="incomes-expenses-charts">
          <div class="incomes-charts">
            <div class="chart-name">Incomes</div>
            <div class="chart">
              <canvas id="incomeDoughnutChart" class="incomes-doughnut-chart"></canvas>
            </div>
            <div class="chart-sum-value">Total: <?php echo $totalIncomesAmount ?> pln</div>
          </div>
          <div class="expenses-charts">
            <div class="chart-name">Expenses</div>
            <div class="chart">
              <canvas id="expensesDoughnutChart" class="expenses-doughnut-chart"></canvas>
            </div>
            <div class="chart-sum-value">Total: <?php echo $totalExpensesAmount ?> pln</div>
          </div>
          </div>
          <div class="bilans-chart">
            <canvas id="bilansLineChart" class="bilans-line-chart"></canvas>
          </div>
        </div>
      </div>
    </main>
    <footer class="footer mt-auto py-3 footer-custom-font">
      <div class="container">
        <span class="text-muted">Spy Budget 2024</span>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      //tworze zmienną globalną dla nazw kategorii moich wykresów
      var incomesLabels = <?php echo json_encode($incomesLabels); ?>;
      var incomesValues = <?php echo json_encode($incomesVlues); ?>;
      var expensesLabels = <?php echo json_encode($expensesLabels); ?>;
      var expensesValues = <?php echo json_encode($expensesVlues); ?>;
      console.log(incomesLabels);
      console.log(incomesValues);
    </script>
    <script src="./index.js"></script>

  </body>
</html>
