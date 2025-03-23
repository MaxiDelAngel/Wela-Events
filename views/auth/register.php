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
        <h1>Register</h1>
        <form action="" method="post">
            <div class="input-container">
                <i class='bx bx-user' ></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-container">
                <i class='bx bxs-lock-alt' ></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="agree" required>
                <label for="agree">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
            </div>
            <button type="submit">Registrarse</button>
        </form>
        <p>Already hava an account? <a href="login.php"> Login</a></p>
    </div>
</body>
</html>