<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/styles/register.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register Wela</title>
</head>
<body>
    <div class="left-column">
        <video class="background-video" autoplay muted loop playsinline>
            <source src="/build/assets/video_login_register.mp4" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
        <div class="logo-container">
            <img src="/build/assets/Logo_Wela_Blanco.svg" alt="Logo Wela">
        </div>
    </div>
    <div class="right-column">
        <h1>Registrarse</h1>
        <form action="/register" method="post">
            <div class="input-container">
                <i class='bx bx-user' ></i>
                <input type="text" name="username" placeholder="Nombre de usuario" required>
            </div>
            <div class="input-container">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="input-container">
                <i class='bx bxs-lock-alt' ></i>
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="agree" required>
                <label for="agree">Acepto los <a href="/Terms-of-Service">Términos y Condiciones</a> y <a href="https://wela.mx/politica-de-privacidad/">Política de Privacidad</a>.</label>
            </div>
            <button type="submit">Registrarse</button>
        </form>
        <p>Ya tiene una cuenta? <a href="/login"> Iniciar sesión</a></p>
    </div>
</body>
</html>