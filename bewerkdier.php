<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dierentoevoeg pagina</title>
</head>
<body>
    <?php 
        require "check_login.php";
        require "connect.php";

        $id = $_GET['id'];
        
        $sql = "SELECT * FROM dier WHERE dierid = ?";
        $statement = $database->prepare($sql);
        $statement->execute([$id]); 
        $klant = $statement->fetch();
    ?>
    <form action="verwerkdier.php" method="POST">
        <legend>Voeg een dier toe</legend>
        <p>Vul de soort in</p>
        <label for="soort"></label>
        <input value='<?php echo $klant['soort'];?>'  type="text" name="soort" id='soort'>
        <p>Vul het ras in</p>
        <label for="ras"></label>
        <input value='<?php echo $klant['ras'];?>' type="text" name="ras" id='ras'>
        <p>Vul de kleur in</p>
        <label for="kleur"></label>
        <input value='<?php echo $klant['kleur'];?>' type="text" name="kleur" id='kleur'>
        <p>Vul de geboortedatum in</p>
        <label for="geboortedatum"></label>
        <input value='<?php echo $klant['geboortedatum'];?>' type="date" name="geboortedatum" id='geboortedatum'>
        <p>Vul de aankom datum in</p>
        <label for="datum_aangekomen"></label>
        <input value='<?php echo $klant['datum_aangekomen'];?>' type="date" name="datum_aangekomen" id='datum_aangekomen'>
        <p>Vul het geslacht in</p>
        <label for="geslacht"></label>
        <select name="geslacht" id="geslacht">
            <option <?php if($klant['geslacht'] == 'Man') echo 'selected';?> value="Man">Man</option>
            <option <?php if($klant['geslacht'] == 'Vrouw') echo 'selected';?> value="Vrouw">Vrouw</option>
            <option <?php if($klant['geslacht'] == 'Overig') echo 'selected';?> value="Overig">Overig</option>
        </select>
        <p>Is die gecasteerd</p>
        <label for="gecastreerd"></label>
        <select name="gecastreerd" id="gecastreerd">
            <option <?php if($klant['gecastreerd'] == 'ja') echo 'selected';?> value="ja">ja</option>
            <option <?php if($klant['geslacht'] == 'nee') echo 'selected';?> value="nee">nee</option>
        </select>
        <p>Vul de overige kenmerken in</p>
        <label for="overigekenmerken"></label>
        <input type="text" name="overige_kenmerken" id='overige_kenmerken'>
        <p>Vul in of die is ingeënt</p>
        <label for="ingeënt"></label>
        <select name="ingeënt" id="ingeënt">
            <option value="ja">ja</option>
            <option value="nee">nee</option>
        </select>
        <p>Vul de datun in dat die is ingeënt</p>
        <label for="datum_inenting"></label>
        <input type="date" name="datum_inenting" id='datum_inenting'>
        <input type="submit" value="submit">
    </form>
</body>
</html>