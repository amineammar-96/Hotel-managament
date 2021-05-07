<!DOCTYPE html>

<head>
    <title>monSiteWeb </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   



</head>

<body class="bg-light">


  
    </header>
    <div class="text-right">
        <p>  
            <?php 
            session_start();

                if($_SESSION['username']){
            
                echo "<p style=' color:black; font-size:12px; ' > Utilisateur : ". $_SESSION['username']."<br><a href='logout.php' style='text-decoration:none; text-align:right ; color:red; font-size:12px;' > Se deconnecter </a></p>"; 
                }?>
       
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


    <main role="main">




    
<section class="jumbotron text-center bg-light">
  <div class="container">
    <h1 class="jumbotron-heading">BIENVENU A PARISWEST</h1>
    <p class="lead text-muted">GEREZ VOTRE HOTEL EN TOUTE FACILITE</p>
  </div>
</section>




<section id="about" class="bg-light text-black">
            <div class="container" >
                <div class="row" >
                    <div class="col-lg mx-auto center">
<p style="font-size:20px ; text-align: center; font-weight : bold;"> 
LES TACHE DISPONIBLES 
</p>
                        <ul>
                        <li  style="font-size:14px ; ">GESTION DES CLIENT <br><small style="color:red;">(CREER NOUVEAU CLIENT, CHERCHER UN CLIENT , MODIFIER LES DONNEE DES CLIENTS , SUPPRIEMER DES CLIENTS ) </small ></li>
                        <br><li  style="font-size:14px ; ">GESTION DES PRISES EN CHARGE <br><small style="color:red;">(CREER UNE NOUVELLE PRISE EN CHARGE ,  MODIFIER , SUPPRIEMER , CHERCHER ) </small ></li>
                            <br><li style="font-size:14Px ; ">GESTION DES FACTURES <br><small style="color:red;">(CREER DES FACTURES POUR CHAQUE PRISE EN CHARGE)</small ></li>
                            <br><li style="font-size:14px ; ">VOIR LA LISTES DES DEPART DE AUJOURD'HUI</small ></li>
                            <br><li style="font-size:14px ; ">VOIR LA LISTES DES CHAMBRES DISPONIBLES</small ></li>
                            <br><li style="font-size:14px ; ">GESTION DE STOCK<br><small  style="color:red;">(CONSULTER LES QUANTITES DES PRODUITS , RAJOUTER UNE QUANTITE POUR CHAQUE PRODUIT , RETIRER UNE QUANTITE POUR CHAQUE PRODUIT)</small ></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
<section id="about" class="bg-light">
            <div class="container" >
                <div class="row" >
                    <div class="col-lg mx-auto text-left">
<br><br><br>
                    <p style="font-size:20px ; text-align: center; font-weight : bold;"> 
LES ETAPES A SUIVRE 
</p>

<br>
<p style="font-size:20px ;   color:#2D9CEF;  font-weight: bolder; text-align:center;"> 
I. GESTION DES PRISES EN CHARGE :
</p>
                        <ul >
                            <li style="font-size:16px ;     font-weight: bolder; ">1-CREER UN NOUVEAU CLIENT  DES SON ARRIVE SI IL N'EXISTE PAS DANS NOTRE SYSTEME SI NON PASSE AU 2EME ETAPE</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">2-CREER LA PRISE EN CHARGE DU CLIENT</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">3-PROLONGER , MODIFIER OU SUPPRIEMER LA PRISE EN CHARGE DU CLIENT</li>
                             </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="bg-light">
            <div class="container" >
                <div class="row" >
                    <div class="col-lg mx-auto text-left">
<p style="font-size:20px ;   color:#2D9CEF;  font-weight: bolder; text-align:center;"> 
II. FACTURATION PAR CLIENT :
</p>
                        <ul>
                            <li style="font-size:16px ;     font-weight: bolder; ">1-CREER UNE FACTURE LE JOUR DE DEPART DU CLIENT</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">2-MODIFIER OU SUPPRIEMER UNE FACTURE DU CLIENT</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">3-RAJOUTER LA FACTURE DU CLIENT AU BDD DU L'ORGANISME CORRESPONDANT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section id="about" class="bg-light">
            <div class="container" >
                <div class="row" >
                    <div class="col-lg mx-auto text-left">
<p style="font-size:20px ;   color:#2D9CEF;  font-weight: bolder; text-align:center;"> 
III. FACTURATION PAR ORGANISME CHAQUE FIN DU MOIS :
</p>
                        <ul>
                            <li style="font-size:16px ;     font-weight: bolder; ">1-CREER UNE FACTURE CHAQUE FIN DU MOIS POUR TOUT LES CLIENTS DU CHAQUE ORGANISME</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">2-MODIFIER OU SUPPRIEMER UNE FACTURE D'ORGANISME</li>
                            <li style="font-size:16px ;     font-weight: bolder; ">3-METTEZ LA FACTURE EN FICHIER PDF ET LA STOCKER DANS UN DOSSIER EXTERNE</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>





<div class="album py-5 bg-light" >
  <div class="container" >

    <div class="row" >
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="img/1.jpeg" alt="Card image cap">
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="img/2.jpeg" alt="Card image cap">
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="img/3.jpeg" alt="Card image cap">
          
        </div>
      </div>

      

     
      
      
    </div>
  </div>
</div>

</main>



    

    <!-- Footer -->
    <footer class="bg-white">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">notre site</h6>
                    <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="gestionClient.php" class="text-muted">GESTION DES CLIENTS</a></li>
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