<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.remyjaume.com/img/logo.ico">
    <title>Biographie de l'artiste - Rémy Jaume</title>
    <meta name="description" content="Biographie de l'artiste peintre : Remy Jaume" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131199501-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131199501-1');
    </script>

    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style3.css"> 
    
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#edeff5",
          "text": "#838391"
        },
        "button": {
          "background": "#1f0a0a"
        }
      },
      "position": "bottom-right",
      "content": {
        "message": "Ce site utilise des cookies a des fins de statistiques.",
        "dismiss": "OK",
        "link": "En savoir plus"
      }
    })});
    </script>
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
            <div class="milieu"><img src="img/signature.png" alt="Remy Jaume"></div>
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