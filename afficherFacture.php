

<!DOCTYPE html>
<html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function hideMessage()
        {
            document.getElementById("message1").style.visibility ="hidden" ;
        }
        setTimeout("hideMessage()" , 5000);
    </script>


</head>

<body class="bg-light" >

    <header class="text-dark text-center" id="title2">
    </header>
    <div class="text-right">
        <p>  
            <?php 
                session_start();
                echo "<p style=' color:black; font-size:12px; ' > Utilisateur : ". $_SESSION['username']."<br><a href='index.php' style='text-decoration:none; text-align:right ; color:red; font-size:12px;' > Se deconnecter </a></p>"; 
            ?>
       
        </p>
        
    </div>
    <nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-center" >
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

    <div class='alert alert-success' style ='font-size: 18px ;text-align : center;' id="message1">
<strong>Voici les factures que vous cherchez !
</strong>
</div>

    <div class='container' >


<div class="row py-6">
    <div class="col-lg mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-6 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="font-size:8px;  width:100%" class="table table-striped table-bordered">
              <thead>
    <tr>
    <th colspan="14"><h4>FACTURE</h4></th>
    </tr>
    <tr style="font-size:8px;">
    <th>N° client</th>
    <th>REF° FACTURE</th>
    <th>N° CHAMBRE</th>
    <th>NOM</th>
    <th>PRENOM</th>
    
    
    <th>A PARTIR DU</th>
    <th>JUSQU'AU</th>

    <th>NOMBRE DE NUIT(S)</th>
    <th>PAX</th>
    <th>ORGANISME</th>
    <th>Reservation N°</th>
    <th>MONTANT</th>
    <th>STATUT</th>
    <th>DATE DE PAIEMENT</th>
    

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
        if(isset($_POST['chercherFacture'])){
        $dateCheckIn= $_POST["dateIn"];
        $dateCheckOut= $_POST["dateOut"];
        $organisme = $_POST["org"];
        $numCl = $_POST["numCl"];
        $numCh=$_POST["numCh"];
        $ref=$_POST["numFacture"];


        if($dateCheckIn == null){$dateCheckIn="";}
        if($dateCheckOut == null){$dateCheckOut="";}
        if($numCl == null){$numCl="";}
        if($numCh == null){$numCh="";}
        if($ref == null){$ref="";}
        if($organisme == null){$organisme="";}


        
        echo "<ul style='color:black'> ";
        
        

        if($dateCheckIn !=""){echo "<br>Date check in  : " .$dateCheckIn  ;}
        if($dateCheckOut !=""){echo "<br>Date check out : " .$dateCheckOut;}
        if($numCl !=""){echo "<br>Num° Tel : " .$numCl;}
        if($numCh !=""){echo "<br>La chambre : " .$numCh ;}
        if($ref !=""){echo " Reférence reservation :   " .$ref;}
        if($organisme !=""){echo "<br> org :   " .$organisme;}
        
        $sql =" SELECT DATEde , DATEar , NUMEROCHAMBRE , IDreservation , c.nameClient , c.pnameClient ,c.idClient, c.clientNumberMemberes , c.organisme , f.Montant,f.statut , f.dateDePaiement,f.referenceFacture
        FROM reservation AS r
        INNER JOIN client AS c
          ON r.idClient = c.idClient
        INNER JOIN factures AS f
          ON c.idClient  = f.idClient
          WHERE f.referenceFacture='22'"; 

                
        
        
        $dateDifference = abs(strtotime($datein) - strtotime($dateout));
        
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                
        
       $prix = 15*$days*3;
       
       $res=mysqli_query($conn ,$sql);
        $x=mysqli_num_rows($res);
        while( $row = mysqli_fetch_array($res)){

        $nom = $row["nameClient"];
        $pnom = $row["pnameClient"];
        $dateCheckIn= $row["DATEar"];
        $dateCheckOut= $row["DATEde"];
        $organisme = $row["organisme"];
        $refres=$row["IDreservation"];
        $numCh=$row["NUMEROCHAMBRE"];
        $numFacture=$row["referenceFacture"];
        $numCl=$row["idClient"];
        $clientNumberMemberes=$row["clientNumberMemberes"];
        
        $Montant=$row["Montant"];
        $statut=$row["statut"];
        $dateDePaiement=$row["dateDePaiement"];
        

        $dateDifference = abs(strtotime($dateCheckIn) - strtotime($dateCheckOut));
        
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $nuits   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
        
        if ($organisme == "VSP"){
        $Montant = 15*45;
        }else{
           $Montant= nuits*23;
        }

            echo "<tr><td>"
            . $numCl."</td><td>" . $numFacture."</td><td>". $numCh."</td><td>". $nom."</td><td>". $pnom."</td><td>"
             . $dateCheckIn."</td><td>" . $dateCheckOut."</td><td>". $nuits."</td><td>". $clientNumberMemberes."</td><td>". $organisme."</td><td>". $Montant."</td><td>". $numCh."</td><td>". $statut."</td><td>"
             . $dateDePaiement."</td></tr>";
           }
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
            <?php 
        $date1 = date("Y-m-d");
        echo  "<br><p class='text-danger' style=' font-size:15px; text-align:left;'> DATE : <h5 '></p> " . $date1 . "</h5>";
    ?>    

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