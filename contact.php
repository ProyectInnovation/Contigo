<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Contact</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>

<body>
   <!-- header section start -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><a href="#"><img src="images/log.jpeg"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <a class="nav-item nav-link" href="index.html"></a>
               <a class="nav-item nav-link" href="about.html"></a>
               <a class="nav-item nav-link" href="teashop.html"></a>
               <a class="nav-item nav-link" href="pricing.html"></a>
               <a class="nav-item nav-link" href="testimonies.html"></a>
               <a class="nav-item nav-link" href="contact.html"></a>
            </div>
         </div>
         <div class="login_menu">
            <a href="#"><img src="images/search-icon.png"></a>
         </div>
      </nav>
   </div>
   <!-- header section end -->
   <!-- contact section start -->


   <!-- Seccion de inicio y registro -->
   <div class="contact_section layout_padding">
      <div class="container">
         <h1 class="contact_taital text-center">Bienvenido</h1>

         <!-- Nav tabs -->
         <ul class="nav custom-tabs justify-content-center" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" data-toggle="tab" href="#login">Iniciar sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#register">Registrarse</a>
            </li>
         </ul>

         <!-- Tab panes -->
         <div class="tab-content">

            <!-- INICIO DE LOS FORMULARIOS -->

            <!-- Formulario inicio -->
            <div id="login" class="container tab-pane active"><br>
               <h2 class="form-title">Inicio de sesión</h2>
               <form method="POST" action="include/funciones.php">
                  <!-- CAMPO OCULTO PARA IDENTIFICAR QUE ES LOGIN -->
                  <input type="hidden" name="accion" value="login">

                  <div class="form-group">
                     <label for="loginEmail">Correo electrónico <span style="color: red;">*</span></label>
                     <input type="email" class="form-control" id="loginEmail" name="correo"
                        placeholder="Ingresa tu correo" required>
                  </div>
                  <div class="form-group">
                     <label for="loginPassword">Contraseña <span style="color: red;">*</span></label>
                     <input type="password" class="form-control" id="loginPassword" name="password"
                        placeholder="Ingresa tu contraseña" required minlength="6">
                  </div>
                  <button type="submit" class="btn btn-primary btn-orange">Iniciar sesión</button>
               </form>
            </div>


            <!-- Formulario de registro -->
            <div id="register" class="container tab-pane fade"><br>
               <h2 class="form-title">Registro de usuario</h2>
               <form id="registerForm" method="POST" action="include/funciones.php">
                  <div class="form-group">
                     <label for="regName">Nombre completo <span style="color: red;">*</span></label>
                     <input type="text" class="form-control" id="regName" name="nombre" placeholder="Nombre completo"
                        required>
                  </div>
                  <div class="form-group">
                     <label for="regAge">Edad <span style="color: red;">*</span></label>
                     <input type="number" class="form-control" id="regAge" name="edad" placeholder="Edad" min="0"
                        max="120" required>
                  </div>
                  <div class="form-group">
                     <label for="regDOB">Fecha de nacimiento <span style="color: red;">*</span></label>
                     <input type="date" class="form-control" id="regDOB" name="fecha_nacimiento" required>
                  </div>
                  <div class="form-group">
                     <label for="regCURP">CURP <span style="color: red;">*</span></label>
                     <input type="text" class="form-control" id="regCURP" name="curp" placeholder="CURP" maxlength="18"
                        required>
                  </div>
                  <div class="form-group">
                     <label for="regEmail">Correo electrónico <span style="color: red;">*</span></label>
                     <input type="email" class="form-control" id="regEmail" name="correo"
                        placeholder="Correo electrónico" required>
                  </div>
                  <div class="form-group">
                     <label for="regPassword">Contraseña <span style="color: red;">*</span></label>
                     <input type="password" class="form-control" id="regPassword" name="password"
                        placeholder="Contraseña" required minlength="6">
                  </div>
                  <div class="form-group">
                     <label for="regBloodType">Tipo de sangre <span style="color: red;">*</span></label><br>
                     <select class="form-control" id="regBloodType" name="tipo_sangre" required>
                        <option value="" disabled selected>Selecciona tu tipo de sangre</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                     </select><br>
                  </div><br><br>
                  <div class="form-group">
                     <label for="regHealthIssues">¿Padece algún problema de salud?</label>
                     <textarea class="form-control" id="regHealthIssues" name="salud" rows="3"
                        placeholder="Describe si tienes alguna condición o problema de salud"></textarea>
                  </div>

                  <!-- Contacto de Emergencia integrado -->
                  <hr>
                  <h3 class="text-center mb-4">Contacto de Emergencia</h3>
                  <div class="form-group">
                     <label for="emName">Nombre del contacto de emergencia <span style="color: red;">*</span></label>
                     <input type="text" class="form-control" id="emName" name="em_nombre" placeholder="Nombre completo"
                        required>
                  </div>
                  <div class="form-group">
                     <label for="emPhone">Teléfono <span style="color: red;">*</span></label>
                     <input type="tel" class="form-control" id="emPhone" name="em_telefono"
                        placeholder="Solo 10 dígitos" pattern="[0-9]{10}" required>
                  </div>
                  <div class="form-group">
                     <label for="emRelation">Parentesco <span style="color: red;">*</span></label>
                     <input type="text" class="form-control" id="emRelation" name="em_parentesco"
                        placeholder="Parentesco" required>
                  </div>

                  <input type="hidden" name="accion" value="registro" />
                  <button type="submit" class="btn btn-success btn-orange d-flex justify-content-center mt-3"
                     style="width: 180px; margin: 0 auto;">Registrarse</button>

                  <!-- Mensaje de éxito -->
                  <div id="successMessage" class="alert alert-success mt-3 text-center" style="display: none;">
                     Registro completado con éxito. ¡Bienvenido!
                  </div>
               </form>
            </div>
            <!-- FIN DE LOS FORMULARIOS -->


            <!-- Footer -->
            <div class="footer_section layout_padding">
               <div class="container">
                  <div class="newsletter_section">
                     <div class="newsletter_left">
                        <div class="footer_logo"><img src="images/log.jpeg" alt="footer logo" /></div>
                     </div>
                     <div class="newsletter_right">
                        <div class="subscribe_main">
                           <input type="text" class="mail_text"
                              placeholder="© 2025 ProyectiNovtion. Todos los derechos reservados." name="text" />
                        </div>
                     </div>
                  </div>


                  <h1 class="follow_text">Follow Us</h1>
                  <div class="social_icon">
                     <ul>
                        <li><a href="#"><img src="images/fb-icon.png" alt="fb icon" /></a></li>
                        <li><a href="#"><img src="images/twitter-icon.png" alt="twitter icon" /></a></li>
                        <li><a href="#"><img src="images/linkedin-icon.png" alt="linkedin icon" /></a></li>
                        <li><a href="#"><img src="images/instagram-icon.png" alt="instagram icon" /></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- footer section end -->


         <!-- copyright section start -->
         <div class="copyright_section">
            <div class="container">
               <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free
                     html
                     Templates</a> Distributed by. <a href="https://themewagon.com">ThemeWagon</a> </p>
               </p>
            </div>
         </div>
         <!-- copyright section end -->
         <!-- Javascript files-->
         <script src="js/jquery.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/bootstrap.bundle.min.js"></script>
         <script src="js/jquery-3.0.0.min.js"></script>
         <script src="js/plugin.js"></script>
         <!-- sidebar -->
         <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
         <script src="js/custom.js"></script>
         <!-- javascript -->
         <script src="js/owl.carousel.js"></script>
         <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
         <script>
            $(document).ready(function () {
               $(".fancybox").fancybox({
                  openEffect: "none",
                  closeEffect: "none"
               });
            });

         </script>

         <!-- FIN DE LOS FORMULARIOS -->
      </div> <!-- FIN container -->
   </div> <!-- FIN contact_section -->

   <script>
      const form = document.getElementById('registerForm');
      form.addEventListener('submit', function (event) {
         const firstInvalid = form.querySelector(':invalid');
         if (firstInvalid) {
            event.preventDefault();
            firstInvalid.focus();
            firstInvalid.style.borderColor = 'red';
            firstInvalid.addEventListener('input', () => {
               firstInvalid.style.borderColor = '';
            }, { once: true });
         }
      });
   </script>
</body>

</html>