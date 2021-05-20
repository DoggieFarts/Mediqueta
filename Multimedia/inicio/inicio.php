<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../Indexusr/index.php");
    exit;
}
 
include_once('../../conexion.php');

 
// Definimos variables vacías 
$username = $password = "";
$username_err = $password_err = "";
 
// Procesamos la información cuando recibamos un metodo POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Checamos que no esté vació el usuario
    if(empty(trim($_POST["user"]))){
        $username_err = "Porfavor ingresa tu usuario.";
        
    } else{
        //si no está vacio llenamos la variable del input
        $username = trim($_POST["user"]);
    }
    
    // Checamos si la contrtaseña está vacioa
    if(empty(trim($_POST["pass"]))){
        $password_err = "Porfavor ingresa tu contraseña.";
        
    } else{
        $password = trim($_POST["pass"]);
        
        
    }
    
    // Validación de que no haya errores
    if(empty($username_err) && empty($password_err)){
        // Preparamos selección
        $sql = "SELECT email, usuario, contrasena FROM cliente WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($enlace, $sql)){
            // Bindeamos como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Poenmos parametrtos
            $param_username = $username;
            
            // Intentamos ejecutar con ayuda de diosito
            if(mysqli_stmt_execute($stmt)){
                // Guardamos
                mysqli_stmt_store_result($stmt);
                
                // Checamos si el usuario existe, en caso de que sí checamos la contraseña cifrada
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // BIndeamos los resultados
                    mysqli_stmt_bind_result($stmt, $email, $username, $hashed_password);
                    
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // La contraseña si está bien segun password verify continuamops:
                            session_start();
                            
                            // Proseguimos a guardar la información mientras session start este activo
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;
                            $_SESSION["user"] = $username;                            
                            echo 'con usuario';
                            
                            header("location: ../Indexusr/index.php");
                        } else{
                            // EN caso de que nos uqieran jakiar juasjuas
                            $password_err = "La contraseña no es válida.";
                            echo "<script>
alert('Oops! La contraseña es incorrecta.');
window.location.href='inicio.html';
</script>";
                           

                        }
                    }
                } else{
                    // En caso de que un loco no tenga cuenta
                    $username_err = "No existe cuenta o registro de tu existencia...";
                    echo "<script>
alert('Oops! Usuario inexistente.');
window.location.href='inicio.html';
</script>";
                }
            } else{
                echo "Hubo un error de nuestro lado, estamos trabajando en ellos. Oops!.";
            }

            // Cerramos
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerramos conexión
    mysqli_close($enlace);
}

?>