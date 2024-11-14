<?php
require '../config/config.php'; // Incluye la configuración de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Verificar si el email ya está registrado
    $checkEmail = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $checkEmail->bindParam(':email', $email);
    $checkEmail->execute();
    $emailExists = $checkEmail->fetchColumn();

    if ($emailExists) {
        $error = "El correo electrónico ya está registrado. Por favor, usa otro.";
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        try {
            $stmt->execute();
            $success = "Registro exitoso. ¡Puedes <a href='../php/login.php'>iniciar sesión</a>!";
        } catch (PDOException $e) {
            $error = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Rulishop</title>
    <link rel="stylesheet" href="../css/estilo.css">


</head>
<body>
    <div class="register-container">
        <form method="POST">
            <h2>Registro</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <p class="success"><?php echo $success; ?></p>
            <?php endif; ?>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Registrar</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="../php/login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
