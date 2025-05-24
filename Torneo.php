<?php
/*
1. Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del
premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.

4. Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.

6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.

7. Implementar el método calcularPremioPartido($objPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. (premioPartido = Coef_partido * ImportePremio)
*/

//Creo la clase y sus atributos
class Torneo{
    private $colObjPartido;
    private $premio;

    //METODO CONSTRUCTOR
    public function __construct($ppremio){
    
        $this->colObjPartido = [];
        $this->premio = $ppremio;
    }

    /* MÉTODOS DE ACCESO :GETERS */

    //Obtiene el valor de colObjPartido
    public function getColObjPartido(){
        return $this->colObjPartido;
    }

    //Obtiene el valor de premio
    public function getPremio(){
        return $this->premio;
    }

    /* MÉTODOS DE ACCESO :SETERS */

    //Setea el valor de colObjPartido
    public function setColObjPartido($colObjPartido){
        $this->colObjPartido = $colObjPartido;
    }

    //Setea el valor de premio
    public function setPremio($premio){
        $this->premio = $premio;
    }


    /* METODO __ toString */


    public function __toString(){
        $msjToString = "\n\nDatos de los partidos TSP: ".$this->datosPartidos()."\nPremio TSP: $".$this->getPremio()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Mostrar datos de los partidos */
    public function datosPartidos(){
        $colP = $this->getColObjPartido();
        $cadena = "";

        //Uso for porque se cuantos ciclos hara
        for($i = 0; $i < count($colP); $i++){
            $cadena .= $colP[$i]."\n---------------\n";
        }
        return $cadena;
    }


    /**
     * 4. Implementar el método ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) en la clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol.
     * El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo.
     * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.*/
    
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
    
        $colP = $this->getColObjPartido();
        $objPartido = null;

    // Valido las condiciones comunes
    $mismaCantidad = $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores();
    $mismaCategoria = $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion();

    // Calculo el nuevo ID
    $nuevoIdPartido = count($colP) + 1;

    if ($tipoPartido == "Basquet" && $mismaCantidad) {
        $objPartido = new PartidoBasquet($nuevoIdPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
        $colP[] = $objPartido;
    } elseif ($tipoPartido == "Futbol" && $mismaCantidad && $mismaCategoria) {
        $coefBase = 1.5; // <-- Podés parametrizarlo si lo necesitás, o definirlo por defecto
        $categoria = $objEquipo1->getObjCategoria();
        $objPartido = new PartidoFutbol($nuevoIdPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, $coefBase, $categoria);
        $colP[] = $objPartido;
    }

    $this->setColObjPartido($colP);
    return $objPartido;
}


    /**
     * 6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores (equipo con mayor cantidad de goles).
     * El método retorna una colección con los objetos de los equipos encontrados.  */
    
    
public function darGanadores($deporte){
        // Inicializo variables
        $colP = $this->getColObjPartido();
        $arrayEquipos = [];

        //Recorro todos los partidos para obtener a los ganadores
        foreach ($colP as $partido){
            //Verifico el tipo de deporte y si el partido es del tipo adecuado
            if (($deporte == "Futbol" && $partido instanceof PartidoFutbol) ||
                    ($deporte == "Basquet" && $partido instanceof PartidoBasquet)){

                //Coloco el valor que me da $partido->darEquipoGanador() en una variable, porque si lo uso dentro del foreach, me va a llamar a la funcion de nuevo
                $colGanadores = $partido->darEquipoGanador();

                //Veo que sea un array vacio
                if(!empty($colGanadores)){
                    foreach($colGanadores as $objGanador){
                        //agrego el equipo ganador al array
                        array_push($arrayEquipos, $objGanador);
                    }
                }
            }
        }
        //Retorno el array de objetos equipos ganadores
        return $arrayEquipos;
    }


    /**
     * 7. Implementar el método calcularPremioPartido($objPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo.
     * (premioPartido = Coef_partido * ImportePremio)*/

    public function calcularPremioPartido($OBJPartido){;
        $equipoGanandor = $OBJPartido->darEquipoGanador();
        $coef = $OBJPartido->coeficientePartido();
        $premioPartido = $coef * $this->getPremio(); 
        $array = ["equipoGanador"=> $equipoGanandor,
                "premioPartido"=> $premioPartido];
        return $array;
    }
}
?>