<?php
  try{
    require_once "connect.php";

  }
  catch(Exception $e){
    $error = $e->getMessage();
  }

  if(isset($_POST["submit"])){
  $stmt = $database->prepare("SELECT * FROM dierenverblijf WHERE username = ?");
  $stmt->execute([$_POST['username']]);
  $user = $stmt->fetch();


  if ($user)
  {
    $_SESSION["username"] = $username;
    echo "<h1><center> Login successful </center></h1>";  
  } else {
    echo "<h1> Login failed. Foute username of wachtwoord.</h1>";  
  }
} else {
  eader("location:index.html");
}
?>