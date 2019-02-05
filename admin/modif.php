<!doctype html>
<?php 
include ('../connexion.php'); 
define("Titre","Titre");
define("Description","Description");
define("Id","Id");


if(isset($_POST[Titre])){
        $req = $bdd->prepare('UPDATE tableau SET Titre = :nvTitre, Description = :nvDescription  WHERE Id= :Id');
        $req->execute(array(
        'nvTitre' => $_POST[Titre],
        'nvDescription' => $_POST[Description],
        'Id' => $_POST[Id]
        
        ));
       // header('location: index.php');
       echo '<script>window.location.href="index.php";</script>';
       //$nb_modifs = $bdd->exec('UPDATE texte SET texte = $_POST[texte] WHERE rubrique = 3');
        //echo $nb_modifs;
    } 
?>
<html lang="fr">
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style text/css>
        .photo{
            width: 260px;
            height: auto;
           
        }  
    .conteneur{
    display: flex;
        }
    </style>

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
   

  <body>
   

    <div class="container-fluid">
      <div class="row">
        
    </div>     
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                 Retour Accueil <span class="sr-only">(current)</span>
                </a>
              </li>

            </ul>

           
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">MODIFICATION D'UNE OEUVRE</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary"></button>
                <button class="btn btn-sm btn-outline-secondary"></button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                
              </button>
            </div>
          </div>
            
             <?php
                $reponse = $bdd->query('SELECT * FROM tableau WHERE Id=\'' . $_GET['id'] . '\'');  
                ($donnees = $reponse->fetch())
             ?>
          
          <div class="table-responsive">
          
      <!--Formulaire --> 
          <form method="POST" action="modif.php" enctype="multipart/form-data">
          

            <div class="form-group">
                <label for="exampleInputEmail1">Titre   </label>
                <input type="text" class="form-control" name="Titre" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $donnees['Titre']; ?>" >
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>
                    
             <div class="form-group">
                <label for="exampleInputEmail1">Résumé</label>
                <input type="text" class="form-control" name="Description" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $donnees['Description']; ?>" >
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>
            <input type="hidden" name="Id" value="<?php echo $donnees['Id']; ?>">
            
              <div class="conteneur">
                <div class="photo">
                    <img src="../img/diapo/<?php echo $donnees['Photo']; ?>" width="250px">
                </div>

                <div class="envoi">
                <label for="exampleInputPassword1">Photo</label>

                   <input type="file" name="Photo"/>  

                 
                </div>
            </div>
              <hr> 
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      
        
       
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
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
    <?php  ?>
  </body>
</html>
