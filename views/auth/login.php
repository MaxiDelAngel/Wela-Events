<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/styles/login.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Wela Eventos</title>
</head>
<body>
<div class="right-column">
        <h1>Iniciar Sesión</h1>
        <form action="/login" method="post">
            <div class="input-container">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="input-container">
                <i class='bx bxs-lock-alt' ></i>
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>Olvidó su contraseña? <a href="/olvide"> Recuperar Contraseña</a></p> 
        <p>Todavía no tiene cuenta? <a href="/register"> Registrarse</a></p> 
    </div>
    <div class="left-column">
        <video class="background-video" autoplay muted loop playsinline>
            <source src="/build/assets/video_login_register.mp4" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
        <div class="logo-container">
            <img src="/build/assets/Logo_Wela_Blanco.svg" alt="Logo Wela">
        </div>
    </div>
</body>
</html>
<?php if (!empty($alertas['error'])): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `
                <?php foreach($alertas['error'] as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            `,
        });
    });
</script>
<?php elseif (!empty($alertas['success'])): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Acceso exitoso',
            text: '<?php echo implode("<br>", $alertas['success']); ?>',
            timer: 2000,
            willClose: () => {
                <?php if(isset($loginExitoso) && $loginExitoso): ?>
                window.location.href = '<?php echo $redireccion; ?>';
                <?php endif; ?>
            }
        });
    });
</script>
<?php endif; ?>