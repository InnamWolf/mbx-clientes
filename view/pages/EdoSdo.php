<link rel="stylesheet" href="style/style1.css">
<?php
session_name("helpdesk");
session_start();
$HlpDskDesNom = $_SESSION[HlpDskDesNom];
$HlpDskDesTip = $_SESSION[HlpDskDesTip];
//$HlpDskIdeUsu = '      ';
//if (isset($_SESSION[HlpDskIdeUsu])) { $HlpDskIdeUsu = $_SESSION[HlpDskIdeUsu]; };
$HlpDskIdeUsu = $_SESSION[HlpDskIdeUsu];
if ($HlpDskIdeUsu==""){
echo "Acceso No Valido";
exit;
}
include("../AtnLinea/Config2.php");
mb_connect();
  //* ===============================================
  //* NAVEGACION
  //* ===============================================    
  include_once '../mbweb/components/nav.php'; 
?>
<style>
  .cajaPrincipal{
    margin: auto;
  }
</style>
<!--
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo3 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
.Estilo4 {font-family: "Times New Roman", Times, serif; font-size: 12px; }

</style>
-->

<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>
<div id="cajaPrincipal">
<form name="suscripcion" action="<?= $_SERVER[PHP_SELF] ?>" method="post">
<input type="hidden" name="Procesar" value="Enviar">
<form method="POST" action="EdoSdo.php" >

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
$FecBas = substr($FecBas,0,11);
$NivCon = $result[Nivel];
$Estatus = $result[estatus];
$Plan = $result[cplan];
$Unidades = $result[unidades];
$Rentabilidad = $result[rentabilidad];
$Suscriptor = $result[suscriptor];
$Suscriptorb = $result[suscriptorb];
$Beneficiario = $result[beneficiario];
$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomSus, domicilio, colonia, ciudad, estado, cp from s03a2sus where suscriptor='".$Suscriptor."'");
$result=mssql_fetch_array($res);
$NomSus = $result[NomSus];
$DomSus = $result[domicilio];
$ColSus = $result[colonia];
$CiuSus = $result[ciudad];
$EdoSus = $result[estado];
$CpoSus = $result[cp];
$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomSusB from s03a2sus where suscriptor='".$Suscriptorb."'");
$result=mssql_fetch_array($res);
$NomSusB = $result[NomSusB];
$res = mb_query("select nombres+' '+ap_paterno+' '+ap_materno as NomBen from s03a2ben where beneficiario='".$Beneficiario."'");
$result=mssql_fetch_array($res);
$NomBen = $result[NomBen];
$res = mb_query("select Plan_capital, Plan_cuota, Plan_iva from s04a2vta where contrato='".$Contrato."'");
$result=mssql_fetch_array($res);
$SdoPlnCap = $result[Plan_capital];
$SdoPlnCta = $result[Plan_cuota];
$SdoPlnImp = $result[Plan_iva];
$SdoPlnTot = $SdoPlnCap + $SdoPlnCta + $SdoPlnImp;
$res = mb_query("select sum(importe) as PagImp, sum(capital) as PagCap, sum(cuota) as PagCta, sum(iva) as PagIva from s06a1mdc where contrato='".$Contrato."' and origen <> 'Beca' ");
$SdoPagCap = 0;
$SdoPagCta = 0;
$SdoPagImp = 0;
$SdoPagTot = 0;
if (mssql_num_rows($res) > 0) 
   {
   $result=mssql_fetch_array($res);
   $SdoPagCap = $result[PagCap];
   $SdoPagCta = $result[PagCta];
   $SdoPagImp = $result[PagIva];
   $SdoPagTot = $result[PagImp];
   };
$SdoPorTot = $SdoPlnTot - $SdoPagTot;
$SdoPorCta = $SdoPlnCta - $SdoPagCta;
$SdoPorImp = $SdoPlnImp - $SdoPagImp;
$SdoPorCap = $SdoPlnCap - $SdoPagCap;

$res = mb_query("select sum(cuota) as SdoDebCta, sum(iva) as SdoDebImp, sum(capital) as SdoDebCap from s06a1pag where contrato='".$Contrato."' and f_vencimiento <= getdate() ");
$result=mssql_fetch_array($res);
$SdoDebCta = $result[SdoDebCta];
$SdoDebImp = $result[SdoDebImp];
$SdoDebCap = $result[SdoDebCap];
$SdoDebTot = $SdoDebCta + $SdoDebImp + $SdoDebCap;

