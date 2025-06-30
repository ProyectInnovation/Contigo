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
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <title>Mapa con Organismos</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- Custom styles -->
   <link rel="stylesheet" href="css/style.css" />
   <!-- Responsive -->
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
   <!-- Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="css/owl.carousel.min.css" />
   <link rel="stylesheet" href="css/owl.theme.default.min.css" />
   <!-- Fancybox -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

   <link rel="icon" href="images/fevicon.png" type="image/gif" />
</head>

<body>
   <!-- Header -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><a href="index.html"><img src="images/log.jpeg" alt="logo" /></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <a class="nav-item nav-link" href="index.html">Inicio</a>
               <a class="nav-item nav-link" href="acerca.html">Acerca de</a>
               <a class="nav-item nav-link" href="informacion.html">Información</a>
               <a class="nav-item nav-link" href="geolocalizacion.php">Geolocalización</a>
            </div>
         </div>
         <div class="login_menu">
            <a href="#"><img src="images/search-icon.png" alt="search" /></a>
         </div>
      </nav>
   </div>

   <!-- Choose Section: Organismos y Mapa -->
   <div class="choose_section margin_90">
      <div class="container">
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
   </div>

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

   <!-- Scripts -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>

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
</body>

</html>