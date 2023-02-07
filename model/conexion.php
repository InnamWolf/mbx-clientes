<?php

class Conexion{

   static public function conectar(){

   //* ===============================================
   //* Local
   //* ===============================================   
   
     $link = new PDO("mysql:host=localhost;dbname=mexicana",
                    "root",
                    ""); 

   //* ===============================================
   //* Servidor
   //* ===============================================
/* 
    $link = new PDO("mysql:host=localhost;dbname=nombre_bd",
			            "usuario_bd",
			            "password_bd"); 
     */
    
    $link->exec("set names utf8");

    return $link;

   }
}