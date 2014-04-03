<?php
$db = mysqli_connect("mysql2.000webhost.com","a4243734_alonso","Wanagow2","a4243734_gow2");
if (mysqli_connect_errno()) {
    printf("Can't connect to SQL Server. Error Code %s\n", mysqli_connect_error($db));
    exit;
}
// Set the default namespace to utf8
$db->query("SET NAMES 'utf8'");
$json   = array();
$academico ="Academica";
$cultural ="Cultural";
$entretenumiento="Entretenimiento";
if($result = $db->query(" SELECT tipoEvento, detallesEvento FROM TiposEventos WHERE tipoEvento='$academico'")) {
    while ($row=$result->fetch_assoc()) {
        $json[]=array(
            'tipo'=>$row['tipoEvento'],
            'detalles'=>$row['detallesEvento'],
            
        );
    }
}
$result->close();

if($result = $db->query(" SELECT tipoEvento, detallesEvento FROM TiposEventos WHERE tipoEvento='$cultural' ")) {
    while ($row=$result->fetch_assoc()) {
        $json[]=array(
            'tipo'=>$row['tipoEvento'],
            'detalles'=>$row['detallesEvento'],
            
        );
    }
}
$result->close();

if($result = $db->query(" SELECT tipoEvento, detallesEvento FROM TiposEventos WHERE tipoEvento='$entretenumiento' ")) {
    while ($row=$result->fetch_assoc()) {
        $json[]=array(
            'tipo'=>$row['tipoEvento'],
            'detalles'=>$row['detallesEvento'],
            
        );
    }
}
$result->close();
 
header("Content-Type: text/json");
echo json_encode(array( 'nombre'  =>   $json)); 
$db->close(); 
?>				
