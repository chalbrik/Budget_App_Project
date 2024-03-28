<?php

session_start();
require_once "database.php";

//pobierz dane użytkownika o danej sesyjnej

if(isset($_SESSION['logged_id']) && isset($_SESSION['logged_name'])){

  $logged_user_id = $_SESSION['logged_id'];
  $logged_user_name = $_SESSION['logged_name'];

  //pobierz kategorie danego użytkownika

  $incomesCategoriesDisplayQuery = $db->prepare("SELECT income_category_assigned_to_user_id, income_category_name FROM incomes_category_assigned_to_users WHERE user_id = :logged_user_id");
  $incomesCategoriesDisplayQuery->bindValue(":logged_user_id", $logged_user_id, PDO::PARAM_INT);
  $incomesCategoriesDisplayQuery->execute();

  $incomesCategories = $incomesCategoriesDisplayQuery->fetchAll();


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
    <title>Add income</title>
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
          class="collapse navbar-collapse justify-content-md-center custom-position"
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
    <main>
      <div class="transaction-form">
        <h2>Add income</h2>
          <form class="input-form" action="add-income-to-database.php" method="post">
            
            <div class="form-amount-date">
              <div class="form-input">
                <span>Amount</span>
                <div class="amount-input-currency"><input class="amount-input" type="text" name="amount"/>
                  <span class="currency">pln</span></div>
              </div>
              <div class="form-input">
                <span>Date</span>
                <input class="date-input" type="date" id="start" name="transaction-date" value="" min="" max="" />
                
              </div>
            </div>
            
            <fieldset class="form-input category">
              <legend>Pick category:</legend>

              <div class="radio-row">
                <?php 
                foreach($incomesCategories as $incomeCategory){

                  echo '<div class="form-check">';
                  echo '<input type="radio" id="'.$incomeCategory['income_category_name'].'" name="transaction-category" value="'.$incomeCategory['income_category_assigned_to_user_id'].'" class="form-check-input">';
                  echo '<label for="'.$incomeCategory['income_category_name'].'" class="form-check-label">'.$incomeCategory['income_category_name'].'</label>';
                  echo '</div>';
                }
                ?>
              </div>
            </fieldset>

            <div class="form-input-note">
              <span>Note</span>
              <textarea class="form-control" name="note" aria-label="With textarea"></textarea>
            </div>

            <div class="form-button-action">
              <div class="cancel-button button-action"><img src="./assets/x-lg.svg" alt="Cancel"><a href="./userpage.php"><button>Cancel</button></a></div>
              <div class="done-button button-action"><img src="./assets/check-lg.svg" alt="Done"><button type="submit">Done</button></div>
            </div>

          </form>
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
    <script src="./index.js"></script>
    <script src="./setCalendar.js"></script>
  </body>
</html>
