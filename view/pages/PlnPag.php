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
    $reportes["FecAct"] = substr($reportes["FecAct"],0,11);
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
    
  <table width="96%">
    <tr>
      <td colspan="6">
        <p class="Estilo4">Estimado Suscriptor:</p>
        <p align="justify" class="Estilo4">En el Banco donde realice su aportaci&oacute;n, 
        deber&aacute; indicar al cajero el No. de Convenio &oacute; No. de Cuenta correspondiente, 
        la referencia que se indica en cada pago y su nombre como concepto.</p>
        <p align="justify" class="Estilo4"><strong>Le agradeceremos realizar sus aportaciones 
        en el orden cronol&oacute;gico por su fecha de vencimiento, y verificar que 
        la referencia en su dep&oacute;sito este correcta.</strong></p>
        <p class="Estilo4">Si va a realizar su dep&oacute;sito, con cheque favor de expedirlo 
        a nombre de Banco Santander México S.A. F/2003285.</p>
      </td>
    </tr>
  </table>

  <table width="96%" border="1" bordercolor="#3399FF">
    <tr bordercolor="#6699FF" bgcolor="#CCCCCC">
      <td colspan="6"><font color=#000000 class="Estilo4"><strong>PLAN DE PAGOS</strong></font></td>
    </tr>
    <tr>
      <td width="10%" height="23"><div align="center" class="Estilo4">F.Vencimiento</div></td>
      <td colspan="2" width="10%"> <div align="center" class="Estilo4">Referencia</div></td>
      <td width="5%"><div align="center" class="Estilo4">No. Pago</div></td>
      <td width="12%"><div align="center" class="Estilo4">Importe</div></td>
      <td width="12%"><div align="center" class="Estilo4">Estatus</div></td>
    </tr>
  </table>
  
    <?php    
      $valor = $reportes["Contrato"];
      $respuesta = ControladorReportes::ctrMostrarPagos($valor);  
      foreach($respuesta as $key => $pagos){
        $FecVen = $pagos["FecVen"];
        $FecVen = substr($FecVen,0,11);
          
        echo '<table width="96%">
          <tr>
            <td width="20%"><div align="center" class="Estilo4">' . $FecVen . '</div></td>
            <td colspan="2" width="20%"><div align="center" class="Estilo4">'.  $pagos["RefBco"] .'</div></td>
            <td width="16%"><div align="center" class="Estilo4"><font size="2">'.  $pagos["NumPag"] .'</font></div></td>
            <td width="22%"><div align="center" class="Estilo4">'.  $Pes.number_format($pagos["ImpPag"],2,'.',',') .'</div></td>
            <td width="22%"><div align="center" class="Estilo4">'.  $pagos["EstPag"] .'</div></td>
          </tr>
        </table>';
      }
    ?>
  
  <table width="96%">
    <tr>
      <td colspan="6">
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
      </td>
    </tr>
  </table>
</div>