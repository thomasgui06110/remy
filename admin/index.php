<!doctype html>
<?php
    define("Texte","Texte");
    define("Cat","Cat");
    define("Description","Description");
    define("Titre","Titre");
    define("Photo","Photo");
    define("id","id");
    define("Id","Id");
    define("supp","supp");
    include ('../connexion.php'); 
    if(!empty($_FILES)) {
        $img = $_FILES['img'];
        move_uploaded_file($img['tmp_name'],"../img/diapo/".$img['name']);
    }
    if(isset($_GET[supp])){
    
      $req = $bdd->prepare('DELETE from tableau WHERE Id= :id');
      $req->execute(array(
      'id' => $_GET[supp]
      
      ));}
    if(isset($_POST[Titre])){
      
        try
        {
        $req = $bdd->prepare('INSERT INTO tableau(Titre, Description, Cat, Photo) VALUES(:Titre, :Description, :Cat, :Photo)');
        
        $req->execute(array(
            'Titre' => $_POST[Titre],
            'Description' => $_POST[Description],
            'Cat' => $_POST[Cat],
            'Photo' => $img['name']
    ));
            
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
            }
            ?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>


    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="https://www.remyjaume.com/">
                  <span data-feather="home"></span>
                  Retour site <span class="sr-only">(current)</span>
                </a>
              </li>
              
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
             <div class="btn-group mr-2">
               <a href="modif_accueil.php"> <button class="btn btn-sm btn-outline-secondary text-uppercase">Photo accueil</button></a>
                
            </div>
            <div class="btn-group mr-2">
               <a href="modif_artiste.php"> <button class="btn btn-sm btn-outline-secondary text-uppercase">L'Artiste</button></a>
                
            </div>
            <div class="btn-group mr-2">
               <a href="ajout.php"> <button class="btn btn-sm btn-outline-secondary text-uppercase">AJOUTER UNE OEUVRE</button></a>
                
            </div>
           
            <div class="btn-group mr-2">
               <a href="index.php?Cat=Peintures"> <button class="btn btn-sm btn-outline-secondary text-uppercase">AFFICHER PEINTURES</button></a>
                
            </div>
            <div class="btn-group mr-2">
               <a href="index.php?Cat=Dessins"> <button class="btn btn-sm btn-outline-secondary text-uppercase">AFFICHER DESSINS</button></a>
                
            </div>

            </div>
          </div>

          <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

          <h2>Liste des oeuvres</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            
            <thead style="font-weight: bold">
              <td width=10% style="text-align:center ">SUPPR</td>
             
              <td width=10% style="font-weight: bold"; class="gras">RUBRIQUE</td>
       
              <td width=28%>TITRE</td>
              <td width=50%>RESUME</td>
             
           </thead>

              <tbody>
                <tr>
               
                <?php
                    if(isset($_GET[Cat])){
                        $Cate = $_GET[Cat];
                        $Cate2 = "";
                    } else {
                        $Cate = "Peintures";
                        $Cate2 = "Dessins";
                    }

                    $reponse = $bdd->query('SELECT * FROM tableau WHERE Cat = \'' . $Cate . '\' OR Cat = \'' . $Cate2 . '\' ');
                    //$reponse = $bdd->query('SELECT * FROM tableau WHERE Cat = ? OR Cat = ? ');
                    //$reponse->execute(array( $Cate, $Cate2));
                      while ($donnees = $reponse->fetch())
                      {
                        ?>
                    <td style="text-align:center  "> <a href=index.php?supp=<?php echo $donnees['Id']; ?>> X </a></td>
                   <td><?php echo $donnees['Cat']; ?></td>
                   
                  <td><a href="modif.php?id=<?php echo $donnees['Id']; ?>"><?php echo $donnees['Titre']; ?></a></td>
                  <td><?php echo $donnees['Description']; ?></td>
                 
                  </tr>  
                      <?php
                      }
                    ?>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
