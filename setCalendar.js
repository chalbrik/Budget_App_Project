// Pobierz dzisiejszą datę jako obiekt Date
var today = new Date();
var todayDateStr = today.toISOString().slice(0, 10);

// Oblicz datę 50 lat w przyszłości
var future = new Date(); // Utwórz nową instancję Date
future.setFullYear(today.getFullYear() + 50); // Dodaj 50 lat do bieżącego roku
var futureDateStr = future.toISOString().slice(0, 10);

// Oblicz datę 50 lat w przeszłości
var past = new Date(); // Utwórz nową instancję Date
past.setFullYear(today.getFullYear() - 50); // Odejmij 50 lat od bieżącego roku
var pastDateStr = past.toISOString().slice(0, 10);

// Ustaw wartość dla inputa o klasie 'date-input' na dzisiejszą datę
var dateInput = document.querySelector(".date-input");
dateInput.value = todayDateStr;
dateInput.max = futureDateStr;
dateInput.min = pastDateStr;