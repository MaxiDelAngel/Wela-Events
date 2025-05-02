<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/styles/register.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Wela Eventos</title>
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
        <h1>Confirmar Cuenta</h1>
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
            title: 'Registro exitoso',
            text: '<?php echo implode("<br>", $alertas['success']); ?>',
            timer: 2000,
            willClose: () => {
                <?php if(isset($confirmarExitoso) && $confirmarExitoso): ?>
                window.location.href = '<?php echo $redireccion; ?>';
                <?php endif; ?>
            }
        });
    });
</script>
<?php endif; ?>
