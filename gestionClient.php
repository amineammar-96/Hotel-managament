
<!DOCTYPE html>
<html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="hotel.js"></script>


</head>

<body class="bg-light">

    <header class="text-dark text-center" id="title2">
    <h1><a href="homepage.php" style="text-decoration: none;">PARISWEST HOTEL Management</a></h1>
    </header>
    <div class="text-right">
        <p>  
            <?php 
                session_start();
                echo "<p style=' color:black; font-size:12px; ' > Utilisateur : ". $_SESSION['username']."<br><a href='index.php' style='text-decoration:none; text-align:right ; color:red; font-size:12px;' > Se deconnecter </a></p>"; 
            ?>
       
        </p>
        
    </div>
    <nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-center">
        <div class="container-fluid">

            <a id="logo" href="homepage.php"><img src="img\logo2.jpeg" width="100"></a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
            <li><a href="checkout.php" class="nav-link text-dark">DEPARTS</a></li>
                <li><a href="gestionReservation.php" class="nav-link text-dark ">GESTION DES RESERVATION</a></li>
                <li><a href="gestionClient.php" class="nav-link text-dark">GESTION DES CLIENTS </a></li>
                <li><a href="stock.php" class="nav-link text-dark">GESTION DE STOCK</a></li>
                <li><a href="Facturation.php" class="nav-link text-dark">GESTION DES FACTURES</a></li>
                <li><a href="afficherLesListesDesClients.php" class="nav-link text-dark">LISTES DES CLIENTS</a></li>

            </ul>
        </div>
    </nav>

    <?php 
    
    $mysqli = new mysqli ("127.0.0.1" , "root" , "amine"  , "PARISWEST") or die (mysqli_error($mysqli));

    if (isset($_POST["save"])){
$numTelc = $_POST["numTelClient"];
$nomc = $_POST["nomClient"];
$prenomc = $_POST["pnomClient"];
$$typeCl = $_POST["typeClient"];
$gClientc = $_POST["gClient"];
$emailc = $_POST["addEmailClient"];
$numPax=$_POST["clientNumberMemberes"];
$orgc=$_POST["typeCl"];  
$dateCreation= $_POST["dateCreation"];
$date11 = str_replace('/', '-', $dateCreation);
$new_date1 = date('Y-m-d', strtotime($date11));

$sql21 = " SELECT idClient 
FROM client 
WHERE nameClient = '$nomc' AND pnameClient = '$prenomc' AND  GENRE = '$gClientc' 
AND clientNumberMemberes = '$numPax' AND emailClient = '$emailc' 
AND telClient = '$numTelc' AND dateCreation =  '$new_date1' ";

$result=mysqli_query($mysqli,$sql21);
$row = mysqli_fetch_array($result);
$x=mysqli_num_rows($result);
if( $x > 0 ){echo "<br><div class='container'>
    <div class='alert alert-danger' style ='font-size: 18px ;text-align : center;'>
    client existe déja dans notre base de données !<br>";
    echo "N° client associé  : <strong> ".$row['idClient']."</strong>";
    echo "<a/></div>" ;
}
else{
$sq = ("INSERT INTO client (nameClient, pnameClient, GENRE, clientNumberMemberes, emailClient, telClient, dateCreation , organisme)
VALUES ('$nomc' ,'$prenomc' , '$gClientc', '$numPax' ,'$emailc' , '$numTelc','$new_date1' ,'$orgc')");
if(mysqli_query($mysqli , $sq)){
    $result=mysqli_query($mysqli,$sql21);
    $row = mysqli_fetch_array($result);
    echo "<br>
<div class='container'>
<div class='alert alert-success' style ='font-size: 18px ;text-align : center;'>
Un nouveau client à été bien crée !<br>";

echo "Nouveau N° client associé  : <strong> ".$row['idClient']."</strong>";


echo "<a/></div>" ;
    
}else {
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
}}
$mysqli->close();


?>



<form name="form123"  method="post">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>PARISWEST APPLICATION</h3>
                    <p>GEREZ VOTRE HOTEL EN TOUTE FACILITE</p>
                    <a href="#"><input type="button" name="" value="COMMENCEZ" /></a><br/>
                </div>
                <div class="col-md-9 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">CREER UN NOUVEAU CLIENT</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="nomClient">
                                        Nom
                                    </label>
                                        <input type="text" class="form-control" placeholder="Nom *" name="nomClient" id="nomClient" required />
                                    </div>
                                    <label class="control-label" for="pnomClient">
                                    Prenom
                                </label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pnomClient" id="pnomClient" placeholder="Prenom *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <caption>
                                                <p>GENRE</p>
                                            </caption>
                                            <label>
                                        <input type="radio" name="gClient" id="gClient" value="jeune homme" required>
                                        <span > JEUNE HOMME</span>
                                        </label>
                                        <label>
                                        <input type="radio" name="gClient" id="gClient" value="jeune femme" required>
                                        <span > JEUNE FEMME</span>
                                        </label>
                                            <label class="radio inline"> 
                                            <input type="radio" name="gClient" id="gClient" value="homme" >
                                            <span>HOMME</span> 
                                        </label>
                                            <label class="radio inline"> 
                                            <input type="radio" name="gClient" value="femme" id="gClient">
                                            <span >FEMME </span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="addEmailClient">
                                        Adresse email
                                    </label>
                                        <input type="email" class="form-control" id="addEmailClient" name="addEmailClient" placeholder="Adresse email *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="numTelClient">
                                        Numero de portable
                                    </label>
                                        <input type="text" minlength="10" name="numTelClient" id="numTelClient" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="N° de portable *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="typleCl">
                                            ORGANISME                                    </label>
                                        <select class="form-control" id="typeCl" name="typeCl" required >
                                        <option class="hidden"  selected disabled value="">ORGANISME</option>
                                        <option  value="VSP">FAMILLE VSP</option>
                                        <option  value="MIE NORMAL">MINEUR NON ACOMPAGNNE NORMAL</option>
                                        <option  value="MIE MISE A L'ABRI">MINEUR NON ACOMPAGNNE MISE A L'ABRI</option>
                                        <option  value="PASSAGER">PASSAGER</option>

                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="dateCreation">
                                        Date de creation 
                                    </label>
                                        <input type="date" class="form-control" required id="dateCreation" name="dateCreation" placeholder="Date de creation  *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="clientNumberMemberes">
                                        Nombre de personnes   
                                    </label>
                                        <input type="text" class="form-control" required id="clientNumberMemberes" name="clientNumberMemberes" placeholder="Nombre de personnes *" value="" />
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" class="btnRegister" value="Enregistrer" name="save"/>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

    
<form name="form123"  method="post" action="listeClient.php">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>PARISWEST APPLICATION</h3>
                    <p>GEREZ VOTRE HOTEL EN TOUTE FACILITE</p>
                    <a href="#"><input type="button" name="" value="COMMENCEZ" /></a><br/>
                </div>
                <div class="col-md-9 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">CHERCHER UN CLIENT</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="nomClient">
                                        Nom
                                    </label>
                                        <input type="text" class="form-control" placeholder="Nom " name="nomClient" id="nomClient"  />
                                    </div>
                                    <label class="control-label" for="pnomClient">
                                    Prenom
                                </label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pnomClient" id="pnomClient" placeholder="Prenom " value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="nomClient">
                                        N° client
                                    </label>
                                        <input type="text" class="form-control" placeholder="N° client " name="refClient" id="refClient"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="addEmailClient">
                                        Adresse email
                                    </label>
                                        <input type="email" class="form-control" id="addEmailClient" name="addEmailClient" placeholder="Adresse email " value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="numTelClient">
                                        Numero de portable
                                    </label>
                                        <input type="text" minlength="10" name="numTelClient" id="numTelClient" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="N° de portable " value=""  />
                                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label" for="dateCreation">
                                        Date de creation 
</label>
                                        <input type="date" class="form-control"  id="dateCreation" name="dateCreation" value="" />
                                    </div>
                                   
                                    <div class="form-group">
                                    <input type="submit" class="btnRegister" value="Enregistrer" name="chercher2"/>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>






    <!-- Footer -->
    <footer class="bg-white">
        <div class="container py-5">
            <div class="row py-4">

                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">notre site</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="gestionReservation.php" class="text-muted">GESTION DES RESERVATION</a></li>
                        <li class="mb-2"><a href="checkout.php" class="text-muted">LISTES DES DEPART</a></li>
                        <li class="mb-2"><a href="chambre.php" class="text-muted">GESTION DES CHAMBRES</a></li>
                        <li class="mb-2"><a href="stock.php" class="text-muted">GESTION DE STOCK</a></li>
                        <li class="mb-2"><a href="Facturation.php" class="text-muted">GESTION DES FACTURES</a></li>
                        <li class="mb-2"><a href="afficherLesListesDesClients.php" class="text-muted">LISTES DES CLIENTS</a></li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">RETROUVEZ-NOUS</h6>
                    <p class="text-muted mb-4">
                        <p>Adresse : 2 rue de Laennec <br> 78310 Coignières</p>Accès Transport : RER C : La Verrière - Versailles Rive Gauche</p>
                    <div class="p-1 rounded border">
                        <div class="input-group">
                            <input type="email" placeholder="xxxx@xxxxx.xx" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" value="Ok" class="btn btn-link text-primary"><i class="fa fa-paper-plane" style="font-size:14px;">ENVOYER</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">© 2021 AMMAR'S COMPANY All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>