<?php 
require "check_login.php";
require "connect.php";

if(!empty($_POST)){
    echo "submit!";
    var_dump($_POST);

    $klant_id = $_POST["klant_id"];

    $soort = $_POST["soort"];
    $ras = $_POST["ras"];
    $kleur = $_POST["kleur"];
    $geboortedatum = $_POST["geboortedatum"];
    $datum_aangekomen = $_POST["datum_aangekomen"];
    $geslacht = $_POST["geslacht"];
    $gecastreerd = $_POST["gecastreerd"];
    $overige_kenmerken = $_POST["overige_kenmerken"];
    $ingeënt = $_POST["ingeënt"];
    $datum_inenting = $_POST["datum_inenting"];

   $sql = "INSERT INTO dier (klant_id, soort, ras, kleur, geboortedatum, datum_aangekomen, geslacht, gecastreerd, overige_kenmerken, ingeënt, datum_inenting) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
   $statement = $database->prepare($sql);
   $statement->execute([$klant_id, $soort, $ras, $kleur, $geboortedatum, $datum_aangekomen, $geslacht, $gecastreerd, $overige_kenmerken, $ingeënt, $datum_inenting]);


   if($statement){
        header("location:overzicht.php");
   } else{
       echo "FOUT bij het toevoegen<br/>";

   }
}
?>