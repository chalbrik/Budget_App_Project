<?php

session_start();

require_once 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spy Budget</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header></header>

    <main>
      <div class="log-in-sign-up-main-container">
        <div class="left-side">
          <div class="logo-and-header">
            <img class="logo" src="./assets/pie-chart-logo.svg" alt="Logo" />

            <h1>budget</h1>
          </div>
          <p class="description">
            Our budget app is an intuitive tool designed to assist users in
            effectively managing their personal finances. With it, you can
            easily track your expenses, both daily and larger planned
            investments.<br><br> It is a simple-to-use yet powerful financial tool that
            supports users in making informed decisions about their money. The
            app provides quick access to financial summaries, expenditure
            analysis, and budget forecasts, helping to maintain a healthy
            financial balance.<br><br> Whether you are an experienced financier or just
            starting your journey in budget management, our app is the perfect
            tool to help you achieve your financial goals!
          </p>
        </div>
        <div class="right-side">
          <div class="box">
            <div class="log-in">
            <h2 class="log-in-title">Log in</h2>
            <div class="input-table">
              <div class="input-field">
                <span class="input-name">E-mail address</span>
                <input type="text" />
              </div>
              <div class="input-field">
                <span class="input-name">Password</span>
                <input type="text" />
              </div>
            </div>

            <form action="./login.php" method="post"></form>
            <a class="button-form" href="./userpage.html"><button class="log-in-button">Log in</button></a>
          </div>
          </div>
          <div class="box">

          <div class="sign-up">
            <h2 class="sign-up-title">Sign up</h2>

            <form action="./registered.php" method="post" class="input-table">
            <div class="input-field">
                <span class="input-name">Name</span>
                <input type="text" name="username" value="<?php if(isset($_SESSION['remember_username'])){
                  echo $_SESSION['remember_username'];
                  unset($_SESSION['remember_username']);
                } ?>"/>
                <?php if(isset($_SESSION['e_username'])){
                  echo '<span class="input-name" style="color:#FF5E00;margin-top:5px;font-size:0.65rem">'.$_SESSION['e_username'].'</span>';
                  unset($_SESSION['e_username']);
                } ?>
              </div>
              <div class="input-field">
                <span class="input-name">E-mail address</span>
                <input type="text" name="email" value="<?php if(isset($_SESSION['remember_email'])){
                  echo $_SESSION['remember_email'];
                  unset($_SESSION['remember_email']);
                } ?>"/>
                <?php if(isset($_SESSION['e_email'])){
                  echo '<span class="input-name" style="color:#FF5E00;margin-top:5px;font-size:0.65rem">'.$_SESSION['e_email'].'</span>';
                  unset($_SESSION['e_email']);
                } ?>
              </div>
              <div class="input-field">
                <span class="input-name">Password</span>
                <input type="text" name="password"/>
              </div>
              <div class="input-field">
                <span class="input-name">Repeat password</span>
                <input type="text" name="password-repeat"/>
                <?php if(isset($_SESSION['e_password'])){
                  echo '<span class="input-name" style="color:#FF5E00;margin-top:5px;font-size:0.65rem">'.$_SESSION['e_password'].'</span>';
                  unset($_SESSION['e_password']);
                } ?>
              </div>
              <button class="sign-up-button" type="submit">Register</button>
            </form>

          </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer mt-auto py-3 footer-custom-font">
      <div class="container">
        <span class="text-muted">Spy Budget 2024</span>
      </div>
    </footer>
  </body>
</html>
