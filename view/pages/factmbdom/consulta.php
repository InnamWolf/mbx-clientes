
<?php
//- Mail de admin y Headers
//include("mail/mail_data.inc.php");
//include("mail/mail_data.inc.php");
setlocale(LC_TIME, 'es_MX'); // para español de mexico
require("fechas.php"); 

if(isset($_GET["action"])){
	$action = $_GET["action"];
}elseif(isset($_POST["action"])){
	$action = $_POST["action"];
}
$contrato = $_POST["contrato"];
$fnaci = $_POST["fnaci"];
$tipo=$_POST["radio"];
$bandera=0;
$fecha=getdate(strtotime(cambiaf_a_otrofor("$fnaci")));
$dia=$fecha["mday"];
$mes=$fecha["mon"];
  $mes=str_replace("1",'01',$mes);
   $mes=str_replace("2",'02',$mes);
   $mes=str_replace("3",'03',$mes);
   $mes=str_replace("4",'04',$mes);
   $mes=str_replace("5",'05',$mes);
   $mes=str_replace("6",'06',$mes);
   $mes=str_replace("7",'07',$mes);
   $mes=str_replace("8",'08',$mes);
   $mes=str_replace("9",'09',$mes);
   $mes=str_replace("010",'10',$mes);
   $mes=str_replace("101",'11',$mes);
   $mes=str_replace("102",'12',$mes);
$ano=$fecha["year"];

$fnaci=mktime(0,0,0,$mes,$dia,$ano);  //fecha de ingreso de Usuario


 $problem = false;
    if ($action == "process")
    {
        $problem_str = "";
        /* validaciones */
        /****************/
       if ( isset($contrato) and $contrato == "" )
        {
            $problem_str .= "<li>El campo Contrato  no fue completado</li>";
            $problem = true;
        }
       if ( isset($fnaci) and $fnaci == "" )
        {
            $problem_str .= "<li>El campo Fecha de Nacimiento no fue completado</li>";
            $problem = true;
        }
        if ($problem)
        {
            unset($action);
        }
    }

    if ( $action == "process" && !$problem )
    {		
 
	//valores que se hacen cuando se procesa el formulario acciones grabar en base, enviar mail,etc
	///////////////////////
	
	/* establecer la conexión a la DB */
include("include/variables.inc.php");
//include("rifalaptop.php");
// Busqueda. Los campos del formulario se deben llamar igual que de la tabla
//$sql = "SELECT * FROM s04v1sus WHERE contrato= '$contrato' ";
//////////////////////////////------------------///////////////////////////////////
if ($tipo=='Contrato'){
// echo "contrato se deja igual para que tome el valor de contrato";
}else{
//echo "$contrato";  
//echo "Solicitud busco la solicitud con un query y me traigo al contrato y relaciono numero solicitud con el contrato";
$sql = "SELECT vta.contrato,vta.solicitud FROM s04a2vta as vta WHERE vta.solicitud= '$contrato'";
// Coloca los resultados en la variable $result
$result = mssql_query($sql);
$num = mssql_num_rows($result);
if ($num != "0") {
While ($name = mssql_fetch_row($result)) {
   //echo "Bienvenido $name[0] Alias: $name[1] \n";
 $contrato = "$name[0]";
 //echo "$contrato";  
}
mssql_free_result($result);

} 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
/////////////////////////////////-------------------------------//////////////////
//////////////

$sql = "SELECT vta.contrato,vta.suscriptor,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres,sus.f_nacimiento,sus.email  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato'  and vta.suscriptor=sus.suscriptor";
//echo "$contrato"; 
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
	$sus="$contrato[1]";
	$Suscriptor="$contrato[5] $contrato[3] $contrato[4]";
	$emailsus="$contrato[7]";
	$fecha="$contrato[6]";
   $contrato="$contrato[0]";
	//$transf = strtotime($fecha);     
   // $mostrar = date("d/m/Y", $transf); 
    $fechacad=strtoupper($fecha);
			 //Reemplazo los [Nombres del Mes] por el número correspondiente:   
   $fechacad=str_replace("ENE",'01',$fechacad);
   $fechacad=str_replace("FEB",'02',$fechacad);
   $fechacad=str_replace("MAR",'03',$fechacad);
   $fechacad=str_replace("ABR",'04',$fechacad);
   $fechacad=str_replace("MAY",'05',$fechacad);
   $fechacad=str_replace("JUN",'06',$fechacad);
   $fechacad=str_replace("JUL",'07',$fechacad);
   $fechacad=str_replace("AGO",'08',$fechacad);
   $fechacad=str_replace("SEP",'09',$fechacad);
   $fechacad=str_replace("OCT",'10',$fechacad);
   $fechacad=str_replace("NOV",'11',$fechacad);
   $fechacad=str_replace("DIC",'12',$fechacad);
 //  $fechacad=getdate(strtotime(cambiaf_a_otrofor2("$fechacad"))); 
  $fechacad=str_replace(" ",'-',$fechacad);
  //
  $fechabd=substr($fechacad, 0, 10);
  $fm=substr($fechabd, 0,2);
  $fd=substr($fechabd, 3,2);
  $fy=substr($fechabd, 6,10);
  $mostrar=mktime(0,0,0,$fm,$fd,$fy);   //fecha de base de datos
	//echo "$contrato"; 
  //  echo "$mostrar";
   if($fnaci!=$mostrar){
 // echo "Lo Siento pero su fecha de Nacimiento No es Correcta";
 //////////////////////////
$bandera=7;
 $sql = "SELECT vta.contrato,vta.suscriptorb,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres,sus.f_nacimiento,sus.email  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato'  and vta.suscriptorb=sus.suscriptor";

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
  //  $contrato="$contrato[0]";  
    $sus="$contrato[1]";
	$Suscriptor="$contrato[5] $contrato[3] $contrato[4]";
	$emailsus="$contrato[7]";
	$fecha="$contrato[6]";
   $contrato="$contrato[0]";
	$transf = strtotime($fecha);     
    $mostrar = date("d/m/Y", $transf);  
//	echo "valor de $contrato";
  // echo "valor de $contrato";
  // echo "$sus";
    $contra="$contrato";
	$banderasus=1;
 }
 }
 }
 
 
   if($fnaci!=$mostrar){
   ///////////////////////////////////
    
 ///////////////////////////////
  ?>
  <html>
<body text="#003966">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
    <tr>
      <td>
	  <div align="center"> 
	    <p><font face="Geneva, Arial, Helvetica, sans-serif" size="2"> 
	      Gracias por contactar a <strong>  Mexicana de becas.</strong><br>
	      <h4><br>
	      Su Fecha de Nacimiento No Corresponde al Contrato de Nuestra Base de Datos, &iexcl;<a href="index.php">Intentelo de Nuevo</a>!<font face="Geneva, Arial, Helvetica, sans-serif" size="2"><br>
	      </h4>
          <strong>Mexicana de Becas </strong><br>
          Liverpool N&deg; 24, Piso 5.<br>
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
  exit;
  }	
 if ($bandera==7){
 $contrato = $_POST["contrato"];
 $contrato= "$contra";

 }else{
 //echo "hasta $contrato";
  } 
 // if (trim($emailsus)==""){
  $infor="Actualiza tu Correo Da un Click en Actualizar ";
  $infor1="";
