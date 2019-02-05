<?php
    if (empty($_POST)) {
        $confirm="";
    }
    else {
        $confirm="OK";
        extract($_POST);
		$destinataire="contact@remyjaume.com";
		//$destinataire="guilhem.Thomas@gmail.com";
		$entete="Reply-To: $Mail";
		//mail($destinataire,$sujet,$msg,$entete);
		
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $Mail)) // On filtre les serveurs qui rencontrent des bogues.
						{
							$passage_ligne = "\r\n";
						}
						else
						{
							$passage_ligne = "\n";
						}
						//=====Déclaration des messages au format texte et au format HTML.
						$message_txt = "Remy Jaume - texte";
						$message_html = "<html><head></head><body><b></b>
										<p>
										Nom : $Nom <br />
					     
										mail : $Mail<br />
                
         								Message : 
										
										
										 <br />
										$Commentaires
										<p>
										<p>
						
											
						</body></html>";
						//==========
						 
						//=====Création de la boundary
						$boundary = "-----=".md5(rand());
						//==========
						 
						//=====Définition du sujet.
						$sujet = "Formulaire Site Web ";
						//=========
						 
						//=====Création du header de l'e-mail.
						$header="From: \"Remy Jaume\" <contact@remyjaume.com>\r\n";
						$header.= "Reply-To: $Mail".$passage_ligne;
						$header.= "MIME-Version: 1.0".$passage_ligne;
						$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
						//==========
						 
						//=====Création du message.
						$message = $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout du message au format texte.
						/*$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_txt.$passage_ligne;*/
						//==========
						$message.= $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout du message au format HTML
						$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_html.$passage_ligne;
						//==========
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						//==========
						 
						//=====Envoi de l'e-mail.
						mail($destinataire,$sujet,$message,$header);
                        $confirm="Votre message a été envoyé correctement et sera traité dans les meilleurs délais";
        
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacter Rémy Jaume - Artiste peintre</title>
    <link rel="icon" type="image/ico" href="img/logo.ico"/>
    <meta name="description" content="Contactez l'artiste peintre Rémy Jaume" />
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style2.css"> 
   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131199501-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131199501-1');
    </script>

    <!-- CSS -->
       
      
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">        
   
</head>
<body>
    <div class="contenu">
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
                        <div class="titre">Contact</div>
                        <form class="form contact-form" action="contact.php" method="post">
                            <div class="cf-left-col">
                                <div class="form-group">
                                    <input type="text" name="Nom" required class="input-md round form-control" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Mail" required class="input-md round form-control" placeholder="Mail">
                                </div>
                            </div>
                            <div class="cf-right-col">
                                <div class="form-group">
                                    <textarea type="text" name="Commentaires" style="height: 84px;" class="input-md round form-control" placeholder="Commentaires"></textarea>
                                </div>
                            </div>
                                <p>
                            <div class="clearfix">

                               <div class="cf-left-col">

                                            <!-- Inform Tip -->                                        
                                   <div class="form-tip pt-20">
                                                <i class="fa fa-info-circle"></i> Tous les champs sont requis
                                   </div>

                                </div>

                                <div class="cf-right-col">

                                            <!-- Send Button -->
                                    <div class="align-right pt-10">
                                          <input type="submit" class="submit_btn btn btn-mod btn-medium btn-round" value="Envoyer le Message">

                                    </div>

                                </div>

                            </div>
                        </form>
                    <?php if($confirm != ""){
                    ?> 
                        <div class="result" id="result">
                               <?php
                                    echo $confirm;
                                ?>
                        </div>

                    <?php } ?>

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
    </div>
</body>
</html>