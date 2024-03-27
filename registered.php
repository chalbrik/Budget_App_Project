<?php

session_start();

require_once "database.php";

if(isset($_POST['email'])){

    //Udana walidacja, załóżmy że tak
    $validation_check = true;

    // 1. Sprawdzamy poprawnośc username
    $username = $_POST['username'];

    if(strlen($username) < 3 || strlen($username) > 20){
        $validation_check = false;
        $_SESSION['e_username'] = "Username needs to fit between 3 and 20 characters!";
    }

    // 2. Sprawdź poprawnośc maila
    $email = $_POST['email'];
    $email_filtered = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if($email != $email_filtered){

        $validation_check = false;
        $_SESSION['e_email'] = "Insert correct email address!";
    }

    // 3. Sprawdź poprawność hasła
    $password = $_POST['password'];
    $password_check = $_POST['password-repeat'];

    if((strlen($password) < 8)||(strlen($password) > 20)){
        $validation_check = false;
        $_SESSION['e_password'] = "Password needs to fit between 8 and 20 characters!";
    }

    if($password != $password_check){
        $validation_check = false;
        $_SESSION['e_password'] = "Given passwords do not match!";
    }

    //tutaj potem zahashuj hasło

   //Zapamiętaj wprowadzone dane
   $_SESSION['remember_username'] = $username;
   $_SESSION['remember_email'] = $email;

   //tutaj trzebabedzie dodac sprawdzenie czy uzytkownik istnieje w bazie


    if($validation_check == true){
    //Wszystkie testy zaliczone

    //jeżeli zaliczone zostaną wszystkie testy to dopiero wtedy będzie można włożyc dane do tabeli
    $query = $db->prepare('INSERT INTO user_data VALUES(NULL, :user_name, :password, :address_email)');
    $query->bindValue(':user_name', $username, PDO::PARAM_STR);
    $query->bindValue(':password', $password, PDO::PARAM_STR);
    $query->bindValue(':address_email', $email, PDO::PARAM_STR);
    $query->execute();
    
    header("Location: index.php");//mógłbym tutaj dać przekierowanie do strony która mówi że zostałeś zarejestrowany 
    exit();

    } else {
        header("Location: index.php");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}


?>