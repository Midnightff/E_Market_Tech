<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Market-Tech</title>
    <link rel="stylesheet" href="{{ asset('asset/public/styles.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">
                    <i class="fa-solid fa-headset"></i>
                    <div class="content-customer-support">
                        <span class="text">Soporte al cliente</span>
                        <span class="number">123-456-7890</span>
                    </div>
                </div>

                <div class="container-logo">
                    <i class="fa-solid fa-laptop"></i>
                    <h1 class="logo"><a href="/">E-Market-Tech</a></h1>
                </div>

                <div class="container-user">
                    <i class="fa-solid fa-user"></i>
                    <i class="fa-solid fa-basket-shopping"></i>
                    <div class="content-shopping-cart">
                        <span class="text">Carrito</span>
                        <span class="number">(0)</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <ul class="menu">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Dispositivos</a></li>
                    <li><a href="#">Categorias</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Sobre nosotros</a></li>

                </ul>

                <form class="search-form">
                    <input type="search" placeholder="Buscar..." />
                    <button class="btn-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            @if(Auth::guest())
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
            @else
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endif
            </nav>
        </div>
    </header>

    <section class="banner">
        <div class="content-banner">
            <p>Innovación en tus manos</p>
            <h2>Lo último en <br />Tecnología y Electrónica</h2>
            <a href="#">¡Compra Ahora!</a>
        </div>
    </section>


    <main class="main-content">
        <section class="container container-features">
            <div class="card-feature">
                <i class="fa-solid fa-plane-up"></i>
                <div class="feature-content">
                    <span>Envío gratuito a nivel mundial</span>
                    <p>En pedido superior a $150</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-wallet"></i>
                <div class="feature-content">
                    <span>Contrareembolso</span>
                    <p>100% garantía de devolución de dinero</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-gift"></i>
                <div class="feature-content">
                    <span>Tarjeta regalo especial</span>
                    <p>Ofrece bonos especiales con regalo</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-headset"></i>
                <div class="feature-content">
                    <span>Servicio al cliente 24/7</span>
                    <p>LLámenos 24/7 al 123-456-7890</p>
                </div>
            </div>
        </section>

        <section class="container top-categories">
            <h1 class="heading-1">Mejores Categorías</h1>
            <div class="container-categories">
                <div class="card-category category-gamer">
                    <p>Gamer</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category category-perifericos">
                    <p>Perifericos</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category category-celulares">
                    <p>Dispositivos</p>
                    <span>Ver más</span>
                </div>
            </div>
        </section>

        <section class="container top-products">
            <h1 class="heading-1">Mejores Productos</h1>

            <div class="container-options">
                <span class="active">Destacados</span>
                <span>Más recientes</span>
                <span>Mejores Vendidos</span>
            </div>

            <div id="product-list" class="row">
                <!-- Aquí se agregarán los productos -->
            </div>


    </main>
    <footer class="footer">
        <div class="container container-footer">
            <div class="menu-footer">
                <div class="contact-info">
                    <p class="title-footer">Información de Contacto</p>
                    <ul>
                        <li>
                            Dirección: Calle 123, Ciudad, El Salvador
                        </li>
                        <li>Teléfono: 123-456-7890</li>
                        <li>Fax: 55555300</li>
                        <li>EmaiL: correo@correo.com</li>
                    </ul>
                    <div class="social-icons">
                        <span class="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                        <span class="twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                        <span class="youtube">
                            <i class="fa-brands fa-youtube"></i>
                        </span>
                        <span class="pinterest">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </span>
                        <span class="instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </span>
                    </div>
                </div>

                <div class="information">
                    <p class="title-footer">Información</p>
                    <ul>
                        <li><a href="#">Acerca de Nosotros</a></li>
                        <li><a href="#">Información de envío</a></li>
                        <li><a href="#">Politicas de Privacidad</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                        <li><a href="#">Contactános</a></li>
                    </ul>
                </div>

                <div class="my-account">
                    <p class="title-footer">Mi cuenta</p>

                    <ul>
                        <li><a href="#">Mi cuenta</a></li>
                        <li><a href="#">Historial de pedidos</a></li>
                        <li><a href="#">Lista de deseos</a></li>
                        <li><a href="#">Boletín</a></li>
                        <li><a href="#">Reembolsos</a></li>
                    </ul>
                </div>

                <div class="newsletter">
                    <p class="title-footer">Boletín informativo</p>

                    <div class="content">
                        <p>
                            Suscríbete a nuestros boletines ahora y mantente al
                            día con nuevas colecciones y ofertas exclusivas.
                        </p>
                        <input type="email" placeholder="Ingresa el correo aquí...">
                        <button>Suscríbete</button>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>
                    
                </p>

                <img src="{{ asset('asset/public/img/payment.png') }}" alt="Pagos">
            </div>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    window.isAuthenticated = @json(auth()->check());
    window.loginUrl = "{{ route('login') }}";
    @if(auth()->check())
        window.userHasCompleteProfile = @json(auth()->user()->phone && auth()->user()->address);
        window.profileUrl = "{{ route('profile.edit') }}"; // Asumiendo que tienes una ruta para editar el perfil
    @else
        window.userHasCompleteProfile = false;
    @endif
