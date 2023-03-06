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
        <td colspan ="2" width="22%"><p align="center" class="Estilo4"><font color="#FFFFFF"><strong><font color="#000000">ESTADO DE CUENTA</font></strong></font></p></td>
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
      <td colspan="4"><font face="Times New Roman, Times, serif" class="Estilo4"><strong>ESTADO DE CUENTA</strong></font></td>
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



  <table >
    <tr>
      <td width="100" bgcolor="#28367E"><div align="center"><span class="for_ie_left_s">&nbsp;Contrato</span></div></td>
      <td width="300" bgcolor="#28367E"><div align="center"><span class="for_ie_left_s">&nbsp;No. de Expediente</span></div></td>
      <td width="50" bgcolor="#28367E"><span class="for_ie_left_s">&nbsp;</span></td>
    </tr>
  </table>

  <?php
    $valor = $_POST["Contrato"];
    $mostrarPDF = ControladorReportes::ctrMostrarPDF($valor);
  ?>

<table width="473" >
  <tr>
    <td width="113" bgcolor="#DDDDDD"><div align="center"><span class="for_ie_center2"><? echo $mostrarPDF["Contrato"] ?></span></div></td>
    <td width="113" bgcolor="#DDDDDD"><div align="center"><span class="for_ie_center2"><? echo $mostrarPDF["ClaveEmpleado"] ?></span></div></td>
  </tr>
</table>	

<table>
  <iframe src="<? echo $mostrarPDF["ruta"] ?>"></iframe>
</table>
 
<style type="text/css"> 
  iframe { margin:50; padding:100; height:100%;  } 
  iframe { display:block; width:90%;height:600px; border:none; } 
</style>




        




