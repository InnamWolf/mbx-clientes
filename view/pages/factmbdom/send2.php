<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?PHP  

////Creado por miguel Arratia////    
$email = "miguel.arratia@mb.com.mx";
$mail_admin = "$email";

//-Headers: Se puede Modificar el From
$headers  = "MIME-Version: 1.0\n";//No Modificar
$headers .= "Content-type: text/html; charset=iso-8859-1\n";//No Modificar
//$headers .= "From: $nombre $mail\n";
$headers .= "From: Crm <soporte@mb.com.mx>\n";

$message2 = <<<MAIL2
Informacion de Referidos desde Mexicana de Becas<br>
Contrato: $contratos<br>
Secuencia: $contador
Nombre: $Nombre
Apellido Paterno: $ApellidoP
Apellido Materno: $ApellidoM<br>
MAIL2;

$subject = "Informacion De Referidos Campaña a Boca en Boca";

mail($email, $subject, $message2, $headers);



?> 
</body>
</html>
