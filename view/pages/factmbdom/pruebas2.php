<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<? include("include/variables.inc.php");
//echo "sor el estado $Estado_A";
//echo "Localidad: $localidad";

 ?>
<form action="pruebas2.php"  method="post" name="form1" target="_self" id="form1" >
  <select size="1" name="Estado_A" onchange="document.form1.submit();" >
    <option value="">Estado:</option>
    <?php
				
			$result = mssql_query("SELECT * FROM webestados  order by estado");
			while ($estado = mssql_fetch_object($result))
				{
				echo "<option value=\"". $estado->estado ."\"";
				if ($_POST[Estado_A] == $estado->estado)
					{
					echo " selected";
				}
				echo ">". $estado->estado ."</option>";
			}
			  ?>
  </select>
  
  <select size="1" name="localidad" onchange="document.form1.submit();" >
    <option value="">localidad:</option>
    <?php
				
			$result = mssql_query("SELECT web.*,loca.* FROM  webestados web INNER JOIN webedolocalidad loca ON web.edoID = loca.edoID            AND web.estado = '$Estado_A'");
			while ($local = mssql_fetch_object($result))
				{
				echo "<option value=\"". $local->localidad ."\"";
				if ($_POST[localidad] == $local->localidad)
					{
					echo " selected";
				}
				echo ">". $local->localidad ."</option>";
			}
			  ?>
  </select>
  
</form>
<?
$sql = "SELECT web.*,loca.* FROM  webestados web INNER JOIN webedolocalidad loca ON web.edoID = loca.edoID and web.estado='$Estado_A' and loca.localidad='$localidad' ";
// Coloca los resultados en la variable $result
$result = mssql_query($sql);
// Cuenta las columnas con resultado en $result.
// 0 es invalido, 1 es valido.
$num = mssql_num_rows($result);
if ($num != "0") {
While ($locali = mssql_fetch_row($result)) {
   $lada="$locali[5]";
   echo "LADA: $lada";
}

mssql_free_result($result);

} else {
//header('WWW-Authenticate: Basic realm="Pagina privada"');
//header("HTTP/1.0 401 Unauthorized");
echo "No Existe Lada ." ;

}


?>

</body>
</html>
