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

    <link rel="stylesheet" type="text/css" href="agmedcss.css">
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
        <script>
            //init aos animations
            AOS.init();
            //    <!---Script para navegacion celular--->

            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems, options);
            });



            $(document).ready(function() {
                $('.sidenav').sidenav();
            });

        </script>
        <nav class="nav hide-on-med-and-up show-on-medium-and-down">
            <div class="nav-wrapper">

                <a href="index.php" class="brand-logo">Mediqueta</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">dashboard</i></a>

            </div>


        </nav>

        <!-----Nav celular--->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="agmed.php">Agregar Medicamento</a></li>
            <li><a href="vermed.php">Ver Medicamento</a></li>
            <li><a href="elmed.php">Remover Medicamento</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>


    </header>
    <div class="row">
        <!----Navegacion en desktop y superior---->
        <div class="col s3 card-panel hide-on-med-and-down" id="panelchiquito" data-aos="zoom-out-right" id="panelchiquito">
            <a href="index.php"> <img class="responsive-img" src="../img/mediqueta2.png"></a>
            <ul class="ladobar">
                <li><a href="agmed.php" class="white-text">Agregar Medicamento</a></li>
                <li><a href="elmed.php" class="white-text">Eliminar Medicamento</a></li>
                <li><a href="vermed.php" class="white-text">Ver Medicamentos</a></li>
                <li><a href="index.php" class="white-text">Inicio</a></li>

            </ul>
        </div>

        <div class="col s8  card-panel hide-on-med-and-down  " data-aos="zoom-out-left" id="panel2">

            <img class="responsive-img" src="../img/mediqueta.png">

            <div class="col s12 card-panel hide-on-med-and-down z-depth-0" id="panel3">
                <form class="col s12 " method="post" action="agmedform.php" autocomplete="off" id="forma">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">assignment_ind</i>
                            <input id="nombremed" type="text" class="validate" name="nombremed">
                            <label for="nombremed">Nombre del Medicamento</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">build</i>
                            <input type="text" class="validate" name="fabricante" id="fabricante">
                            <label for="fabricante">Fabricante</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">chat_bubble</i>
                            <input type="text" name="comentario" class="validate" id="comentario">
                            <label for="comentario">Comentario</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix">local_drink</i>
                            <input type="text" class="validate" name="dosis" id="dosis">
                            <label for="dosis">Dosis</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix">palette
                            </i>
                            <input type="color" class="validate" name="color" id="color">

                        </div>



                    </div>
                    <button class="btn waves-effect waves-purple purple darken-3 right" type="submit" name="action">Agregar
                        <i class="material-icons right">send</i>
                    </button>
                </form>

            </div>
        </div>
        <!---Termino de navegación en desktop yu superior--->
        <!--Inicia navegacion movil-->
        <div class="col s12 card-panel hide-on-large-only" id="panelmovil">

            hola
        </div>
        <!--Termino de navegacion movil-->










    </div>

</body>

</html>
