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
        ?>
        <form action="toevoegklantverwerk.php" method="post">
            <legend>voeg een klant toe</legend>

            <label for="voornaam">voornaam</label>
            <input type="text" name="voornaam" id="voornaam">

            <label for="tussenvoegsel">tussenvoegsel</label>
            <input type="text" name="tussenvoegsel" id="tussenvoegsel">

            <label for="achternaam">achternaam</label>
            <input type="text" name="achternaam" id="achternaam">

            <label for="postcode">postcode</label>
            <input type="text" name="postcode" id="postcode">

            <label for="huisnummer">huisnummer</label>
            <input type="text" name="huisnummer" id="huisnummer">
            
            <label for="email">email</label>
            <input type="email" name="email" id="email">

            <label for="bsn">bsn</label>
            <input type="number" name="bsn" id="bsn">

            <input type="submit" value="submit">
        </form>          
    </div>
</body>
</html>