//  }
	?>
	<html>
<head>
<title>:::Mexicana de Becas :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style/style1.css">

<style type="text/css">

#hintbox{ /*CSS for pop up hint box */
position:absolute;
top: 0;
background-color: lightyellow;
width: 150px; /*Default width of hint.*/ 
padding: 3px;
border:1px solid black;
font:normal 11px Verdana;
z-index:100;
border-right: 3px solid black;
border-bottom: 3px solid black;
visibility: hidden;
}

.hintanchor{ /*CSS for link that shows hint onmouseover*/
font-weight: bold;
color: navy;
margin: 3px 8px;
}
.Estilo5 {color: #EE2424}
.Estilo7 {
	font-weight: bold;
	color: navy;
	margin: 3px 8px;
	font-family: "Century Gothic";
	font-size: 16px;
}
.Estilo9 {font-family: "Courier New", Courier, monospace; font-size: 14px; }
.Estilo10 {color: #000000}
.Estilo11 {font-family: "Century Gothic"}
.Estilo12 {font-family: "Century Gothic"; font-size: 18px; }
</style>

<script type="text/javascript">

/***********************************************
* Show Hint script- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
		
var horizontal_offset="9px" //horizontal offset of hint box from anchor link

/////No further editting needed

var vertical_offset="0" //horizontal offset of hint box from anchor link. No need to change.
var ie=document.all
var ns6=document.getElementById&&!document.all

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=(whichedge=="rightedge")? parseInt(horizontal_offset)*-1 : parseInt(vertical_offset)*-1
if (whichedge=="rightedge"){
var windowedge=ie && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-30 : window.pageXOffset+window.innerWidth-40
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure+obj.offsetWidth+parseInt(horizontal_offset)
}
else{
var windowedge=ie && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetHeight
}
return edgeoffset
}

function showhint(menucontents, obj, e, tipwidth){
if ((ie||ns6) && document.getElementById("hintbox")){
dropmenuobj=document.getElementById("hintbox")
dropmenuobj.innerHTML=menucontents
dropmenuobj.style.left=dropmenuobj.style.top=-500
if (tipwidth!=""){
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=tipwidth
}
dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+obj.offsetWidth+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+"px"
dropmenuobj.style.visibility="visible"
obj.onmouseout=hidetip
}
}

function hidetip(e){
dropmenuobj.style.visibility="hidden"
dropmenuobj.style.left="-500px"
}

function createhintbox(){
var divblock=document.createElement("div")
divblock.setAttribute("id", "hintbox")
document.body.appendChild(divblock)
}

if (window.addEventListener)
window.addEventListener("load", createhintbox, false)
else if (window.attachEvent)
window.attachEvent("onload", createhintbox)
else if (document.getElementById)
window.onload=createhintbox

</script>
</head>
<body>
<form action="alta.php"  method="post">
  <table width="1051" height="255" border="1" align="center" bordercolor="#000099">
    <tr>
      <td width="999" height="103"><div align="center"><span class="Estilo5"><img src="images/encabezado.jpg" width="600" height="78" alt="enca"></span></div></td>
    </tr>
    <tr><p align="center"></p>
      <td height="103"><div align="center" class="Estilo9"> <h4 class="Estilo11"><span class="Estilo10">Estimado suscriptor </span><span class="Estilo5"><? echo $Suscriptor ?></span></h4>
      <div>
        <p class="Estilo11">Le informamos que &uacute;nicamente podr&aacute; solicitar factura por el importe que corresponda al pago de&nbsp;la Cuota de Administraci&oacute;n m&aacute;s IVA.&nbsp;</p>
        <p class="Estilo11">Para&nbsp;esto, le pedimos&nbsp;esperar un promedio de 3 a 4 d&iacute;as h&aacute;biles despu&eacute;s de la fecha en que realiza su dep&oacute;sito, para que&nbsp;se vea reflejada la cuota de administraci&oacute;n de su pago&nbsp;y pueda solicitar su&nbsp;factura. Cumpliendo &eacute;ste periodo, tendr&aacute;&nbsp;de plazo para facturar, tantos d&iacute;as como resten para terminar el mes corriente.</p>
        <p class="Estilo11">Si usted realiza un dep&oacute;sito en los &uacute;ltimos d&iacute;as del mes, su cuota de administraci&oacute;n se facturara en el mes siguiente a la fecha en que deposit&oacute;, siguiendo la regla de que se refleja la cuota de 3 a 4 d&iacute;as h&aacute;biles despu&eacute;s de la fecha de dep&oacute;sito.</p>
        <p class="Estilo11">Por ning&uacute;n motivo podr&aacute; facturar&nbsp;dep&oacute;sitos de meses anteriores.<br>
        </p>
        <p><span class="Estilo11">En caso de requerir un cambio de factura por error en sus datos fiscales favor de comunicarse al &Aacute;rea de Atenci&oacute;n a Clientes a los tel&eacute;fonos 5511-7377  1450-4700 &oacute; al 01800-2322-700 extensiones 122, 223 &oacute; 117.</span><br>
        </p>
      </div>
      <span class="Estilo11">Nuestro sistema tiene como datos de contacto el siguiente Correo: <a href="mailto:<? echo $emailsus ?>"><? echo $emailsus ?><a href="#" class="hintanchor" onMouseover="showhint('Mexicana de Becas comprometido con usted;<br>  Estimado Suscriptor le pide sea tan amable,<br> verifique su cuenta de correo ya que a trav&eacute;s de esta usted podr&aacute; tener accceso a informaci&oacute;n tales como:<br> Convenios Frecuentes, Entrega de Becas, Eventos de Becas, Publicaciones, Plan de Pagos, Estados de Cuenta y m&aacute;s.<br> Adem&aacute;s de que esta sera el conducto de informarle los resultados de toda promoci&oacute;n o concurso. y sobre TODO RECIBIRA LA INFORMACION DE USUARIO Y CONTRASE&Ntilde;A PARA EL USO DE LOS SERVICIOS QUE MEXICANA DE BECAS LE OFRECE. <b>GRACIAS</b>', this, event, '200px')">[?]</a><? print ("<a href=\"Updatemail.php?contrato='$contrato'&sus='$sus'\"><img src='images/actualizar_thumbnail.jpg' border='0'></a>"); ?></span></div>
		 <p class="Estilo9">
		   <input TYPE="HIDDEN" name="Suscriptor" VALUE="<? echo $Suscriptor ?>">
		   </h3>
		   <input TYPE="HIDDEN" name="contratos" VALUE="<? echo $contrato ?>">
		   <input TYPE="HIDDEN" name="banderasus" VALUE="<? echo $banderasus ?>">
		   <input TYPE="HIDDEN" name="emailsusc" VALUE="<? echo $emailsus ?>">
	    </p>
		 <div class="Estilo9">
           <div align="center">
           <!--  <input type="submit" name="Submit" value="Agregar datos de facturación">   !-->
             <span class="Estilo11">Al Contrato:<? echo $contrato ?> </span><br>
             <br>
           </div>
         </div>
         </div></td>
    </tr>
    <tr>
      <td height="21"><div align="right" class="Estilo9"><a href="http://www.becasmb.com/MBline/factmbdom/evenfactmb" class="Estilo12">Salir</a></div></td>
    </tr>
  </table>
  <p align="left"><span class="Estilo7">Tus Datos Para Facturaci&oacute;n Son:</span> </p>
</form>
</body>
</html>
<?
   ///
 /*  if ($contrato == "")
            {$contrato = '%';}*/
 
            $result = mssql_query ("SELECT * FROM s38Fisdom WHERE contrato='$contrato'");
		
	
            if ($row = mssql_fetch_array($result)) {

                            do {
							   
							 
                              print ("<table><tr><td>");
							   print ("<b>Contrato:                    </b>");
                              print $row["Contrato"];
							   print ("<br>");
                              print ("<b>Razón Social:               </b>");
                              print $row["RazonSocial"];
							  print ("<br>");
                               print ("<b>RFC:                       </b> ");
                              print $row["RFC"];
							  print ("<br>");
							   print ("<b>Calle:                      </b>");
                              print $row["Calle"];
							  print ("<br>");
							   print ("<b>Número Exterior:            </b>");
                              print $row["NumeroExt"];
							  print ("<br>");
							   print ("<b>Número Interior:            </b>");
                              print $row["NumeroInt"];
							  print ("<br>");
							   print ("<b>Colonia:                    </b>");
                              print $row["Colonia"];
							  print ("<br>");
							   print ("<b>Municipio:                  </b>");
                              print $row["Municipio"];
							  print ("<br>");
							   print ("<b>Estado:                     </b>");
                              print $row["Estado"];
							  print ("<br>");
							   print ("<b>País:                       </b>");
                              print $row["Pais"];
							  print ("<br>");
							   print ("<b>Código Postal:              </b>");
                              print $row["cp"];
							  print ("<br>");
                                 print ("<b>E-mail:                     </b>");
                              print ("</b> ");
                              print ("<a href=mailto:");
                              print $row["email"];
                              print (">");
                              print $row["email"];
                              print ("</a>");
							  print ("<br>");
							  print ("<b>Fecha de Alta:               </b>");
							  print $row["fecha"];
                              print ("</td></tr></table>");
                              print ("<hr width=400 align=left size=1>");

               } while($row = mssql_fetch_array($result));

      } else {print "<h4>Estimado suscriptor aún no haz registrado Sus datos de facturación. </h4>";
	   print ("<a href=\"alta.php?Secuencia=$row[Secuencia]&contrato=$contrato&banderasus=$banderasus\"><img src='images/Alta.png' border='0'></a></td><td>");}  
}

mssql_free_result($result);

//echo " <p>Est&aacutes autorizado.;Bienvenido $name!</p>";


}
else {
?>
<!--echo "Su Contrato No existe en La base de Datos";-->
<html>
<body text="#003966">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
		<tr>
		  <td>
		  <div align="center"> 
			<p><font face="Geneva, Arial, Helvetica, sans-serif" size="2"> 
			  Gracias por contactar a <strong>  Mexicana de becas.</strong><br>
			  <h4><br>
			  Su Contrato o Solicitud No Aparece en Nuestra Base de Datos, &iexcl;<a href="index.php">Intentelo de Nuevo</a>!</font><font face="Geneva, Arial, Helvetica, sans-serif" size="2"><br></h4>
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
			  </font></p>
			</div>
		  </td>
		</tr>
	</table>
<p>&nbsp;</p>

</body>
</html>
<?
}

	
	////////////////////////////////

?>

<!--valores que se ponen cuando se envia el formulario y aparece este mensaje, por ejemplo agardecimiendto por participar, etc.-->
    <?
    }
    else
    {
	include("portada.php");
        ?>

<!-- formulario de presentacion -->


<?
    }

	
?>
