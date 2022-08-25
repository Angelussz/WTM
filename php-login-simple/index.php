<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles_back.css">
   
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Registrarse o iniciar sesion</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
    <div class="slideshow">
      <div class="slideshow-image" style="background-image: url('https://dmarket.com/blog/best-dota2-wallpapers/dota-2-pudge-wallpaper_hu1944346653691c99bc0935e237433031_816967_1920x1080_resize_q75_lanczos.jpg')"></div>
      <div class="slideshow-image" style="background-image: url('https://wallpaperaccess.com/full/668672.jpg')"></div>
      <div class="slideshow-image" style="background-image: url('https://images.pexels.com/photos/3165335/pexels-photo-3165335.jpeg?cs=srgb&dl=pexels-lucie-liz-3165335.jpg&fm=jpg')"></div>
      <div class="slideshow-image" style="background-image: url('https://wallpapercave.com/wp/wp3321991.jpg')"></div>
    </div>
  </body>
</html>
