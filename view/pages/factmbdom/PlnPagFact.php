

<?php



session_name("helpdesk");
session_start();
$HlpDskDesNom = $_SESSION[HlpDskDesNom];
$HlpDskDesTip = $_SESSION[HlpDskDesTip];
//$HlpDskIdeUsu = '      ';
//if (isset($_SESSION[HlpDskIdeUsu])) { $HlpDskIdeUsu = $_SESSION[HlpDskIdeUsu]; };
$HlpDskIdeUsu = $_SESSION[HlpDskIdeUsu];
//$HlpDskIdeUsu ='A47358';
$s_transm ='';

 if ($HlpDskIdeUsu==""){
echo "Acceso No Valido";
exit;
}

//setlocale(LC_TIME, 'es_MX'); // para español de mexico
setlocale(LC_TIME, 'es_ES.UTF-8'); // para español de mexico
require("fechas.php"); 

include("../../AtnLinea/Config2.php");
mb_connect();
?>
<link rel="stylesheet" href="style/style1.css">
<!-- <style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo3 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
.Estilo4 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
.Estilo5 {font-size: 10px}

</style> -->

<style type="text/css">
<!--
.Estilo24 {font-family: "Century Gothic"; color: #4D96D1; font-weight: bold; font-size: 14px; }
.Estilo12 {	font-family: "Century Gothic";
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
<div id="cajaPrincipal">
<form name="suscripcion" action="<?= $_SERVER[PHP_SELF] ?>" method="post">
<input type="hidden" name="Procesar" value="Enviar">
<?
if (isset($_POST['Contrato'])) 
   {
   $Contrato = $_POST['Contrato'];
   }
   else
   {
   $query  = "Select top 1 contrato FROM s04a2vta where suscriptor='".$HlpDskIdeUsu."' or suscriptorb='".$HlpDskIdeUsu."' ORDER BY contrato";
// echo $query;
   $res = mb_query($query);
   $Contrato = '';
   if (mssql_num_rows($res) > 0) 
      {
      $result=mssql_fetch_array($res);
      $Contrato = $result[contrato];
	  };
   };
// echo " Suscriptor=".$HlpDskIdeUsu." Contrato=".$Contrato." ";
$res = mb_query("select getdate() as FecAct ");
$result=mssql_fetch_array($res);
$FecAct = $result[FecAct];
$FecAct = substr($FecAct,0,11);
$res = mb_query("select tipo_contrato, f_base as FecBas, Nivel, estatus, cplan, unidades, rentabilidad, suscriptor, suscriptorb, beneficiario from s04a2vta where contrato='".$Contrato."'");
$result=mssql_fetch_array($res);
$TipCon =$result[tipo_contrato];
$FecBas = $result[FecBas];
//$FecBas = substr($FecBas,0,11);
$FecBas=strtoupper($FecBas);
 $FecBas=str_replace("ENE",'01',$FecBas);
   $FecBas=str_replace("FEB",'02',$FecBas);
   $FecBas=str_replace("MAR",'03',$FecBas);
   $FecBas=str_replace("ABR",'04',$FecBas);
   $FecBas=str_replace("MAY",'05',$FecBas);
   $FecBas=str_replace("JUN",'06',$FecBas);
   $FecBas=str_replace("JUL",'07',$FecBas);
   $FecBas=str_replace("AGO",'08',$FecBas);
   $FecBas=str_replace("SEP",'09',$FecBas);
   $FecBas=str_replace("OCT",'10',$FecBas);
   $FecBas=str_replace("NOV",'11',$FecBas);
   $FecBas=str_replace("DIC",'12',$FecBas);
   $FecBas=substr($FecBas, 0, 10);
  $fm=substr($FecBas, 0,2);
  $fd=substr($FecBas, 3,2);
  $fy=substr($FecBas, 6,10);
  $FecBas="$fd/$fm/$fy";

$NivCon = $result[Nivel];
$Estatus = $result[estatus];
$Plan = $result[cplan];
$Unidades = $result[unidades];
$Rentabilidad = $result[rentabilidad];
$Suscriptor = $result[suscriptor];
$Suscriptorb = $result[suscriptorb];
$Beneficiario = $result[beneficiario];
$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomSus, domicilio, colonia, ciudad, estado, cp, tel_casa, email from s03a2sus where suscriptor='".$Suscriptor."'");
$result=mssql_fetch_array($res);
$NomSus = $result[NomSus];
$DomSus = $result[domicilio];
$ColSus = $result[colonia];
$CiuSus = $result[ciudad];
$EdoSus = $result[estado];
$CpoSus = $result[cp];
$tel_casa = $result[tel_casa];
$email = $result[email];

$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomSusB from s03a2sus where suscriptor='".$Suscriptorb."'");
$result=mssql_fetch_array($res);
$NomSusB = $result[NomSusB];
$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomBen from s03a2ben where beneficiario='".$Beneficiario."'");
$result=mssql_fetch_array($res);
$NomBen = $result[NomBen];
?>

<table width="96%" border="1" bordercolor="#3399FF">
  <tr>
    <td width="34%">
      <div align="center" class="Estilo3"><font class="Estilo4"><strong>Seleccione Contrato:</strong></font> 
         
        <select name="Contrato" class="Estilo3" onChange="submit();">
          <?php
			$result = mb_query("SELECT contrato FROM s04a2vta where suscriptor='".$HlpDskIdeUsu."' or suscriptorb='".$HlpDskIdeUsu."' ORDER BY contrato");
		//    $result = mb_query("SELECT contrato FROM s04a2vta   ORDER BY contrato");
			while ($contratos = mssql_fetch_object($result))
				{
				echo "<option value=\"". $contratos->contrato."\"";
				if ($_POST[Contrato] == $contratos->contrato)
					{
					echo " selected";
					}
				echo ">".$contratos->contrato."</option>";
				}
      ?>
        </select>
    </div></td>
    <td width="28%"><p align="center" class="Estilo5"><span class="Estilo5"><?php echo $HlpDskDesNom ?>&nbsp; </p>    </td>
    <td width="16%"><p align="center" class="Estilo4"><?php echo $HlpDskDesTip ?>&nbsp;: <?php echo $HlpDskIdeUsu ?></p>    </td>
    <td width="22%"><p align="center" class="Estilo4"><font color="#FFFFFF"><strong><font color="#000000">PAGOS A FACTURAR </font></strong></font></p></td>
  </tr>
</table>
<table width="96%" border="1" bordercolor="#6699FF">
  <tr bordercolor="#6699FF" bgcolor="#CCCCCC"> 
    <td colspan="3"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>DATOS 
      DE CONTRATO</strong></font></td>
    <td><font class="Estilo4">Fecha:</font></td>
    <td><div align="right" class="Estilo4"><?php echo $FecAct ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF"><span class="Estilo3">Suscriptor:</span><font class="Estilo4">      <?php echo $NomSus ?> / <?php echo $NomSusB ?></font></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $TipCon ?></div></td>
    <td width="20%" bordercolor="#6699FF"><font class="Estilo4">No. de Contrato:</font></td>
    <td width="14%" bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Contrato ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF" class="Estilo4">Beneficiario:<font size="2"> <?php echo $NomBen ?></font></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $NivCon ?></div></td>
    <td bordercolor="#6699FF"><font class="Estilo4">Fecha Base:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $FecBas ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF" class="Estilo4"><?php echo $DomSus ?>&nbsp;</td>
    <td width="12%" bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $Estatus ?></div></td>
    <td bordercolor="#6699FF"><font class="Estilo4 Estilo5">Tipo de Plan:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Plan ?></div></td>
  </tr>
  <tr> 
    <td colspan="3" bordercolor="#6699FF" class="Estilo4"><?php echo $ColSus ?>&nbsp;</td>
    <td bordercolor="#6699FF"><font class="Estilo4">Unidades:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Unidades ?></div></td>
  </tr>
  <tr> 
    <td width="28%" height="21" bordercolor="#6699FF" class="Estilo4"><?php echo $CiuSus ?>&nbsp;</td>
    <td width="26%" bordercolor="#6699FF" class="Estilo4"><?php echo $EdoSus ?>&nbsp;</td>
    <td bordercolor="#6699FF" class="Estilo4">Cod.Pos: <?php echo $CpoSus ?>&nbsp;</td>
    <td bordercolor="#6699FF" class="Estilo4">A&ntilde;o de Rentabilidad:</td>
    <td bordercolor="#6699FF" class="Estilo4"> <div align="right" class="Estilo4"><?php echo $Rentabilidad ?></div></td>
  </tr>
</table>
<?

$res = mb_query("select RazonSocial as RazS, RFC as rfc, calle, NumeroExt,NumeroInt,Colonia,Municipio,Estado,Pais,cp,email from  s38Fisdom where contrato='".$Contrato."'");
$result=mssql_fetch_array($res);
$RSFT = $result[RazS];
$rfcFT = $result[rfc];
$calleFT = $result[calle];
$NumeroExtFT = $result[NumeroExt];
$NumeroIntFT = $result[NumeroInt];
$ColoniaFT = $result[Colonia];
$MunicipioFT = $result[Municipio];
$EstadoFT = $result[Estado];
$PaisFT = $result[Pais];
$cpFT = $result[cp];
$emailFT = $result[email];


?>
<table width="96%" border="1" bordercolor="#6699FF">
  <tr bordercolor="#6699FF" bgcolor="#CCCCCC">
    <td colspan="2"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>DATOS 
      DE FACTURACION </strong></font></td>
    <td>&nbsp;</td>
    <td><div align="right" class="Estilo4"></div></td>
  </tr>
  <tr>
    <td colspan="2" bordercolor="#6699FF"><span class="Estilo24">Raz&oacute;n Social:</span> <span class="Estilo12"><font color="#FF0000">*</font></span>
      <div align="center" class="Estilo4"></div></td>
    <td width="18%" bordercolor="#6699FF"><span class="Estilo24">RFC</span>:</td>
    <td width="31%" bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $rfcFT ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" bordercolor="#6699FF" class="Estilo4"><div align="center" class="Estilo4"><span class="Estilo3"><?php echo $RSFT ?></span></div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Calle</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $calleFT ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">N&uacute;mero Exterior </span></td>
    <td width="20%" bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $NumeroExtFT ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">N&uacute;mero Interior </span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $NumeroIntFT ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">Colonia</span></td>
    <td bordercolor="#6699FF" class="Estilo4"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $ColoniaFT ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Municipio</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $MunicipioFT ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td height="21" bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">Estado</span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $EstadoFT ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Pa&iacute;s</span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $PaisFT ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td height="21" bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">C&oacute;digo Postal </span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $cpFT ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">E-mail</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $emailFT ?></span></div>
    </div></td>
  </tr>
</table>
<?
  $result = mssql_query ("SELECT * FROM s38Fisdom WHERE contrato='".$Contrato."'");
		
	
            if ($row = mssql_fetch_array($result)) {

                            do {
							   
							 
                       //       print ("<table><tr><td>");
					///		   print ("<b>Contrato:                    </b>");
                      //        print $row["Contrato"];
					//		   print ("<br>");
                     //         print ("<b>Razón Social:               </b>");
                      //        print $row["RazonSocial"];
					//		  print ("<br>");
                     //          print ("<b>RFC:                       </b> ");
                      //        print $row["RFC"];
					//		  print ("<br>");
					//		   print ("<b>Calle:                      </b>");
                     //         print $row["Calle"];
					//		  print ("<br>");
					//		   print ("<b>Número Exterior:            </b>");
                     //         print $row["NumeroExt"];
					//		  print ("<br>");
					//		   print ("<b>Número Interior:            </b>");
                     //         print $row["NumeroInt"];
					//		  print ("<br>");
					//		   print ("<b>Colonia:                    </b>");
                     //         print $row["Colonia"];
					//		  print ("<br>");
					//		   print ("<b>Municipio:                  </b>");
                     //         print $row["Municipio"];
					//		  print ("<br>");
					//		   print ("<b>Estado:                     </b>");
                     //         print $row["Estado"];
					//		  print ("<br>");
						//	   print ("<b>País:                       </b>");
                       //       print $row["Pais"];
					//		  print ("<br>");
					//		   print ("<b>Código Postal:              </b>");
                     //         print $row["cp"];
					//		  print ("<br>");
                     //            print ("<b>E-mail:                     </b>");
                      //        print ("</b> ");
                      //        print ("<a href=mailto:");
                       //       print $row["email"];
                        //      print (">");
                        //      print $row["email"];
                         //     print ("</a>");
					//		  print ("<br>");
							  print ("<b>Fecha de Alta de Domicilio de Facturación:               </b>");
							  print $row["fecha"];
                              print ("</td></tr></table>");
                              print ("<hr width=400 align=left size=1>");

               } while($row = mssql_fetch_array($result));

      } else {print "<h4>Estimado suscriptor a&uacute;n no haz registrado Sus datos de facturaci&oacute;n. </h4>";
	   print ("<a href=\"alta.php?Secuencia=$row[Secuencia]&contrato=$Contrato&banderasus=$banderasus\"><img src='images/Alta.png' border='0'></a></td><td>");}  


mssql_free_result($result);



?>
<p class="Estilo4">&nbsp;</p>
<table width="85%" height=54 border=1 align=left bordercolor="#6699FF">
  <TBODY>
    <tr bordercolor=#6699FF bgcolor=#CCCCCC> 
      <td colspan=9><font color=#000000 class="Estilo4"><strong>PAGOS POR FACTURAR </strong></font></td>
    </tr>
    <tr bordercolor=#6699FF> 
      <td width="13%" height="23"><div align="center" class="Estilo4">Fecha Traspaso </div></td>
      <td width="13%"> <div align="center" class="Estilo4">No. Pago</div></td>
      <td width="12%"><div align="center" class="Estilo4">Importe</div></td>
      <td width="14%"><div align="center" class="Estilo4">Cuota</div></td>
      <td width="13%"><div align="center" class="Estilo4">Iva </div></td>
      <td width="35%"><div align="center" class="Estilo4">Estatus</div></td>
    </tr>
  </TBODY>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
<p>
  <?

$res = mb_query("select f_traspaso, pago, importe,cuota,iva,Factura, ImpFactura from FactWeb where contrato='".$Contrato."'");
while($result=mssql_fetch_array($res))
{

$f_traspaso = $result[f_traspaso];
$f_traspaso=strtoupper($f_traspaso);
 $f_traspaso=str_replace("ENE",'01',$f_traspaso);
   $f_traspaso=str_replace("FEB",'02',$f_traspaso);
   $f_traspaso=str_replace("MAR",'03',$f_traspaso);
   $f_traspaso=str_replace("ABR",'04',$f_traspaso);
   $f_traspaso=str_replace("MAY",'05',$f_traspaso);
   $f_traspaso=str_replace("JUN",'06',$f_traspaso);
   $f_traspaso=str_replace("JUL",'07',$f_traspaso);
   $f_traspaso=str_replace("AGO",'08',$f_traspaso);
   $f_traspaso=str_replace("SEP",'09',$f_traspaso);
   $f_traspaso=str_replace("OCT",'10',$f_traspaso);
   $f_traspaso=str_replace("NOV",'11',$f_traspaso);
   $f_traspaso=str_replace("DIC",'12',$f_traspaso);
   $f_traspaso=substr($f_traspaso, 0, 10);
  $fm=substr($f_traspaso, 0,2);
  $fd=substr($f_traspaso, 3,2);
  $fy=substr($f_traspaso, 6,10);
  $f_traspaso="$fd/$fm/$fy";
  $ftras ="$fm/$fd/$fy";
  
  $pago=$result[pago];
  $importe = $result[importe];
  $cuota= $result[cuota];
  $iva = $result[iva];
 $cuota2= $cuota+$iva;
 $Impfactura=$result[ImpFactura];
 $factura=$result[Factura];
 $factura ="Se facturo Con No. Fact $factura ";
  }
  
    if  (($Impfactura ==0) and ($cuota2>=1)) {
	    $estafact ='facturar';
		$factura2='';
		$s_transm ='1';
		$factura ='';
		
	}else{
	  $estafact ='No. facturada';
	  $factura2 = "No. factura $factura ";
	}
	

?>

<form method="POST" action="solifact.php" >

<table width="85%">
<TBODY>
  <tr><td width="8%"><div align="center" class="Estilo4"><?php echo $f_traspaso ?></div></td>
      <td width="16%"><div align="center" class="Estilo4"><?php echo $pago ?></div></td>
      <td width="11%"><div align="center" class="Estilo4"><?php  echo $Pes.number_format($cuota2,2,'.','') ?></div></td>
      <td width="11%"><div align="center" class="Estilo4"><?php echo $Pes.number_format($cuota,2,'.','')?></div></td>
      <td width="14%"><div align="center" class="Estilo4"><?php echo $Pes.number_format($iva,2,'.','')?></div></td>
      <td width="12%"><div align="center" class="Estilo4"><?php echo $factura ?><?php echo $procefact ?></div></td>
	  <input type="hidden" name="contrato" value="<? echo $Contrato?>">
      <input type="hidden" name="s_transm" value="<? echo $s_transm?>">
	  <input type="hidden" name="ftras" value="<? echo $ftras ?>">
	  <input type="hidden" name="numpago" value="<? echo $pago  ?>">
	  <input type="hidden" name="pagcuota2" value="<? echo $Pes.number_format($cuota2,2,'.','')?>">
	  <input type="hidden" name="pagcuota" value="<? echo $Pes.number_format($cuota,2,'.','')?>">
	  <input type="hidden" name="pagiva" value="<? echo $Pes.number_format($iva,2,'.','')?>">
	  
	 
	<? 
		
		
		if ($estafact =='facturar'){
	         ?>
	  <td width="25%"><input type="submit" name="Submit" value="Facturar" onClick="launchRemote()"/></td>
	  <? } ?>
	 
    <td width="3%">
  </TBODY>
</table>
</form>			

<p class="Estilo4">Le recordamos que sus dep&oacute;sitos oportunos, favorecen 
  la Inversi&oacute;n Educativa para su hij@.</p>
<p><span class="Estilo4">Cualquier comentario dirigirlo a:</span><font size="2"> <a href="mailto:facturas@mb.com.mx">facturas@mb.com.mx</a></font></p>
<p><font color=#996699 size="2" face="Arial, Helvetica, sans-serif">Tel&eacute;fonos 
  (0155) 5514-4079, 5514-6638, 5511-7377.</font></p>
<p align=left class="Estilo4"><font "face="Arial, Helvetica, sans-serif" color=#996699><strong>Lada 
  sin costo para el interior de la republica:</strong></font></p>
<p align=center><strong><img height=70
src="http://www.mb.com.mx/imagenes/01becas.gif" width=228></strong></p>
<p align=left class="Estilo4"><strong><em>Becas Excelencia una oportunidad para 
  estudiar</em></strong></p>
<p align=left class="Estilo4">&nbsp;</p>

