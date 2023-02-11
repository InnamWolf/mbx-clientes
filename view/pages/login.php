<section class="login">
  <!--===============================================
  IMAGEN PRINICPAL
  =================================================-->  
  <div class="imgTop">
    <form action="cliente" method="post">
      <div class="login_alinear">
        <h1>Bienvenido a Soy Cliente</h1>
        <p>Consulta tu información</p>
        <div class="form-group">
          <input type="text" class="form-control" id="usuario" placeholder="Usuario">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <input type="submit" value="Iniciar Sesión">
          <div class="login_line"></div>
          <div class="btnCuenta orange">
            <a href="#">Crear Cuenta</a>
          </div>
        </div>
      </div>
    </form>
    <?php
      //* ===============================================
      //* FOOTER
      //* ===============================================    
      include_once 'view/components/footer.php'; 
    ?>
  </div>
</section>