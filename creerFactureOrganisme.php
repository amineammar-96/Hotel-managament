
<!DOCTYPE html>
<html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="hotel.js"></script>

    <script type="text/javascript">
        function hideMessage()
        {
            document.getElementById("message123").style.visibility ="hidden" ;
        }
        setTimeout("hideMessage()" , 10000);
    </script>
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
    <div class='container'>


    <?php
$mysqli = new mysqli ("127.0.0.1" , "root" , "amine"  , "PARISWEST") or die (mysqli_error($mysqli));
    
if (isset($_POST["creerFacture"])){
$dateDebut= $_POST["dateIn"];
$dateFin= $_POST["dateOut"];
$numClient=$_POST["refClient"];


    
$date1 = str_replace('/', '-', $dateDebut);
$new_date1 = date('Y-m-d', strtotime($date1));
$date2 = str_replace('/', '-', $dateFin);
$new_date2 = date('Y-m-d', strtotime($date2));


$sqlCheckExists= "SELECT * FROM factures 
WHERE idClient='$numClient' AND dateD='$new_date1' AND dateF='$new_date2'";


$result=mysqli_query($mysqli,$sqlCheckExists);
$row = mysqli_fetch_array($result);
$x=mysqli_num_rows($result);
if( $x > 0 ){echo "<br><div class='container'>
    <div class='alert alert-danger' style ='font-size: 18px ;text-align : center;' id='message123'>
    Facture invalide (facture déja crée) !<br>";
    echo "REF° facture associé  : <strong> ".$row['referenceFacture']."</strong>";
    echo "<a/></div>" ;
}else{
 $sql = ("INSERT INTO factures(idClient, dateCreationFacture , dateD , dateF)
 VALUES ('$numClient',now() , '$new_date1' , '$new_date2'  ) ");
    if (mysqli_query($mysqli,$sql)){
        $result=mysqli_query($mysqli,$sqlCheckExists);
$row = mysqli_fetch_array($result);
   echo  "<div class='alert alert-success' style ='font-size: 18px ;text-align : center;' id='message123'>
Une nouvelle facture à été bien enregistrée !<strong> REF° : " .$row['referenceFacture']." </strong>
<br>N° Client :  <strong>" .$row['idClient']."
</strong></div> " ; }
    }

}



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
                            <h3 class="register-heading">CREER UNE FACTURE POUR UN ORGANISME</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label" for="dateIn">Du  </label>
                                        <input class="form-control" id="dateIn" name="dateIn" placeholder="MM/DD/YYY" type="date" required /> </div>
                                    <div class="form-group"> </div>
                                    <div class="form-group">
                                        <label class="control-label" for="org">
                                        Organisme
                                    </label>
                                        <select class="form-control" id="org" name="org"  >
                                        <option class="hidden"  selected disabled value="">Chosir un organisme</option>
                                        <option  value="VSP">VSP</option>
                                        <option  value="MIE NORMAL">MIE NORMAL</option>
                                        <option  value="MIE MISE A L'ABRI">MIE (MISE A L'ABRI)</option>
                                        <option  value="PASSAGER">PASSAGER</option>
                                    </select>
                                    </div>
                                          

                                </div>

                                <div class="col-md-6"> 
                                    <div class="form-group">
                                    <label class="control-label" for="dateOut">Jusqu'au </label>
                                        <input class="form-control" id="dateOut" name="dateOut" placeholder="MM/DD/YYY" type="date" required /> </div>
                                   
                                   
                                    <div class="form-group">
                                <div class="form-group">
                                
                                    
</div>                                    
                                   
                                    <input type="submit" class="btnRegister" value="Facturer" name="creerFacture"/>
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