$SdoVenCta = $SdoDebCta - $SdoPagCta;
$SdoVenImp = $SdoDebImp - $SdoPagImp;
$SdoVenCap = $SdoDebCap - $SdoPagCap;
$SdoVenTot = $SdoDebTot - $SdoPagTot;
if ($SdoVenCta < 0) { $SdoVenCta = 0; };
if ($SdoVenImp < 0) { $SdoVenImp = 0; };
if ($SdoVenCap < 0) { $SdoVenCap = 0; };
if ($SdoVenTot < 0) { $SdoVenTot = 0; };

$CapTot = $SdoPagCap;
$res = mb_query("select sum(interes) as interes from s05a1int where contrato='".$Contrato."'");
$IntAcu = 0;
if (mssql_num_rows($res) > 0) 
   {
   $result=mssql_fetch_array($res);
   $IntAcu = $result[interes];
   };
$res = mb_query("select max(Fecha) as IntFec from s05a1int where contrato='".$Contrato."'");
$IntFec = $FecBas;
if (mssql_num_rows($res) > 0) 
   {
   $result=mssql_fetch_array($res);
   $IntFec = $result[IntFec];
   $IntFec = substr($IntFec,0,11);
   };
   
$res = mb_query("select sum(importe) as RetTot from s06a1mdc where contrato='".$Contrato."' and origen = 'Beca' ");
$RetTot = 0;
if (mssql_num_rows($res) > 0) 
   {
   $result=mssql_fetch_array($res);
   $RetTot = $result[RetTot];
   };
$SdoAcu = $CapTot + $IntAcu + $RetTot;   
?>

<table width="96%" border="1" bordercolor="#3399FF">
  <tr>
    <td width="34%">
      <div align="center"><font size="2" class="Estilo4"><strong>Seleccione Contrato:</strong> 
        </font> 
        <select name="Contrato" class="Estilo3" onChange="submit();">
          <?php
			$result = mb_query("SELECT contrato FROM s04a2vta where suscriptor='".$HlpDskIdeUsu."' or suscriptorb='".$HlpDskIdeUsu."' ORDER BY contrato");
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
    <td width="32%"><p align="center" class="Estilo4"><?php echo $HlpDskDesNom ?>&nbsp; </p>    </td>
    <td width="17%"><p align="center" class="Estilo4"><?php echo $HlpDskDesTip ?>&nbsp;: <?php echo $HlpDskIdeUsu ?></p>    </td>
    <td width="17%"><p align="center" class="Estilo4"><font color="#FFFFFF"><strong><font color="#000000">ESTADO 
        DE CUENTA</font></strong></font></p></td>
  </tr>
</table>

<table width="96%" border="1" bordercolor="#6699FF">
  <tr bordercolor="#6699FF" bgcolor="#CCCCCC"> 
    <td colspan="3"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>ESTADO 
      DE CUENTA</strong></font></td>
    <td><font class="Estilo4">Fecha:</font></td>
    <td><div align="right" class="Estilo4"><?php echo $FecAct ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF"><span class="Estilo4">Suscriptor:</span>      <font class="Estilo4"><?php echo $NomSus ?> / <?php echo $NomSusB ?></font></td>
    <td bordercolor="#6699FF"><div align="center"><?php echo $TipCon ?></div></td>
    <td width="20%" bordercolor="#6699FF"><font size="2" class="Estilo4">No. de Contrato: </font></td>
    <td width="14%" bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Contrato ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF"><span class="Estilo4">Beneficiario:</span><font size="2"> <?php echo $NomBen ?></font></td>
    <td bordercolor="#6699FF"><div align="center"><?php echo $NivCon ?></div></td>
    <td bordercolor="#6699FF"><font size="2" class="Estilo4">Fecha Base:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $FecBas ?></div></td>
  </tr>
  <tr> 
    <td colspan="2" bordercolor="#6699FF" class="Estilo4"><?php echo $DomSus ?>&nbsp;</td>
    <td width="12%" bordercolor="#6699FF"><div align="center"><?php echo $Estatus ?></div></td>
    <td bordercolor="#6699FF"><font size="2" class="Estilo4">Tipo de Plan:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Plan ?></div></td>
  </tr>
  <tr> 
    <td colspan="3" bordercolor="#6699FF" class="Estilo4"><?php echo $ColSus ?>&nbsp;</td>
    <td bordercolor="#6699FF"><font size="2" class="Estilo4">Unidades:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Unidades ?></div></td>
  </tr>
  <tr> 
    <td width="28%" height="21" bordercolor="#6699FF" class="Estilo4"><?php echo $CiuSus ?>&nbsp;</td>
    <td width="26%" bordercolor="#6699FF" class="Estilo4"><?php echo $EdoSus ?>&nbsp;</td>
    <td bordercolor="#6699FF" class="Estilo4"><?php echo $CpoSus ?>&nbsp;</td>
    <td bordercolor="#6699FF"><font class="Estilo4">A&ntilde;o de Rentabilidad:</font></td>
    <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Rentabilidad ?></div></td>
  </tr>
