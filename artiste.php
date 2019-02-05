<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rémy Jaume - Artiste peintre</title>
    <description></description>
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style2.css"> 
    <link rel="shortcut icon" href="img/logo.ico">
   
</head>
<body>
    <header class="header">
        
            <div class="barre">
                <div class="topbar">
                    <div class="logo">
                        <a href="index.php">Rémy Jaume</a>
                    </div>
                    <nav class="menu">
                      <?php include("menu.php") ?>
                    </nav>
                </div>
            </div>
    </header>       
    <section>    
        <div class="baseline">
            <div class="milieu"><img src="img/signature.jpg" alt="Remy Jaume"></div>
             <?php
                include ('connexion.php'); 
                $reponse = $bdd->query('SELECT * FROM artiste WHERE Id_Artiste= 1');  
                ($donnees = $reponse->fetch())
             ?>
            <div class="contener1">
                <div class="photo_artiste">
                    <img src="img/diapo/<?php echo $donnees['Photo']; ?>" alt="Remy Jaume Artiste Peintre" width="350px">
                
                </div>
                
                <div class="texte">
                    <div class="titre">    <?php echo $donnees['Titre']; ?></div>
                    <?php echo $donnees['Texte']; ?>
                
                </div>
            
            
            </div>
           
        </div>
        
  </section>
 
    <footer class="footer" id="footer">
        <div class="container">

            <div class="footer-credits">
               <?php include('footer.php') ?>
            </div>
        </div>
    </footer>

</body>
</html>