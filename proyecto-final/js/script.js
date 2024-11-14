console.log('Rulishop está funcionando');
// Contador de likes
let likeCount = 0;
document.getElementById("like-btn").addEventListener("click", function () {
    likeCount++;
    document.getElementById("like-count").textContent = likeCount;
});

// Contador de productos en el carrito
let cartCount = 0;
function addToCart() {
    cartCount++;
    document.getElementById("cart-count").textContent = cartCount;
}

// Cambiar color del encabezado al hacer scroll
window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.style.backgroundColor = '#333';
    } else {
        header.style.backgroundColor = '#000';
    }
});

// Variables para el carrusel principal
const slides = document.querySelector('.slides'); // Contenedor de las diapositivas
const slideImages = document.querySelectorAll('.slides img'); // Todas las imágenes
const prev = document.querySelector('.prev'); // Flecha izquierda
const next = document.querySelector('.next'); // Flecha derecha

let currentIndex = 0;

// Función para mostrar el slide actual
function showSlide(index) {
    const slideWidth = slideImages[0].clientWidth; // Ancho de cada imagen
    slides.style.transform = `translateX(-${index * slideWidth}px)`; // Desplaza el contenedor
}

// Función para ir al siguiente slide
function nextSlide() {
    currentIndex = (currentIndex + 1) % slideImages.length; // Cicla al inicio si llega al final
    showSlide(currentIndex);
}

// Función para ir al slide anterior
function prevSlide() {
    currentIndex = (currentIndex - 1 + slideImages.length) % slideImages.length; // Cicla al final si llega al inicio
    showSlide(currentIndex);
}

// Eventos para los botones del carrusel principal
next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

// Cambio automático del carrusel cada 3 segundos
setInterval(nextSlide, 3000);

// Inicializa el carrusel al cargar la página
showSlide(currentIndex);

// Lógica para las galerías de productos
function showImage(thumbnail) {
    const galleryId = thumbnail.getAttribute("data-gallery"); // Identifica la galería por su data-gallery
    const mainImg = document.querySelector(`.main-image[data-gallery="${galleryId}"] img`); // Busca la imagen principal asociada a esa galería

    // Quitar la clase 'active' de todas las miniaturas de la galería actual
    const thumbnails = document.querySelectorAll(`.thumbnail[data-gallery="${galleryId}"]`);
    thumbnails.forEach((thumb) => thumb.classList.remove("active"));

    // Añadir la clase 'active' a la miniatura seleccionada
    thumbnail.classList.add("active");

    // Cambiar el src de la imagen principal
    mainImg.src = thumbnail.src;
}

// Lógica para los carruseles de cada producto (si los tienes configurados)
function configureNikeCarousel(galleryClass, prevClass, nextClass) {
    const slidesNike = document.querySelector(galleryClass);
    const prevNike = document.querySelector(prevClass);
    const nextNike = document.querySelector(nextClass);

    let indexNike = 0;

    nextNike.addEventListener("click", () => {
        indexNike = (indexNike + 1) % slidesNike.children.length;
        slidesNike.style.transform = `translateX(-${indexNike * 100}%)`;
    });

    prevNike.addEventListener("click", () => {
        indexNike = (indexNike - 1 + slidesNike.children.length) % slidesNike.children.length;
        slidesNike.style.transform = `translateX(-${indexNike * 100}%)`;
    });
}

// Configuración de carruseles (si es necesario)
configureNikeCarousel(".slides-nike1", ".prev-nike1", ".next-nike1");
configureNikeCarousel(".slides-nike2", ".prev-nike2", ".next-nike2");
configureNikeCarousel(".slides-nike3", ".prev-nike3", ".next-nike3");

// Función de agregar al carrito
function addToCart() {
    alert("Producto agregado al carrito");
}


let cart = [];

// Función para agregar productos al carrito
function addToCart(productName, productPrice, productImg) {
    const existingProduct = cart.find((item) => item.name === productName);
    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({
            name: productName,
            price: parseFloat(productPrice),
            img: productImg,
            quantity: 1,
        });
    }
    updateCartIcon();
    updateCartModal();
}

// Función para actualizar el icono del carrito
function updateCartIcon() {
    const cartCountElement = document.getElementById("cart-count");
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCountElement.textContent = totalItems;
}

// Función para actualizar el contenido del carrito en el modal
function updateCartModal() {
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotalElement = document.getElementById("cart-total");

    cartItemsContainer.innerHTML = "";
    let total = 0;

    cart.forEach((item, index) => {
        total += item.price * item.quantity;

        const cartItem = document.createElement("div");
        cartItem.classList.add("cart-item");
        cartItem.innerHTML = `
            <img src="${item.img}" alt="${item.name}" class="cart-item-img">
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <p>Precio: $${item.price.toFixed(2)}</p>
                <div class="quantity-controls">
                    <button onclick="changeQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="changeQuantity(${index}, 1)">+</button>
                </div>
            </div>
            <button class="remove-btn" onclick="removeFromCart(${index})">Eliminar</button>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    cartTotalElement.textContent = `$${total.toFixed(2)}`;
}

// Función para cambiar la cantidad de un producto
function changeQuantity(index, delta) {
    cart[index].quantity += delta;
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1); // Elimina el producto si la cantidad es 0
    }
    updateCartIcon();
    updateCartModal();
}

// Función para eliminar un producto del carrito
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartIcon();
    updateCartModal();
}

// Función para abrir/cerrar el modal del carrito
function toggleCartModal() {
    const modal = document.getElementById("cart-modal");
    modal.style.display = modal.style.display === "block" ? "none" : "block";
}

// Función para guardar un producto en la base de datos
function saveToDatabase(product) {
    fetch('../php/agregar_al_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(product),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log('Producto guardado en la base de datos:', data);
        })
        .catch((error) => {
            console.error('Error al guardar el producto en la base de datos:', error);
        });
}

// Función para cargar productos del carrito desde la base de datos
function loadCartFromDatabase() {
    fetch('../php/obtener_carrito.php')
        .then((response) => response.json())
        .then((data) => {
            cart = data.map((item) => ({
                name: item.nombre_producto,
                price: parseFloat(item.precio_producto),
                img: item.imagen_producto,
                quantity: parseInt(item.cantidad),
            }));
            updateCartIcon();
            updateCartModal();
        })
        .catch((error) => {
            console.error('Error al cargar el carrito desde la base de datos:', error);
        });
}

// Modificar la función addToCart para incluir la integración con la base de datos
function addToCart(productName, productPrice, productImg) {
    const existingProduct = cart.find((item) => item.name === productName);
    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({
            name: productName,
            price: parseFloat(productPrice),
            img: productImg,
            quantity: 1,
        });
    }
    updateCartIcon();
    updateCartModal();

    // Guardar en la base de datos
    saveToDatabase({
        nombre_producto: productName,
        precio_producto: productPrice,
        imagen_producto: productImg,
        cantidad: 1,
    });
}

// Cargar productos del carrito desde la base de datos al cargar la página
window.addEventListener('load', loadCartFromDatabase);


