<?php
include_once("../../conexion.php");

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $nombre_med = $fabricante = $comentario = $dosis = $color = "";
    $nombre_med_err = $fabricante_err = $comentario_err = $dosis_err = $color_err = "";
   
    
    //validación nombre del medicamento
    if(empty(trim($_POST['nombremed']))){
        $nombre_med_err = "Error no puedes no poner ningun nombre";
    } else{
        $nombre_med = $_POST['nombremed'];
    }
    //validar fabricante
    if (empty(trim($_POST['fabricante']))){
        $fabricante_err = "Error no puedes no poner ningnún fabricante";
        
    }else{
        $fabricante = $_POST['fabricante'];
    }
    //validación comentario
    if(empty(trim($_POST['comentario']))){
        $comentario_err = "Error no puedes dejar en  blanco el comentario";
        
    }else{
        $comentario = $_POST['comentario'];
    }
    //validación dosis
    if(empty(trim($_POST['dosis']))){
        $dosis_err = "Error no puede quedarse la dosis en blanco";
    }else{
        $dosis = $_POST['dosis'];
    }
    //validación color
    if(empty(trim($_POST['color']))){
        $color_err = "Error no puedes no poner color";
    }else{
        $color = $_POST['color'];
    }
    
    //ingrtesar datos
    if(empty($nombre_med_err) && empty($fabricante_err) && empty($comentario_err) && empty($dosis_err) && empty($color_err)){
        
        $sql = "INSERT INTO medicamento (nombre_med, fabricante, comentario, dosis, color) VALUES (?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($enlace, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_nombre_med, $param_fabricante, $param_comentario, $param_dosis, $param_color);
            
            $param_nombre_med = $nombre_med;
            $param_fabricante = $fabricante;
            $param_comentario = $comentario;
            $param_dosis = $dosis;
            $param_color = $color;
            
            if(mysqli_stmt_execute($stmt)){
               
               $id = mysqli_insert_id($enlace);
                
                $sql = "SELECT id_med FROM medicamento WHERE id_med = ?";
                
                if($stmt = mysqli_prepare($enlace, $sql)){
                 
                    mysqli_stmt_bind_param($stmt, "s", $param_id);
                    
                    $param_id = $id;
                    
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        
                        mysqli_stmt_bind_result($stmt,$id);
                        if(mysqli_stmt_fetch($stmt)){
                            $_SESSION['med'] = $id;
                            
                          
                           
                        }
                    }
                    
                    
                }
               
                
                $eemail = $_SESSION['email'];
               $sql = "INSERT INTO cliente_color (email,id_med) SELECT email, medicamento.id_med FROM medicamento INNER JOIN cliente WHERE email = ?  ORDER BY id_med DESC LIMIT 1";
                
                if($stmt = mysqli_prepare($enlace, $sql)){
                     mysqli_stmt_bind_param($stmt, "s", $param_email);
                    $param_email = $eemail;
                    
                    
                    
                   if(mysqli_stmt_execute($stmt)){
                
               header("location: agmed.php");
            } 
            else{
                echo "Hubo un error, intentalo más tarde o contacta a soporte:(.";
            }

            
         
                }
                
                
                
                
                
                
            }else{
                echo "Error de inserción";
                
            }
            mysqli_stmt_close($stmt);
        }
        
        
        
    }
    
    
    
}



?>