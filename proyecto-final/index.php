<?php
require 'config/config.php';
session_start(); // Inicia la sesión para verificar si el usuario está logueado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rulishop</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<header>
    <div class="header-container">
        <div class="logo-title">
            <img src="imagenes/logo.jpg" alt="Logo de Rulishop" class="logo-img">
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


<div class="header-title">
    <h1>¡Bienvenido a Rulishop!</h1>
    <p>Tu tienda de confianza para las mejores ofertas y productos.</p>
</div>

<div class="carousel">
    <div class="slides">
        <img src="imagenes/novedades.jpg" alt="Novedades" class="slide">
        <img src="imagenes/60off.jpg" alt="60% Off" class="slide">
    </div>
    <div class="carousel-controls">
        <span class="prev">&lt;</span>
        <span class="next">&gt;</span>
    </div>
</div>




<section class="featured-products">
    <h2>Productos Destacados</h2>
    <div class="product-grid">
        <div class="product">
            <img src="imagenes/dest1.jpg" alt="Producto 1">
            <p>Botin Nike</p>
            <span>$110.000</span>
        </div>
        <div class="product">
            <img src="imagenes/dest2.jpg" alt="Producto 2">
            <p>Botin adidas</p>
            <span>$100.000</span>
        </div>
        <div class="product">
            <img src="imagenes/dest3.jpg" alt="Producto 3">
            <p>Botin umbro</p>
            <span>$90.000</span>
        </div>
    </div>
</section>

<footer>
    <p>© 2024 Rulishop. Todos los derechos reservados.</p>
</footer>


</body>
<!-- Contenedor del carrito -->
<div id="cartModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeCart">✖</span>
        <h2>Carrito de Compras</h2>
        <ul id="cartItemsList"></ul>
        <p>Total: $<span id="cart-total">0</span></p>
        <button id="clearCartBtn">Limpiar Carrito</button>
    </div>
</div>
<div class="modal-overlay" id="modalOverlay"></div>

</html>
