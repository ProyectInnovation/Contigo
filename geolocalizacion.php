<?php
include 'include/database.php';
include 'include/funciones_organismos.php';

$conn = conectarBD();


$salud = obtenerOrganismos($conn, 'organismos_salud');
$judicial = obtenerOrganismos($conn, 'organismos_judiciales');
$psicologico = obtenerOrganismos($conn, 'organismos_psicologicos');


?>
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
   <title>Inicio</title>
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
   <canvas id="orangeCanvas"></canvas>
   <!-- header section start -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo custom-logo">
            <a href="index.html"><img src="images/log.png" alt="Logo"></a>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <a class="nav-item nav-link" href="index.html"><i class="fas fa-home"></i> Inicio</a>
               <a class="nav-item nav-link" href="acerca.html"><i class="fas fa-info-circle"></i> Acerca de</a>
               <a class="nav-item nav-link" href="informacion.html"><i class="fas fa-book"></i> Información</a>
               <a class="nav-item nav-link" href="contact.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
            </div>
         </div>
      </nav>
   </div>
   <!-- header section end -->


   <!-- Choose Section: Organismos y Mapa -->
   <div class="container map-container-section">
      <div class="map-title-container">
         <h3 class="map-title">Geolocalización</h3>
      </div>

      <div class="row">
         <!-- Izquierda: Listado -->
         <div class="col-md-4">
            <h4 class="section-title">Organismos de Salud</h4>
            <ul class="list-group mb-4" id="salud-list">
               <?php foreach ($salud as $org): ?>
                  <li class="list-group-item list-group-item-action" data-lat="<?= htmlspecialchars($org['latitud']) ?>"
                     data-lng="<?= htmlspecialchars($org['longitud']) ?>">
                     <?= htmlspecialchars($org['nombre']) ?>
                  </li>
               <?php endforeach; ?>
            </ul>

            <h4 class="section-title">Organismos Judiciales</h4>
            <ul class="list-group mb-4" id="judicial-list">
               <?php foreach ($judicial as $org): ?>
                  <li class="list-group-item list-group-item-action" data-lat="<?= htmlspecialchars($org['latitud']) ?>"
                     data-lng="<?= htmlspecialchars($org['longitud']) ?>">
                     <?= htmlspecialchars($org['nombre']) ?>
                  </li>
               <?php endforeach; ?>
            </ul>

            <h4 class="section-title">Organismos Psicológicos</h4>
            <ul class="list-group mb-4" id="psicologico-list">
               <?php foreach ($psicologico as $org): ?>
                  <li class="list-group-item list-group-item-action" data-lat="<?= htmlspecialchars($org['latitud']) ?>"
                     data-lng="<?= htmlspecialchars($org['longitud']) ?>">
                     <?= htmlspecialchars($org['nombre']) ?>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>

         <!-- Derecha: Mapa -->
         <div class="col-md-8">
            <div class="map-container">
               <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
         </div>
      </div>
   </div>
   <br /><br /><br /><br /><br />


   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="newsletter_section">
            <div class="newsletter_left">
               <div class="footer_logo"><img src="images/log.png" alt="footer logo" /></div>
            </div>
            <div class="newsletter_right">
               <div class="subscribe_main">
                  <p class="mail_text">© 2025 Proyect Innovation. Todos los derechos reservados.</p>
               </div>
            </div>
         </div>


         <h1 class="follow_text">Siguenos en</h1>
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
   <!-- footer section end -->

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

   <!-- Google Maps JS -->
   <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl6hFy655F07sgHBCxeu6AS2RerNaXeGU&callback=initMap">
      </script>

   <script>
      let map;
      let markers = [];

      function initMap() {
         const center = { lat: 19.4326, lng: -99.1332 };

         map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: center,
         });

         const items = document.querySelectorAll('.list-group-item-action');
         items.forEach(item => {
            const lat = parseFloat(item.getAttribute('data-lat'));
            const lng = parseFloat(item.getAttribute('data-lng'));
            const position = { lat: lat, lng: lng };
            const marker = new google.maps.Marker({
               position: position,
               map: map,
               title: item.textContent.trim(),
            });

            marker.addListener('click', () => {
               map.panTo(marker.getPosition());
               map.setZoom(16);
            });

            item.addEventListener('click', () => {
               map.panTo(marker.getPosition());
               map.setZoom(16);
            });

            markers.push(marker);
         });

         const locationButton = document.createElement("button");
         locationButton.textContent = "📍 Mi ubicación";
         locationButton.classList.add("btn", "btn-primary", "m-2");
         locationButton.style.position = "absolute";
         locationButton.style.bottom = "10px";
         locationButton.style.right = "10px";
         locationButton.style.zIndex = "5";
         locationButton.style.borderRadius = "8px";
         locationButton.style.boxShadow = "0 2px 6px rgba(0,0,0,0.3)";

         map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(locationButton);

         locationButton.addEventListener("click", () => {
            if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(
                  (position) => {
                     const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                     };

                     map.setCenter(pos);
                     map.setZoom(16);

                     new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: {
                           path: google.maps.SymbolPath.CIRCLE,
                           scale: 8,
                           fillColor: "#4285F4",
                           fillOpacity: 1,
                           strokeWeight: 2,
                           strokeColor: "#ffffff",
                        },
                        title: "Tu ubicación",
                     });
                  },
                  () => {
                     alert("No se pudo obtener tu ubicación.");
                  }
               );
            } else {
               alert("Tu navegador no soporta geolocalización.");
            }
         });
      }
   </script>

   <!--Canvas-->
   <script>
      const canvas = document.getElementById('orangeCanvas');
      const ctx = canvas.getContext('2d');
      let width, height;
      let bubbles = [];

      function resize() {
         width = canvas.width = window.innerWidth;
         height = canvas.height = window.innerHeight;
      }

      function createBubbles() {
         bubbles = [];
         for (let i = 0; i < 60; i++) {
            bubbles.push({
               x: Math.random() * width,
               y: height + Math.random() * height,
               r: Math.random() * 30 + 10, // tamaño variable
               speed: Math.random() * 0.5 + 0.3, // un poquito más rápido
               alpha: Math.random() * 0.3 + 0.4 // más visible
            });
         }
      }

      function draw() {
         // 🎨 Fondo degradado naranja más vivo
         let gradient = ctx.createLinearGradient(0, 0, 0, height);
         gradient.addColorStop(0, '#FFDAB3'); // naranja pastel más vivo
         gradient.addColorStop(0.5, '#FFB6B9'); // salmón suave
         gradient.addColorStop(1, '#FFF0F0'); // blanco rosado
         ctx.fillStyle = gradient;
         ctx.fillRect(0, 0, width, height);

         bubbles.forEach(bubble => {
            bubble.y -= bubble.speed;
            if (bubble.y + bubble.r < 0) {
               bubble.x = Math.random() * width;
               bubble.y = height + bubble.r;
            }

            // 🫧 Dibujar burbuja con glow sutil
            ctx.beginPath();
            ctx.arc(bubble.x, bubble.y, bubble.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(255, 182, 193, ${bubble.alpha})`; // rosa claro
            ctx.fill();
            ctx.shadowBlur = 8;
            ctx.shadowColor = `rgba(255, 182, 193, ${bubble.alpha * 1.5})`;
         });

         requestAnimationFrame(draw);
      }

      window.addEventListener('resize', () => {
         resize();
         createBubbles();
      });

      resize();
      createBubbles();
      draw();
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