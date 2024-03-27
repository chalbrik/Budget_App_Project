<?php 
session_start();

require_once 'database.php';

unset($_SESSION['logged_id']);

if(!isset($_SESSION['logged_id'])){

    if(isset($_POST['email-login'])){

        $email_login = filter_input(INPUT_POST, 'email-login');
        $password_login  = filter_input(INPUT_POST, 'password-login');

        //pobieram dane użytkownika o danym loginie
        $userQuery = $db->prepare('SELECT user_id, user_name, password FROM user_data WHERE address_email = :email_login');
        $userQuery->bindValue(':email_login', $email_login, PDO::PARAM_STR);
        $userQuery->execute();

        $user = $userQuery->fetch();

        //jesli użytkownik istnieje oraz jezeli podane hasło jest równe temu w bazie  pamietaj aby potem uzywać metody hashującej do hasła
        if($user && $password_login == $user['password']){
            //jeżeli dane pasują to ustawiam zmienną sesyjną
            $_SESSION['logged_id'] = $user['user_id'];
            $_SESSION['logged_name'] = $user['user_name'];
            header("Location: userpage.php");
            exit();


        } else {
            //tutaj wstaw informacje, że uzytkownik o podanych danych nie istnieje
            $_SESSION['e_email-login'] = "This user doesn't exist!";
            $_SESSION['remember_email-login'] = $email_login;
            header("Location: index.php");
            exit();
        }

    } else {
    header("Location: index.php");
    exit();
    }
}




?>