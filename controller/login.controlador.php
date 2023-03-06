<?php

class ControladorUsuarios{

  static public function ctrIngresoUsuario(){

    if(isset($_POST["HlpDskCveUsu"]) && isset($_POST["HlpDskNipUsu"])){

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["HlpDskCveUsu"]) &&
      preg_match('/^[a-zA-Z0-9]+$/', $_POST["HlpDskNipUsu"]) ){

        $tabla = "s20v2log"; //tabla
        $datos = array("usuario" => $_POST["HlpDskCveUsu"],
                       "contrasenia" => $_POST["HlpDskNipUsu"]);

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $datos);

        if($respuesta){
          $_SESSION["credencial"] = "ok";
          foreach ($respuesta as $key => $value) {
            if ($value["Tipo"] == 'Sus') { $_SESSION["HlpDskDesTip"] = 'suscriptor'; };
            if ($value["Tipo"] == 'Ben') { $_SESSION["HlpDskDesTip"] = 'becario'; };
            if ($value["Tipo"] == 'Prm') { $_SESSION["HlpDskDesTip"] = 'promotor'; };
            if ($value["Tipo"] == 'Pdv') { $_SESSION["HlpDskDesTip"] = 'punto de venta'; };	
            $_SESSION["HlpDskCveTip"] = $value["Tipo"];
            $_SESSION["HlpDskDesNom"] = $value["nombre"];
            $_SESSION["HlpDskIdeUsu"] = $value["Usuario"];	 
          }
          echo'
            <script>
              window.location = "cliente";
            </script>  
          '; 
        }else{
          echo "usuario y/o contraseña incorrecta.";
        }             
      }else {
        echo'Los campos de usuario y contraseña son obligatorios.';
      }
    }
  }
}