<!doctype html>
<?php 
include ('../connexion.php'); 
define("Titre","Titre");
define("Id_Artiste","Id_Artiste");
define("Photo","Photo");
define("img","img");

if(!empty($_FILES)) {
        $img = $_FILES['img'];
        $ext = strtolower(substr($img['name'],-3));
        $allow_ext = array("jpg", "png", "JPG");
        if(in_array($ext,$allow_ext)) {
             move_uploaded_file($img['tmp_name'],"../img/".$img['name']);
            $image = $img['name'];
            
        } else{

            $image = $_POST['Photo1'];
            
        }
    }

if(isset($_POST[Titre])){
        $req = $bdd->prepare('UPDATE artiste SET Titre = :nvTitre, Photo = :nvPhoto  WHERE Id_Artiste   = 0 ');
        $req->execute(array(
        'nvTitre' => $_POST[Titre],
        'nvPhoto' => $image
        
        ));
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

    <title>Admin Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
    <script src="../ckeditor/_samples/sample.js" type="text/javascript"></script>
	  <link href="../ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript">
      var finder = new CKFinder();
      finder.basePath = '/interessens/ckfinder/';

</script>
   

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
            <h1 class="h2">MODIFICATION PHOTO ACCUEIL</h1>
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
                $reponse = $bdd->query('SELECT * FROM artiste WHERE Id_Artiste= 0');  
                ($donnees = $reponse->fetch())
             ?>
          
          <div class="table-responsive">
          
      <!--Formulaire --> 
          <form method="POST" action="modif_accueil.php" enctype="multipart/form-data">
          

            <div class="form-group">
                <label for="exampleInputEmail1">Titre   </label>
                    <input type="text" class="form-control" name="Titre" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $donnees['Titre']; ?>" >
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>          

                 <input type="hidden" name="Photo1" value="<?php echo $donnees['Photo']; ?>">
              <div class="conteneur">
                <div class="photo">
                    <img src="../img/<?php echo $donnees['Photo']; ?>" width="250px">
                    
                </div>

                <div class="envoi">
                <label for="exampleInputPassword1">Photo</label>

                   <input type="file" name="img"/>  

                 
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
