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
            if(!empty($_POST)){
                echo "submit!";
                var_dump($_POST);
            
                $voornaam = $_POST["voornaam"];
                $tussenvoegsel = $_POST["tussenvoegsel"];
                $achternaam = $_POST["achternaam"];
                $postcode = $_POST["postcode"];
                $huisnummer = $_POST["huisnummer"];
                $email = $_POST["email"];
                $bsn = $_POST["bsn"];
            
            
               $sql = "INSERT INTO klant (voornaam, tussenvoegsel, achternaam, postcode, huisnummer, email, bsn) VALUES (?,?,?,?,?,?,?)";
               $statement = $database->prepare($sql);
               $statement->execute([$voornaam, $tussenvoegsel, $achternaam, $postcode, $huisnummer, $email, $bsn]);
            
            
               if($statement){
                    header("location:overzicht.php");
               } else{
                   echo "FOUT bij het toevoegen<br/>";
               }
            }
            
            ?>
    </div>
</body>
</html>

