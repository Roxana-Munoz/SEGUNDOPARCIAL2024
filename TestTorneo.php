<?php
include_once "Categoria.php";
include_once "Partido.php";
include_once "PartidoFutbol.php";
include_once "PartidoBasquet.php";
include_once "Equipo.php";
include_once "Torneo.php";


$catMayores = new Categoria(1,'Mayores');
$catJuveniles = new Categoria(2,'juveniles');
$catMenores = new Categoria(1,'Menores');

$objE1 = new Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = new Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = new Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = new Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);


//2. Completar el script testTorneo.php y:
//    a. crear 3 objetos partidos de Básquet con la siguiente información:
//    ($idpartido, $fecha,$objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $pcantInfraccione)
$objPartidoBasquet1 = new PartidoBasquet(11, "2024-05-05", $objE7, 80, $objE8, 120, 7);
$objPartidoBasquet2 = new PartidoBasquet(12, "2024-05-06", $objE9, 81, $objE10, 110, 8);
$objPartidoBasquet3 = new PartidoBasquet(13, "2024-05-07", $objE11, 115, $objE12, 85, 9);


//    b. Crear 3 objetos partidos de Fútbol con la siguiente información 
//   $pidPartido, $pfecha, $pobjEquipo1, $pcantGolesE1, $pobjEquipo2, $pcantGolesE2, $pobjCategoria
$objPartidoFutbol1 = new PartidoFutbol(15, "2024-05-07", $objE1, 3, $objE2, 2,"");
$objPartidoFutbol2 = new PartidoFutbol(14, "2024-05-08", $objE3, 0, $objE4, 1,"");
$objPartidoFutbol3 = new PartidoFutbol(16, "2024-05-09", $objE5, 2, $objE6, 3,"");
$colP = [$objPartidoBasquet1, $objPartidoBasquet2, $objPartidoBasquet3, $objPartidoFutbol1, $objPartidoFutbol2, $objPartidoFutbol3];

//1. Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.
//($pcolObjPartido, $ppremio)
$objTorneo = new Torneo( 100000);





//3. Completar el script testTorneo.php para invocar al método :
//    a. ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de equipos del torneo.
echo"\n\n";
echo $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
echo"\n\n";


//    b. ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo.
echo"\n\n";
echo $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
echo"\n\n";

//    c. ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo.
echo"\n\n";
echo $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
echo"\n\n";

//    d. darGanadores(‘basquet’) y visualizar el resultado.
echo"\n\n";
print_r($objTorneo->darGanadores("basquet"));
echo"\n\n";

//    e. darGanadores(‘futbol’) y visualizar el resultado.
echo"\n\n";
print_r($objTorneo->darGanadores("futbol"));
echo"\n\n";



//    f. calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.*/
echo "\n\n";

print_r($objTorneo->calcularPremioPartido($objPartidoBasquet1));
print_r($objTorneo->calcularPremioPartido($objPartidoBasquet2));
print_r($objTorneo->calcularPremioPartido($objPartidoBasquet3));

echo "\n\n";
//4. Realizar un echo del objeto Torneo creado en (1)
echo"\n\n";
echo $objTorneo;
echo"\n\n";
