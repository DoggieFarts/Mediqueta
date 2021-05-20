<div class="aside">
    <div class="logo1">
    
    <img class= "logo2" src="../../Multimedia/img/mediqueta2.png" alt="logo">
    
    </div>
<ul>
 <a href="agmed.php"> <i class="fas fa-plus-circle fa-fw "></i>

  <li class="sidebarli"> Agregar Medicamento</li></a>
 <a href="vermed.php">  <i class="far fa-eye fa-fw"></i>

 <li class="sidebarli">Ver Medicamento</li></a>
   <a href="elmed.php"> <i class="fas fa-minus-circle"></i> <li class="sidebarli">Eliminar Medicamento</li></a>
 <a href="../../#"> <i class="far fa-question-circle"></i>   <li class="sidebarli">Acerca de Nosotros</li></a>
   
    
    </ul>




</div>
    <section>
<div class="container">
   
    
      <div class="info">
    
    Hola <?php echo $_SESSION['user'];?>
          <br><br>
          <p>
          Este es tu resumen del día de hoy. Esperamos que tengas un increíble dia.
    </p>
    
            
       </div>      
            
            
            
        <?php 
    
            
            //conexión a base de datos

$servidor="localhost";
$usuario="root";
$clave="";
$db="mediqueta";

$enlace= mysqli_connect($servidor,$usuario,$clave,$db);
if(!$enlace){
    
    echo "Error con la conexión en el servidor";
    
}
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
                if(mysqli_stmt_fetch($stmt)){
                    
                   
                    $_SESSION['id_med']= $id_med;
                    $_SESSION['idclass'] = $id_class;
                    mysqli_stmt_close($stmt);
                    
                }
                
            }
            
            $data2=$_SESSION['id_med'];
            $sql = "SELECT * from medicamento WHERE id_med=?";
            
            $stmt = mysqli_stmt_init($enlace);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL ERROR";
                
                
            }else{
                
                mysqli_stmt_bind_param($stmt, "s", $data2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$id_med2, $nombre_med, $fabricante, $comentario, $dosis, $color, $id_class2);
                
                if(mysqli_stmt_fetch($stmt)){
                    $_SESSION['id_med2'] = $id_med2;
                    $_SESSION['nombre_med'] = $nombre_med;
                    $_SESSION['fabricante'] = $fabricante;
                    $_SESSION['comentario'] = $comentario;
                    $_SESSION['dosis'] = $dosis;
                    $_SESSION['color'] = $color;
                }
            }
            
            mysqli_close($enlace);
            
            
            
            
       
             ?>
          
          
          
          <div class="infopatient">
    Uno de los medicamentos que debes tomar hoy es:
              <br>
              <br>
    <?php 
              
 
              
          echo "Nombre: "; echo $nombre_med; 
              echo "<br>";
              echo "Del fabricante: "; echo $fabricante;
                            echo "<br>";
 echo "Tu comentario: "; echo $comentario;
                                          echo "<br>";
               echo "Tu dosis: "; echo $dosis;
                                          echo "<br>";
               echo "Tu color: "; echo $color;
                                         

              ?>
    
    </div>
         <div class="infopatient2">
    
    
    
    <!-- Dropdown Trigger -->
  <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="#!">three</a></li>
    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
  </ul>
       <script>
              document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();
        
             
             </script>
    </div> 
    <div class="infopatient3">
    div3
    
    </div>
          
          
          
          
          
          
          
            
          
            
            
     </div>   
        
        
       


</section>


<!---- Empieza css del codigo superior ---->
@keyframes transitionIn{
    from{
       opacity: 0;
        transform: translateY(-10px);
    }
    to{
        opacity: 1;
        transform: translateY(0deg);
        
    }}
.aside{
    
    top: 0%;
    position: relative;
    border-bottom-left-radius: 1%;
    border-top-left-radius: 1%;
    border-top-right-radius: 1%;
    border-bottom-right-radius: 1%;
    float: left;
    width: 20%;
    overflow: hidden;
    left: 2%;
    background: linear-gradient(#e14eca,#8965e0);
    height: 90%;
    
   
  
 
}
.sidebarli{
    
     font-family: "Montserrat", sans-serif;
    font-weight:100;
    font-size: 1.2vw;
    color: #d4d4d9;
    text-decoration: none;
    margin-top: 10%;
    padding: 10%;
    margin-left: 4%;
    

}
.sidebarli:active{
     font-family: "Montserrat", sans-serif;
    font-weight:100;
    font-size: 1vw;
    color: white;
    text-decoration: none;
    margin-top: 10%;
    padding: 10%;
    margin-left: 4%;
    
    
}
.logo1{
    
    border-bottom: 1px solid white;
   
}
.logo2{
    width: 100%;
    height: auto;
}
.fa-plus-circle{
    display:inline-block;
   margin-top: 12%;
    position: absolute;
     margin-left: 1%;
    
}
.fa-eye{
     margin-left: 1%;
    display:inline-block;
   margin-top: 22%;
    position: absolute;
}.sidebarli a{
    
    text-decoration: none;
    color: none;
    font-weight: 100;
}
.fa-minus-circle{
     display:inline-block;
   margin-top: 22%;
    position: absolute;
    margin-left: 1%;
    
}
.fa-question-circle{
     display:inline-block;
   margin-top: 22%;
    position: absolute;
     margin-left: 1%;
}
.container{
    border: 2px solid white;
    float: left;
    position: relative;
    left: 4%;
    margin-top: 4%;
    width: 75%;
    height: auto;
}
.info{
   
    height: 30%;
    font-family: Raleway;
    color: white;
    background: #32325d;
     border-bottom-left-radius: 1%;
    border-top-left-radius: 1%;
    border-top-right-radius: 1%;
    border-bottom-right-radius: 1%;
    text-align: center;
    font-size: 5vw;
}
.info p{
    font-family: Raleway;
    color: white;
    font-size: 2vw;
}
.infopatient{
    width: 30%;
   margin-top: 5%;
    position: relative;
    color: white;
    font-family: Raleway;
    text-align: center;
    background: #32325d;
     border-bottom-left-radius: 1%;
    border-top-left-radius: 1%;
    border-top-right-radius: 1%;
    border-bottom-right-radius: 1%;
    float: left;
}
.infopatient2{
    
    float: left;
    position: relative;
    margin-top: 5%;
    color: white;
    font-family: Raleway;
    text-align: center;
    background: #32325d;
     border-bottom-left-radius: 2%;
    border-top-left-radius: 2%;
    border-top-right-radius: 2%;
    border-bottom-right-radius: 2%;
    width: 30%;
    left: 5%;
}
.infopatient3{
 
    float: left;
    position: relative;
    margin-top: 5%;
    color: white;
    font-family: Raleway;
    text-align: center;
    background: #32325d;
     border-bottom-left-radius: 1%;
    border-top-left-radius: 1%;
    border-top-right-radius: 1%;
    border-bottom-right-radius: 1%;
    width: 30%;
    left: 10%;
}