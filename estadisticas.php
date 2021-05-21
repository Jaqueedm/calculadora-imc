<?php

$conexion= mysqli_connect("localhost","root","","imc"); //se hizo la conexion a la base de datos

if (!$conexion=="false") {
	echo "Algo anda mal";
	die();
}

if ( isset($_POST['peso']) && isset($_POST['altura']) && is_numeric($_POST['peso']) && is_numeric($_POST['altura']) && isset($_POST['etapa'])){

    $peso=$_POST['peso'];
    $altura=$_POST['altura'];
    $etapa=$_POST['etapa'];
    
    $imc=$peso/($altura*$altura);
    $imc=round($imc,1);
    $resultado="";

      if ($etapa=='adulto') {
    if ( $imc<18.5){
      $resultado = 'Bajo de peso para el '.$etapa;
        $color="purple";
      }   
  }
  if ( $imc<=21.3 && $etapa=='adolescente') {
      $resultado = "Bajo de peso para el ".$etapa;
      $color="purple";
  }
    //adulto bajo peso
    //adolescente bajo peso

    //peso normal adulto
    if ($imc >= 18.5 && $imc <= 24.9 && $etapa=='adulto'){
    $resultado = "Peso normal para el ".$etapa;
    $color="green";
    }

    //peso normal adolescente
    if ($imc>=21.4 && $imc <= 24.8  && $etapa=='adolescente') {
        $resultado = "Peso normal para el  ".$etapa;
        $color="green";
    }

    //sobrepeso adulto
    if ($imc >= 24.9 && $imc <= 29.9 && $etapa=='adulto'){
    $resultado = "Sobrepeso ".$etapa;
    $color="orange";
    }

    //sobrepeso adolescente
    if ($imc>=25 && $imc <= 29.7  && $etapa=='adolescente') {
        $resultado = "Sobrepeso para el ".$etapa;
        $color="orange";
    }

    //obesidad adolescente
    if ($imc>=29.7  && $etapa=='adolescente') {
        $resultado = "Obesidad para el ".$etapa;
        $color="red";
    }

    //obesidad adulto
    if ($imc>=30 && $imc <= 34.9 && $etapa=='adulto'){
    $resultado = "Obesidad para el ".$etapa."<br>"." Fase I ";
    $color="red";
    }

    if ($imc>=35 && $imc <= 39.9 && $etapa=='adulto'){
    $resultado = "Obesidad para el ".$etapa."<br>"." Fase II ";
    $color="red";
    }

    if ($imc>= 40 && $etapa=='adulto'){
    $resultado = "Obesidad para el ".$etapa."<br>".' Fase III ';
    $color="red";
    }

    $conexion->query ("INSERT INTO `datos`(`peso`, `altura`, `etapa`, `datos_imc`,`resultado`) VALUES ('$peso','$altura','$etapa','$imc','$resultado')");

   // var_dump($resultado);//consulte el string
}

if (isset($_POST['etapa'])) {
    $etapa=$_POST['etapa'];  
    }else{
        $etapa="";
      }


$consulta= "SELECT AVG(`datos_imc`) AS 'imc_promedio',AVG(`peso`) AS 'peso_promedio',AVG(`altura`) AS 'altura_promedio', COUNT(*) cantidad FROM `datos` WHERE 1";

$resultado= $conexion->query($consulta);
$fila=$resultado->fetch_assoc();

$imc_promedio=$fila[$imc_promedio];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Indice Masa Corporal</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="10.jpg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action bg-light" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action bg-light" href="#!">Shortcuts</a>
                    <a class="list-group-item list-group-item-action bg-light" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action bg-light" href="#!">Status</a>
                </div>
            </div>
            <!-- Page Content-->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">
                                    Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="estadisticas.php">Estadisticas</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">

                    <h1 class="mt-4">Estadísticas</h1>
                    
        <form action="cal.php" method="POST">
           <div class="col-md-7 mb-5">
                    <div class="card text-white bg-secondary my-5 py-4 text-center">
                     <div class="card-body">
                        <h5 class="text-white m-2">Promedios</h5>

                        <p>IMC promedio: <?=$imc_promedio; ?></p>
                        <p>peso promedio:</p>
                        <p>altura promedio:</p>
                        <p>etapa promedio:</p>
                        <p>Cantidad:</p>
                </div>
                    </div>
                                
    
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
    </form><br>
    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>