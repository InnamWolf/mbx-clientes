<!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--===============================================
      Lib CSS
      =================================================-->
      <link rel="stylesheet" href="view/css/main.css" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
      <!-- Boostrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- AnimateCss -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />  
      <!-- Carrusel -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
      <!-- <link rel="stylesheet" href="view/css/owl.carousel.min.css"> -->
      <!--===============================================
      lib js
      =================================================-->
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Jquery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Carousel -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="icon" href="view/img/icono_MB.png" sizes="64x64" />
      <title>Mexicana de Becas - Fideicomiso educativo</title>
      </head>
    <body>
      <div class="wrapper">
        <?php 
          //* ===============================================
          //* CABECERA
          //* ===============================================
          include_once 'view/components/header.php';
          //* ===============================================
          //* WHITE LIST URL
          //* ===============================================
          if(isset($_GET["url"])){

            if($_GET["url"] == "login" ||
              $_GET["url"] == "cliente"){
              if($_GET["url"] == "cliente"){
                //* ===============================================
                //* MOBILE AND PC MENU
                //* ===============================================
                include_once 'view/components/nav.php';
                include "pages/".$_GET["url"].".php";
              }else{
                include "pages/".$_GET["url"].".php";
              }
            }else{
              include "pages/404.php";
            }
          }else{
            include "pages/login.php";    
          }
        ?>
      </div>
      <script src="view/js/main.js"></script>
    </body>
  </html>