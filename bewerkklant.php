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
            $sql = "SELECT * FROM klant WHERE klantid = ?";
            $statement = $database->prepare($sql);
            $statement->execute([$id]); 
            $klant = $statement->fetch();
        ?>

            <form action="" method="POST">
            <legend>Bewerk klant gegevens</legend>

            <input type="text" name="klantid" id="klantid" value="<?php echo $klant["klantid"] ?>">
            
            <label for="voornaam">voornaam</label>
            <input value='<?php echo $klant['voornaam'];?>' type="text" name="voornaam" id="voornaam">

            <label for="tussenvoegsel">tussenvoegsel</label>
            <input value='<?php echo $klant['tussenvoegsel'];?>' type="text" name="tussenvoegsel" id="tussenvoegsel">

            <label for="achternaam">achternaam</label>
            <input  value='<?php echo $klant['achternaam'];?>' type="text" name="achternaam" id="achternaam">

            <label for="postcode">postcode</label>
            <input value='<?php echo $klant['postcode'];?>' type="text" name="postcode" id="postcode">

            <label for="huisnummer">huisnummer</label>
            <input value='<?php echo $klant['huisnummer'];?>' type="text" name="huisnummer" id="huisnummer">
            
            <label for="email">email</label>
            <input value='<?php echo $klant['email'];?>' type="email" name="email" id="email">

            <label for="bsn">bsn</label>
            <input value='<?php echo $klant['bsn'];?>' type="number" name="bsn" id="bsn">

            <input type="submit" value="submit">
        </form>          
    </div>
</body>
</html>