const CACHE_NAME = 'contigo-cache-v3';

const urlsToCache = [
  // HTML y páginas
  '/index.html',
  '/acerca.html',
  '/chatbotAI.html',
  '/geolocalizacion.html',
  '/informacion.html',
  '/manifest.json',

  "img/icono2048.png",
  "img/maskable_icon.png",
  "img/maskable_icon_x128.png",
  "img/maskable_icon_x192.png",
  "img/maskable_icon_x384.png",
  "img/maskable_icon_x48.png",
  "img/maskable_icon_x512.png",
  "img/maskable_icon_x72.png",
  "img/maskable_icon_x96.png",
  "img/screenshot_horizontal.png",
  "img/screenshot_vertical.png",

  // PHP
  '/chatbot.php',
  '/contact.php',
  '/include/database.php',
  '/include/funciones.php',
  '/include/guardar_google.php',
  '/include/editarOrganismo.php',
  '/include/EliminarOrganismo.php',
  '/include/obtener_contacto.php',

  // JS
  '/script.js',
  '/js/bootstrap.bundle.js',
  '/js/bootstrap.bundle.js.map',
  '/js/bootstrap.bundle.min.js',
  '/js/bootstrap.bundle.min.js.map',
  '/js/bootstrap.js',
  '/js/bootstrap.js.map',
  '/js/bootstrap.min.js',
  '/js/bootstrap.min.js.map',
  '/js/custom.js',
  '/js/jquery-3.0.0.min.js',
  '/js/jquery.mCustomScrollbar.concat.min.js',
  '/js/jquery.min.js',
  '/js/jquery.validate.js',
  '/js/modernizer.js',
  '/js/plugin.js',
  '/js/popper.min.js',
  '/js/slider-setting.js',

  // CSS
  '/css/animate.min.css',
  '/css/bootstrap-grid.css',
  '/css/bootstrap-grid.min.css',
  '/css/bootstrap-reboot.css',
  '/css/bootstrap-reboot.min.css',
  '/css/bootstrap.css',
  '/css/bootstrap.min.css',
  '/css/default-skin.css',
  '/css/font-awesome.min.css',
  '/css/icomoon.css',
  '/css/jquery-ui.css',
  '/css/jquery.fancybox.min.css',
  '/css/jquery.mCustomScrollbar.min.css',
  '/css/meanmenu.css',
  '/css/nice-select.css',
  '/css/normalize.css',
  '/css/owl.carousel.min.css',
  '/css/responsive.css',
  '/css/slick.css',
  '/css/chatbot.css',
  '/css/style.css',

  // Imágenes
  '/images/acoso.jpeg',
  '/images/banner-bg.png',
  '/images/book-bg.png',
  '/images/call-icon.png',
  '/images/choose-bg.png',
  '/images/client-bg.png',
  '/images/client-img.png',
  '/images/cup-img-1.png',
  '/images/cup-img-2.png',
  '/images/cup-img-3.png',
  '/images/cup-img-4.png',
  '/images/cup-img-5.png',
  '/images/fb-icon.png',
  '/images/footer-bg.png',
  '/images/footer-logo.png',
  '/images/icon-1.png',
  '/images/icon-192.png',
  '/images/icon-3.png',
  '/images/icon-4.png',

  // Sonidos
  '/sounds/alarma.mp3'
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(keys.map((key) => {
        if (key !== CACHE_NAME) {
          return caches.delete(key);
        }
      }))
    )
  );
  self.clients.claim();
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((cachedResponse) => {
      return (
        cachedResponse ||
        fetch(event.request).then((networkResponse) => {
          return caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          });
        })
      );
    }).catch(() => caches.match('/index.html'))
  );
});
