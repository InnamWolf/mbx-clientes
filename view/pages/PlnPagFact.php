<?php 
  include ('view/pages/credencial.php');
?>
<style>
  #cajaPrincipal{
    width: 95%;
    margin: auto;
    margin-top: 20px;
  }
</style>
<div id="cajaPrincipal">

  <form method="post">
    <table width="96%" border="1" bordercolor="#3399FF">
      <tr>
        <td colspan ="2" width="34%">
          <div align="center" class="Estilo3">
            <font class="Estilo4"><strong>Seleccione Contrato:</strong></font> 
            <select name="Contrato" id="Contrato" class="Estilo3" onchange="this.form.submit()">
              <?php
                $tabla = "s04a2vta";
                $datos = array("suscriptor" => $_SESSION["HlpDskIdeUsu"],
                  "suscriptorb" => $_SESSION["HlpDskIdeUsu"]);
                $respuesta = ModeloReportes::mdlMostrarContratos($tabla, $datos);
                foreach($respuesta as $key => $contratos){
                  echo "<option value=\"". $contratos["contrato"]."\"";
                  if ($_POST["Contrato"] == $contratos["contrato"]){
                    echo " selected";
                  }
                  echo ">".$contratos["contrato"]."</option>";
                }
              ?>
            </select>
          </div>
        </td>
        <td width="28%"><p align="center" class="Estilo5"><span class="Estilo5"><?php echo $_SESSION["HlpDskDesNom"] ?>&nbsp; </p>    </td>
        <td width="16%"><p align="center" class="Estilo4"><?php echo $_SESSION["HlpDskDesTip"] ?>&nbsp;: <?php echo $_SESSION["HlpDskIdeUsu"] ?></p>    </td>
        <td colspan ="2" width="22%"><p align="center" class="Estilo4"><font color="#FFFFFF"><strong><font color="#000000">PLAN DE PAGOS</font></strong></font></p></td>
      </tr>
    </table>
  </form>

  <table width="96%">
    <tr>
      <td colspan="6"></td>
    </tr>
  </table>

  <?php
    $valor = $_POST["Contrato"];
    $reportes = ControladorReportes::ctrDetalleContratos($valor);
  ?>
  
  <table width="96%" border="1" bordercolor="#3399FF">
    <tr bordercolor="#6699FF" bgcolor="#CCCCCC"> 
      <td colspan="4"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>DATOS DE CONTRATO</strong></font></td>
      <td><font class="Estilo4">Fecha:</font></td>
      <td><div align="right" class="Estilo4"><?php echo $reportes["FecAct"] ?></div></td>
    </tr>
    
    <tr> 
      <td colspan="3" bordercolor="#6699FF"><span class="Estilo3">Suscriptor:</span><font class="Estilo4">      <?php echo $reportes["NomSus"] ?> / <?php echo $reportes["NomSusB"] ?></font></td>
      <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $reportes["TipCon"] ?></div></td>
      <td width="20%" bordercolor="#6699FF"><font class="Estilo4">No. de Contrato:</font></td>
      <td width="14%" bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $reportes["Contrato"] ?></div></td>
    </tr>
      
    <tr> 
      <td colspan="3" bordercolor="#6699FF" class="Estilo4">Beneficiario:<font size="2"> <?php echo $reportes["NomBen"] ?></font></td>
      <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $reportes["NivCon"] ?></div></td>
      <td bordercolor="#6699FF"><font class="Estilo4">Fecha Base:</font></td>
      <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $reportes["FecBas"] ?></div></td>
    </tr>
      
    <tr> 
      <td colspan="3" bordercolor="#6699FF" class="Estilo4"><?php echo $reportes["DomSus"] ?>&nbsp;</td>
      <td width="12%" bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $reportes["Estatus"] ?></div></td>
      <td bordercolor="#6699FF"><font class="Estilo4 Estilo5">Tipo de Plan:</font></td>
      <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $reportes["Plan"] ?></div></td>
    </tr>
    
    <tr> 
      <td colspan="4" bordercolor="#6699FF" class="Estilo4"><?php echo $reportes["ColSus"] ?>&nbsp;</td>
      <td bordercolor="#6699FF"><font class="Estilo4">Unidades:</font></td>
      <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $reportes["Unidades"] ?></div></td>
    </tr>
    
    <tr> 
      <td colspan = "2" width="28%" height="21" bordercolor="#6699FF" class="Estilo4"><?php echo $reportes["CiuSus"] ?>&nbsp;</td>
      <td width="26%" bordercolor="#6699FF"><?php echo $reportes["EdoSus"] ?>&nbsp;</td>
      <td bordercolor="#6699FF"><span class="Estilo4">Cod.Pos:</span> <?php echo $reportes["CpoSus"] ?>&nbsp;</td>
      <td bordercolor="#6699FF"><font size="2" class="Estilo4">A&ntilde;o de Rentabilidad:</font></td>
      <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $reportes["Rentabilidad"] ?></div></td>
    </tr>
  </table>

  <table width="96%">
    <tr>
      <td colspan="6"></td>
    </tr>
  </table>

