<?php
    // print_r($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/styles/home.css"/>
    <link rel="stylesheet" href="/build/styles/inicio.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Wela-Events</title>
</head>
<body>
    <header class="header">
       <img class="header__logo" src="/build/assets/Logo Wela - completo.png" alt="Logo Wela">
       <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item"><a class="header__nav-link" href="/home">Inicio</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="/about-us">Sobre nosotros</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="/events">Eventos</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="/profile">Mi perfil</a></li>
            </ul>
        </nav>
    </header>
    <?php
        include_once('inicio.php');
    ?>
    <footer class="footer">
        <hr class="footer__divider">
        <ul class="footer__social-media">
            <li class="footer__social-media-icon">
                <a href="https://www.facebook.com/kanatwela/" target="_blank"><i class='bx bxl-facebook bx-tada-hover'></i></a>
            </li>
            <li class="footer__social-media-icon">
                <a href="https://www.instagram.com/kanatwela/" target="_blank"><i class='bx bx bxl-instagram bx-tada-hover'></i></a>
            </li>
            <li class="footer__social-media-icon">
                <a href="https://www.linkedin.com/company/kanatwela/" target="_blank"><i class='bx bx bxl-linkedin bx-tada-hover'></i></a>
            </li>
        </ul>
    </footer>
</body>
</html>