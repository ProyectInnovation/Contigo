<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic metas -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <!-- site metas -->
   <title>Contact</title>
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- styles -->
   <link rel="stylesheet" href="css/style.css" />
   <link rel="stylesheet" href="css/animaciones.css" />
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- favicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
   <!-- FontAwesome -->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="css/owl.carousel.min.css" />
   <link rel="stylesheet" href="css/owl.theme.default.min.css" />
   <!-- Fancybox -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen" />
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

   <link rel="manifest" href="manifest.json">
   <meta name="theme-color" content="#ff69b4">
</head>

<body>
   <!-- Canvas burbujas -->
   <canvas id="bubbleCanvas"></canvas>

   <!-- Overlay de transición -->
   <div id="transitionScreen" style="display:none;">
      <div class="transition-content">
         <h2 id="transitionText">Cargando…</h2>
         <center>
            <div class="spinner"></div>
         </center>
      </div>
   </div>

   <!-- Sección contacto con tabs -->
   <div class="welcome-full">
      <h1 class="custom-title">Bienvenido</h1>
      <div class="logo">
         <a href="#">
            <img src="images/log.png" alt="Logo" />
         </a>
      </div>
   </div>

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
      <!-- Formulario inicio -->
      <div id="login" class="container tab-pane active form-container"><br />
         <h2 class="form-title">Inicio de sesión</h2>
         <p>Ingresa tus datos para iniciar sesión</p>
         <form id="loginForm" method="POST">
            <input type="hidden" name="accion" value="login" />
            <div class="form-group">
               <label for="loginEmail">Correo electrónico <span style="color: red;">*</span></label>
               <input type="email" class="form-control" id="loginEmail" name="correo" placeholder="Ingresa tu correo"
                  required />
            </div>
            <div class="form-group">
               <label for="loginPassword">Contraseña <span style="color: red;">*</span></label>
               <input type="password" class="form-control" id="loginPassword" name="password"
                  placeholder="Ingresa tu contraseña" required minlength="6" />
            </div>
            <button type="submit" class="btn btn-primary btn-orange">Iniciar sesión</button>
         </form>
      </div>

      <!-- Formulario registro -->
      <div id="register" class="container tab-pane fade form-container"><br />
         <h2 class="form-title">Registro de usuario</h2>
         <form id="loginForm" method="POST">
            <div class="form-group">
               <label for="regName">Nombre completo <span style="color: red;">*</span></label>
               <input type="text" class="form-control" id="regName" name="nombre" placeholder="Nombre completo"
                  required />
            </div>
            <div class="form-group">
               <label for="regAge">Edad <span style="color: red;">*</span></label>
               <input type="number" class="form-control" id="regAge" name="edad" placeholder="Edad" min="0" max="120"
                  required />
            </div>
            <div class="form-group">
               <label for="regDOB">Fecha de nacimiento <span style="color: red;">*</span></label>
               <input type="date" class="form-control" id="regDOB" name="fecha_nacimiento" required />
            </div>
            <div class="form-group">
               <label for="regCURP">CURP <span style="color: red;">*</span></label>
               <input type="text" class="form-control" id="regCURP" name="curp" placeholder="CURP" maxlength="18"
                  required />
            </div>
            <div class="form-group">
               <label for="regEmail">Correo electrónico <span style="color: red;">*</span></label>
               <input type="email" class="form-control" id="regEmail" name="correo" placeholder="Correo electrónico"
                  required />
            </div>
            <div class="form-group">
               <label for="regPassword">Contraseña <span style="color: red;">*</span></label>
               <input type="password" class="form-control" id="regPassword" name="password" placeholder="Contraseña"
                  required minlength="6" />
            </div>
            <div class="form-group">
               <label for="regBloodType">Tipo de sangre <span style="color: red;">*</span></label><br />
               <select class="form-control" id="regBloodType" name="tipo_sangre" required>
                  <option value="" disabled selected>Selecciona tu tipo</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
               </select><br /><br><br>
            </div>
            <div class="form-group">
               <label for="regHealthIssues">¿Padece algún problema de salud?</label>
               <textarea class="form-control" id="regHealthIssues" name="salud" rows="3"
                  placeholder="Describe si tienes alguna condición o problema de salud"></textarea>
            </div>

            <hr />
            <h3 class="text-center mb-4">Contacto de Emergencia</h3>
            <div class="form-group">
               <label for="emName">Nombre del contacto de emergencia <span style="color: red;">*</span></label>
               <input type="text" class="form-control" id="emName" name="em_nombre" placeholder="Nombre completo"
                  required />
            </div>
            <div class="form-group">
               <label for="emPhone">Teléfono <span style="color: red;">*</span></label>
               <input type="tel" class="form-control" id="emPhone" name="em_telefono" placeholder="Solo 10 dígitos"
                  pattern="[0-9]{10}" required />
            </div>
            <div class="form-group">
               <label for="emRelation">Parentesco <span style="color: red;">*</span></label>
               <input type="text" class="form-control" id="emRelation" name="em_parentesco" placeholder="Parentesco"
                  required />
            </div>

            <input type="hidden" name="accion" value="registro" />
            <button type="submit" class="btn btn-success btn-orange d-flex justify-content-center mt-3 mx-auto"
               style="width: 180px;">
               Registrarse
            </button>

            <!-- Mensaje de éxito -->
            <div id="successMessage" class="alert alert-success mt-3 text-center" style="display: none;">
               Registro completado con éxito. ¡Bienvenido!
            </div>
         </form>
      </div>
   </div>
   </div>
   </div>

   <!-- Footer -->
   <div class="bottom-bar">
      <div class="container">
         <p class="bottom-text">
            &copy; 2025 ProyectiNovtion. Todos los derechos reservados.<br />
            Inspirado en <a href="https://html.design" target="_blank">Free HTML Templates</a> y
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>.
         </p>
      </div>
   </div>

   <!-- Scripts - Carga ordenada y sin duplicados -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/plugin.js"></script>
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="js/owl.carousel.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

   <!-- Transición -->
   <script>
      $(document).ready(function () {
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
         });

         const $tabContent = $(".tab-content");
         const $transitionScreen = $("#transitionScreen");
         const $transitionText = $("#transitionText");

         let typingTimeout;
         let isTyping = false;

         function updateTabHeight(targetSelector) {
            const $target = $(targetSelector);
            if ($target.length) {
               const height = $target.outerHeight(true);
               $tabContent.css("height", height + "px");
            }
         }

         updateTabHeight(".tab-pane.active");

         $(".nav-link").on("click", function (e) {
            e.preventDefault();

            const target = $(this).attr("href");

            let message = "Cambiando de formulario…";
            if (target === "#register") {
               message = "Abriendo registro…";
            } else if (target === "#login") {
               message = "Volviendo al inicio de sesión…";
            }

            // Mostrar overlay al instante
            $transitionScreen.show().addClass("active");

            // Scroll instantáneo arriba
            $(window).scrollTop(0);

            if (isTyping) {
               clearTimeout(typingTimeout);
               $transitionText.text("");
               isTyping = false;
            }

            typeWriter($transitionText, message, 50);

            setTimeout(() => {
               $(".tab-pane.active").removeClass("active fade-out");
               $(target).addClass("active fade-in");
               updateTabHeight(target);
            }, 500);

            setTimeout(() => {
               $transitionScreen.removeClass("active").hide();
            }, 1400);
         });

         function typeWriter(element, text, speed) {
            element.text("");
            let i = 0;
            isTyping = true;

            function type() {
               if (i < text.length) {
                  element.append(text.charAt(i));
                  i++;
                  typingTimeout = setTimeout(type, speed);
               } else {
                  isTyping = false;
               }
            }
            type();
         }

         $(window).on("resize", () => {
            updateTabHeight(".tab-pane.active");
         });
      });
   </script>

   <!-- Validaciones -->
   <script>
      // Validación simple para registrar: enfocar el primer campo inválido
      const form = document.getElementById("registerForm");
      form.addEventListener("submit", function (event) {
         const firstInvalid = form.querySelector(":invalid");
         if (firstInvalid) {
            event.preventDefault();
            firstInvalid.focus();
            firstInvalid.style.borderColor = "red";
            firstInvalid.addEventListener(
               "input",
               () => {
                  firstInvalid.style.borderColor = "";
               },
               { once: true }
            );
         }
      });
   </script>

   <!-- Canvas -->
   <script>
      // Canvas burbujas animadas
      const canvas = document.getElementById("bubbleCanvas");
      const ctx = canvas.getContext("2d");
      let width, height;
      let bubbles = [];

      function init() {
         width = window.innerWidth;
         height = window.innerHeight;
         canvas.width = width;
         canvas.height = height;

         bubbles = [];
         for (let i = 0; i < 30; i++) {
            bubbles.push({
               x: Math.random() * width,
               y: Math.random() * height,
               radius: 20 + Math.random() * 40,
               speed: 0.2 + Math.random() * 0.4,
               color: randomColor(),
               alpha: 0.2 + Math.random() * 0.3,
               direction: Math.random() * 2 * Math.PI,
            });
         }
      }

      function randomColor() {
         const colors = ["#F8BBD0", "#FFCCBC", "#E1BEE7"];
         return colors[Math.floor(Math.random() * colors.length)];
      }

      function animate() {
         ctx.clearRect(0, 0, width, height);
         bubbles.forEach((bubble) => {
            bubble.y -= bubble.speed;
            bubble.x += Math.sin(bubble.direction) * 0.5;

            if (bubble.y + bubble.radius < 0) {
               bubble.y = height + bubble.radius;
               bubble.x = Math.random() * width;
               bubble.color = randomColor();
            }

            const gradient = ctx.createRadialGradient(
               bubble.x,
               bubble.y,
               bubble.radius * 0.2,
               bubble.x,
               bubble.y,
               bubble.radius
            );
            gradient.addColorStop(0, `${bubble.color}${Math.floor(bubble.alpha * 255).toString(16)}`);
            gradient.addColorStop(1, `${bubble.color}00`);

            ctx.beginPath();
            ctx.arc(bubble.x, bubble.y, bubble.radius, 0, 2 * Math.PI);
            ctx.fillStyle = gradient;
            ctx.fill();
         });

         requestAnimationFrame(animate);
      }

      window.addEventListener("resize", init);

      init();
      animate();
   </script>

   <!-- Ajax -->

   <script>
      // ========== LOGIN BONITO ==========
      $('#loginForm').on('submit', function (e) {
         e.preventDefault(); // Detener envío normal
         const formData = $(this).serialize();

         $.ajax({
            type: 'POST',
            url: 'include/funciones.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
               if (response.status === 'success') {
                  Swal.fire({
                     icon: 'success',
                     title: '✨ Bienvenido',
                     text: response.message,
                     position: 'center', // 👈 Forzar al centro
                     showConfirmButton: false,
                     timer: 2200,
                     backdrop: 'rgba(0, 0, 0, 0.5)',
                     showClass: {
                        popup: 'animate__animated animate__zoomIn'
                     },
                     hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                     }
                  }).then(() => {
                     if (response.redirect) {
                        window.location.href = response.redirect;
                     }
                  });
               } else {
                  Swal.fire({
                     icon: 'error',
                     title: '😞 Error de inicio',
                     text: response.message,
                     position: 'center',
                     confirmButtonColor: '#e74c3c',
                     backdrop: 'rgba(0, 0, 0, 0.5)',
                     showClass: {
                        popup: 'animate__animated animate__shakeX'
                     },
                     hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                     }
                  });
               }
            },
            error: function () {
               Swal.fire({
                  icon: 'error',
                  title: '⚠️ Problema de conexión',
                  text: 'No se pudo procesar tu inicio de sesión.',
                  position: 'center',
                  confirmButtonColor: '#e74c3c',
                  backdrop: 'rgba(0, 0, 0, 0.5)',
                  showClass: {
                     popup: 'animate__animated animate__shakeX'
                  },
                  hideClass: {
                     popup: 'animate__animated animate__fadeOut'
                  }
               });
            }
         });
      });
   </script>

   <script>
      if ('serviceWorker' in navigator) {
         navigator.serviceWorker.register('service-worker.js')
            .then(function (registration) {
               console.log('Service Worker registrado con éxito:', registration);
            })
            .catch(function (error) {
               console.log('Fallo al registrar el Service Worker:', error);
            });
      }
   </script>

</body>

</html>