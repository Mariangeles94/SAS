<?php

class Multiupload {
    
    public function subirArchivos($files = array(), $name,$directorio) {
        $cont=0;
        //inicializamos un contador para recorrer los archivos
        $i = 0;
         if (!is_dir($directorio))
             mkdir($directorio, 0777);
        //si no existe la carpeta files la creamos
        $carpetaUsuario=$directorio."User_".$name."/";
        if (!is_dir($carpetaUsuario))
            mkdir($carpetaUsuario, 0777);

        //recorremos los input files del formulario
        foreach ($files as $file) {
            //si se está subiendo algún archivo en ese indice
            if ($_FILES['imagen']['tmp_name'][$i]) {
                $nombreArchivo = $name . "_" . $_FILES['imagen']['name'][$i];
                $trozos[$i] = explode(".", $_FILES["imagen"]["name"][$i]);

                $extension[$i] = end($trozos[$i]);

                //si la extensión es una de las permitidas
                if ($this->comprobarExtension($extension[$i]) === TRUE) {
                    $_FILES['imagen']['name'][$i] = $this->existe($trozos[$i],$carpetaUsuario);
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $carpetaUsuario . $nombreArchivo)) {
                      $cont++;
                    }
                    //si la extension no es una de las permitidas
                } else {
                    echo "la extension no esta permitida";
                }
                //si ese input file no ha sido cargado con un archivo
            } else {
                echo "sin imagen";
            }
            echo "<br />";
            //en cada pasada por el loop incrementamos i para acceder al siguiente archivo
            $i++;
        }
 
        return $cont;
    }
    function directorio(){
        return "Usuarios/";
    }
  

    private function comprobarExtension($extension) {
        //aqui podemos añadir las extensiones que deseemos permitir
        $extensiones = array("jpg", "png", "gif", "jpeg");
        if (in_array(strtolower($extension), $extensiones)) {
            return true;
        } else {
            return false;
        }
    }
    
    private function existe($file, $carpetaUsuario) {
        //asignamos de nuevo el nombre al archivo
        $archivo = $file[0] . '.' . end($file);
        $i = 0;
        //mientras el archivo exista entramos
        while (file_exists($carpetaUsuario.$archivo)) {
            $i++;
            $archivo = $file[0] . "_" . $i . "." . end($file);
        }
        //devolvemos el nuevo nombre de la imagen, si es que ha 
        //entrado alguna vez en el loop, en otro caso devolvemos el que
        //ya tenia
        return $archivo;
    }

}
