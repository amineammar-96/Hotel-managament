<?php
$mysqli = new mysqli ("127.0.0.1" , "root" , "amine"  , "PARISWEST") or die (mysqli_error($mysqli));
if (isset($_POST["Enregistrer"])){
$username = $_POST["username"];
$password = $_POST["password"];
echo "<br>" .$username;
echo "<br>" . $password;
$sql = "SELECT * FROM adminusers 
WHERE username LIKE '$username' && userpassword LIKE '$password'  ";
$res=mysqli_query($mysqli ,$sql);
$x=mysqli_num_rows($res);
if($x > 0){
    header ("Location: index.php");
    echo "<br>message saved";
}else {

    header ("Location: inax2.php");
}
}


?>