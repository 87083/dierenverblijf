<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  try{
    require_once "connect.php";

  }
  catch(Exception $e){
    $error = $e->getMessage();
  }

  if(isset($_POST["submit"])){
  $stmt = $database->prepare("SELECT * FROM dierenverblijf WHERE username = ? AND password = ?");
  $stmt->execute([$_POST['username'], sha1($_POST["password"])]);
  $user = $stmt->fetch();

  if ($user)
  {
    session_start();
    $_SESSION["username"] = $_POST['username'];
    echo "<h1><center> Login successful </center></h1>";  
    header("location:overzicht.php");

  } else {
    echo "<h1> Login failed. Foute username of wachtwoord.</h1>";  
  }
} else {
  header("location:index.html");
}
?>

</body>
</html>
