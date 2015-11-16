<?php

class Imagenes {
    
    static function verImagen($nombreUsuario,$ruta){
        $u=$ruta.$nombreUsuario."/";
        $directorio = opendir($u);
        $i=0;
        while ($elemento = readdir($directorio)) {
                if ($elemento != '.' && $elemento != '..') {
                    $enlace=$u.$elemento;
                     $i++;
                     echo "<li><a href='$enlace' id='photo$i'>$elemento</a></li><br/>";
                    
                }
            }
        }
    }
    

