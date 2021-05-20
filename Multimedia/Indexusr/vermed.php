<html>
    <?php
    session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
}
    else{
        
         header("location: ../inicio/inicio.html");
        
    }
    
    ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://kit.fontawesome.com/915d84c88d.js" crossorigin="anonymous"></script>
    <title>Mediqueta - Inicio Usuario</title>
    <meta charset="utf-8">
   
    <link rel="stylesheet" type="text/css" href="vermed.css">
    <link rel="stylesheet" href="../../bower_components/aos/dist/aos.css">
    <script src="../../bower_components/aos/dist/aos.js"></script>
    <script defer src="../../bower_components/font-awesomejs/all.js"></script>
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/all.css">
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script type="text/javascript" src="../../bower_components/materialize/dist/js/materialize.min.js"></script>
<link rel="icon" type="image/png" href="../img/MQ.png">
    
    <link type="text/css" rel="stylesheet" href="../../bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>

    
    </head>
<body>
    
    <header>
     <nav  class="nav">
    <div class="nav-wrapper" data-aos="fade-right">
      <a href="index.php" class="brand-logo">Mediqueta</a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">dashboard</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="active"><a href="index.php">Inicio</a></li>
        <li ><a class="dropdown-trigger" href="#"  data-target="caida"  >Opciones</a></li>
        
      </ul>
    </div>
  </nav>
        
         <!----Nav dropdown.-.--->
        
        <ul id="caida" class="dropdown-content">
  
  <li class="divider"></li>
  <li><a href="logout.php" >Cerrar sesion</a></li>
</ul>
        <!-----Nav celular--->
    <ul class="sidenav" id="mobile-demo">
    <li><a href="index.php">Inicio</a></li>
    <li><a href="agmed.php">Agregar Medicamento</a></li>
    <li><a href="vermed.php">Ver Medicamento</a></li>
        <li><a href="elmed.php">Remover Medicamento</a></li>
    <li><a href="#">Cerrar Sesión</a></li>
  </ul>
         <!---Script---->
        <!---Script para navegacion celular--->
        
        <script>document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });



  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
            
            //init aos animations
  AOS.init();
             // <!---Scrip dropwdownd para desktop---->
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();
</script>
    
    
    </header>
    
    <div class="row">
      <div class="col s3 card-panel hide-on-med-and-down" id="panelchiquito" data-aos="fade-up">
          
        <ul class="ladobar" >
          <li><a href="agmed.php" class="white-text">Agregar Medicamento</a></li>
          <li><a href="elmed.php" class="white-text">Eliminar Medicamento</a></li>
          <li><a href="vermed.php" class="white-text">Ver Medicamentos</a></li>
          <li><a href="#" class="white-text">Acerca de Nosotros</a></li>
          
          </ul>
          
      </div>
        <div class="col s8 card-panel hide-on-med-and-down" id="panelgrande" data-aos="zoom-out-right">
       <span class="datos1"> Hola <?php echo $_SESSION['user'];?>
          
           
          
          
          
          </span> 
          <br>
          <br>
          <span class="datos2">Estos son todos tus medicamentos al dia de hoy. Recuerda tomarlos a tiempo y revisar según tu color que corresponda!</span>
          
          
      </div>
        
        <div class="col s8 card-panel hide-on-med-and-down" id="panelgrande2" data-aos="zoom-out-right">
            <span class="datos3">
            
            
             <table class="responsive-table centered white-text highlight">
        <thead>
          <tr>
              <th>Nombre de medicamento</th>
              <th>Fabricante</th>
              <th>Comentario</th>
              <th>Dosis</th>
              <th>Color</th>
          </tr>
        </thead>

        <tbody>
            <?php
            include_once('../../conexion.php');
                    $data = $_SESSION['email'];
 $sql = "SELECT email, cliente_color.id_med, medicamento.* FROM cliente_color RIGHT JOIN medicamento ON cliente_color.id_med = medicamento.id_med WHERE email=?";
            
            $stmt = mysqli_stmt_init($enlace);
            
            if(!mysqli_stmt_prepare($stmt, $sql)){
           
            echo "SQL stmt failed";
            } else{
                
                
                mysqli_stmt_bind_param($stmt, "s", $data );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $email, $id_med, $id_class, $nombre_med, $fabricante, $comentario, $dosis, $color);
                
                     while(mysqli_stmt_fetch($stmt)){
                         echo "<tr>
            <td>$nombre_med</td>
            <td>$fabricante</td>
            <td>$comentario</td>
            <td>$dosis</td>
            <td style='color:$color;'>  $color  </td>
          </tr>";
                         
                     }
                    mysqli_stmt_close($stmt);
                
                
            }
            
            
            mysqli_close($enlace);
            
            
            
            
            
            
            
            
            
            
            
            ?>
          
          
        </tbody>
                </table>
            
            
            
            
            
            </span>
             </div>
        
        
        
        
    </div>
    
    
    
    
    
    
    </body>











</html>