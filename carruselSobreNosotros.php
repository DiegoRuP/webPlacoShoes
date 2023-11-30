<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="bodyCarrusel">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/ruan.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Diego Ruan</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/kevin.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Kevin Calvillo</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/navarro.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Diego Navarro</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/ivan.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Ivan Bayona</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/octavio.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Octavio Gutierrez</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/johann.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Johann Balderas</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_img">
                    <img src="media/edgar.jpeg" alt="">
                </div>
                <div class="card_contenido">
                    <span class="card_nombre">Edgar Miranda</span>
                    <br>
                    <p class="card_titulo">Estudiante de 5° semestre de la carrera de Ingenieria en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes</p>
                    <br>
                    <button class="card_boton">Ver más</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    });
    </script>

</body>
</html>