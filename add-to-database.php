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

    echo $userId.'<br />';
    echo $amount.'<br />';
    echo $date.'<br />';
    echo $category.'<br />';
    echo $note.'<br />';

    //query który wstawia dane do tabeli

    $inputIncomeQuery = $db->prepare("INSERT INTO incomes VALUES(NULL, :income_amount, :income_date, :income_category_assigned_to_user_id, :income_note, :user_id)");
    $inputIncomeQuery->bindValue(':income_amount', $amount, PDO::PARAM_STR);
    $inputIncomeQuery->bindValue(':income_date', $date, PDO::PARAM_STR);
    $inputIncomeQuery->bindValue(':income_category_assigned_to_user_id', $category, PDO::PARAM_INT);
    $inputIncomeQuery->bindValue(':income_note', $note, PDO::PARAM_STR);
    $inputIncomeQuery->bindValue(':user_id', $userId, PDO::PARAM_STR);
    $inputIncomeQuery->execute();

 } else {
   header("Location: index.php");
   exit();
 }



?>