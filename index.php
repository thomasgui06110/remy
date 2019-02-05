<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rémy Jaume - Artiste peintre</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131199501-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131199501-1');
    </script>

    <meta name="description" content="Découvrez les oeuvres de l'Artiste Rémy Jaume, peintre autodidacte." />
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <link rel="icon" type="image/ico" href="img/logo.ico"/>
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
        "message": "Ce site utilise des cookies à des fins statistiques.",
        "dismiss": "OK",
        "link": "En savoir plus"
      }
    })});
    </script>
</head>
<body>
    <div class="contenu">
        <header class="header">

                <div class="barre">
                    <div class="topbar">
                        <div class="logo">
                            <a href="/">Rémy Jaume</a>
                        </div>
                        <nav class="menu">
                          <?php include("menu.php") ?>
                        </nav>
                    </div>
                </div>
                 <?php
                    include ('connexion.php'); 
                    $reponse = $bdd->query('SELECT * FROM artiste WHERE Id_Artiste= 0');  
                    ($donnees = $reponse->fetch())
                 ?>

            <div class="baseline">
                <strong class="baseline-name"><?php echo $donnees['Titre']; ?></strong> 
                <img class="home_photo" src="img/<?php echo $donnees['Photo']; ?>" alt="<?php echo $donnees['Titre']; ?> - Artiste peintre" >
            </div>

        </header>

        <footer class="footer" id="footer">
            <div class="container">

                <div class="footer-credits">
                    <?php include('footer.php') ?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>