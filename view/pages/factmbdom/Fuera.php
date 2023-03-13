<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

   <?php
 //  echo date("r");
   
  //echo date("G:H:s"); 
 // echo "</br>";
//   echo date("H:i:s");
//   echo "</br>";
 //   echo date("G:H:s");
 
 $hora= date ("h:i:s");
 $fecha= date ("j/n/Y");
// echo $hora;
 // echo "</br>";
// echo $fecha;
   $horActual = date("h:i:s");
 //  echo "$horActual";
   
   if (($horActual>= '09:30') and ($horActual<= '17:30')) {
      echo "factura";
   } 
   else{
      echo "No factura";
   }
   ?>

</body>
</html>
