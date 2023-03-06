<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edo de Cuenta 2015</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type='text/javascript' src="js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.js" ></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
.for_ie {
	
color: #444444;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px; 

	}

.for_ie_left {
	
color: #444444;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px; 	
text-align: left;
	}
	
	.for_ie_center {
	
color: #BC9111;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px; 	
text-align: center;
	}
	
	.for_ie_center2 {
	
color: #444444;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px; 	
text-align: center;
	}
	
	.for_ie_left_s {
	
color: #BC9111;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px; 	
text-align: center;
	}
	
.for_ie_left_w {
	
color: #FFFFFF;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px; 	
text-align: left;
	}
</style>

<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$(".example1").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			
		});
</script>
</head>

<body>

<?php




session_name("helpdesk");
session_start();
$HlpDskDesNom = $_SESSION[HlpDskDesNom];
$HlpDskDesTip = $_SESSION[HlpDskDesTip];

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
<link rel="stylesheet" href="style/style1.css">
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
.for_ie_center2 {	
color: #444444;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px; 	
text-align: center;
}
.for_ie_left_s {	
color: #BC9111;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px; 	
text-align: center;
}
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
<table >
 <tr>
    <td width="100" bgcolor="#28367E"><div align="center"><span class="for_ie_left_s">&nbsp;Contrato</span></div></td>
    <td width="300" bgcolor="#28367E"><div align="center"><span class="for_ie_left_s">&nbsp;No. de Expediente</span></div></td>
    <td width="50" bgcolor="#28367E"><span class="for_ie_left_s">&nbsp;</span></td>
   
  </tr>
</table>
 <?
//$res = mb_query("SELECT * FROM EdoCtaFidPDF2012 where suscriptor='".$HlpDskIdeUsu."'  ORDER BY contrato" );
$res = mb_query("select * from EdoCtaFidPDF2022 where contrato='".$Contrato."'" );
while($result=mssql_fetch_array($res))
{
$contrato = $result[Contrato];
$Clave = $result[ClaveEmpleado];
$ruta = $result[ruta];

?>
<table width="473" >
  
 <tr>
    <td width="113" bgcolor="#DDDDDD"><div align="center"><span class="for_ie_center2"><?php echo $contrato ?></span></div></td>
    <td width="113" bgcolor="#DDDDDD"><div align="center"><span class="for_ie_center2"><?php echo $Clave ?></span></div></td>
  
  </tr>

</table>	
<iframe src="<?php echo $ruta ?>"></iframe> <style type="text/css"> html, body, div, iframe { margin:50; padding:100; height:100%;  } iframe { display:block; width:90%;height:600px; border:none; } </style> 	
<?
}
?>
<script src="../mbweb/js/main.js"></script>
</body>
</html>
