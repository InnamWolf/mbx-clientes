<?php
  if(!isset($_SESSION["credencial"]) && !isset($_SESSION["credencial"]) == "ok"){    
    header('Location: login');
  }
