
<!DOCTYPE html>
<html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

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

    <div class="row py-6">
        <div class="col-lg mx-auto">
         <div class="card rounded shadow border-0">
             <div class="card-body p-6 bg-white rounded">
                <div class="table-responsive">
                    <table id="example" name="tab" style="font-size:10px;  width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="13"><h2>LES PRISES EN CHARGE</h2></th>
                                        </tr>
                                        <tr style="font-size:8px;">
                                        <th>REFERENCE RESERVATION</th>
                                        <th>NOM</th>
                                        <th>PRENOM</th>
                                        <th>CHECK IN</th>
                                        <th>CHECK OUT</th>
                                        <th>NUMERO DE CHAMBRE</th>
                                        <th>NUMERO DE TELEPHONE</th>
                                        <th>ADRESSE EMAIL</th>
                                        
                                            <th>ORGANISME</th>
                                            <th>TYPOLOGIE</th>
                                            
                                            <th>NOMBRE DE NUIT</th>
                                            <th>TARIF</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
    
        $servername = "127.0.0.1";
        $username = "root";
        $password = "amine";
        $dbname = "PARISWEST";

        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "error";
        }
        
        $nom = $_POST["nom"];
        $prenom = $_POST["pnom"];
        $dateCheckIn= $_POST["dateIn"];
        $dateCheckOut= $_POST["dateOut"];
        $organisme = $_POST["org"];
        $email = $_POST["addEmail"];
        $numTel = $_POST["numTel"];
        $numCh=$_POST["numCh"];
        $ref=$_POST["reservationID"];

        if($nom == null){$nom="";}
        if($prenom == null){$prenom="";}
        if($dateCheckIn == null){$dateCheckIn="";}
        if($dateCheckOut == null){$dateCheckOut="";}
        if($email == null){$email="";}
        if($numTel == null){$numTel="";}
        if($numCh == null){$numCh="";}
        if($ref == null){$ref="";}
        if($organisme == null){$organisme="";}


        if (($nom !="")||($prenom !="")||($prenom !="")||($dateCheckIn !="")
        ||($dateCheckOut !="")||($email !="")||($numCh !="")||($numTel !="")||($ref !=""))
         {
            echo "<h5 style='text-align:left;color:forestgreen; font-size:12px'>Filtrer par : </5>" ;
        }else {echo "<p style='color:forestgreen ;text-align:left'>Touts les reservations dans notre base de données</p>";}
        echo "<ul style='color:black'> ";
        if($nom !=""){echo "<br>Nom:  " .$nom ;}
        if($prenom !=""){ echo "<br>Prenom : " .$prenom;}
        if($dateCheckIn !=""){echo "<br>Date check in  : " .$dateCheckIn  ;}
        if($dateCheckOut !=""){echo "<br>Date check out : " .$dateCheckOut;}
        if($email !=""){echo "<br>Adresse mail : " .$email ;}
        if($numTel !=""){echo "<br>Num° Tel : " .$numTel;}
        if($numCh !=""){echo "<br>La chambre : " .$numCh ;}
        if($ref !=""){echo " Reférence reservation :   " .$ref;}
        if($organisme !=""){echo "<br> org :   " .$organisme;}

        echo "</ul>";

        
        $sql = "SELECT  * FROM reservation
        WHERE NOM LIKE '%$nom%' AND PRENOM LIKE '%$prenom%' AND DATEar LIKE '%$dateCheckIn%' 
        AND DATEde LIKE '%$dateCheckOut%'  AND ORGANISME LIKE '%$organisme%'
        AND EMAIL LIKE '%$email%' AND NUMEROTEL LIKE '%$numTel%'
        AND NUMEROCHAMBRE LIKE '%$numCh%' AND reservationID LIKE '%$ref%' AND ORGANISME LIKE '%$organisme' "; 

        $res=mysqli_query($conn ,$sql);
        $x=mysqli_num_rows($res);
        if($x==0)
        {
            echo "<p style='text-align:left; color:red'>Aucun resultat </p>";
        }else {
            echo "<p style='text-align:left; color:red' >".$x ." resulat(s) trouvé(s) </p>";
        }
        while( $row = mysqli_fetch_array($res)){
        $nom = $row["NOM"];
        $prenom = $row["PRENOM"];
        $dateCheckIn= $row["DATEar"];
        $dateCheckOut= $row["DATEde"];
        $organisme = $row["ORGANISME"];
        $email = $row["EMAIL"];
        $numTel = $row["NUMEROTEL"];
        $typeCh = $row["TYPECHAMBRE"];
        $numCh=$row["NUMEROCHAMBRE"];
        $ref=$row["reservationID"];
    

        
        $dateDifference = abs(strtotime($dateCheckIn) - strtotime($dateCheckOut));
        
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                
       echo "<br> y : " .$years ." - m : " .$months." - d : " .$days;
       $prix = (($days*45)+(31*$months*45)+(365*$years*45));
        echo "<tr><td>"
         . $ref."</td><td>" . $nom."</td><td>". $prenom."</td><td>"
          . $dateCheckIn."</td><td>" . $dateCheckOut."</td><td>"
          .$numCh."</td><td>" . $numTel."</td><td>"
          . $email."</td><td>" . $organisme."</td><td>"
          . $typeCh."</td><td>". $days." nuits"  ."</td><td>" . $prix."</td></tr>";
        }

            $conn->close();
        ?>  
              </tbody>

</table>
</div>
        </div>
      </div>
    </div>
  </div>
    </div>
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