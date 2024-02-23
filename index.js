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