<?php
  $valor = $reportes["Contrato"];
  $mostrarDomFis = ControladorReportes::ctrMostrarDomFiscal($valor);
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
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["rfcFT"] ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" bordercolor="#6699FF" class="Estilo4"><div align="center" class="Estilo4"><span class="Estilo3"><?php echo $mostrarDomFis["RSFT"] ?></span></div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Calle</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["calleFT"] ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">N&uacute;mero Exterior </span></td>
    <td width="20%" bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["NumeroExtFT"] ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">N&uacute;mero Interior </span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["NumeroIntFT"] ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">Colonia</span></td>
    <td bordercolor="#6699FF" class="Estilo4"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["ColoniaFT"] ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Municipio</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["MunicipioFT"] ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td height="21" bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">Estado</span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["EstadoFT"] ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">Pa&iacute;s</span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["PaisFT"] ?></span></div>
    </div></td>
  </tr>
  <tr>
    <td height="21" bordercolor="#6699FF" class="Estilo4"><span class="Estilo24">C&oacute;digo Postal </span></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["cpFT"] ?></span></div>
    </div></td>
    <td bordercolor="#6699FF"><span class="Estilo24">E-mail</span></td>
    <td bordercolor="#6699FF"><div align="right" class="Estilo4">
      <div align="left"><span class="Estilo3"><?php echo $mostrarDomFis["emailFT"] ?></span></div>
    </div></td>
  </tr>
</table>


<?php
            if ($reportes["Contrato"] == $mostrarDomFis["Contrato"]) {
                              print ("<table><tr><td>");
							   print ("<b>Contrato:                    </b>");
                              print $mostrarDomFis["Contrato"];
							   print ("<br>");
                              print ("<b>Raz�n Social:               </b>");
                              print $mostrarDomFis["RSFT"];
							  print ("<br>");
                               print ("<b>RFC:                       </b> ");
                              print $mostrarDomFis["rfcFT"];
							  print ("<br>");
							   print ("<b>Calle:                      </b>");
                              print $mostrarDomFis["calleFT"];
							  print ("<br>");
							   print ("<b>N�mero Exterior:            </b>");
                              print $mostrarDomFis["NumeroExtFT"];
							  print ("<br>");
							   print ("<b>N�mero Interior:            </b>");
                              print $mostrarDomFis["NumeroIntFT"];
							  print ("<br>");
							   print ("<b>Colonia:                    </b>");
                              print $mostrarDomFis["ColoniaFT"];
							  print ("<br>");
							   print ("<b>Municipio:                  </b>");
                              print $mostrarDomFis["MunicipioFT"];
							  print ("<br>");
							   print ("<b>Estado:                     </b>");
                              print $mostrarDomFis["EstadoFT"];
							  print ("<br>");
							   print ("<b>Pa�s:                       </b>");
                              print $mostrarDomFis["PaisFT"];
							  print ("<br>");
							   print ("<b>C�digo Postal:              </b>");
                              print $mostrarDomFis["cpFT"];
							  print ("<br>");
                                 print ("<b>E-mail:                     </b>");
                              print ("</b> ");
                              print ("<a href=mailto:");
                              print $mostrarDomFis["emailFT"];
                              print (">");
                              print $mostrarDomFis["emailFT"];
                              print ("</a>");
							  print ("<br>");
							  print ("<b>Fecha de Alta:               </b>");
							  print $mostrarDomFis["fecha"];
                              print ("</td></tr></table>");
                              print ("<hr width=400 align=left size=1>");
      } else {
        print "<h4>Estimado suscriptor a�n no haz registrado Sus datos de facturaci�n. </h4>";
	      print ("<a href=\"alta.php?Secuencia=$mostrarDomFis[Secuencia]&contrato=$reportes[Contrato]&banderasus=$banderasus\"><img src='images/Alta.png' border='0'></a></td><td>");
    }  
