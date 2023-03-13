<?

$dbconf['dbhost'] = "localhost";
$dbconf['dbadmuser'] = "becasmbmysqlb";
$dbconf['dbadmpass'] = "myAv45Mx99";
$dbconf['dbname'] = "mebexobeca";



function becasmysql_connect() 
	{
	global $dbconf, $connectDB;
	if (!($connectDB=mysql_connect($dbconf["dbhost"],$dbconf["dbadmuser"],$dbconf["dbadmpass"])))
		{
		echo "<div style=\"border: 2px solid #CC0033; background-color: #FFFFCC; color: #CC0033; font-family: sans-serif; font-size: 14px; font-style: italic; text-align: center; padding: 10px; position: relative;z-index:254\">\n";
		echo "No se puede conectar con la base de datos (CON)<br>";
		echo "<strong>". mysql_error() ."</strong>";
		echo "</div>";
		return false;
		exit();
	}
	if (!mysql_select_db($dbconf["dbname"],$connectDB))
		{
		echo "<div style=\"border: 2px solid #CC0033; background-color: #FFFFCC; color: #CC0033; font-family: sans-serif; font-size: 14px; font-style: italic; text-align: center; padding: 10px; position: relative;z-index:254\">\n";
		echo "No se puede seleccionar la base de datos (CON)<br>";
		echo "<strong>". mysql_error() ."</strong>";
		echo "</div>";
		return false;
      	exit();
	}
	return $connectDB;
}

?>



