<!DOCTYPE html>
<html>
    <head>
         <title>Rémy Jaume - Artiste peintre - Mes Oeuvres</title>
        <description></description>
        <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="style.css"> 
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Roman Kirichik">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
         <link rel="shortcut icon" href="img/logo.ico">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">        
        <link rel="stylesheet" href="style.css"> 
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
                      
                        <a href="/" class="menu-item">l'artiste</a>
                        <a href="/" class="menu-item">dessins</a>
                        <a href="/oeuvres.php" class="menu-item">peintures</a>
                        <a href="/" class="menu-item">contact</a>

                    </nav>
                </div>
            </div>
            
        </header>

        <!-- Page Wrap -->
        <div class="page" id="top">
            

          
            <!-- Portfolio Section -->
            <section class="page-section pb-0">
                <div class="relative">
                    <div class="milieu"><img src="img/signature.jpg" alt="Remy Jaume"></div>
                    
                    <!-- Works Grid -->
                    <!--<ul class="works-grid work-grid-3 clearfix font-alt hover-white hide-titles masonry" id="work-grid">-->
                     <ul class="works-grid clearfix font-alt hover-white hide-titles masonry" id="work-grid">
                        <!-- Work Item (External Page) -->
                       
                        <?php
                            $dos = "img/1";
                            $dir = opendir($dos);
                            while($file = readdir($dir)){
                                $allow_ext = array("jpg",'png','gif');
                                $ext = strtolower(substr($file,-3));
                                if(in_array($ext,$allow_ext)){
                                    ?>
                                        <li class="work-item mix branding">
                                            <a href="img/1/<?php echo $file ?>" class="work-lightbox-link mfp-image">
                                                <div class="work-img">
                                                    <img class="work-img" src="img/1/<?php echo $file ?>" alt="Décoration  d'intérieur" />
                                                </div>
                                                <div class="work-intro">
                                                    <h3 class="work-title">Décoration</h3>
                                                    <div class="work-descr">
                                                         External Page
                                                    </div>
                                                </div>
                                            </a>
                                   
                                    <?php
                                }
                            }
                            ?>
                       
                        
                    </ul>
                    <!-- End Works Grid -->
                    
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
                <span>2018 Remy Jaume</span>. All rights reserved.
            </div>
        </footer>
        
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
    </body>
</html>
