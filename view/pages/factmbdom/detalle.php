<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="Mozilla/4.72 [es] (X11; U; Linux 2.2.14-12 i586) [Netscape]">

<meta name="Description" content="Mexicana de Becas Excelencia">
<meta name="Keywords" content="php, mysql, Mexicana de Becas, directrorio, mxdir, dirmx, mx, aplicacion">

<title>Mexicana de Becas --Referidos Detalle</title>   
   
<link rel="stylesheet" href="style/style1.css">

<style type="text/css">
<!--
.Estilo1 {
	color: #4D96D1;
	font-size: 24px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" background="images/fondo-blue.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p align="right"><a href="http://www.becasmb.com/MBline/factmbdom/">Salir</a></p>
<h1>
  <div align="center" class="Estilo1">Datos de facturaci&oacute;n </div>
</h1>

<p><a href="consulta.php?contrato=<? echo $contrato ?>&banderasus=<? echo $banderasus ?>">&lt;-- Click para regresar  <? echo $contrato ?></a></p> 
                
<?php 

include("include/variables.inc.php");
parse_str($Secuencia);
//echo "$Secuencia </br>";
//echo "$contrato";
      //$result = mysql_query ("SELECT * FROM $userstable WHERE ID LIKE '$ID'");
       $result = mssql_query ("SELECT * FROM s38Fisdom WHERE contrato='$contrato' ");
          if ($row = mssql_fetch_array($result)) {

                            do {
                              print ("<p><b>");
							  print ("<b>Contrato:</b> ");
							  print (" ---- ");
                              print $row["Contrato"];
                              print (" ---- ");
                              print $row["Nombre"];
                            //  print ("</b> ");
							  print $row["ApellidoP"];
                           //   print ("</b> ");
							  print $row["ApellidoM"];
                              print ("</b> ");
                              print ("<a href=mailto:");
                              print $row["Email"];
                              print (">");
                              print $row["Email"];
                              print ("</a>");
                              print ("<br>");
							  print ("<br>");
							  print ("<b>Estado / localidad Del Telefono de Casa:</b> ");
							  print $row["DireccionCasa"];
							  print ("<br>");
                              print ("<b>Lada / Teléfono de Casa:</b> ");
                              print $row["TelCasa"];
							  print ("<br>");
							  print ("<b>Estado / localidad Del Telefono de Oficina:</b> ");
							  print $row["Direccion"];
							  print ("<br>");
							  print ("<b>Lada / Teléfono de Oficina:</b> ");
                              print $row["TelOfna"];
                              print ("<br>");
                              print ("<b>Teléfono Movil:</b> ");
							  print $row["ComMovil"];
							  print $row["Clabe"];
							  print $row["TelMovil"];
							  print ("<br>");
							  
				         /*     $edo=$row["Direccion"];    
							//  print $row["Direccion"];  
							 // echo "$edo";                        
                              // Validamos si tiene un estado 

                        /*      if ($edo=='0') { print ("No tiene ninguno asignado"); }

                              else {*/
                              
                              // Selecciono la tabla de estados

      //     if ($edo == "")
        //    {$edo= '%';}

	//$result1 = mysql_query ("SELECT * FROM $edostable WHERE edoID LIKE '$edo'");
/*	$result1 = mssql_query ("SELECT * FROM webestados WHERE edoID='$edo'");
            if ($row1 = mssql_fetch_array($result1)) {

               do {	
               print $row1["estado"];
               } while($row1 = mssql_fetch_array($result1));
           } 
	}
                              print ("<br>");
                       //       print ("<b>Comentarios:</b> ");
                       //       print $row["Comentario"];
                        //      print ("<br>"); */
                              print ("<b>Fecha de Alta:</b> ");
							  	$Fecha_num=$row["Fecha_Reg"];   
								setlocale(LC_TIME, 'es_ES');  
								$fecha=strftime('%d de %B del %Y',strtotime($Fecha_num));   
                                print $fecha;
                                print ("<hr width=400 align=left size=1>");

              } while($row = mssql_fetch_array($result));

       } else { print "<h4 align=center>Lo sentimos, no tenemos registros con estos datos.</h4>";}                            

?>

<h6><div align="center"><?php include '../../includes/webmaster2.php';	 ?></div></h6>

</body>
</html>
