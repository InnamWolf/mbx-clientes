<?php
$contrato = 'A14206';
include("include/variables.inc.php");
if( $_POST['btnBack']  == "1" ){
 // echo "hola";
 $contrato=$_POST["contratos"];
$suscriptor=$_POST["Suscriptor"]; 
$banderasus=$_POST["banderasus"]; 
$emailsusc=$_POST["emailsusc"];
$fisica=$_POST["radio"];
//echo "$fisica";
//echo "$radio";
}else{
parse_str($contrato);

}
/*echo "$Estado_Ac";
echo "$localidadc";
echo "$ladac";
echo "$telcla";
echo "$telmov";
echo "$commov";*/
//include("rifalaptop.php");

//echo "bandera $banderasus";
if ($contrato==""){
   print ("<p><strong>¡Necesitas dar de Alta el Contrato! </strong></p>");
   echo '<a href="http://www.becasmb.com/MBline/factmbdom/index.php"><p><strong>Ingresa Tus datos de facturación</strong></p></a>';
  // echo "este es $contrato";
}else{



?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="GENERATOR" content="Mozilla/4.72 [es] (X11; U; Linux 2.2.14-12 i586) [Netscape]">

<meta name="Description" content="Aplicacion de Corazon a Corazon">
<meta name="Keywords" content="php, mysql, becasmb, even, mxdir, dirmx, mx, aplicacion">
   <title>Mexicana de Becas</title>   
   
<link rel="stylesheet" href="style/style1.css">
<style type="text/css">
<!--
.Nomb {font-family: Arial, Helvetica, sans-serif}
.Estilo3 {
	color: #4D96D1;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 24px;
}
.Estilo9 {
	font-family: Arial, Helvetica, sans-serif;
	color: #4D96D1;
	font-weight: bold;
	font-size: 12px;
}
.Estilo11 {
	font-family: "Courier New", Courier, monospace;
	font-size: 16px;
	color: #0000CC;
}
.Estilo12 {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	font-size: 16px;
}
.Estilo13 {font-family: "Courier New", Courier, monospace; color: #4D96D1; font-weight: bold; font-size: 16px; }
-->
</style>
</head>
<body bgcolor="#FFFFFF" background="images/fondo-blue.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">



<h1>
  <div align="center" class="Estilo3">Alta de Datos Para Facturaci&oacute;n </div>
</h1>
<? if( $_POST['btnBack']  == "1" ){
 // echo "hola";
 
/*
if (!$contrato ||!$RazonSocial ) { 

print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';

} */
 if ( isset($RFC) and $RFC == "" )
        {
          //  print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $itc='1';
        } 
if ($fisica == 'sif') {
    if (!eregi("^([a-z]{4})([0-9]{6})([a-z0-9]{3})$",trim($RFC))) {
    print ("<h4>¡El RFC de la Persona Física no es valido favor Verificarlo.!</h4>");
    echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
    exit;
         }
    }
	if ($fisica == 'mor') {
      if (!eregi("^([a-z]{3})([0-9]{6})([a-z0-9]{3})$",trim($RFC))) {
       print ("<h4>¡El RFC de la Persona Moral no es valido favor Verificarlo.!</h4>");
       echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
       exit;
     }
    }		
/*if ( isset($Calle) and $Calle == "" )
        {
          //  print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $ito='1';
        }		
if ( isset($Colonia) and $Colonia == "" )
        {
          //  print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $itm='1';
        }	*/
	if ( isset($email) and $email == "" )
        {
         //    print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $iem='1';
        }	
	if 
//(!eregi("^[a-z0-9_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$",$Email)) {
(!eregi("^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$",$email)) {
print ("<h4>¡La cuenta de Correo no es valida favor Verificarlo.!</h4>");
echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
exit;
}
 /*  if ( isset($Municipio) and $Municipio == "" )
        {
         //    print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $imun='1';
        }	
   if ( isset($Estado) and $Estado == "" )
        {
         //    print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $iest='1';
        }	
    if ( isset($Pais) and $Pais == "" )
        {
         //    print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $ipais='1';
        }*/
	if ( isset($cp) and $cp == "" )
        {
         //    print ("<p><strong>¡Llena por favor los campos obligatorios! </strong></p>");
          //  $problem = true;
		  $icp='1';
        }
	 if (!eregi("^[0-9]{5}$",trim($cp))) {
       print ("<h4>¡El Código Postal  no es valido favor Verificarlo.!</h4>");
       echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
       exit;
     }									
$i1=$itc+$ito+$itm+$iem+imun+iest+ipais+icp;	
			
if($i1 > 1){
		  print ("<li>Necesita usted ingresar los datos de Todos los campos</li>");
		 // print ( "Telefono Oficina, Telefono Movil, Email. ");
		 echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
		// echo "valor de $i $itc";
		}			
/*if 
//(!eregi("^[a-z0-9_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$",$Email)) {
/*(!eregi("^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$",$Email)) {
print ("<h4>¡La cuenta de Correo no es valida favor Verificarlo.!</h4>");
echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
exit;
}*/
/*if 
(!eregi("^[0-9]",$TelCasa)) {
print ("<h4>¡El numero de Telefono no es Valido.!</h4>");
echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';

}
if 
(!eregi("^[0-9]",$TelOfna)) {
print ("<h4>¡El numero de Telefono no es Valido.!</h4>");
echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
exit;
}*/
else {
 
/* establece la conexión a la DB */
include("include/variables.inc.php");
////
$sqlc = "SELECT max(Id) FROM s38Fisdom ";

// Coloca los resultados en la variable $result
$result2 = mssql_query($sqlc);
// Cuenta las columnas con resultado en $result.
// 0 es invalido, 1 es valido.
$num = mssql_num_rows($result2);
if ($num != "0") {
  While ($secuencia = mssql_fetch_row($result2)) {
  $contador=$secuencia[0];
  $contador=$contador+1;
            }
} else {
$contador=1;
}

////////////////////

///////////////////////////////////////////////////////  
$RazonSocial=strtoupper($RazonSocial);
$Contrato=strtoupper($Contrato);

//////////////////////antes de grabar checa si tiene nombre repetido//////////////////
  $sbn = "SELECT Contrato, RazonSocial  FROM  s38Fisdom
		WHERE     ((Razon Social = '$RazonSocial') AND (Contrato = '$Contrato') )";
		       $rsbn = mssql_query($sbn);
		        $nsbn = mssql_num_rows($rsbn);
		        if ($nsbn != "0") {
				 ?> <a href='javascript:history.back(1)'>Tu Contrato ya fue Ingresado Previamente</a> <?
		          exit;
                 } 



/*$sqltb = "SELECT vta.consultorsr FROM s04a2vta as vta  WHERE vta.contrato= '$contrato' ";

// Coloca los resultados en la variable $result
$retb = mssql_query($sqltb);
// Cuenta las columnas con resultado en $result.
// 0 es invalido, 1 es valido.
$num = mssql_num_rows($retb);
if ($num != "0") {
While ($contrato = mssql_fetch_row($retb)) {
	$promotor="$contrato[0]";
	
	     ////////////////////
		  $sqbo = "SELECT max(SecuenciaP) FROM s26m1pro where promotor= '$promotor' ";
		             $re = mssql_query($sqbo);
		             $nbo = mssql_num_rows($re);
		        if ($nbo != "0") {
				  While ($bas = mssql_fetch_row($re)) {
				       $cuentatb ="$bas[0]";
					   $cuentatb=$cuentatb+1;
				   } 
                 } 
		 ////////////////////
       }
   }
 $cuentatb="$cuentatb";   */
//$prom= "$promotor";
////////////////////////Aqui//////////////////////
/*$usuario="Web";
$query2 = "insert into s38Fisdom (Id, Contrato, RazonSocial, RFC, Calle,NumeroExt,NumeroInt,Colonia, Municipio, Estado,Pais, cp, email, fecha, usuario, ip) values('$contador','$contrato','$RazonSocial', '$RFC', '$Calle', '$NumeroExt', '$NumeroInt','$Colonia', '$Municipio' , '$Estado','$Pais', '$cp','$email', getdate(), '$usuario','$REMOTE_ADDR')";
*/
echo "$contador"; 
echo "$contrato";
echo "$RazonSocial"; 
echo "$RFC"; 
echo "$Calle"; 
echo "$NumeroExt"; 
echo "$NumeroInt"; 
echo "$Colonia"; 
echo "$Municipio" ; 
echo "$Estado"; 
echo "$Pais"; 
echo "$cp"; 
echo "$email"; 
 echo "$usuario";
 echo "$fisica"; 
//////////////////////////////////////////////////////
$contrato=$_POST["contratos"];
$banderasus=$_POST["banderasus"]; 
$suscriptor=$_POST["Suscriptor"];
/////////////////////////////////////fin de graba tubo de venta//////////////////////////////

//print ("<html><head><meta http-equiv=\"Refresh\" content=\"0;URL=consulta.php\"></head><body></body</html>");                       
//////////////////////////envio correo///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
$mail_admin = "$email";

//-Headers: Se puede Modificar el From
$headers  = "MIME-Version: 1.0\n";//No Modificar
$headers .= "Content-type: text/html; charset=iso-8859-1\n";//No Modificar
//$headers .= "From: $nombre $mail\n";
$headers .= "From: Mexicana de Becas <soporte@mb.com.mx>\n";

$message2 = <<<MAIL2
Informacion De Datos de Facturación <br>
Estimado Suscriptor nos ha proporcionado sus datos personales para facturación.<br>
 <br>
Atentamente<br>
Mexicana de Becas, Fondo de Ahorro Educativo
 <br>
Le informamos que sus datos personales que obran en poder de Mexicana de Becas<br>
se encuentran sujetos al tratamiento de datos personales que usted puede consultar en nuestro<br>
aviso de privacidad ubicado en www.mb.com.mx<br>
MAIL2;

$subject = "Informacion Datos de Facturacion";


 



///////////////////////////////////////////////////////////////////////////////////////////
}

//include("comodinconsul.php");

mssql_close();
exit;

  }else{
  $btnBack="";
 // echo "hola miguel";
  
  }
  ?>
<form action="prueba26.php"  method="post" name="form1" target="_self" id="form1" >
  <p>
  <input TYPE="HIDDEN" name="contratos" VALUE="<? echo $contrato ?>">
   <input TYPE="HIDDEN" name="banderasus" VALUE="<? echo $banderasus ?>">
   <input TYPE="HIDDEN" name="emailsusc" VALUE="<? echo $emailsusc ?>">
   <input TYPE="HIDDEN" name="Suscriptor" VALUE="<? echo $suscriptor ?>">
</p>
  <table width="732" border="0" align="center">
  <tr>
    <td colspan="8"><span class="Estilo11">Ingresa los Siguientes Datos al Contrato <? echo $contrato ?> </span></td>
    </tr>
  <tr>
    <td colspan="7"><span class="Estilo13"> Raz&oacute;n Social:</span> <span class="Estilo12"><font color="#FF0000">*</font><font color="#FF0000"></font></span></td>
    <td width="440"><input name="RazonSocial" type="text" id="RazonSocial" value="<? echo $RazonSocial ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">RFC</td>
    <td><input name="RFC" type="text" id="RFC" value="<? echo $RFC ?>" size="25" maxlength="90">
      <label>
      <input name="radio" type="radio" value="sif" checked>
      Persono Física
      <input name="radio" type="radio" value="mor">
Persona Moral</label></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">Calle</td>
    <td><input name="Calle" type="text" id="Calle" value="<? echo $Calle ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">N&uacute;mero Exterior </td>
    <td><input name="NumeroExt" type="text" id="NumeroExt" value="<? echo $NumeroExt ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">N&uacute;mero Interior </td>
    <td><input name="NumeroInt" type="text" id="NumeroInt" value="<? echo $NumeroInt ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">Colonia</td>
    <td><input name="Colonia" type="text" id="Colonia" value="<? echo $Colonia ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">Municipio</td>
    <td><input name="Municipio" type="text" id="Municipio" value="<? echo $Municipio ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">Estado</td>
    <td><input name="Estado" type="text" id="Estado" value="<? echo $Estado ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">Pa&iacute;s</td>
    <td><input name="Pais" type="text" id="Pais" value="<? echo $Pais ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">C&oacute;digo Postal </td>
    <td><input name="cp" type="text" id="cp" value="<? echo $cp ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7" class="Estilo13">E-mail</td>
    <td><input name="email" type="text" id="email" value="<? echo $email ?>" size="25" maxlength="90"></td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><span class="Estilo9"><?php
  // Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";

// Obtenemos el año
$ano=date("Y");

// Imprimimos la fecha completa

$lafechaes = "$dia $dia2 de $mes de $ano";
$horaes= date ( "h:i:s" , time());
//echo ("$lafechaes $horaes" );
//  $Hoy = date("d-m-y"); 
/*	PRINT"<p>Tu alta se procesa con la fecha:
	<INPUT TYPE='text' NAME='Hoy' SIZE='35' MAXLENGTH='60' VALUE='$lafechaes'> 
	 </p>";*/ 
	 echo "Tu alta se procesara con la fecha: ";
	 echo " $lafechaes";?></span></td>
    </tr>
  <tr>
    <td width="13">&nbsp;</td>
    <td width="88"><div align="center">
     
             <input type="submit" name="btnBack" value="Envia el Alta" onClick="eval('btnBack.value=1')">
   
    </div></td>
    <td colspan="3"><div align="center">
      <INPUT type=button value=" Cancelar " onClick="history.back();">
    </div></td>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
<P><BR>

<p>
  <label></label>
<p>

</form>



<h6><div align="center"><?php include '../../includes/webmaster2.php';	 ?></div></h6>


</body>
</html>
<?
}
?>
