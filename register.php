<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/register.css" />
    <title>Register Wela</title>
</head>
<body>
    <div class="left-column">
        <img src="src\assets\Logo Wela - simple.png" alt="Logo Wela">
    </div>
    <div class="right-column">
        <h1>Register</h1>
        <form action="register_process.php" method="post">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="confirm_password" placeholder="Verificar Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>