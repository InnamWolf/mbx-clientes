<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:::Mexicana de Becas :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style/style1.css">
<script language="JavaScript">
<!--
javascript:window.history.forward(1);
//--></script>
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
.Estilo4 {color: #4D96D1; }
.Estilo9 {font-family: "Courier New", Courier, monospace; font-size: 14px; }
.Estilo10 {font-size: 14px}
.Estilo11 {font-family: "Century Gothic"}
.Estilo12 {font-family: "Century Gothic"; font-size: 14px; }
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

<body text="#003966" leftmargin="0" topmargin="0">

<div align="center">
  <table width="851" height="588" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="100%" height="564" colspan="3"><div align="justify">
        <table width="110%" height="561" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="561"><form method="post" action="consulta.php" >
                <h1 align="center" class="Estilo4"><img src="images/encabezado.jpg" alt="enca" width="600" height="78" border="0"></h1>
                  <p align="center">
                    <input TYPE="HIDDEN" name="action" VALUE="process">
                    <input TYPE="hidden" NAME="VTI-GROUP" VALUE="0">
                    <input TYPE="HIDDEN" name="action" VALUE="process">
                  </p>
                  <table width=699 height="204" border=0 align="center" cellpadding=0 cellspacing=0>
                    <!--DWLayoutTable-->
                    <tbody>
                      <tr>
                        <td height="19" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="3" valign="top"><label></label></td>
                      </tr>
                      <tr> <font face="Geneva, Arial, Helvetica, sans-serif" size="2"><? echo $problem_str ; ?></font>
                        <td width="170" height="19" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td width="213">&nbsp;</td>
                      </tr>
                        
                      <tr> 
                        <td height="22" colspan="6" valign="top"><label></label></td>
                        <td width="256" height="22" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td height="22" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td width="51">&nbsp;</td>
		              </tr>
                      <tr>
                        <td height="29" colspan="7" valign="top"><div align="right" class="Estilo9">
                          <input name="radio" type="radio" value="Contrato"  checked >
                          <span class="Estilo11">Ingresa N&uacute;mero de Contrato:</span></div></td>
                        <td height="29" valign="top"><span class="Estilo9">
                        <input name="contrato" type="text" id="contrato" value="<? echo $contrato ?>" size="10" maxlength="6">
* </span></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="22" colspan="7" valign="top"><div align="right" class="Estilo12">Ingresa la fecha de tu Nacimiento (dd/mm/aaaa):</div></td>
                        <td height="22" valign="top"><span class="Estilo9">
                        <input name="fnaci" type="text" class="test" id="fnaci" size="10" maxlength="10" />
                        </span><span class="Estilo10"><a href="#" class="hintanchor" onMouseover="showhint('Digita Tu Fecha de Nacimiento. <b>Como:</b> <br>dd/mm/aaaa. <br> <b>Ejemplo 1:</b> 3 de Nov. de 1961  Ingresa: 03/11/1961<br> <b>Ejemplo 2:</b> 26 de Agosto de 1974 <br> Ingresa: 26/08/1974', this, event, '200px')">[ejemplo?]</a></span></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="22" colspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="43" colspan="8" valign="top"><div align="center" class="Estilo9">
                          <input name="Mandar" type="submit" id="Mandar" value="enviar">
                          <input name="Limpiar" type="reset" id="Limpiar" value="borrar">
                        </div>                      
                          <span class="Estilo9">
                          <label></label>
                          </span></td>
                      </tr>
                        
                      <tr>
                        <td height="28" colspan="8" valign="top"><div align="center" class="Estilo9">*Dato Necesario para validar su participaci&oacute;n </div></td>
                      </tr>
                    </tbody>
                </table>
                  <p align="center"><img src="images/piedepagina.jpg" alt="pie" width="600" height="194" border="0" usemap="#Map"></p>
            </form></td>
          </tr>
      </table>      </td>
    </tr>
      
    <tr> 
      <td height="24" colspan="3"><div align="center"> 
          <h6><?php include '../../includes/webmaster2.php';	 ?></h6>
      </div></td>
    </tr>
  </table>
</div>
<p align="center">&nbsp;</p>


<map name="Map">
  <area shape="rect" coords="427,54,589,134" href="http://www.mbexcelencia.com/index.php?option=com_content&view=article&id=404" target="_parent">
</map></body>
</html>