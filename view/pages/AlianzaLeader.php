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
<link rel="stylesheet" href="style/style1.css">
<style type="text/css">
#cajaPrincipal a {
	text-align: center;
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


<table width="200" border="0" align="center">
  <tr>
    <th scope="row"><a href="https://www.leadersummaries.com/acceso_corp/mexicanadb/uSH1WU61TvZwEc242dEbVyei8TQZYvL32LaD4hv4X28IYsO6V3" target="_parent"><img src="Banner-LS-animado.gif" width="164" height="231" alt="Al"></a></th>
  </tr>
</table>
</div>
<script src="../mbweb/js/main.js"></script>