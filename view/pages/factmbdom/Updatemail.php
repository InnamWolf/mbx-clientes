
<?php
if ($contrato==""){
   print ("<p><strong>¡Necesitas dar de Alta el Contrato! </strong></p>");
   echo '<a href="http://www.becasmb.com/MBline/factmbdom//index.php"><p><strong>Ingresa de Nuevo a tus Datos</strong></p></a>';
}else {
//- Mail de admin y Headers
include("include/variables.inc.php");
//echo "contrato $contrato";
//parse_str($Secuencia);

if( $_POST['flag']  != "1" ){
 // echo "hola";
$contrato= substr($contrato,1,6);
$sus= substr($sus,1,6);
}
//$contrato='005122';
//echo "$sus";
/*echo "$contrato";
echo "$sus";*/
///////////////
$sql = "SELECT vta.contrato,vta.suscriptor,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres,sus.f_nacimiento,sus.email  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato'  and sus.suscriptor='$sus'";

///////////////////////////
// Coloca los resultados en la variable $result
$result = mssql_query($sql);
// Cuenta las columnas con resultado en $result.
// 0 es invalido, 1 es valido.
$num = mssql_num_rows($result);
if ($num != "0") {
While ($contrato = mssql_fetch_row($result)) {
 //  echo "Bienvenido $NomSuscriptor \n";
 print ("<p><b>");
  //  echo  "Contrato: $contrato[0]"; print ("<p><b>");
 //  echo "Bienvenido:  $contrato[5] $contrato[3] $contrato[4] $contrato[6] \n";  
	$Suscriptor="$contrato[5] $contrato[3] $contrato[4]";
	$Email="$contrato[7]";
//	$fecha="$contrato[6]";
  //  $contrato="$contrato[1]";
	$susnumero="$contrato[2]";
	//echo "$susnumero";
	$contra="$contrato[0]";
//	echo "$contra";
	//$transf = strtotime($fecha);     
//    $mostrar = date("d/m/Y", $transf);  
  //  echo "$mostrar";
  /* if($fnaci!=$mostrar){
    echo "hubo un error con su Actualizacion";
	
   }else{
   echo "es correcto";
   }*/
   }
   }

//////////////
if(isset($_GET["action"])){
	$action = $_GET["action"];
}elseif(isset($_POST["action"])){
	$action = $_POST["action"];
}
//$nombre = $_POST["email"];
$emailb="$Email";
$email = $_POST["nuevomail"];
$contrato="$contra";
//$sus="$susnumero";
//$susnumero=$_POST["susnum"];
//echo "$susnumero";


    $problem = false;
    if ($action == "process")
    {
        $problem_str = "";
        /* validaciones */
        /****************/
    /*   if ( isset($nombre) and $nombre == "" )
        {
            $problem_str .= "<li>El campo E-mail no fue completado</li>";
            $problem = true;
        }*/
        if ( isset($email) and $email == "" )
        {
            $problem_str .= "<li>El campo Nuevo Email no fue completado</li>";
            $problem = true;
        }
		if 
			(!eregi("^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$",$email)) {
			$problem_str .= "<li>¡La cuenta de Correo no es valida favor Verificarlo.!</li>";
            $problem = true;
			//print ("<h4>¡La cuenta de Correo no es valida favor Verificarlo.!</h4>");
			//echo '<a href="javascript:history.back()"><p><strong>volver a intentarlo</strong></p></a>';
			//exit;
		}
        if ($problem)
        {
            unset($action);
        }
    }

    if ( $action == "process" && !$problem )
    {	
	//echo "$sus";
//	echo "$susnumero";

	$query1 = "update s03a2sus set EmailAnt='$emailb' where suscriptor='$susnumero'";

    $result1= mssql_query($query1);
 
     $query2 = "update s03a2sus set email='$email' where suscriptor='$susnumero'"; 

      $result2=mssql_query($query2); 
	  mssql_close();
?>
<!--///mensaje de agradecimiento una vez efectuado el proceso  -->
<html>
<body text="#003966">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
    <tr>
      <td>
	  <div align="center"> 
	    <p><font face="Geneva, Arial, Helvetica, sans-serif" size="2"> 
	      Gracias por contactar a <strong>  Mexicana de becas.</strong><br>
	      <h4><br>
	      Su Correo Fue Actualizado en Nuestra Base de Datos, &iexcl;<a href="index.php">Regresar </a>!<font face="Geneva, Arial, Helvetica, sans-serif" size="2"><br>
	      </h4>
          <strong>Mexicana de Becas </strong><br>
			  Liverpool N° 24, Piso 5. <br>
			  Col. Ju&aacute;rez. Del. Cuauht&eacute;moc <br>
			  México, D.F., C.P. 06600 <br>
			  Tel. 01 (55) 55.11.73.77, <br>
			  01 (55) 55.11.82.46 <br>
			  Interior. 01.800.23.22.700 <br>
	      
           <a href="#">soporte@mb.com.mx</a><a href="mailto:miguel.arratia@mb.com.mx"></a> <br>
          <br>
          <br>
	  </div>
      </td>
    </tr>
</table>
<p>&nbsp;</p>

</body>
</html>
    <?
    }
    else
    {
        ?>
		<!-- formato princiapl -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:::Mexicana de Becas :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</script>

</head>

<body text="#003966" leftmargin="0" topmargin="0" onLoad="MM_preloadImages('../formas/imagenes/quienesomos2.gif','../formas/imagenes/enquepensamos2.gif')">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="100%" colspan="3"><div align="justify"> 
        <p align="center"><font color="#003966" size="4" face="Geneva, Arial, Helvetica, sans-serif">ACTUALIZACI&Oacute;N DE SU CORREO ELECTRONICO </font></br><? echo $Suscriptor ?></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td>
			<form method="post" action="Updatemail.php" >
			<input TYPE="HIDDEN" name="action" VALUE="process">
			<input TYPE="HIDDEN" name="contrato" VALUE="<? echo $contrato ?>">
			<input TYPE="HIDDEN" name="sus" VALUE="<? echo $sus ?>">
			
                <table border=0 cellpadding=0 cellspacing=0 width=500>
                  <tbody>
                    <tr> <font face="Geneva, Arial, Helvetica, sans-serif" size="2"><? echo $problem_str ; ?></font>
                      <td width=277><font size="2" face="Geneva, Arial, Helvetica, sans-serif">E-mail Actual: </font></td>
                      <td width=316> <? echo $emailb ?></td>
                    </tr>
                    <tr> 
                      <td width=277><font face="Geneva, Arial, Helvetica, sans-serif" size="2">Ingrese su Nuevo Mail </font></td>
                      <td width=316> <input name="nuevomail" type="text" value="<? echo $nuevomail ?>" size="30">
                      <font face=ARIAL size=-1><font face="Arial, Helvetica, sans-serif" color="#FF9933"><b><font size="3">*</font></b></font></font> </td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    
                    <tr> 
                      <td>&nbsp;</td>
                      <td> <div align="left">
						<input type="submit" name="flag" value="Enviar Actualizaci&oacute;n del Correo" onClick="eval('flag.value=1')">
                        <INPUT type=button value=" Cancelar " onClick="history.back();">
                        </div></td>
                    </tr>
                  </tbody>
                </table>
              </form></td>
          </tr>
        </table>
        <p align="justify"><br>
          <font size="1" face="Geneva, Arial, Helvetica, sans-serif">*Para enviar 
        la forma es necesario llenar los campos se&ntilde;alados.</font></p>
        </div>
    </td>
  </tr>
  <tr> 
    <td colspan="3"> <h6><div align="center"><?php include '../../includes/webmaster2.php';	 ?></div>
</h6></td>
  </tr>
  <tr> 
    <td colspan="3"><div align="center"> 
        <p align="left"><font size="1" face="Geneva, Arial, Helvetica, sans-serif">.</font></p>
      </div></td>
  </tr>
</table>
<div align="center"></div>
<p>&nbsp;</p>
</body>
</html>
<?
    }
}	
?>
