<?php 
  include ('view/pages/credencial.php');
?>
<section class="cliente">
  <div class="cliente__in">
    <div class="titulo">
      <p>Bienvenido</p>
      <p class="etiNombre"><?php echo  $_SESSION["HlpDskDesNom"] ?></p>
      <br>
      <p class="blue"><?php echo  $_SESSION["HlpDskCveTip"] ?></p>
    </div>
    <div class="imgRight"></div>
  </div>
</section>