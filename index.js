const incomesData = [
  {
    category: "Salary",
    amount: 17.45,
  },
  {
    category: "Bank interest",
    amount: 34.91,
  },
  {
    category: "Sales",
    amount: 52.36,
  },
  {
    category: "Investments",
    amount: 31.07,
  },
  {
    category: "Others",
    amount: 23.39,
  },
];

//rozwijaj pełną nazwę linków w navbarze
document.querySelectorAll(".nav-item").forEach((navItem) => {
  navItem.addEventListener("mouseover", () => {
    navItem.querySelector("img.nav-icon").nextElementSibling.hidden = false;
  });
});

document.querySelectorAll(".nav-item").forEach((navItem) => {
  navItem.addEventListener("mouseout", () => {
    navItem.querySelector("img.nav-icon").nextElementSibling.hidden = true;
  });
});


//doughnut - incomes
const incomesCtx = document.getElementById('incomeDoughnutChart');

new Chart(incomesCtx, {
type:'doughnut',
data:{
  labels: [
    'Salary',
    'Bank interest',
    'Sales',
    'Investments',
    'Other'
  ],
  datasets: [{
    label: 'Incomes',
    data: [4200, 580, 310, 308, 97],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(255, 88, 86)',
      'rgb(255, 115, 26)'
    ],
    hoverOffset: 4
  }]
},
options: {
  responsive: true,
  plugins: {
    legend: {
      display: false,
      position: 'right',
    },
    title: {
      display: false,
      text: 'Chart.js Doughnut Chart'
    }
  }
},

});

//doughnut - incomes
const expensesCtx = document.getElementById('expensesDoughnutChart');

new Chart(expensesCtx, {
type:'doughnut',
data:{
  labels: [
    'Salary',
    'Bank interest',
    'Sales',
    'Investments',
    'Other'
  ],
  datasets: [{
    label: 'Expenses',
    data: [2250, 340, 270, 102, 43],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(255, 88, 86)',
      'rgb(255, 115, 26)'
    ],
    hoverOffset: 4
  }]
},
options: {
  responsive: true,
  plugins: {
    legend: {
      display: false,
      position: 'right',
    },
    title: {
      display: false,
      text: 'Chart.js Doughnut Chart'
    }
  }
},

});
