<?php
require '../config/config.php'; // Conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike - Rulishop</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<header>
<div class="header-container">
        <div class="logo-title">
            <img src="/proyecto-final/imagenes/logo.jpg" alt="Logo de Rulishop" class="logo-img">   
            <h1 class="logo"><a href="/proyecto-final/index.php">Rulishop</a></h1>
        </div>
        <nav class="nav-links">
            <a href="/proyecto-final/php/nike.php" class="brand-link">Nike</a>
            <a href="/proyecto-final/php/umbro.php" class="brand-link">Umbro</a>
            <a href="/proyecto-final/php/adidas.php" class="brand-link">Adidas</a>
            <a href="/proyecto-final/php/penalty.php" class="brand-link">Penalty</a>
        </nav>
        <div class="icons">
            <a href="/proyecto-final/php/register.php" class="icon">👤</a>
            <a href="#" id="like-btn" class="icon">❤️ <span id="like-count">0</span></a>
            <a href="#" id="cart-icon" class="icon">🛒 <span id="cart-count">0</span></a>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Reemplazamos "Cerrar Sesión" por un ícono -->
                <a href="/proyecto-final/php/logout.php" class="icon logout-icon" title="Cerrar Sesión">🚪</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<main>
    <h1>Productos de Nike</h1>
    
    <!-- Producto 1 -->
    <div class="product-container">
        <div class="product-gallery" data-gallery="1">
            <div class="thumbnails">
                <img src="../imagenes/nike1.jpg" alt="Miniatura 1" class="thumbnail active" data-gallery="1" onclick="showImage(this)">
                <img src="../imagenes/nike2.jpg" alt="Miniatura 2" class="thumbnail" data-gallery="1" onclick="showImage(this)">
                <img src="../imagenes/nike3.jpg" alt="Miniatura 3" class="thumbnail" data-gallery="1" onclick="showImage(this)">
                <img src="../imagenes/nike4.jpg" alt="Miniatura 4" class="thumbnail" data-gallery="1" onclick="showImage(this)">
            </div>
            <div class="main-image" data-gallery="1">
                <img src="../imagenes/nike1.jpg" alt="Imagen principal">
            </div>
        </div>
        <div class="product-details">
            <h2>Zapatos Nike Pro</h2>
            <p>Estos zapatos son ideales para el deporte, ofreciendo comodidad y estilo en todo momento.</p>
            <span>$120.000</span>
            <button onclick="addToCart('Zapatos Nike Pro', 129.99, '../imagenes/nike1.jpg')">Agregar al carrito</button>

        </div>
    </div>

    <!-- Producto 2 -->
    <div class="product-container">
        <div class="product-gallery" data-gallery="2">
            <div class="thumbnails">
                <img src="../imagenes/nike5.jpg" alt="Miniatura 1" class="thumbnail active" data-gallery="2" onclick="showImage(this)">
                <img src="../imagenes/nike6.jpg" alt="Miniatura 2" class="thumbnail" data-gallery="2" onclick="showImage(this)">
                <img src="../imagenes/nike7.jpg" alt="Miniatura 3" class="thumbnail" data-gallery="2" onclick="showImage(this)">
                <img src="../imagenes/nike8.jpg" alt="Miniatura 4" class="thumbnail" data-gallery="2" onclick="showImage(this)">
            </div>
            <div class="main-image" data-gallery="2">
                <img src="../imagenes/nike5.jpg" alt="Imagen principal">
            </div>
        </div>
        <div class="product-details">
            <h2>Zapatos Nike Air</h2>
            <p>El diseño aerodinámico de estos zapatos mejora tu rendimiento en cada paso.</p>
            <span>$135.000</span>
            <button onclick="addToCart('Zapatos Nike Air', 149.99, '../imagenes/nike5.jpg')">Agregar al carrito</button>
        </div>
    </div>

    <!-- Producto 3 -->
    <div class="product-container">
        <div class="product-gallery" data-gallery="3">
            <div class="thumbnails">
                <img src="../imagenes/nike9.jpg" alt="Miniatura 1" class="thumbnail active" data-gallery="3" onclick="showImage(this)">
                <img src="../imagenes/nike10.jpg" alt="Miniatura 2" class="thumbnail" data-gallery="3" onclick="showImage(this)">
                <img src="../imagenes/nike11.jpg" alt="Miniatura 3" class="thumbnail" data-gallery="3" onclick="showImage(this)">
                <img src="../imagenes/nike12.jpg" alt="Miniatura 4" class="thumbnail" data-gallery="3" onclick="showImage(this)">
            </div>
            <div class="main-image" data-gallery="3">
                <img src="../imagenes/nike9.jpg" alt="Imagen principal">
            </div>
        </div>
        <div class="product-details">
            <h2>Zapatos Nike Speed</h2>
            <p>Perfectos para atletas que buscan velocidad y confort en sus carreras.</p>
            <span>$115.000</span>
            <button onclick="addToCart('Zapatos Nike Speed', 139.99, '../imagenes/nike9.jpg')">Agregar al carrito</button>
        </div>
    </div>
</main>

<script src="../js/script.js"></script>

<footer>
    <p>© 2024 Rulishop. Todos los derechos reservados.</p>
</footer>


</div>
</body>
</html>
