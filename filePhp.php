<?php
$mysqli = new mysqli ("127.0.0.1" , "root" , "amine"  , "PARISWEST") or die (mysqli_error($mysqli));
    
if (isset($_POST["Enregistrer"])){
    $numTel = $_POST["numTel"];
    $nom = $_POST["nom"];
$prenom = $_POST["pnom"];
$dateCheckIn= $_POST["dateIn"];
$dateCheckOut= $_POST["dateOut"];
$organisme = $_POST["org"];
$email = $_POST["addEmail"];
$numTel = $_POST["numTel"];
$typeCh = $_POST["typeCh"];
$numCh=$_POST["numCh"];


    
$date1 = str_replace('/', '-', $dateCheckIn);
$new_date = date('Y-m-d', strtotime($date1));
$date2 = str_replace('/', '-', $dateCheckOut);
$new_date2 = date('Y-m-d', strtotime($date2));

$sql = ("INSERT INTO reservation (NOM, PRENOM, DATEar,DATEde, ORGANISME, EMAIL, NUMEROTEL, TYPECHAMBRE, NUMEROCHAMBRE,clientID)
VALUES ('$nom' ,'$prenom' ,'$new_date', '$new_date2','$organisme' ,'$email' ,'$numTel' ,'$typeCh' ,'$numCh' , '$numCl')");

if(mysqli_query($mysqli, $sql)){
    header('Location:index.php');
}else {
echo "Error: " . $sql . "<br>" . $mysqli->error;
}}


$mysqli->close();


?>