<?php
session_start();
$_SESSION['IsAuthorized']=true; ?>
<?php
    include ('../connexion.php');

    
    if(isset($_POST[texte])){
        echo $_POST[rubrique];
        echo $_POST[texte];
        $req = $bdd->prepare('UPDATE blog SET Texte = :nvtexte, Titre = :nvtitre, Resume = :nvresume WHERE Id_Post= :id');
        $req->execute(array(
        'nvtitre' => $_POST[titre],
        'nvtexte' => $_POST[texte],
        'nvresume' => $_POST[resume],
        'id' => $_POST[id]
        
        ));
        header('location: index.php');
       //$nb_modifs = $bdd->exec('UPDATE texte SET texte = $_POST[texte] WHERE rubrique = 3');
        //echo $nb_modifs;
    } else {
   
  
?>
<!doctype html>
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
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
    <script src="../ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="../ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript">
var finder = new CKFinder();
finder.basePath = '/ckfinder/';

</script>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="file"></span>
                  Accueil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Rénovation
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Déco intérieur
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
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
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

         <?php
                    
                    $reponse = $bdd->query('SELECT * FROM blog WHERE Id_Post=\'' . $_GET['id'] . '\'');
                   
                         ($donnees = $reponse->fetch())
                    ?>
	                      

          <h2><?php echo $donnees['Titre']; ?>
          
          <div class="table-responsive">
          
      <!--Formulaire --> 
          <form method="POST" action="modif.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" name="titre" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $donnees['Titre']; ?>">
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>
            <input type="hidden" name="id" value="<?php echo $donnees['Id_Post']; ?>">
            
            <div class="form-group">
                <label for="exampleInputPassword1">Résumé</label>
                
                <textarea  class="" id="editor" name="resume" > <?php echo $donnees['Resume'] ?></textarea>

           
                <label for="exampleInputPassword1">Texte</label>
                
                <textarea  class="" id="editor" name="texte" > <?php echo $donnees['Texte'] ?></textarea>
                <script type="text/javascript">
                  CKEDITOR.replace( 'texte',
                  {
                    filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                  filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                  filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                  } 
                  );
              </script> 
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      
        <?php 
        $reponse->closeCursor();?>
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
    <?php } ?>
  </body>
</html>
