//rozwijaj pełną nazwę linków w navbarze
document.querySelectorAll(".nav-item").forEach((navItem) => {
  navItem.addEventListener("mouseover", () => {
    navItem.querySelector("img.nav-icon").nextElementSibling.hidden = false;
    navItem.querySelector("img.nav-icon").classList.add("animate-move-left");
    navItem.querySelector("img.nav-icon").nextElementSibling.classList.add("animate-move-right");

  });
});

document.querySelectorAll(".nav-item").forEach((navItem) => {
  navItem.addEventListener("mouseout", () => {
    navItem.querySelector("img.nav-icon").nextElementSibling.hidden = true;
    navItem.querySelector("img.nav-icon").classList.remove("animate-move-left");
    navItem.querySelector("img.nav-icon").nextElementSibling.classList.remove("animate-move-right");
  });
});

function submitForm() {
  document.getElementById('time-frame-form').submit();
}

//doughnut - incomes
const incomesCtx = document.getElementById("incomeDoughnutChart");

new Chart(incomesCtx, {
  type: "doughnut",
  data: {
    labels: incomesLabels,
    datasets: [
      {
        label: "Incomes",
        data: incomesValues,
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
          "rgb(255, 88, 86)",
          "rgb(255, 115, 26)",
        ],
        hoverOffset: 4,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
        position: "right",
      },
      title: {
        display: false,
        text: "Chart.js Doughnut Chart",
      },
    },
  },
});

//doughnut - expenses
const expensesCtx = document.getElementById("expensesDoughnutChart");

new Chart(expensesCtx, {
  type: "doughnut",
  data: {
    labels: expensesLabels,
    datasets: [
      {
        label: "Expenses",
        data: expensesValues,
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
          "rgb(255, 88, 86)",
          "rgb(255, 115, 26)",
          "rgb(75, 192, 192)",
          "rgb(153, 102, 255)",
          "rgb(255, 159, 64)",
          "rgb(201, 203, 207)",
          "rgb(54, 235, 183)",
        ],
        hoverOffset: 4,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
        position: "right",
      },
      title: {
        display: false,
        text: "Chart.js Doughnut Chart",
      },
    },
  },
});

//line - bilans
const bilansCtx = document.getElementById("bilansLineChart");

new Chart(bilansCtx, {
  type: "line",
  data: {
    labels: [
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
    ],
    datasets: [
      {
        label: "Money",
        data: [
          1259, 1242, 1226, 1211, 1197, 1184, 1171, 1160, 1149, 1139, 1133,
          1122, 1115, 1106, 1099, 1090, 1086, 1080, 1075, 1070, 1065, 1061,
          1057, 1053, 1049, 1046, 1043, 1040,
        ],
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      {
        label: "Expenses",
        data: [
          27, 207, 209, 271, 185, 274, 134, 274, 186, 70, 102, 242, 136, 22,
          210, 184, 202, 228, 273, 26, 266, 263, 225, 243, 93, 208, 148, 163,
        ],
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});


// Napisz tutaj funkcję, która dodaje klasę do inputa, który nie został wypełniony

