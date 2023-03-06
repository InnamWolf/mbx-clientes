<?php 

//Combierte fecha de MySql(Año-Mes-Dia) a normal(Dia-Mes-Año) 
function cambiaf_a_normal($fecha) 
{  
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);  
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];  
    return $lafecha;  
}  

//Convierte fecha de normal(Dia-Mes-Año) a MySql(Año-Mes-Dia)  

function cambiaf_a_mysql($fecha) 
{  
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);  
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];  
    return $lafecha;  
} 

//Convierte fecha con formato dd/mm/yyyy en dd-mm-yyyy, para poder utilizar la función strtotime y comparar fechas 
function cambiaf_a_otrofor($fecha) 
{ 
      ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);  
    $lafecha=$mifecha[1]."-".$mifecha[2]."-".$mifecha[3];  
    return $lafecha;  
}   

function cambiaf_a_otrofor2($fecha) 
{ 
      ereg( "([0-9]{1,2}) ([0-9]{1,2}) ([0-9]{2,4})", $fecha, $mifecha);  
    $lafecha=$mifecha[1]."-".$mifecha[2]."-".$mifecha[3];  
    return $lafecha;  
}   
?> 