<?php
//Creo la clase y sus atributos
class Equipo{
	private $nombre;
	private $capitan;
	private $cantJugadores;
	private $objCategoria;
    //METODO CONSTRUCTOR
	public function __construct($nombre, $capitan,$cantJugadores,$objCategoria){
		$this->nombre=$nombre;
		$this->capitan= $capitan;
		$this->cantJugadores=$cantJugadores;
		$this->objCategoria=$objCategoria;
	}
    //METODOS GETERS
     //Obtiene el valor de nombre
    public function getNombre(){
        return $this->nombre;
    }
    //Obtiene el valor de capitan
    public function getCapitan(){
        return $this->capitan;
    }
    //Obtiene el valor de cantJugadores
    public function getCantJugadores(){
        return $this->cantJugadores;
    }
    //Obtiene el valor de objCategoria
    public function getObjCategoria(){
        return $this->objCategoria;
    }
    //METODOS SETERS
    //Setea el valor de nombre
    public function setNombre($nombre){
            $this->nombre= $nombre;
    }
    //Setea el valor de capitan
    public function setCapitan($capitan){
        $this->capitan= $capitan;
    }
    //Setea el valor de cantJugadores
    public function setCantJugadores($cantJugadores){
        $this->cantJugadores= $cantJugadores;
    }
    //Setea el valor de objCategoria
    public function setObjCategoria($objCategoria){
        $this->objCategoria= $objCategoria;
    }
    //METODO __TO STRING
    public function __toString(){
        //string $cadena
        $cadena = "Nombre: ".$this->getNombre()."\n";
        $cadena = $cadena. "capitan: ".$this->getCapitan()."\n";
        $cadena = $cadena. "Categoria: ".$this->getObjCategoria()->getDescripcion()."\n";
        $cadena = $cadena. "Cant. Jugadores: ".$this->getCantJugadores()."\n";
        return $cadena;
        }
    }
?>
