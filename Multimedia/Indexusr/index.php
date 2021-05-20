<html>

<?php
    session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
}
    else{
        
         header("location: ../inicio/inicio.html");
        
    }
    
    ?>
<!---- PHP SESION DATA --->
<?php 
    
            include_once('../../conexion.php');
    
            $data = $_SESSION['email'];
$sql = "SELECT email, cliente_color.id_med, medicamento.id_med FROM cliente_color INNER JOIN medicamento ON cliente_color.id_med = medicamento.id_med WHERE email=?";
            
            $stmt = mysqli_stmt_init($enlace);
            
            if(!mysqli_stmt_prepare($stmt, $sql)){
           
            echo "SQL stmt failed";
            } else{
                
                
                mysqli_stmt_bind_param($stmt, "s", $data );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $email, $id_med, $id_class);
                if(!mysqli_stmt_fetch($stmt)){
                    
                   
                   
                }
                else{
                     $_SESSION['id_med']= $id_med;
                    $_SESSION['idclass'] = $id_class;
                    mysqli_stmt_close($stmt);
                    
                       $data2=$_SESSION['id_med'];
            $sql = "SELECT * from medicamento WHERE id_med=?";
            
            $stmt = mysqli_stmt_init($enlace);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL ERROR";
                
                
            }else{
                
                mysqli_stmt_bind_param($stmt, "s", $data2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$id_med2, $nombre_med, $fabricante, $comentario, $dosis, $color);
                
                if(mysqli_stmt_fetch($stmt)){
                    $_SESSION['id_med2'] = $id_med2;
                    $_SESSION['nombre_med'] = $nombre_med;
                    $_SESSION['fabricante'] = $fabricante;
                    $_SESSION['comentario'] = $comentario;
                    $_SESSION['dosis'] = $dosis;
                    $_SESSION['color'] = $color;
                }
            }
                    
                }
            }
            
         
            
            mysqli_close($enlace);
            
            
            
            
       
             ?>



<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/915d84c88d.js" crossorigin="anonymous"></script>
    <title>Mediqueta - Inicio Usuario</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="indexusr.css">
    <link rel="stylesheet" href="../../bower_components/aos/dist/aos.css">
    <script src="../../bower_components/aos/dist/aos.js"></script>
    <script defer src="../../bower_components/font-awesomejs/all.js"></script>
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/all.css">
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../../bower_components/materialize/dist/js/materialize.min.js"></script>
    <link rel="icon" type="image/png" href="../img/MQ.png">

    <link type="text/css" rel="stylesheet" href="../../bower_components/materialize/dist/css/materialize.min.css" media="screen,projection" />


</head>

