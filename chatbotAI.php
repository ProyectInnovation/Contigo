<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>ChatBot</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/chatbot.css" />

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        body {
            padding-top: 100px;
            /* Da espacio debajo del navbar fijo */
        }

        .header_section {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>

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
                    <a class="nav-item nav-link" href="contact.php"><i class="fas fa-sign-out-alt"></i> Cerrar
                        Sesión</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- header section end -->

    <!-- Chat -->
    <section class="chatbot-container">

        <div class="alert-warning" role="alert" aria-live="polite">
            <h2>AliadaSegura</h2>
            <p>
                Este bot <b>no sustituye</b> la atención profesional.<br />
                En caso de emergencia, llama al <b>911 (SAPTEL)</b>.
            </p>
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
        </div>



        <div class="chatbox" role="region" aria-label="Chat de AliadaSegura">
            <div class="chat-history" id="chat-history" aria-live="polite" aria-relevant="additions"></div>

            <div class="chat-input">
                <input type="text" id="user-message" placeholder="Escribe tu pregunta..." autocomplete="off"
                    aria-label="Mensaje del usuario" />
                <button id="send-message" aria-label="Enviar mensaje">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </section>




    <script>
        document.getElementById('send-message').addEventListener('click', () => {
            const input = document.getElementById('user-message');
            const text = input.value.trim();
            if (!text) return;

            const history = document.querySelector('.chat-history');
            history.innerHTML += `<div class="message user-message"><div class="message-content"><p>${text}</p></div></div>`;
            input.value = "";
            history.scrollTop = history.scrollHeight;

            fetch('./chatbot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text })
            })
                .then(response => response.json())
                .then(data => {
                    const reply = data.reply || 'Error en la respuesta.';

                    history.innerHTML += `<div class="message ia-message"><div class="message-content">${reply}</div></div>`;
                    history.scrollTop = history.scrollHeight;
                })
                .catch(error => {
                    history.innerHTML += `<div class="message ia-message"><div class="message-content"><p>Error al conectar.</p></div></div>`;
                    console.error(error);
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.11.1/tsparticles.bundle.min.js"></script>




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

    <script src="script.js"></script>

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

</body>

</html>