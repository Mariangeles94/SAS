<?php

class Imagenes {
    
    static function verImagen($nombreUsuario,$ruta){
        $u=$ruta.$nombreUsuario."/";
      //  $direccion=$ruta."User_".$nombreUsuario."/";       
        $directorio = opendir($u);
        $i=0;
        while ($elemento = readdir($directorio)) {
                if ($elemento != '.' && $elemento != '..') {
                    $enlace=$u.$elemento;
                     $i++;
                    //   echo "<li><img src='$enlace'/></li><br/>";
                       echo "<li><a href='$enlace' id='photo$i'>$elemento</a></li><br/>";
                    
                }
            }
        }
    }
    