?>
<p class="Estilo4">&nbsp;</p>
<table width="96%" height=54 border=1 align=left bordercolor="#6699FF">
    <tr bordercolor=#6699FF bgcolor=#CCCCCC> 
      <td colspan=6><font color=#000000 class="Estilo4"><strong>PAGOS POR FACTURAR </strong></font></td>
    </tr>
    <tr bordercolor=#6699FF> 
      <td width="15%" height="23"><div align="center" class="Estilo4">Fecha Traspaso </div></td>
      <td colspan="2" width="17%"> <div align="center" class="Estilo4">Referencia</div></td>
      <td width="13%"><div align="center" class="Estilo4">No. Pago</div></td>
      <td width="11%"><div align="center" class="Estilo4">Importe</div></td>
      <td width="44%"><div align="center" class="Estilo4">Estatus</div></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
<?
$res = mb_query("select FecVen, RefBco,  NumPag,ImpPag,  EstPag, estatus from bbvestatus where contrato='".$Contrato."'");
while($result=mssql_fetch_array($res))
{
$FecVen = $result[FecVen];
$FecVen=strtoupper($FecVen);
 $FecVen=str_replace("ENE",'01',$FecVen);
   $FecVen=str_replace("FEB",'02',$FecVen);
   $FecVen=str_replace("MAR",'03',$FecVen);
   $FecVen=str_replace("ABR",'04',$FecVen);
   $FecVen=str_replace("MAY",'05',$FecVen);
   $FecVen=str_replace("JUN",'06',$FecVen);
   $FecVen=str_replace("JUL",'07',$FecVen);
   $FecVen=str_replace("AGO",'08',$FecVen);
   $FecVen=str_replace("SEP",'09',$FecVen);
   $FecVen=str_replace("OCT",'10',$FecVen);
   $FecVen=str_replace("NOV",'11',$FecVen);
   $FecVen=str_replace("DIC",'12',$FecVen);
   $FecVen=substr($FecVen, 0, 10);
  $fm=substr($FecVen, 0,2);
  $fd=substr($FecVen, 3,2);
  $fy=substr($FecVen, 6,10);
  $FecVen="$fd/$fm/$fy";
  
$RefBco = $result[RefBco];
$NumPag = $result[NumPag];
$ImpPag = $result[ImpPag];
$EstPag = $result[EstPag];
$EstPagVir = $result[estatus];
if (trim($EstPagVir) == 'Pagado'){
 $EstPag='Pagado En Linea'; 
  $EstPaga ='Pagado';
}

 if (trim($EstPag) == 'Activo' or trim($EstPag) == 'Vencido'){
       $restop = mb_query("SELECT TOP 1 * FROM bbvestatus where contrato='".$Contrato."' and EstPag in('Activo','Vencido') AND (estatus IS NULL) ORDER BY NumPag");
        $resop = mssql_fetch_array($restop);
        $NumPag1 = $resop[NumPag];
	//	echo "soy el pago $NumPag1";
//		echo "soy el pago $NumPag";
	   if ($NumPag1 != $NumPag ){
	     $EstPaga ='nopagar';
	   }else{
	    $EstPaga ='pagar';
	   }
  }
  //https://www.egbs5.com.mx/eEmpresa/mexicanabecas/principal/indexgen.jsp 
  $tram=str_replace("A",'1',$Contrato);
$s_transm=$tram.$NumPag.$fd.$fm.$fy;
$c_referencia=$RefBco;
$val_1='0';
$deta=substr($Plan,0,1);  
if ($deta=='M'){
 $t_servicio=562;
}  elseif($deta=='S'){
 $t_servicio=563;
}elseif($deta=='A'){
 $t_servicio=564;
}elseif($deta=='T'){
 $t_servicio=565;
}elseif ($deta=='U'){
 $t_servicio=566;
}else{
 $t_servicio=0;
}

//$t_servicio='562';
$t_importe=$Pes.number_format($ImpPag*1.02,2,'.','');
//$t_importe=$ImpPag;
$val_2=$NomSus;
$val_3='1';
$val_4='1';
$val_5='0';
$val_6='0';
$val_11=$email;
$val_12=$tel_casa;
$val_15='1000'; //valor de la tarejate de credito. //0100 CIE //1100 TDC+CIE
?>

<form method="POST" action="https://www.adquiramexico.com.mx/clb/endpoint/mexicanabecas" >

<table width="78%">
<TBODY>
  <td width="15%"><div align="center" class="Estilo4"><?php echo $FecVen ?></div></td>
      <td width="17%"><div align="center" class="Estilo4"><?php echo $RefBco ?></div></td>
      <td width="13%"><div align="center" class="Estilo4"><font size="2"><?php echo $NumPag ?></font></div></td>
      <td width="12%"><div align="center" class="Estilo4"><?php echo $Pes.number_format($ImpPag,2,'.',',') ?></div></td>
      <td width="23%"><div align="center" class="Estilo4"><?php echo $EstPag ?></div></td>
		<input type="hidden" name="FecVen" value="<? echo $FecVen  ?>">
		<input type="hidden" name="RefBco" value="<? echo $RefBco ?>">
		<input type="hidden" name="NumPag" value="<? echo $NumPag ?>">
		<input type="hidden" name="ImpPag" value="<? echo $Pes.number_format($ImpPag*1.02,2,'.','')?>">
		<input type="hidden" name="NomSus" value="<? echo $NomSus ?>">
		<input type="hidden" name="NomBen" value="<? echo $NomBen ?>">
		<input type="hidden" name="DomSus" value="<? echo $DomSus ?>">
		<input type="hidden" name="ColSus" value="<? echo $ColSus ?>">
		<input type="hidden" name="CiuSus" value="<? echo $CiuSus ?>">
		<input type="hidden" name="EdoSus" value="<? echo $EdoSus ?>">
		<input type="hidden" name="TipCon" value="<? echo $TipCon ?>">
		<input type="hidden" name="NivCon" value="<? echo $NivCon ?>">
		<input type="hidden" name="Estatus" value="<? echo $Estatus ?>">
		<input type="hidden" name="Contrato" value="<? echo $Contrato ?>">
		<input type="hidden" name="FecBas" value="<? echo $FecBas ?>">
		<input type="hidden" name="Plan" value="<? echo $Plan ?>">
		<input type="hidden" name="Unidades" value="<? echo $Unidades ?>">
		<input type="hidden" name="s_transm" value="<? echo $s_transm ?>">
		<input type="hidden" name="c_referencia" value="<? echo $c_referencia ?>">
		<input type="hidden" name="val_1" value="<? echo $val_1 ?>">
		<input type="hidden" name="t_servicio" value="<? echo $t_servicio ?>">
		<input type="hidden" name="t_importe" value="<? echo $t_importe ?>">
		<input type="hidden" name="val_2" value="<? echo $val_2 ?>">
		<input type="hidden" name="val_3" value="<? echo $val_3 ?>">
		<input type="hidden" name="val_4" value="<? echo $val_4 ?>">
		<input type="hidden" name="val_5" value="<? echo $val_5 ?>">
		<input type="hidden" name="val_6" value="<? echo $val_6 ?>">
		<input type="hidden" name="val_11" value="<? echo $val_11 ?>">
		<input type="hidden" name="val_12" value="<? echo $val_12 ?>">
		<input type="hidden" name="Rentabilidad" value="<? echo $Rentabilidad ?>">
		<input type="hidden" name="CpoSus" value="<? echo $CpoSus ?>">
		<input type="hidden" name="val_15" value="<? echo $val_15 ?>">
		
		
		
	<?	if ($EstPaga=='pagar'){
	         ?>
	  <td width="20%"><input type="submit" name="Submit" value="Pago En Linea" onClick="launchRemote()"/></td>
	  <? } ?>
	 
    <td width="0%"></TBODY>
</table>
</form>			
<?
}
?>


