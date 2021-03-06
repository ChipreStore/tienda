<?php
if(!isset($_SESSION)){ 
        session_start(); 
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Chipre Store - Tienda de ropa online. Ropa importada al mejor precio. Aceptamos todas las tarjetas. Camisas, remeras, chombas, jeans, bermudas, shorts, mallas, gorras.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chipre Store - Tienda de ropa online</title>
    <link rel="canonical" href="chiprestore.com">
    <link rel="shortcut icon" href="/img/logo.ico">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/Template/core-style.css">
    
    @yield('head')
</head>

<body>
    <h1 style="display: none;">Chipre Store - Tienda de ropa online</h1>
<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    
    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="/"><img src="/img/logo.svg" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <aside class="header-area clearfix mt-0" style="border-style: solid; border-width: 0px 3px 0px 0px; border-color:#000">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div>
            <a href="/"><img src="/img/logo.svg" alt=""></a>
        </div>
        
        <?php
            $cart = 0;
            if (isset($_COOKIE['product'])){
                foreach ($_COOKIE['product'] as $cookiep){
                    $cart += sizeof($cookiep);
                }
            }
        ?>
        
        <!-- Nav -->
        <nav class="amado-nav">
            <ul>
                <li id="index"><a href="{{action('ShopController@index')}}">Inicio</a></li>
                <li id="products"><a href="{{action('ShopController@products')}}">Productos</a></li>
                <li id="product_details"><a href="@if (isset($_SESSION['product'])) {{action('ShopController@product_details', ['id'=>$_SESSION['product']])}} @else # @endif">Detalles</a></li>
                <li id="cart"><a href="{{action('ShopController@cart')}}" class="cart-nav"><img src="/img/core-img/cart.png"> Carrito <span>({{$cart}})</span></a></li>
            </ul>
        </nav>
        <div class="amado-btn-group mt-30 mb-50">
            <a href="{{action('ShopController@discount_products')}}" class="btn amado-btn mb-15" id="discount_products">En descuento</a>
            <a href="{{action('ShopController@new_products')}}" class="btn amado-btn" id="new_products">Lo nuevo</a>
        </div>
        <hr>
        @if (isset($_SESSION['role']) and $_SESSION['role'] == 'Cliente')
            <div class="mb-10">
                <label>{{$_SESSION['name']}}</label>
            </div>
            <div class="cart-fav-search mb-10">
                <a href="{{action('CustomerController@list_purchases')}}"><i class="fa fa-truck"></i> Mis compras</a>
            </div>
            <div class="cart-fav-search mb-30">
                <a href="{{action('SessionController@logout')}}"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
            </div>
        @else
            <div class="cart-fav-search mb-10">
                <a href="{{action('SessionController@login')}}"><i class="fa fa-sign-in"></i> Ingresar</a>
            </div>
            <div class="cart-fav-search mb-30">
                <a href="{{action('SessionController@login')}}"><i class="fa fa-user-plus"></i> Registrarse</a>
            </div>
        @endif
        
        <!-- Social Buttons -->
        <div class="social-info d-flex justify-content-between mx-4">
            <a href="https://www.instagram.com/chiprestore/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/Chipre-Store-995097487294669/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
    </aside>
    
    @yield('body')
</div>
    
@yield('modal')

<footer class="footer_area clearfix" style="border-style: solid; border-width: 5px 0px 0px 0px; border-color:#000">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-4">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="/"><img src="/img/logo.svg"></a>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-8">
                <div class="single_widget_area">
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <div class="collapse navbar-collapse" id="footerNavContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{action('ShopController@index')}}">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{action('ShopController@products')}}">Productos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="@if (isset($_SESSION['product'])) {{action('ShopController@product_details', ['id'=>$_SESSION['product']])}} @else # @endif">Detalles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{action('ShopController@cart')}}">Carrito ({{$cart}})</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/Template/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/Template/popper.min.js"></script>
    <script src="/js/Template/bootstrap.min.js"></script>
    <script src="/js/Template/plugins.js"></script>
    <script src="/js/Template/active.js"></script>
    @yield('footer')
</footer>
    
    
</body>
</html>