<?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contacto.css">
    <title>Contactanos</title>
</head>
<body>
    <br>
    
    <div class="contactus">
        <div class="title">
            <h2>Contactanos</h2>
        </div>
        <div class="box">
            <div class="contact formContacto">
                <h3>Manda tu mensaje</h3>
                <form action="correo.php" method="POST">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>Nombre</span>
                                <input type="text" placeholder="Nombre" id="nombre">
                            </div>
                            <div class="inputBox">
                                <span>Apellidos</span>
                                <input type="text" placeholder="Apellidos" id="apellidos">
                            </div>
                        </div>


                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" placeholder="Email" id="email">
                            </div>
                            <div class="inputBox">
                                <span>Telefono</span>
                                <input type="text" placeholder="Telefono" id="telefono">
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <span>Mensaje</span>
                                <textarea name="mensaje" id="mensaje" placeholder="Manda tu mensaje"></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="contact info">
                <h3>Nuestro contacto</h3>
                <div class="infoBox">
                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <p>Aguascalientes, Ags <br>Mexico</p>
                    </div>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="mail: PlacoShoes@gmail.com">PlacoShoes@gmail.com</a>
                    </div>
                    <div>
                        <span><ion-icon name="call"></ion-icon></span>
                        <a href="tel: +52 449 123 1394">+52 449 123 1394</a>
                    </div>
                    <!-- Redes sociales -->
                    <ul class="sci">
                        <li><a href="https://www.facebook.com/PlacoShoes"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
                    </ul>
                </div>
            </div>

            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.547006095845!2d-102.31886132482163!3d21.
                             91351297996651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429eee247f25c8d%3A0x6ca6ecee48974407!2sEdificio%205
                             4!5e0!3m2!1ses-419!2smx!4v1700269318353!5m2!1ses-419!2smx" width="600" height="450" style="border:0;"
                             allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </div><br>


    
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

<?php include 'footer.php'?>
</html>