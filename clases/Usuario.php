<?php
class Usuario {
    private $nss,$dia,$mes,$anio,$dni,$ruta;
    function __construct($nss=null, $dia=null, $mes=null, $anio=null, $dni=null,$ruta=null) {
        $this->nss = $nss;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
        $this->dni = $dni;
        $this->ruta = "Usuarios/";
    }
    function getRuta() {
        return $this->ruta;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

        function getNss() {
        return $this->nss;
    }

    function getDia() {
        return $this->dia;
    }

    function getMes() {
        return $this->mes;
    }

    function getAnio() {
        return $this->anio;
    }

    function getDni() {
        return $this->dni;
    }

    function setNss($nss) {
        $this->nss = $nss;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }


}
