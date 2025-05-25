<?php
//Creo la clase y sus atributos
class Categoria{
	private $idcategoria;
	private $descripcion;
	
    //METODO CONSTRUCTOR
	public function __construct($idcategoria, $descripcion ){
		$this->idcategoria=$idcategoria;
		$this->descripcion= $descripcion;
	}
    //METODOS GETERS
    //Obtiene el valor de idCategoria
    public function getidcategoria(){
        return $this->idcategoria;
    }
    //Obtiene el valor de descripcion
    public function getDescripcion(){
        return $this->descripcion;
    }

    //METODOS SETERS
   //Setea el valor de idCategoria
    public function setidcategoria($idcategoria){
        $this->idcategoria= $idcategoria;
    }
     //Setea el valor de descripcion
    public function setDescripcion($descripcion){
        $this->descripcion= $descripcion;
    }

    //METODO __TO STRING
    public function __toString(){
      
        $cadena = "IdCategoria: ".$this->getidcategoria()."\n";
        $cadena = $cadena. "descripcion: ".$this->getDescripcion()."\n";
    }
}
?>
