<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicia Sesión</title>
  <link rel="stylesheet" href="login/style.css" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <span class="big-circle"></span>
    <img src="img/shape.png" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Bienvenido al Sistema de Créditos de Actividades Complementarios
        </h3>
        <br>
        <h3 class="title">TecNM Campus Chiná
        </h3>
        <p class="text">
          En esta Plataforma podrás llevar un registro de tus créditos de actividades complementarios
        </p>

        <div class="info">
          <div class="information">
            <img src="img/location.png" class="icon" alt="" />
            <p>Calle 11 S/N entre 22 Y 28, Chiná, Camp. México. C.P. 24520</p>
          </div>
          <div class="information">
            <img src="img/email.png" class="icon" alt="" />
            <p>dir01_china@tecnm.mx</p>
          </div>
          <div class="information">
            <img src="img/phone.png" class="icon" alt="" />
            <p>(981) 82 7 20 81, 82 y 52 Ext. 101 y 103</p>
          </div>
        </div>

        <div class="social-media">
          <p>Conecta con nosotros:</p>
          <div class="social-icons">
            <a href="https://www.facebook.com/tecnmcampus.china" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/TecNMChina" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/tecnmcampuschina/" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>

          </div>
        </div>
      </div>

      <div class="contact-form">


        <form action="login/controller_login.php" method="post" autocomplete="off">
          <h3 class="title">Iniciar Sesión</h3>
          <div class="input-container">
            <input type="text" name="correo" class="input" required />
            <label for="">Correo Institucional</label>
            <span>Correo Institucional</span>
          </div>
          <div class="input-container">
            <input type="password" name="contraseña" class="input" required />
            <label for="">Contraseña</label>
            <span>Contraseña</span>
          </div>
          <div class="form-group">
            <input type="submit" value="Ingresar" class="btn btn-primary btn-block">
            <a href="login/registro.php" class="btn btn-default btn-block">Registrar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="login/app.js"></script>
</body>

</html>