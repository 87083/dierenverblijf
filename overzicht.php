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
                    <?php
                    do{
                        ?>
                            <div class="card">
                                <div class='cardwrapper'>
                                    <div class='naam'>
                                        <p class="vnaam"><?php echo $row['voornaam'];?></p>
                                        <div class='achternaam'>
                                            <p class="tussenv"><?php echo $row['tussenvoegsel'];?></p>
                                            <p class="anaam"><?php echo $row['achternaam'];?></p>
                                        </div>

                                    </div>
                                </div>
                                <div class="blue">
                                    <div class='extra'>
                                        <p class="id"> Klant nummer: <?php echo $row['klantid'];?></p>
                                        <p class="email"><?php echo $row['email'];?></p>
                                    </div>


                                    <hr class='cardhr'>
                                    <div class="buttons">
                                        <p class="detail"><?php echo "<a href='details.php?id=" . $row['klantid']. "'>Details</a>"?></p>
                                        <p class="detail"><?php echo "<a href='bewerkklant.php?id=" . $row['klantid']. "'>Bewerken</a>"?></p>
                                        <p class="detail"><?php echo "<a href='verwijderklant.php?id=" . $row['klantid']. "'>Verwijderen</a>"?></p>
                                    </div>
                                </div>
                                     
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