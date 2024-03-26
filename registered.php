<?php

session_start();

require_once "database.php";

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['email'])){
   
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); //pierwszy warunek czy email jest poprawny

    //drugi warunek czy wpisane hasło jest prawidłowe

    //trzeci warunek czy istnieje już taki username

    //jeżeli wszystkie są spełnione to następuje włożenie danych do tabeli

    //jeżeli zaliczone zostaną wszystkie testy to dopiero wtedy będzie można włożyc dane do tabeli

    if(empty($email)){
        //wydaje mi sie że tutaj trzeba bedzie dac więcej warunków w stylu czy hasło się zgadza
        $_SESSION["given-email"] = $_POST['email'];
        header("Location: index.php");
        exit();
    }

    //jeżeli zaliczone zostaną wszystkie testy to dopiero wtedy będzie można włożyc dane do tabeli

    $query = $db->prepare('INSERT INTO user_data VALUES(NULL, :user_name, :password, :address_email)');
    $query->bindValue(':user_name', $username, PDO::PARAM_STR);
    $query->bindValue(':password', $password, PDO::PARAM_STR);
    $query->bindValue(':address_email', $email, PDO::PARAM_STR);
    $query->execute();

} else {
    header("Location: index.php");
    exit();
}


?>