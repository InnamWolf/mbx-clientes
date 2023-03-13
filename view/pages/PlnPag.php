  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<link rel="stylesheet" href="style/style1.css" />
<style>
  .cajaPrincipal{
    margin: auto;
  }
</style>
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

<div id="cajaPrincipal">
  <form name="suscripcion" action="<?= $_SERVER[PHP_SELF] ?>" method="post">
    <input type="hidden" name="Procesar" value="Enviar">
      <form method="POST" action="PlnPag.php" >
        <?
          if (isset($_POST['Contrato'])){
            $Contrato = $_POST['Contrato'];
          }else{
            $query  = "Select top 1 contrato FROM s04a2vta where suscriptor='".$HlpDskIdeUsu."' or suscriptorb='".$HlpDskIdeUsu."' ORDER BY contrato";
            // echo $query;
            $res = mb_query($query);
            $Contrato = '';
            if (mssql_num_rows($res) > 0){
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
        ?>

        <table width="96%" border="1" bordercolor="#3399FF">
          <tr>
            <td width="34%">
              <div align="center" class="Estilo3">
                <font class="Estilo4"><strong>Seleccione Contrato:</strong></font> 
                <select name="Contrato" class="Estilo3" onChange="submit();">
                  <?php
                    $result = mb_query("SELECT contrato FROM s04a2vta where suscriptor='".$HlpDskIdeUsu."' or suscriptorb='".$HlpDskIdeUsu."' ORDER BY contrato");
                    while ($contratos = mssql_fetch_object($result)){
                      echo "<option value=\"". $contratos->contrato."\"";
                      if ($_POST[Contrato] == $contratos->contrato){
                        echo " selected";
                      }
                      echo ">".$contratos->contrato."</option>";
                    }
                  ?>
                </select>
              </div>
            </td>
            <td width="28%"><p align="center" class="Estilo5"><span class="Estilo5"><?php echo $HlpDskDesNom ?>&nbsp; </p>    </td>
            <td width="16%"><p align="center" class="Estilo4"><?php echo $HlpDskDesTip ?>&nbsp;: <?php echo $HlpDskIdeUsu ?></p>    </td>
            <td width="22%"><p align="center" class="Estilo4"><font color="#FFFFFF"><strong><font color="#000000">PLAN DE PAGOS</font></strong></font></p></td>
          </tr>
        </table>
        <table width="96%" border="1" bordercolor="#6699FF">
          <tr bordercolor="#6699FF" bgcolor="#CCCCCC"> 
            <td colspan="3"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>DATOS DE CONTRATO</strong></font></td>
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
            <td width="26%" bordercolor="#6699FF"><?php echo $EdoSus ?>&nbsp;</td>
            <td bordercolor="#6699FF"><span class="Estilo4">Cod.Pos:</span> <?php echo $CpoSus ?>&nbsp;</td>
            <td bordercolor="#6699FF"><font size="2" class="Estilo4">A&ntilde;o de Rentabilidad:</font></td>
            <td bordercolor="#6699FF"> <div align="right" class="Estilo4"><?php echo $Rentabilidad ?></div></td>
          </tr>
        </table>
        <table width="96%" border="1" bordercolor="#3399FF">
          <tr> 
            <td width="19%"><font color="#FFFFFF"><IMG height=41 src="http://www.mb.com.mx/imagenes/Bancomer.jpg" width=171 border=0></font></td>
            <td width="12%" class="Estilo4"><p align="center" class="Estilo4">No. Convenio</p><p align="center"><strong>9555</strong></p></td>
            <td width="19%"><font color="#FFFFFF"><IMG height=42 src="http://www.mb.com.mx/imagenes/Banamex.jpg" width=174 border=0></font></td>
            <td width="15%" class="Estilo4"><p align="center" class="Estilo4">No. Cuenta</p><p align="center"><strong>947 - 6547382</strong></p></td>
            <td width="21%"><font color="#FFFFFF"><IMG height=42 src="http://www.mb.com.mx/imagenes/Serfin.jpg" width=162 border=0></font></td>
            <td width="14%" class="Estilo5"><p align="center" class="Estilo4">No. Cuenta</p><p align="center"><strong>65501600433</strong></p></td>
          </tr>
        </table>
        <p class="Estilo4">Estimado Suscriptor:</p>
        <p align="justify" class="Estilo4">En el Banco donde realice su aportaci&oacute;n, 
          deber&aacute; indicar al cajero el No. de Convenio &oacute; No. de Cuenta correspondiente, 
          la referencia que se indica en cada pago y su nombre como concepto.</p>
        <p align="justify" class="Estilo4"><strong>Le agradeceremos realizar sus aportaciones 
          en el orden cronol&oacute;gico por su fecha de vencimiento, y verificar que 
          la referencia en su dep&oacute;sito este correcta.</strong></p>
        <p class="Estilo4">Si va a realizar su dep&oacute;sito, con cheque favor de expedirlo 
          a nombre de Banco Santander México S.A. F/2003285.</p>
        <table width="96%" height=54 border=1 align=left bordercolor="#6699FF">
          <TBODY>
            <tr bordercolor=#6699FF bgcolor=#CCCCCC> 
              <td colspan=8><font color=#000000 class="Estilo4"><strong>PLAN DE PAGOS</strong></font></td>
            </tr>
            <tr bordercolor=#6699FF> 
              <td width="10%" height="23"><div align="center" class="Estilo4">F.Vencimiento</div></td>
              <td width="10%"> <div align="center" class="Estilo4">Referencia</div></td>
              <td width="5%"><div align="center" class="Estilo4">No. Pago</div></td>
              <td width="12%"><div align="center" class="Estilo4">Importe</div></td>
              <td width="12%"><div align="center" class="Estilo4">Estatus</div></td>
            </tr>
          </TBODY>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <?
          $res = mb_query("select f_vencimiento as FecVen, RefBco02 as RefBco, numero as NumPag, capital+cuota+iva as ImpPag, estatus as EstPag from s06a1pag where contrato='".$Contrato."'");
          while($result=mssql_fetch_array($res)){
            $FecVen = $result[FecVen];
            $FecVen = substr($FecVen,0,11);
            $RefBco = $result[RefBco];
            $NumPag = $result[NumPag];
            $ImpPag = $result[ImpPag];
            $EstPag = $result[EstPag];
        ?>
            <table width="96%">
              <TBODY>
                <td width="20%"><div align="center" class="Estilo4"><?php echo $FecVen ?></div></td>
                <td width="20%"><div align="center" class="Estilo4"><?php echo $RefBco ?></div></td>
                <td width="16%"><div align="center" class="Estilo4"><font size="2"><?php echo $NumPag ?></font></div></td>
                <td width="22%"><div align="center" class="Estilo4"><?php echo $Pes.number_format($ImpPag,2,'.',',') ?></div></td>
                <td width="22%"><div align="center" class="Estilo4"><?php echo $EstPag ?></div></td>
              </TBODY>
            </table>		
        <?
          }
        ?>
        <p class="Estilo4">Le recordamos que sus dep&oacute;sitos oportunos, favorecen la Inversi&oacute;n Educativa para su hij@.</p>
        <p><span class="Estilo4">Cualquier comentario dirigirlo a:</span><font size="2"> <a href="mailto:ServicioClientes@mb.com.mx">ServicioClientes@mb.com.mx</a></font></p>
        <p>&nbsp;</p>
        <p><font color=#996699 size="2" face="Arial, Helvetica, sans-serif">Tel&eacute;fonos (0155) 5514-4079, 5514-6638, 5511-7377.</font></p>
        <p align=left class="Estilo4"><font "face="Arial, Helvetica, sans-serif" color=#996699><strong>Lada sin costo para el interior de la republica:</strong></font></p>
        <p align=center><strong><img height=70 src="http://www.mb.com.mx/imagenes/01becas.gif" width=228></strong></p>
        <p align=left class="Estilo4"><strong><em>Becas Excelencia una oportunidad para estudiar</em></strong></p>
        <p align=left class="Estilo4">&nbsp;</p>
        <p>&nbsp; </p>
        <FONT face=Arial size=2></FONT>
        <script src="../mbweb/js/main.js"></script>
  </form>
</div>
<script src="../mbweb/js/main.js"></script>