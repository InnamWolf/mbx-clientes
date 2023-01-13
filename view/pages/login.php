<section class="login">
  <!--===============================================
  IMAGEN PRINICPAL
  =================================================-->  
  <div class="imgTop">
    <div class="login_alinear">
      <h1>Bienvenido a Soy Cliente</h1>
      <p>Consulta tu información</p>
    
      <div class="form-group">
        <input type="text" class="form-control" id="usuario" placeholder="Usuario">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Contraseña">
      </div>

        <div class="btnCuenta">
          <a href="#">Iniciar Sesión</a>
        </div>
        
        <div class="login_line"></div>
        
        <div class="btnCuenta orange">
          <a href="#">Crear Cuenta</a>
        </div>
      </div>
      <?php
        //* ===============================================
        //* FOOTER
        //* ===============================================    
        include_once 'view/components/footer.php'; 
      ?>
  </div>

</section>