</table>
<table width="96%" border="1" bordercolor="#3366FF">
  <tr bordercolor="#3366FF" bgcolor="#6699CC"> 
    <td width="40%" bgcolor="#CCCCCC"><font color="#000000" face="Times New Roman, Times, serif" class="Estilo4"><strong>SALDO 
      DE CONTRATO</strong></font></td>
    <td width="14%" bgcolor="#CCCCCC">
<div align="center" class="Estilo4"><font color="#000000">Importe Total</font></div></td>
    <td width="14%" bgcolor="#CCCCCC"> <div align="center" class="Estilo4"><font color="#000000">Cuota</font></div></td>
    <td width="16%" bgcolor="#CCCCCC">
<div align="center" class="Estilo4"><font color="#000000">Impuesto</font></div></td>
    <td width="16%" bgcolor="#CCCCCC"> <div align="center" class="Estilo4"><font color="#000000">Capital</font></div></td>
  </tr>
  <tr bordercolor="#3366FF"> 
    <td bgcolor="#FFFFFF"><font color="#000000" class="Estilo4">Monto Contratado del 
      Plan de Becas</font></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPlnTot,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPlnCta,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPlnImp,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPlnCap,2,'.',',') ?></div></td>
  </tr>
  <tr bordercolor="#3366FF"> 
    <td bgcolor="#FFFFFF"><font color="#000000" class="Estilo4">Dep&oacute;sitos efectuados</font>      </td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPagTot,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPagCta,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPagImp,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPagCap,2,'.',',') ?></div></td>
  </tr>
  <tr bordercolor="#3366FF"> 
    <td bgcolor="#FFFFFF"><font color="#000000" class="Estilo4">Total vencido</font></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoVenTot,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoVenCta,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoVenImp,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoVenCap,2,'.',',') ?></div></td>
  </tr>
  <tr bordercolor="#3366FF"> 
    <td bgcolor="#FFFFFF"><font color="#000000" class="Estilo4">Saldo por cubrir de su 
      Plan de Becas</font></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPorTot,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPorCta,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPorImp,2,'.',',') ?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $Pes.number_format($SdoPorCap,2,'.',',') ?></div></td>
  </tr>
</table>
<table width="96%" border="1" bordercolor="#6699FF">
  <tr> 
    <td colspan="5" bordercolor="#6699FF" bgcolor="#CCCCCC"><strong><font size="2" face="Times New Roman, Times, serif">INVERSI&Oacute;N 
      EN EL FIDEICOMISO F/230540-0</font></strong></td>
  </tr>
  <tr> 
    <td width="22%" bordercolor="#6699FF"><div align="center" class="Estilo4">Capital 
        aportado </div></td>
    <td width="16%" bordercolor="#6699FF"><div align="center"><span class="Estilo3">Interes 
        acumulado a</span><font size="2"> <?php echo $IntFec ?></font></div></td>
    <td width="16%" align="center" bordercolor="#6699FF"><div align="center" class="Estilo4">Rendimiento Promedio en el Per&iacute;odo </div></td>
    <td width="21%" bordercolor="#6699FF"><div align="center" class="Estilo4">Retiros</div></td>
    <td width="25%" bordercolor="#6699FF"><div align="center" class="Estilo4">Saldo</div></td>
  </tr>
  <tr> 
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $Pes.number_format($CapTot,2,'.',',') ?></div></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $Pes.number_format($IntAcu,2,'.',',') ?></div></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4">4.42%</div></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $Pes.number_format($RetTot,2,'.',',') ?></div></td>
    <td bordercolor="#6699FF"><div align="center" class="Estilo4"><?php echo $Pes.number_format($SdoAcu,2,'.',',') ?></div></td>
  </tr>
</table>
<table width="96%" height=50 border=1 align=left bordercolor="#6699FF">
  <TBODY>
    <tr bordercolor=#6699FF bgcolor=#CCCCCC> 
      <td colspan=8><font color=#000000 size=2><strong>MOVIMIENTOS REGISTRADOS</strong></font></td>
    </tr>
    <tr bordercolor=#6699FF> 
      <td width="10%" height="19" align="center"><font class="Estilo4">F.Deposito</font></td>
      <td width="9%" align="center"> 
        <div align=left class="Estilo4">Ficha Cie</div></td>
      <td width="5%" align="center"><font class="Estilo4">Pago</font></td>
      <td width="16%"><div align="center" class="Estilo4">Origen</div></td>
      <td width="14%"><div align="center" class="Estilo4">Importe Total</div></td>
      <td width="14%"><div align="center" class="Estilo4">Cuota</div></td>
      <td width="16%"><div align="center" class="Estilo4">Impuesto</div></td>
      <td width="16%"> <div align=center class="Estilo4">Capital</div></td>
    </tr>
  </TBODY>
