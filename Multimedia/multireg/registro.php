<?php
include_once('../../conexion.php');


$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validación de datos del usuario
    if(empty(trim($_POST["user"]))){
        $username_err = "Porfavor Ingresa un usuario.";
    } else{
        // Prpeparamos un statement de selección para ver si se repite el usuario
        $sql = "SELECT usuario FROM cliente WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($enlace, $sql)){
            // Las bindeamos los parámetros 
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Definimos parámetros
            $param_username = trim($_POST["user"]);
            
            // Intentamos ejecutar el statement
            if(mysqli_stmt_execute($stmt)){
                /* Guardamos el resultado del statement */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "El usuario ya está en uso.";
                    echo 'usuario en uso';
                } else{
                    $username = trim($_POST["user"]);
                }
            } else{
                echo "Hubo un error en nuestro lado. Oops!.";
            }

            
        }
    }
    
    // Validamos contraseña
    if(empty(trim($_POST["pass"]))){
        $password_err = "Porfavor ingresa una contraseña";     
    } elseif(strlen(trim($_POST["pass"])) < 5){
        $password_err = "Debe de tener al menos 5 caracteres.";
       
         echo "<script>
alert('La contraseña debe tener por lo menos 5 carácteres!');
window.location.href='reg.html';
</script>";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validamos contraseña de repetición
    if(empty(trim($_POST["rpass"]))){
        $confirm_password_err = "Porfavor confirma la contraseña.";     
    } else{
        $confirm_password = trim($_POST["rpass"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no son iguales.";
        }
    }
    //validar email
    if(empty(trim($_POST["email"]))){
        $email_err = "Porfavor inserta un correo.";
    }
    else{
        $email = trim($_POST["email"]);
    }
    
    // Vemos que no haya errores de inserción antes de ingresar los datos a la db
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Preparamos el statement de inserción
        $sql = "INSERT INTO cliente (usuario, contrasena, email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($enlace, $sql)){
            // Bindeamos como parámetros los statement preparados
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            
            // Definimos parámetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Encriptamos contraseña
            $param_email = $email;
            // Intentamos la ejecución del statement
            if(mysqli_stmt_execute($stmt)){
                
                header("location: ../Indexusr/agmed.php");
            } 
            else{
                echo "Hubo un error, intentalo más tarde o contacta a soporte:(.";
            }

            // Cerramos
            mysqli_stmt_close($stmt);
        }
    }


























//cerramos conexión de base de datos
mysqli_close($enlace);
}








?>