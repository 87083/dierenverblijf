<?php
    require "check_login.php";
    require "connect.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dierenverblijf | Overzicht</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/overzicht.css">
  
</head>
<body>
    <div id="container">
        <?php 
            require "sidebar.php";

            $id = $_GET['id'];

            echo "Item met ID " . $id . " wordt verwijderd...<br/>";

            $sql = "DELETE FROM klant WHERE klantid=?";
            $statement = $database->prepare($sql);
            $statement->execute([$id]);
            header("location:overzicht.php");
        ?>
    </div>
</body>
</html>