<body>
    <header>





        <nav class="nav">
            <div class="nav-wrapper" data-aos="fade-right">
                <a href="index.php" class="brand-logo">Mediqueta</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">dashboard</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li><a class="dropdown-trigger" href="#" data-target="caida">Opciones</a></li>

                </ul>
            </div>
        </nav>


        <!-----Nav celular--->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="agmed.php">Agregar Medicamento</a></li>
            <li><a href="vermed.php">Ver Medicamento</a></li>
            <li><a href="elmed.php">Remover Medicamento</a></li>
            <li><a href="#">Cerrar Sesión</a></li>
        </ul>

        <!----Nav dropdown.-.--->

        <ul id="caida" class="dropdown-content">
            <li><a href="#!" class=" text-darken-2">Próximamente</a></li>
            <li><a href="#!">Próximamente</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Cerrar sesion</a></li>
        </ul>
        <!---Script---->
        <!---Script para navegacion celular--->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems, options);
            });



            $(document).ready(function() {
                $('.sidenav').sidenav();
            });
            // <!---Scrip dropwdownd para desktop---->
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems, options);
            });

            // Or with jQuery

            $('.dropdown-trigger').dropdown();

        </script>
        <script>
            //init aos animations
            AOS.init();

        </script>
        <!--- Termino de scripts---->
    </header>
    <!---Empieza cuerpo y contenedor--->



    <div class="row">
        <div class="col s3 card-panel hide-on-med-and-down" id="panelchiquito" data-aos="fade-up">

            <ul class="ladobar">
                <li><a href="agmed.php" class="white-text">Agregar Medicamento</a></li>
                <li><a href="elmed.php" class="white-text">Eliminar Medicamento</a></li>
                <li><a href="vermed.php" class="white-text">Ver Medicamentos</a></li>
                <li><a href="#" class="white-text">Acerca de Nosotros</a></li>

            </ul>

        </div>


        <div class="col s8 card-panel hide-on-med-and-down" id="panelgrande">
            <span class="datos1"> Hola <?php echo $_SESSION['user'];?>





            </span>
            <br>
            <br>
            <span class="datos2">Este es tu resumen del día de hoy. Esperamos que tengas un increíble dia.</span>


        </div>
        <div class="col s8 card-panel hide-on-med-and-down" id="panelgrande2">

            <img src="../img/mediqueta2.png" class="responsive-img" alt="">
        </div>
        <!---Mini paneles debajo de info--->
        <div class="col s8 card-panel hide-on-med-and-down" id="panelgrande2">
            <span class="infomed"> Uno de los medicamentos que debes tomar hoy es:
                <br>
                <br>
                <?php 
              
 
              
       echo "Nombre: "; if(empty($nombre_med)){
     echo "No tienes ningún medicamento agregado aún";
 } else{
              echo $nombre_med;
          }
              echo "<br>";
              echo "Del fabricante: "; if(empty($fabricante)){
     echo "No tienes ningún fabricante agregado aún";
 } else{
              echo $fabricante;
          }
                            echo "<br>";
 echo "Tu comentario: "; if(empty($comentario)){
     echo "No tienes ningún comentario agregado aún";
 } else{
              echo $comentario;
          }
                                          echo "<br>";
               echo "Tu dosis: "; if(empty($dosis)){
     echo "No tienes ningúna dosis aún";
 } else{
              echo $dosis;
          }
                                          echo "<br>";
             

               echo "Tu color: ";  if(empty($color)){
     echo "No tienes ningún color";
 } else{
               echo "<p style='color:$color;'>" . $color . "</p>";
          }
             

              ?></span>

        </div>
        <!---Termina Mini paneles debajo de info--->

        <!---Datos navegacion celular--->
        <div class="col s11 card-panel show-on-medium-and-down hide-on-med-and-up white-text center" id="panelgrandecel" data-aos="fade-up">
            <span class="datos1"> Hola <?php echo $_SESSION['user'];?>





            </span>
            <br>
            <br>
            <span class="datos2">Este es tu resumen del día de hoy. Esperamos que tengas un increíble dia.</span>
        </div>
        <div class="col s5 card-panel show-on-medium-and-down hide-on-med-and-up white-text" id="panelgrandecel2" data-aos="fade-up">
            <img src="../img/mediqueta2.png" class="responsive-img" alt="">
        </div>

        <div class="col s6 card-panel show-on-medium-and-down hide-on-med-and-up white-text" id="panelgrandecel2" data-aos="fade-up">
            <span class="infomed"> Uno de los medicamentos que debes tomar hoy es:
                <br>
                <br>
                <?php 
              
 
              
       echo "Nombre: "; if(empty($nombre_med)){
     echo "No tienes ningún medicamento agregado aún";
 } else{
              echo $nombre_med;
          }
              echo "<br>";
              echo "Del fabricante: "; if(empty($fabricante)){
     echo "No tienes ningún fabricante agregado aún";
 } else{
              echo $fabricante;
          }
                            echo "<br>";
 echo "Tu comentario: "; if(empty($comentario)){
     echo "No tienes ningún comentario agregado aún";
 } else{
              echo $comentario;
          }
                                          echo "<br>";
               echo "Tu dosis: "; if(empty($dosis)){
     echo "No tienes ningúna dosis aún";
 } else{
              echo $dosis;
          }
                                          echo "<br>";
             

               echo "Tu color: ";  if(empty($color)){
     echo "No tienes ningún color";
 } else{
               echo "<p style='color:$color;'>" . $color . "</p>";
          }
             

              ?></span>
        </div>










    </div>








</body>










<script type="text/javascript" src="../../bower_components/materialize/dist/js/materialize.js"></script>

</html>