</table>
<p>&nbsp;</p>
<p>
  <?
$res = mb_query("select f_deposito as FecDep, cie as FicCie, pago as NumPag, origen as CveOri, importe as ImpPag, cuota as CtaPag, iva as IvaPag, capital as CapPag from s06a1mdc where contrato='".$Contrato."'" );
while($result=mssql_fetch_array($res))
{
$FecDep = $result[FecDep];
$FecDep = substr($FecDep,0,11);
$FicCie = $result[FicCie];
$NumPag = $result[NumPag];
$CveOri = $result[CveOri];
$ImpPag = $result[ImpPag];
$CtaPag = $result[CtaPag];
$IvaPag = $result[IvaPag];
$CapPag = $result[CapPag];
?>
<table width="96%">
  <TBODY>
  <td width="10%"><div align="center" class="Estilo4"><?php echo $FecDep ?></div></td>
  <td width="9%"><div align="center" class="Estilo4"><?php echo $FicCie ?></div></td>
  <td width="5%"><div align="center" class="Estilo4"><font size="2"><?php echo $NumPag ?></font></div></td>
  <td width="16%"><div align="center" class="Estilo4"><font size="2"><?php echo $CveOri ?></font></div></td>
  <td width="14%"><div align="center" class="Estilo4"><font size="2"><?php echo $Pes.number_format($ImpPag,2,'.',',') ?></font></div></td>
  <td width="14%"><div align="center" class="Estilo4"><font size="2"><?php echo $Pes.number_format($CtaPag,2,'.',',') ?></font></div></td>
  <td width="16%"><div align="center" class="Estilo4"><font size="2"><?php echo $Pes.number_format($IvaPag,2,'.',',') ?></font></div></td>
  <td width="16%"><div align="center" class="Estilo4"><font size="2"><?php echo $Pes.number_format($CapPag,2,'.',',') ?></font></div></td>
</TBODY>
</table>		
<?
}
?>
<p class="Estilo4"><font color=#996699 face="Arial, Helvetica, sans-serif">Tel&eacute;fonos 
  (0155) 5514-4079, 5514-6638, 5511-7377.</font></p>
<p align=left class="Estilo4"><font "face="Arial, Helvetica, sans-serif" color=#996699><strong>Lada 
  sin costo para el interior de la Republica:</strong></font></p>
<p align=center><strong><img height=70
src="http://www.mb.com.mx/imagenes/01becas.gif" width=228></strong></p>
<p align="left">&nbsp;</p>
<p class="Estilo1">&nbsp;</p>
<p>En los &uacute;ltimos 10 a&ntilde;os, los costos de las universidades han tenido un   incremento superior a la inflaci&oacute;n. Te recomendamos<br />
  acercarte a tu Asesor   para que en caso de que sea conveniente, explores las opciones que tienes para   fortalecer tu Plan de <br />
  Ahorro Educativo.<br />
</p>
<p>Al realizar tus aportaciones en tiempo y forma, tu ahorro generar&aacute; los   rendimientos &oacute;ptimos y mantienes el beneficio de seguro <br />
  en caso de   fallecimiento, protegiendo as&iacute; el futuro educativo de tu hij@.<br />
</p>
<p>Si a&uacute;n no actualizas tu e-mail, o el de tu segundo suscriptor y beneficiario,   ingresa a <a href="http://www.mb.com.mx">www.mb.com.mx</a> y <br />
  ten la   oportunidad de ganar un iPad 2 de 16 GB.<br />
</p>
<p>Nuestro horario de atenci&oacute;n a clientes es de lunes a viernes de 9:00 a 14:00   hrs. y de 16:00 a 17:30 hrs.<br />
</p>
<p class="Estilo1">&nbsp;</p>
<p class="Estilo1"><br />
  . </p>
<p><strong><em>Superando nuevos retos... &iexcl;Seremos los   m&aacute;s GRANDES!</em></strong></p>
<p align="left" class="Estilo1">Liverpool # 24 Piso 5, Col. Ju&aacute;rez, M&eacute;xico, D.F, CP.   06600.</p>
<p align=left class="Estilo4">&nbsp;</p>
<p>&nbsp;</p>
<FONT face=Arial size=2></FONT>
<script src="../mbweb/js/main.js"></script>
</body>
</html>
</form>
</div>
