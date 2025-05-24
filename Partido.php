<?php
/*
2. Implementar la jerarquía de herencia que crea necesaria para modelar los Partidos.

3. Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.

5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho método según corresponda.

7. Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. (premioPartido = Coef_partido * ImportePremio)
*/

//Creo la clase y sus atributos
class Partido{
    private $idPartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //METODO CONSTRUCTOR
    public function __construct($pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2){
        $this->idPartido = $pidPartido;
        $this->fecha = $pfecha;
        $this->objEquipo1 = $pobjEquipo1;
        $this->cantGolesE1 = $pcantGolesE1;
        $this->objEquipo2 = $pobjEquipo2;
        $this->cantGolesE2 = $pcantGolesE2;
        $this->coefBase = $pcoefBase ?? 0.5;
    }

    //METODOS GETERS
     //Obtiene el valor de idPartido
    public function getIdPartido(){
        return $this->idPartido;
    }

    //Obtiene el valor de fecha
    public function getFecha(){
        return $this->fecha;
    }

    //Obtiene el valor de objEquipo1
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }

    //Obtiene el valor de cantGolesE1
    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }

    //Obtiene el valor de objEquipo2
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }

    //Obtiene el valor de cantGolesE2
    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }

    //Obtiene el valor de coefBase
    public function getCoefBase(){
        return $this->coefBase;
    }

    //METODOS SETERS
    //Setea el valor de idPartido
    public function setIdPartido($idPartido){
        $this->idPartido = $idPartido;
    }

    //Setea el valor de fecha
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    //Setea el valor de objEquipo1
    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1 = $objEquipo1;
    }

    //Setea el valor de cantGolesE1
    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1 = $cantGolesE1;
    }

    //Setea el valor de objEquipo2
    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2 = $objEquipo2;
    }

    //Setea el valor de cantGolesE2
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2 = $cantGolesE2;
    }

    //Setea el valor de coefBase
    public function setCoefBase($coefBase){
        $this->coefBase = $coefBase;
    }

    //METODO __TOSTRING
    public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
      
        return $cadena;
    }

    /* 3. Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un partido (retorna el objeto equipo) (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.*/
    public function darEquipoGanador(){
       
        $arrayGanador = []; //Array vacio donde se guardaran los equipos ganadores

        //Analizo los resultados con un if
        if($this->getCantGolesE1() > $this->getCantGolesE2()){ //Si el equipo 1 ganó
            array_push($arrayGanador, $this->getObjEquipo1());

        }elseif($this->getCantGolesE1() < $this->getCantGolesE2()){ //Si el equipo 2 ganó
            array_push($arrayGanador, $this->getObjEquipo2());

        }else{ //Si empataron
            array_push($arrayGanador, $this->getObjEquipo1(), $this->getObjEquipo2());
        }
        return $arrayGanador;
    }


    /**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir: coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la cantidad de jugadores
     */
    public function coeficientePartido(){
        $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
        $coefPartido = $this->getCoefBase() * $cantGoles * $cantJugadores;
        return $coefPartido;
    }
}