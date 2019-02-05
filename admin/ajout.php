
<?php session_start(); $_SESSION['IsAuthorized']=true; ?>
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
      finder.basePath = '../ckfinder/';

      </script>
  </head>

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
            <h1 class="h2">AJOUT D'UNE OEUVRE</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
               
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                
                
              </button>
            </div>
          </div>

          
          <div class="table-responsive">
          
      <!--Formulaire --> 
          <form method="POST" action="index.php" enctype="multipart/form-data">
          <div class="form-group">
                <label  for="exampleInputEmail1">Rubrique</label>
              
                <SELECT class="form-control form-control-lg" name="Cat" size="1">
                        <OPTION>Peintures</option>
                        <OPTION>Dessins</option>
                </SELECT>
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" class="form-control" name="Titre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="TITRE DE L'OEUVRE" >
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>
                    
             <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" class="form-control" name="Description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="RESUME DE L'OEUVRE" >
                <small id="emailHelp" class="form-text text-muted"> </small>
            </div>
            <input type="hidden" name="Id" >
            
           

            <div class="form-group">
            <label for="exampleInputPassword1">Photo</label>
                
               <input type="file" name="img"/>  
              
              <hr>
                
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
