<!DOCTYPE html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="hotel.js">
    </script>



</head>

<body style="padding:0px;">

<div
  class="bg-image"
  style="
    background-image: url('img/wall1.jpeg');
    height: 100vh;
  ">
  <br>
<h3 style="font-size:24px;">PARISWEST HOLDING MANAGEMENT</h3> 
<div class="container h-80">
<div class="row align-items-center h-100">

    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="img/logo.png"  style="width:100px;height:100px;"/>
            <br><br>
            <form  class="form-signin" method="POST">
                
            
   
            <input type="text" name="username" id="userName" class="form-control form-group" placeholder="Identifiant" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="Mot de passe" required >
                


                


                <button class="btn btn-lg  btn-block btn-signin" type="submit" id="btn1" name="Enregistrer">Se connecter</button>
            </form><!-- /form -->

            
        </div>
        <?php
        session_start();

$mysqli = new mysqli ("127.0.0.1" , "root" , "amine"  , "PARISWEST") or die (mysqli_error($mysqli));
if (isset($_POST["Enregistrer"])){
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM adminusers 
WHERE username LIKE '$username' && userpassword LIKE '$password'  ";
$res=mysqli_query($mysqli ,$sql);
$row  = mysqli_fetch_array($result);
$valid =true;
if(is_array($row)) {
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    header ("Location: homepage.php");
    echo "<br>message saved";
}else {

    echo "<br><h5 class='text-danger' style='text-align:center; font-size:15px;'> Vos informations semblent incorrects<h5>";
}
}


?>
    </div>
</div>
</div>
</div>

        <!-- Copyrights -->
        <div class="bg-white">
            <div class="container text-center">
                <p class="text-muted mb-0 ">© 2021 AMMAR AMINE  All rights reserved.</p>
            </div>
        </div>
    

    <!-- Footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>