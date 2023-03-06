
<?



/*
$FecVen=$_POST['FecVen'];
$RefBco=$_POST['RefBco'];
$NumPag=$_POST['NumPag'];
$ImpPag=$_POST['ImpPag'];
$NomSus=$_POST['NomSus'];
*/
$s_transm=$_POST['s_transm'];
$contrato=$_POST['contrato'];
$f_traspaso=$_POST['ftras'];
$pago=$_POST['numpago']; 
$cuota2=$_POST['pagcuota2']; 
$cuota=$_POST['pagcuota'];
$iva=$_POST['pagiva'];


if ($s_transm==""){
echo "Acceso No Valido";
exit;
}		


///////////////////////////////////////////
//*$query = "insert into bbvlinea (s_transm, c_referencia, val_1, t_servicio, t_importe, val_3, t_pago, n_autoriz, val_9,val_10, val_5, val_6, val_11, val_12, estatus) values('$s_transm', '$c_referencia', '$val_1', '$t_servicio', '$t_importe', '$val_3 ','$t_pago', '$n_autoriz', '$val_9' , '$val_10','$val_5', '$val_6', '$val_11','$val_12','Pagado')";

//$result=mssql_query($query);
////

include("include/variables.inc.php");

$sqlc = "SELECT max(Id) FROM factwebSol ";

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

$sbn = "SELECT Contrato, pago,importe  FROM factwebSol
		WHERE     ((pago = '$pago') AND (Contrato = '$contrato') AND (importe = '$cuota2'))";
		       $rsbn = mssql_query($sbn);
		        $nsbn = mssql_num_rows($rsbn);
		        if ($nsbn != "0") {
				 ?>Tu Factura esta en Proceso de Envio, &iexcl;<a href="http://www.becasmb.com/MBline/factmbdom/PlnPagFact.php">Click Aqu&iacute; </a>! <?
		          exit;
                 } else{

$query2 = "insert into factwebSol(Id, Contrato, F_traspaso, pago, importe, cuota,Iva, fecha, ip) values('$contador','$contrato','$f_traspaso', '$pago','$cuota2', '$cuota', '$iva', getdate(),'$REMOTE_ADDR')";

$resu2=mssql_query($query2);
}
/*
echo "$contador";
"$contrato";echo "$contrato";
echo "Secuencia $s_transm </br>";
echo "fecha $f_traspaso</br>";
echo "pago $pago</br>";
echo "cuota $cuota2</br>";
echo "cuota $cuota</br>";
echo "iva $iva</br>";
*/
/////////////mail///////////////
$email ="facturas@mb.com.mx";
$mail_admin = "$email";

//-Headers: Se puede Modificar el From
$headers  = "MIME-Version: 1.0\n";//No Modificar
$headers .= "Content-type: text/html; charset=iso-8859-1\n";//No Modificar
//$headers .= "From: $nombre $mail\n";
$headers .= "From: Mexicana de Becas <facturas@mb.com.mx>\n";

$message2 = <<<MAIL2
El Suscriptor nos ha solicitado vía web su factura.<br>
Informacion De Datos de Facturación <br>
  Contrato: $contrato  <br>
  Numero Pago: $pago <br>
  Cuota: $cuota <br>
  Iva:   $iva   <br>
  Importe: $cuota2 <br>
            <br>
Atentamente<br>
Servcios Web de Mexicana de becas<br>
Por favor verificar y proceder a generar vía Main la factura, en los modulos automaticos <br>
Dispuestos para esto <br>
Le informamos que los datos personales que obran en poder de Mexicana de Becas<br>
se encuentran sujetos al tratamiento de datos personales que usted puede consultar en nuestro<br>
aviso de privacidad ubicado en www.mb.com.mx<br>
MAIL2;

$subject = "Solicitud de Factura";


 mail($mail_admin, $subject, $message2, $headers);



/////////////////////////////

?>

<html>
<body text="#003966">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#111111" bgcolor="#F0F0F0" id="AutoNumber2" style="border-collapse: collapse">
    <tr>
      <td>
	  <div align="center"> 
	    <p>
	    <font face="Geneva, Arial, Helvetica, sans-serif" size="2"> 
	      Gracias por contactar a <strong>  Factura en l&iacute;nea Mexicana de Becas.</strong><br>
	      <p>Le informamos que  la factura ser&aacute; enviada en el transcurso del d&iacute;a habil en un horario de 8:30-14:30 y de 16:00-18:0o hrs. .podr&aacute; facturar aquellas que se realicen por concepto de Gasto de Administraci&oacute;n.</p>
	      <p>Es importante tomar en cuenta que s&oacute;lo podr&aacute; facturar aquellos dep&oacute;sitos del mes en curso. Los dep&oacute;sitos que se realicen en los &uacute;ltimos d&iacute;as del mes, la factura se expedir&aacute; con fecha del mes siguiente.</p>
	      <p>Si se requiere cambio de factura por error en sus datos fiscales, favor de comunicarse al Departamento de Atenci&oacute;n a Clientes a los tel&eacute;fonos <br>
	        5511 7377 -1450 4700 - 01 800 23 22 700 extensiones 122, 223 y 117. <br>
        </p>
	      <p>Nota: Por ning&uacute;n motivo se expedir&aacute;n facturas correspondientes <br>
	        a dep&oacute;sitos efectuados en meses anteriores</p>
	      <h4><br>
	      Continuar, &iexcl;<a href="http://www.becasmb.com/MBline/factmbdom/PlnPagFact.php">Click Aqu&iacute; </a>! <font face="Geneva, Arial, Helvetica, sans-serif" size="2"><br>
	      </h4>
          <strong>Mexicana de Becas </strong><br>
	      Liverpool 24, Piso 5 <br>
	      Col. Ju&aacute;rez. Del. Cuauht&eacute;moc <br>
	      México, D.F., C.P. 06600 <br>
	      Tel. 01 (55) 55.11.73.77, <br>
	      01 (55) 55.11.82.46 <br>
	      Interior. 01.800.23.22.700 <br>
	      
          <a href="#">facturas@mb.com.mx</a><a href="mailto:facturas@mb.com.mx"></a> <br>
          <br>
          <br>
	  </div>
      </td>
    </tr>
</table>
<p>&nbsp;</p>


</body>
</html>