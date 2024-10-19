<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travelet Free Website Tempalte | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

</head>
<body>
<header class="container-flui">
           
           <div id="menu-jk" class="header-nav d-none d-md-block">
               <div class="container">
                   <div class="row nav-row">
                       <ul>
                       <li><a href="/">Home</a></li>
                           <li><a href="about_us.html">About Us</a></li>
                           <li><a href="destinations.html">Destinations</a></li>
                           <li><a href="{{ route('evenements.index') }}" ><i class="fas fa-angle-double-right"></i>Evenements</a></li>
                           <li><a href="{{ route('hebergements.index') }}" ><i class="fas fa-angle-double-right"></i>Hebergement</a></li>
                           <li><a href="gallery.html">Gallery</a></li>
                           <li><a href="contact_us.html">Contact Us</a></li>
                           <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
                       </ul>
                   </div>
               </div>
           </div>
            
        </header>   
       
        
        
<!--################### Slider Starts Here #######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="{{asset('assets/images/slider/slid_1.jpg')}}" alt="First slide">
                    <div class="carousel-caption fvgb d-none d-md-block">
                        <h5 class="animated bounceInDown">Create an Awesome Website Today </h5>
                        <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class="row vbh">

                            <div class="btn btn-primary animated bounceInUp"> Book Trip </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('assets/images/slider/slid_2.jpg')}}" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Best Free Educational Template</h5>
                        <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class="row vbh">

                            <div class="btn btn-primary animated bounceInUp"> Book Trip </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
            @yield('content')
        </div>

    </div>
</header>
   
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{asset('assets/plugins/slider/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</html>

