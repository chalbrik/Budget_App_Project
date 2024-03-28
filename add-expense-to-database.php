<?php
session_start();
require_once "database.php";
//umieścić kwerendy wstawiające dane

 if(isset($_SESSION['logged_id']) && isset($_SESSION['logged_name'])){

    $amount = $_POST['amount'];
    $date = $_POST['transaction-date'];
    $category = $_POST['transaction-category'];
    $note = $_POST['note'];
    $userId = $_SESSION['logged_id'];

    //query który wstawia dane do tabeli

    $inputExpenseQuery = $db->prepare("INSERT INTO expenses VALUES(NULL, :expense_amount, :expense_date, :expense_category_assigned_to_user_id, 1, :expense_note, :user_id)");
    $inputExpenseQuery->bindValue(':expense_amount', $amount, PDO::PARAM_STR);
    $inputExpenseQuery->bindValue(':expense_date', $date, PDO::PARAM_STR);
    $inputExpenseQuery->bindValue(':expense_category_assigned_to_user_id', $category, PDO::PARAM_INT);
    $inputExpenseQuery->bindValue(':expense_note', $note, PDO::PARAM_STR);
    $inputExpenseQuery->bindValue(':user_id', $userId, PDO::PARAM_STR);
    $inputExpenseQuery->execute();

 } else {
   header("Location: index.php");
   exit();
 }



?>