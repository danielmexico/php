<?php
	session_start();

	require 'database.php';

	if(isset($_SESSION['user_id'])){
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id' );
		 $records->bindParam(':id', $_SESSION['user_id']);
		$records-> execute();
		$results =$results = $records->fetch(PDO::FETCH_ASSOC);
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
    <title>Bienveido a Viernes T </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido papu <?= $user['email']; ?>
      <br>Sesion Correcta
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Por favor Registrate o Inicia sesion</h1>

      <a href="login.php">Iniciar sesion</a> or
      <a href="signup.php">Registrar</a>
    <?php endif; ?>
  </body>
</html>

	