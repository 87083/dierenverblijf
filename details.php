<?php
    require "check_login.php";
    require "connect.php";
?>

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

    //klant in klant id ophalen
    $id = $_GET["id"];
    $sql = "SELECT * FROM klant WHERE klantid = ?";
    $statement = $database->prepare($sql);
    $statement->execute([$id]); 
    $klant = $statement->fetch();

    //klant idee in dier ophalen
    $sql_dier = "SELECT * FROM dier WHERE klant_id = ?";
    $statement_dier = $database->prepare($sql_dier);
    $statement_dier->execute([$id]); 
    $dier = $statement_dier->fetch();

    if(!$klant){
        echo "<p>Er is geen informatie gevonden</p>";
    }  else{
       
    }
    ?>
    <!-- test klant id naar huisdier -->
    <div id="dierendiv">
        <?php
            echo "<a href='dierentoevoeg.php?kid=" . $id ."'>dier toevoegen</a>";

            echo"<div id='dierenlijst'>";
                echo "<h2>dierenlijst</h2>";
                
                if(!$dier){
                    echo"geen dieren gevonden";
                }
                else{
                    do{ 
                        echo "<div>";
                            echo "<p>{$dier['soort']}</p>";
                            echo "<p>{$dier['ras']}</p>";
                            echo "<p>{$dier['kleur']}</p>";
                        echo "</div>";
                    }while($dier = $statement_dier->fetch());
                }
            echo"</div>";
        ?>
        
    </div>
    <!-- einde test -->
</body>
</html>