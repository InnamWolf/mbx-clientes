
<?
/* establecer la conexión a la DB */
include("include/variables.inc.php");

// Busqueda. Los campos del formulario se deben llamar igual que de la tabla
//$sql = "SELECT * FROM s04v1sus WHERE contrato= '$contrato' ";
///////////////////////////////////////////////////
//echo "$banderasus";
//echo "$contrato";
//////////////////////////////////////////////////////////
/*$sql = "SELECT vta.contrato,vta.suscriptor,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato' and vta.suscriptor=sus.suscriptor";*/
if ($banderasus!=1){
$sql ="SELECT vta.contrato,vta.suscriptor,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres,sus.f_nacimiento,sus.email  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato'  and vta.suscriptor=sus.suscriptor";
}
else
{
$sql ="SELECT vta.contrato,vta.suscriptorb,sus.suscriptor,sus.ap_paterno,sus.ap_materno,sus.nombres,sus.f_nacimiento,sus.email  FROM s04a2vta as vta, s03a2sus as sus WHERE vta.contrato= '$contrato'  and vta.suscriptorb=sus.suscriptor";
}
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
   // echo "Bienvenido:  $contrato[5] $contrato[3] $contrato[4]\n";
	
	$Suscriptor="$contrato[5] $contrato[3] $contrato[4]";
	$sus="$contrato[1]";
	$emailsus="$contrato[7]";
	$contrato="$contrato[0]";
	
//	echo "este deberia ser el correo $Suscriptor $emailsus $contrato[0] $contrato[1] $contrato[2] $contrato[3] $contrato[4] $contrato[5]";

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
	font-family: "Courier New", Courier, monospace;
	font-size: 16px;
}
.Estilo9 {font-family: "Courier New", Courier, monospace; font-size: 14px; }
.Estilo10 {color: #000000}
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
      <td height="103"><div align="center" class="Estilo9"> <h4><span class="Estilo10">Estimado suscriptor </span><span class="Estilo5"><? echo $Suscriptor ?></span></h4>
      <div>
        <p align="justify">Le informamos que de las aportaciones correspondientes a su Plan de Ahorro Educativo contratado, &uacute;nicamente podr&aacute; facturar aquellas que se realicen por concepto de Gasto de Administraci&oacute;n.<br>
          <br>
          La solicitud de la factura deber&aacute; hacerse 4 d&iacute;as h&aacute;biles despu&eacute;s de la fecha en que realiz&oacute; su dep&oacute;sito para que &eacute;ste se vea reflejado en su plan de pagos. <br>
          <br>
          Es importante tomar en cuenta que s&oacute;lo podr&aacute; facturar aquellos dep&oacute;sitos del mes en curso. Los dep&oacute;sitos que se realicen en los &uacute;ltimos d&iacute;as del mes, la factura se expedir&aacute; con fecha del mes siguiente.<br>
          <br>
          Si se requiere cambio de factura por error en sus datos fiscales, favor de comunicarse al Departamento de Atenci&oacute;n a Clientes a los tel&eacute;fonos <br>
          5511 7377 -1450 4700 - 01 800 23 22 700 extensiones 122, 223 y 117. </p>
        <p align="center"><br>
          Nota: Por ning&uacute;n motivo se expedir&aacute;n facturas correspondientes <br>
          a dep&oacute;sitos efectuados en meses anteriores<br>
        </p>
      </div>
      Nuestro sistema tiene como datos de contacto el siguiente Correo: <a href="mailto:<? echo $emailsus ?>"><? echo $emailsus ?><a href="#" class="hintanchor" onMouseover="showhint('Mexicana de Becas comprometido con usted;<br>  Estimado Suscriptor le pide sea tan amable,<br> verifique su cuenta de correo ya que a trav&eacute;s de esta usted podr&aacute; tener accceso a informaci&oacute;n tales como:<br> Convenios Frecuentes, Entrega de Becas, Eventos de Becas, Publicaciones, Plan de Pagos, Estados de Cuenta y m&aacute;s.<br> Adem&aacute;s de que esta sera el conducto de informarle los resultados de toda promoci&oacute;n o concurso. y sobre TODO RECIBIRA LA INFORMACION DE USUARIO Y CONTRASE&Ntilde;A PARA EL USO DE LOS SERVICIOS QUE MEXICANA DE BECAS LE OFRECE. <b>GRACIAS</b>', this, event, '200px')">[?]</a><? print ("<a href=\"Updatemail.php?contrato='$contrato'&sus='$sus'\"><img src='images/actualizar_thumbnail.jpg' border='0'></a>"); ?></div>
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
             Al Contrato:<? echo $contrato ?> <br>
             <br>
           </div>
         </div>
         </div></td>
    </tr>
    <tr>
      <td height="21"><div align="right" class="Estilo9"><a href="http://www.becasmb.com/MBline/factmbdom/PlnPagFact.php">Regresar a Facturar</a></div></td>
    </tr>
  </table>
  <p align="left"><span class="Estilo7">Tus Datos Para Facturaci&oacute;n Son:</span> </p>
</form>

<?
   
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
?>


</body>
</html>
