<?php
    include ('connexion.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
         <title>Rémy Jaume - Artiste peintre - Mes Oeuvres</title>
        <meta name="description" content="Les oeuvres de Remy Jaume, artiste peintre" />
        <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://www.remyjaume.com/style.css"> 
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Roman Kirichik">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
       <link rel="icon" type="image/ico" href="https://www.remyjaume.com/img/logo.ico"/>

        <!-- CSS -->
        <link rel="stylesheet" href="https://www.remyjaume.com/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/style.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/style-responsive.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/animate.min.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/owl.carousel.css">
        <link rel="stylesheet" href="https://www.remyjaume.com/css/magnific-popup.css">        
        <link rel="stylesheet" href="https://www.remyjaume.com/style.css"> 
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
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
            
        </header>

        <!-- Page Wrap -->
        <div class="page" id="top">
            

          
            <!-- Portfolio Section -->
            <section class="page-section pb-0">
                <div class="relative">
                    <div class="milieu"><img src="https://www.remyjaume.com/img/signature.jpg" alt="Remy Jaume"></div>
                    
                    <!-- Works Grid -->
                    <!--<ul class="works-grid work-grid-3 clearfix font-alt hover-white hide-titles masonry" id="work-grid">-->
                     <ul class="works-grid clearfix font-alt hover-white hide-titles masonry" id="work-grid">
                        <!-- Work Item (External Page) -->
                         <?php 
                             $reponse = $bdd->prepare('SELECT * FROM tableau WHERE Cat = ? ');                             
                             $reponse->execute(array($_GET['Cat']));
                                 while ($donnees = $reponse->fetch())
                             {
                                 ?>
                       
                                    <li class="work-item mix branding">
                                        <a href="https://www.remyjaume.com/img/diapo/<?php echo $donnees['Photo']; ?>" class="work-lightbox-link mfp-image">
                                            <div class="work-img">
                                                <img src="https://www.remyjaume.com/img/diapo/<?php echo $donnees['Photo']; ?>" alt="<?php echo $donnees['Titre'];?>" />
                                            </div>       
                                              
                                                <div class="work-intro">
                                                    <h3 class="work-title"><?php echo $donnees['Titre'];?></h3>
                                                    <div class="work-descr">
                                                        <?php echo $donnees['Description']; ?>
                                                    </div>
                                                </div>
                                            </a>
                                   
                                    <?php
                                }
                            ?>
                       
                        
                    </ul>
                  
                </div>
            </section>
            <!-- End Portfolio Section -->
            
            
          
            <!-- End Call Action Section -->
            
            
            <!-- Foter -->
           

            <!-- End Foter -->
        
       
        </div>
        <!-- End Page Wrap -->
        <footer class="footer" id="footer">
           

            <div class="footer-credits">
                <?php include('footer.php') ?>
            </div>
        </footer>
        
        <!-- JS -->
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="https://www.remyjaume.com/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.appear.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/wow.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/all.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/contact-form.js"></script>
        <script type="text/javascript" src="https://www.remyjaume.com/js/jquery.ajaxchimp.min.js"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
    </body>
</html>
