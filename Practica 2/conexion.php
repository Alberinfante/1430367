<?php
$db_host="localhost";
$db_user="root";
$db_password="usbw";
$db_name="imc";
$db_table_name="paciente";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die("No se ha podido conectar a la base de datos");
}
$subs_nombre = utf8_decode($_POST["nombre"]);
$subs_edad = utf8_decode($_POST["edad"]);
$subs_peso = utf8_decode($_POST["peso"]);
$subs_altura = utf8_decode($_POST["altura"]);
$subs_imc = utf8_decode($_POST["imc"]);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE nombre = ".$subs_nombre." ", $db_connection);

if (mysql_num_rows($resultado)>0){
} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombre` , `edad`, `peso`, `altura`, `imc`) VALUES ("' . $subs_nombre . '", "' . $subs_edad . '", "' . $subs_peso . '", "' . $subs_altura . '", "' . $subs_imc . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
}

mysql_close($db_connection);

		
?>