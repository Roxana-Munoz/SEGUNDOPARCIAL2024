<?php
/*
Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la categoría del partido (coef_Menores, coef_juveniles, coef_Mayores) . A continuación se presenta una tabla en la que se detalla los valores por defecto de cada coeficiente aplicado a una categoría de un partido fútbol:
$coef_Menores = 0.13
$coef_juveniles = 0.19
$coef_Mayores = 0.27
*/
//Creo la clase y sus atributos
class PartidoFutbol extends Partido{
    private $objCategoria;
    private $coef_menores;
    private $coef_juveniles;
    private $coef_mayores;

    //METODO CONSTRUCTOR
    public function __construct($pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2, $pobjCategoria){
        parent:: __construct($pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2);
        $this->objCategoria = $pobjCategoria;
        $this->coef_menores = 0.13;
        $this->coef_juveniles = 0.19;
        $this->coef_mayores = 0.27;
    }

/*MÉTODOS DE ACCESO: GETERS */


    //Obtiene el valor de objCategoria
    public function getObjCategoria(){
        return $this->objCategoria;
    }

    //Obtiene el valor de coef_menores
    public function getCoef_menores(){
        return $this->coef_menores;
    }

    //Obtiene el valor de coef_juveniles
    public function getCoef_juveniles(){
        return $this->coef_juveniles;
    }

    //Obtiene el valor de coef_mayores
    public function getCoef_mayores(){
        return $this->coef_mayores;
    }

    /* MÉTODOS DE ACCESO:SETERS */


    //Setea el valor de objCategoria
    public function setObjCategoria($objCategoria){
        $this->objCategoria = $objCategoria;
    }

    //Setea el valor de coef_menores
    public function setCoef_menores($coef_menores){
        $this->coef_menores = $coef_menores;
    }

    //Setea el valor de coef_juveniles
    public function setCoef_juveniles($coef_juveniles){
        $this->coef_juveniles = $coef_juveniles;
    }

    //Setea el valor de coef_mayores
    public function setCoef_mayores($coef_mayores){
        $this->coef_mayores = $coef_mayores;
    }

    /* METODO __toString */

    public function __toString(){
        $msjToString = parent:: __toString();

        $msjToString .= "\n\nCategoría TSPF: ".$this->getObjCategoria()->getDescripcion()."\nCoeficiente de menores TSPF: ".$this->getCoef_menores()."\nCoeficiente de juveniles TSPF: ".$this->getCoef_juveniles()."\nCoeficiente de mayores TSPF: ".$this->getCoef_mayores()."\n\n";

        return $msjToString;
    }
/**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir: coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la cantidad de jugadores.*/

    public function coeficientePartido(){
        //Veo de que categoria es el partido
        if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores" && $this->getObjEquipo2()->getObjCategoria()->getDescripcion() == "Menores"){ //Si es un partido de la categoria Menores
            $coefPartido = parent::coeficientePartido() / 0.5 * $this->getCoef_menores();

        }elseif($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Juveniles" && $this->getObjEquipo2()->getObjCategoria()->getDescripcion() == "Juveniles"){ //Si es un partido de la categoria Juveniles
            $coefPartido = parent::coeficientePartido() / 0.5 * $this->getCoef_juveniles();

        }elseif($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Mayores" && $this->getObjEquipo2()->getObjCategoria()->getDescripcion() == "Mayores"){ //Si es un partido de la categoria Mayores
            $coefPartido = parent::coeficientePartido() / 0.5 * $this->getCoef_mayores();
        }
        return $coefPartido;
    }
}
?>