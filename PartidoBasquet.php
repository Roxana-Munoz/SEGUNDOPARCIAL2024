<?php

//Creo la clase y sus atributos
class PartidoBasquet extends Partido{
    private $cantInfracciones;
    private $coefPenalizacio;

    //METODO CONSTRUCTOR
    public function __construct($pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2, $pcantInfracciones){
        parent:: __construct($pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2);
        $this->cantInfracciones = $pcantInfracciones;
        $this->coefPenalizacio = 0.75;
    }
/* MÉTODOS DE ACCESO : GETERS */


    //Obtiene el valor de cantInfracciones
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }

    //Obtiene el valor de coefPenalizacio
    public function getCoefPenalizacio(){
        return $this->coefPenalizacio;
    }



    /*MÉTODOS DE ACCESO: SETERS */


    //Setea el valor de cantInfracciones
    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }

    //Setea el valor de coefPenalizacio
    public function setCoefPenalizacio($coefPenalizacio){
        $this->coefPenalizacio = $coefPenalizacio;
    }


    /* METODO __toString */


    public function __toString(){
        $msjToString = parent:: __toString();

        $msjToString .= "\n\nCantidad de infracciones TSPB: ".$this->getCantInfracciones()."\nCoeficiente de penalización TSPB: ".$this->getCoefPenalizacio()."\n\n";

        return $msjToString;
    }
  /**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir: coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la cantidad de jugadores.
     * Por otro lado, si se trata de un partido de basquetbol se almacena la cantidad de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
     * coef = coeficiente_base_partido - (coef_penalización*cant_infracciones)*/
    public function coeficientePartido(){
        $coefPartido = parent::coeficientePartido() - ($this->getCoefPenalizacio() * $this->getCantInfracciones());
        return $coefPartido;
    }

}
?>