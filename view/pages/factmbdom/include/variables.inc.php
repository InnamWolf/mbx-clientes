
<?php

/* carga de las variables */ 
/*$hostname = "localhost";
$username = "becasmbmysql";
$password = "myAv45Mx99";
$dbName = "master"; */
$hostname = '192.168.0.5';
$username   = 'UsuCor';
$password   = 'ixoye';
$dbName     = 'main';

// Se conecta a MySQL
mssql_connect("$hostname", "$username", "$password") or die ("No me puedo conectar a la base de datos.");
// Selecciona la DB que requiere
mssql_select_db("$dbName") or die ("No puedo seleccionar la base de datos.");


//Estas son las tablas de la base
$userstable = "s03a2ref"; 
$edostable = "webestados"
?>
