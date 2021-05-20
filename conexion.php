<?php

//conexión a base de datos

$servidor="localhost";
$usuario="zicnvqqs_mediqueta2";
$clave="Pericote11!";
$db="zicnvqqs_mediqueta2";

$enlace= mysqli_connect($servidor,$usuario,$clave,$db);
if(!$enlace){
    
    echo "Error con la conexión en el servidor";
    
}


?>