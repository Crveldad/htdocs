<?php

include "database.inc.php";
include_once "Entidad.php";

$conexion = null;

try {
    $conexion = new PDO(DSN, USUARIO, PASSWORD);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //hago la consulta con postgreSQL que me pide y devuelvo los 4 resultados
    $sql = "select count(*) as numeroFacturas, sum(total_factura) as importeTotal,now() -interval '30 days' as fechaDesde, now() as fechaHasta
        from facturas
        where pagada = false
        and fecha_factura >= now() -interval '30 days';";

    $sentencia = $conexion->prepare($sql);
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();

    $fila = $sentencia->fetch();

    //inserto cada columna en una variable
    $numeroFacturas = $fila["numerofacturas"];
    $importeTotal = intval($fila["importetotal"]);
    $fechaDesde = $fila["fechadesde"];
    $fechaHasta = $fila["fechahasta"];

    //creamos una nueva Entidad
    $e1 = new Entidad($numeroFacturas, $importeTotal, $fechaDesde, $fechaHasta);

    //lo pasamos a json por si fuese necesario
    $entidadJson = json_encode($e1);

    //muestro los resultados en pantalla
    echo "* Número de facturas: " . $numeroFacturas . "<br>* Importe total de las facturas: " . $importeTotal . "<br>* Fecha desde: " . $fechaDesde . "<br>* Fecha hasta: " . $fechaHasta;
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conexion = null;
