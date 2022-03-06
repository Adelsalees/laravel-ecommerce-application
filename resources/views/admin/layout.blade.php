<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

        <!-- Fontfaces CSS-->
        <link href="{{asset('admin_asset/css/font-face.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('admin_asset/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('admin_asset/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('admin_asset/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <!-- Bootstrap CSS-->
        <link href="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    
      
        <!-- Main CSS-->
        <link href="{{asset('admin_asset/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body >
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_asset/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard_class')" >
                            <a  href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li class="@yield('catagary_class')">
                            <a href="{{ url('admin/catagary') }}">
                               <i class="fas fa-list"></i>Catagary</a>
                        </li>
                        <li class="@yield('coupon_class')">
                            <a href="{{ url('admin/coupon') }}">
                               <i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size_class')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-window-maximize"></i>Size</a>
                        </li>
                        <li class="@yield('color_class')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fa-solid fa-brush"></i>Color</a>
                        </li>
                        <li class="@yield('brand_class')">
                            <a href="{{ url('admin/brand') }}">
                                <i class="fa-brands fa-elementor"></i>Brands</a>
                        </li>
                        <li class="@yield('tax_class')">
                            <a href="{{ url('admin/tax') }}">
                                <i class="fa-solid fa-percent"></i>Tax</a>
                        </li>
                        <li class="@yield('homeBanner_class')">
                            <a href="{{ url('admin/homeBanner') }}">
                                <i class="fa-solid fa-signs-post"></i>Home Banner</a>
                        </li>
                        <li class="@yield('product_class')">
                            <a href="{{ url('admin/product') }}">
                                <i class="fa-brands fa-product-hunt"></i>Products</a>
                        </li>
                        <li class="@yield('customer_class')">
                            <a href="{{ url('admin/customer') }}">
                                <i class="fa-solid fa-user"></i></i>Customers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin_asset/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_class')" >
                            <a  href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li class="@yield('catagary_class')">
                            <a href="{{ url('admin/catagary') }}">
                               <i class="fas fa-list"></i>Catagary</a>
                        </li>
                        <li class="@yield('coupon_class')">
                            <a href="{{ url('admin/coupon') }}">
                               <i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size_class')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-window-maximize"></i>Size</a>
                        </li>
                        <li class="@yield('color_class')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fa-solid fa-brush"></i>Color</a>
                        </li>
                        <li class="@yield('brand_class')">
                            <a href="{{ url('admin/brand') }}">
                                <i class="fa-brands fa-elementor"></i>Brands</a>
                        </li>
                        <li class="@yield('brand_class')">
                            <a href="{{ url('admin/tax') }}">
                                <i class="fa-solid fa-percent"></i>Tax</a>
                        </li>
                        <li class="@yield('homeBanner_class')">
                            <a href="{{ url('admin/homeBanner') }}">
                                <i class="fa-solid fa-signs-post"></i>Home Banner</a>
                        </li>
                        <li class="@yield('product_class')">
                            <a href="{{ url('admin/product') }}">
                                <i class="fa-brands fa-product-hunt"></i>Products</a>
                        </li>
                        <li class="@yield('customer_class')">
                            <a href="{{ url('admin/customer') }}">
                                <i class="fa-solid fa-user"></i></i>Customers</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('admin/logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                                @section('container');
                                @show
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


 <!-- Jquery JS-->
 <script src="{{asset('admin_asset/vendor/jquery-3.2.1.min.js')}}"></script>
 
 <!-- Bootstrap JS-->
 <script src="{{asset('admin_asset/vendor/bootstrap-4.1/popper.min.js')}}"></script>
 <script src="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
 <!-- Vendor JS       -->
 <script src="{{asset('admin_asset/vendor/wow/wow.min.js')}}"></script>

 <!-- Main JS-->
 <script src="{{asset('admin_asset/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