</script>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    function loadProducts() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/productos', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const products = JSON.parse(xhr.responseText);
                const productList = document.getElementById('product-list');
                productList.innerHTML = '';

                products.forEach(product => {
                    const productCard = `
                        <div class="col-md-4">
                            <div class="card mb-4">
                                ${product.image ? 
                                    `<img src="/storage/${product.image}" class="card-img-top" alt="${product.name}">` : 
                                    `<img src="/storage/images/null.jpg" class="card-img-top" alt="Imagen no disponible">`}
                                <div class="card-body">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text">${product.description}</p>
                                    <p class="card-text"><strong>Precio:</strong> $${product.price}</p>
                                    <p class="card-text"><strong>Stock:</strong> ${product.stock}</p>
                                    <button class="btn btn-rounded comprar-btn" 
                                            data-product-id="${product.idProduct}" 
                                            data-product-price="${product.price}" 
                                            style="font-size: 1.5rem; color: #947ed3;">
                                        Comprar
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    productList.innerHTML += productCard;
                });

                // Agregar el evento a los botones "Comprar"
                document.querySelectorAll('.comprar-btn').forEach(button => {
                    button.addEventListener('click', async function () {
                        if (!window.isAuthenticated) {
                            console.log('Usuario no autenticado, redirigiendo al login...');
                            window.location.href = window.loginUrl;
                        } else if (!window.userHasCompleteProfile) {
                            console.log('Perfil incompleto, redirigiendo a la edición de perfil...');
                            window.location.href = window.profileUrl;
                        } else {
                            // Realizar la solicitud de compra al controlador
                            const productId = this.getAttribute('data-product-id');
                            const productPrice = this.getAttribute('data-product-price');
                            const quantity = 1; // Puedes modificar esto si quieres permitir al usuario elegir la cantidad
                            const total = productPrice * quantity;

                            try {
                                const response = await fetch('/orders', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        products: [{ id: productId, quantity: quantity }],
                                        total: total,
                                        payment_method_id: 1 // Aquí puedes ajustar el método de pago si quieres permitir selección dinámica
                                    })
                                });

                                if (response.ok) {
                                    const result = await response.json();
                                    Swal.fire({
                                        title: '¡Pedido hecho con éxito!',
                                        text: result.message,
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar'
                                    });
                                } else {
                                    const error = await response.json();
                                    Swal.fire({
                                        title: 'Error',
                                        text: error.error || 'Error al realizar el pedido.',
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar'
                                    });
                                }
                            } catch (error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Hubo un problema en el proceso de compra. Inténtalo nuevamente.',
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        }
                    });
                });
            } else {
                alert('Error al cargar los productos.');
            }
        };

        xhr.onerror = function () {
            alert('Error de red al intentar cargar los productos.');
        };

        xhr.send();
    }

    loadProducts();
});


</script>




</body>

</html>
