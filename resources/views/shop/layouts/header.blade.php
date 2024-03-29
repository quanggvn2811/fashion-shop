<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/')}}"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{URL::to('shop/customer/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{URL::to('shop/customer/carts')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                           @if(Session::has('username_logged_in') || Session::has('account_logged_in'))
                                <li><a href="{{URL::to('shop/customer/logout')}}"><i class="fa fa-unlock"></i> Logout</a></li>
                            @else
                                <li><a href="{{URL::to('shop/customer/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="{{URL::to('shop/products')}}">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('shop/products')}}">Products</a></li>
                                    <li><a href="{{URL::to('shop/product-details')}}">Product Details</a></li>
                                    <li><a href="{{URL::to('shop/checkout')}}">Checkout</a></li>
                                    <li><a href="{{URL::to('shop/cart')}}">Cart</a></li>
                                    <li><a href="{{URL::to('shop/login')}}">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{URL::to('blog/blog-list')}}">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('blog/blog-list')}}">Blog List</a></li>
                                    <li><a href="{{URL::to('blog/blog-single')}}">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/')}}">404</a></li>
                            <li><a href="{{URL::to('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                       <form action="{{URL::to('shop/search')}}" method="GET">
                            <input type="text" name="sText" placeholder="Search"/>
                       </form>
                    </div>
                    <div style="float: right;">
                        <form action="">
                            <input id="imgSearch" type="file" name="imgSearch" class="hidden" onchange="changeImg(this)">
                            <i alt="Search product by iamge" style="font-size: 26px" onmouseup="this.style.color='black';" onmousedown="this.style.color='blue';" class="fa fa-camera"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </header><!--/header-->
