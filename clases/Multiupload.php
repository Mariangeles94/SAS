<?php
class Multiupload {
   
    public function subirArchivos($files = array(), $name, $directorio) {
        $i = 0;
        $mensaje = "";
        $subidasCorrectamente = 0;
        $subidasIncorrectamente = 0;
        
        //si no existe la carpeta que contiene a todos los usuarios la creamos
         if (!is_dir($directorio))
             mkdir($directorio, 0777);
         
        //si no existe la carpeta del usuario la creamos
        $carpetaUsuario=$directorio.$name."/";
        if (!is_dir($carpetaUsuario))
            mkdir($carpetaUsuario, 0777);

        foreach ($files as $file) {
            //si se sube un archivo que coincida con el indice
            if ($_FILES['imagen']['tmp_name'][$i]) {
                $nombreArchivo = $name . "_" . $_FILES['imagen']['name'][$i];
                $trozos[$i] = explode(".", $_FILES["imagen"]["name"][$i]);
                $extension[$i] = end($trozos[$i]);

                //si la extensión es una de las permitidas
                if ($this->comprobarExtension($extension[$i]) === TRUE) {
                    $_FILES['imagen']['name'][$i] = $this->existe($trozos[$i],$carpetaUsuario);
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $carpetaUsuario . $nombreArchivo)){
                        $subidasCorrectamente++;
                    }else{
                        $subidasIncorrectamente++;
                    }
                      
                    //si la extension no es una de las permitidas
                } else {
                    $mensaje="la extension no esta permitida";
                }
                //si ese input file no ha sido cargado con un archivo
            } else {
                 $mensaje="sin imagen";
            }
            
            $i++;
        }
        if($subidasCorrectamente !== 0 || $subidasIncorrectamente !== 0){
         $mensaje= "Se han subido ".$subidasCorrectamente." archivos correctamente y ".$subidasIncorrectamente." incorrectamente".$mensaje;
        }
        return $mensaje;
    }
  
    private function comprobarExtension($extension) {
        //Añadir las extensiones 
        $extensiones = array("jpg", "png", "gif", "jpeg");
        if (in_array(strtolower($extension), $extensiones)) {
            return true;
        } else {
            return false;
        }
    }
    
    private function existe($file, $carpetaUsuario) {
        //Renombramos si existe ya 
        $archivo = $file[0] . '.' . end($file);
        $i = 0;
        //mientras el archivo exista entramos
        while (file_exists($carpetaUsuario.$archivo)) {
            $i++;
            $archivo = $file[0] . "_" . $i . "." . end($file);
        }
        return $archivo;
    }

}
