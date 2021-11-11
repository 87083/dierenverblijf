<?php
    require "check_login.php";
    require "connect.php";


     $count = $database->query('SELECT COUNT(*) FROM klant');
     $numrows = $count->fetchColumn(); 
     if($numrows){
         $sql = 'SELECT klantid, voornaam, tussenvoegsel, achternaam, email  FROM klant ORDER BY klantid'; 
     }
     $result = $database->query($sql);
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
    <header></header>
    <div id="container">

        <?php 
            require "sidebar.php"; 
            $row = $result->fetch();
            if(!$row){
                echo "<p>Er is geen informatie gevonden</p>";
            }
            else{
                ?>
                <div id="klantlijst">
                    <div class="kopjes">
                        <p class="k-id">ID</p>
                        <p class="k-vnaam">Voornaam</p>
                        <p class="k-tussenv">Tussenvoegsel</p>
                        <p class="k-anaam">Achternaam</p>
                        <p class="k-email">Email</p>
                        <p class="k-detail">Details</p>
                        <hr>
                    </div>
                    <?php
                    do{
                        ?>
                        

                            <div class="klantdata">
                                <p class="id"> <?php echo $row['klantid'];?></p>
                                <p class="vnaam"><?php echo $row['voornaam'];?></p>
                                <p class="tussenv"><?php echo $row['tussenvoegsel'];?></p>
                                <p class="anaam"><?php echo $row['achternaam'];?></p>
                                <p class="email"><?php echo $row['email'];?></p>
                                <p class="detail"><?php echo "<a href='detail.php?id=" . $row['klantid']. "'>Details</a>"?></p>
                            </div>
                        
                        <?php 
                    }while($row = $result->fetch());
                    ?>
                </div>
                <?php
            } 
        ?>


    </div>

</body>
</html>