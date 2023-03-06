<section class="login">
  <!--===============================================
  IMAGEN PRINICPAL
  =================================================-->  
  <div class="imgTop">
    <form method="post">
      <div class="login_alinear">
        <h1>Bienvenido a Soy Cliente</h1>
        <p>Consulta tu información</p>
        <div class="form-group">
          <input type="text" class="form-control" id="HlpDskCveUsu" name="HlpDskCveUsu"  placeholder="Usuario">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="HlpDskNipUsu" name="HlpDskNipUsu"  placeholder="Contraseña">
        </div>
        <div class="form-group">
          <button type="submit" value="Iniciar Sesión">Iniciar Sesión</button>
          <div class="login_line"></div>
          <div class="btnCuenta orange">
            <a href="http://www.becasmb.com/accesocontra/indice.php">Crear Cuenta</a>
          </div>
        </div>
      </div>  
      <?php
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario(); 
      ?>
    </form>
    <?php
      //* ===============================================
      //* FOOTER
      //* ===============================================    
      include_once 'view/components/footer.php'; 
    ?>
  </div>
</section>