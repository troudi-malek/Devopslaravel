<!doctype html>
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
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

    <body>
        <header class="container-flui">
           <div class="header-top">
               <div class="container">
                    <div class="row">
                        <div class="col-md-4 d-none d-md-block mail-detail">
                            <ul>
                                <li>Call US : +12 878 777 76765</li>
                                <li>Email : info@thetraveller.com</li>
                            </ul>
                        </div>
                        <div class="col-md-4 logo">
                            <img src="{{asset('assets/images/logo.png')}}" alt="">
                            <a data-toggle="collapse" data-target="#menu-jk" href="#menu-jk"><i class="fas d-block d-sm-block d-md-none small-menu fa-bars"></i></a>
                        </div>
                        <div class="col-md-4 d-none d-md-block social-link ">
                            <ul>
                                <li>
                                    <i class="fab fa-facebook-square"></i>
                                </li>
                                <li>
                                    <i class="fab fa-twitter-square"></i>
                                </li>
                                <li>
                                    <i class="fab fa-instagram"></i>
                                </li>
                                <li>
                                    <i class="fab fa-linkedin"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
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


    </div>
       
       
          <!--*************** About Us Starts Here ***************-->
   
   <section id="about" class="contianer-fluid about-us">
       <div class="container">
            <div class="row">
                <div class="col-md-7 text">
                    <h2>About Smart Traveler</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. dummy text of the printing and  been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.dummy text of the has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some formhumour, or randomised words which don't look even slightly believable. If you are going to use a passage.There are many variations of passages of Lorem Ipsum available slightly believable. If you are going to use a passage.</p>
                </div>
                <div class="col-md-5 center image">
                    <img src="{{asset('assets/images/about.png')}}" alt="">
                </div>
            </div>
       </div>
   </section>
      
        <!--  *************************Our Team Start Here ************************** -->
        
        <div class="our-team">
           <div class="container">
       
                 <div class="row session-title">
                    <h2>What We Offer</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin nisi id consequat bibendum. Phasellus at convallis elit. In purus enim, scelerisque id arcu vitae</p>
                 </div>  
            
            <div class="row">
                     <div class="col-md-3 col-sm-6">
                        <div class="card-1 team-member">
                             <img src="{{asset('assets/images/team/team-1.jpg')}}" alt="Team Member 1">
                             
                             <p><b>Siva Kumar</b> (CEO & Chairman)</p>
                             <ul class="row">
                                 <li><i class="fab fa-facebook-f"></i></li>
                                 <li><i class="fab fa-twitter"></i></li>
                                 <li><i class="fab fa-linkedin-in"></i></li>
                                 <li><i class="fab fa-google-plus-g"></i></li>
                                 <li><i class="fab fa-pinterest-p"></i></li>
                             </ul>
                        </div>
                     </div>
                    
                       <div class="col-md-3 col-sm-6">
                        <div class="card-1 team-member">
                             <img src="{{asset('assets/images/team/team-2.jpg')}}" alt="Team Member 1">
                             
                             <p><b>Siva Kumar</b> (CEO & Chairman)</p>
                             <ul class="row">
                                 <li><i class="fab fa-facebook-f"></i></li>
                                 <li><i class="fab fa-twitter"></i></li>
                                 <li><i class="fab fa-linkedin-in"></i></li>
                                 <li><i class="fab fa-google-plus-g"></i></li>
                                 <li><i class="fab fa-pinterest-p"></i></li>
                             </ul>
                        </div>
                     </div>
                        <div class="col-md-3 col-sm-6">
                        <div class="card-1 team-member">
                            <img src="{{asset('assets/images/team/team-3.jpg')}}" alt="Team Member 1">
                             
                             <p><b>Siva Kumar</b> (CEO & Chairman)</p>
                             <ul class="row">
                                 <li><i class="fab fa-facebook-f"></i></li>
                                 <li><i class="fab fa-twitter"></i></li>
                                 <li><i class="fab fa-linkedin-in"></i></li>
                                 <li><i class="fab fa-google-plus-g"></i></li>
                                 <li><i class="fab fa-pinterest-p"></i></li>
                             </ul>
                        </div>
                     </div>
                        <div class="col-md-3 col-sm-6">
                        <div class="card-1 team-member">
                             <img src="{{asset('assets/images/team/team-4.jpg')}}" alt="Team Member 1">
                             
                             <p><b>Siva Kumar</b> (CEO & Chairman)</p>
                             <ul class="row">
                                 <li><i class="fab fa-facebook-f"></i></li>
                                 <li><i class="fab fa-twitter"></i></li>
                                 <li><i class="fab fa-linkedin-in"></i></li>
                                 <li><i class="fab fa-google-plus-g"></i></li>
                                 <li><i class="fab fa-pinterest-p"></i></li>
                             </ul>
                        </div>
                     </div>
                 </div>
           </div>
          
        </div>
        
  <!-- ######## Our Team End ####### --> 
       
        
    <!--################### Destinations Starts Here #######################--->
        
       
    <div class="destinations container-fluid">
    <div class="container">
        <div class="session-title">
            <h2>Our Destinations</h2>
            <p>Explore our curated destinations and book your trip instantly!</p>
        </div>
        <div class="dest-row row">
            <div class="col-lg-4 col-md-6">
                <div class="dest-col">
                    <div class="dest-img">
                        <img src="assets/images/destination/d2.jpg" alt="">
                    </div>
                    <h3>Switzerland</h3>
                    <p>Experience the beautiful mountains of Switzerland.</p>
                    <button class="btn btn-outline-success book-now-btn" data-destination="Switzerland">Book Now</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dest-col">
                    <div class="dest-img">
                        <img src="assets/images/destination/d3.jpg" alt="">
                    </div>
                    <h3>Maldives</h3>
                    <p>Relax in the beautiful beaches of the Maldives.</p>
                    <button class="btn btn-outline-success book-now-btn" data-destination="Maldives">Book Now</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dest-col">
                    <div class="dest-img">
                        <img src="assets/images/destination/d4.jpg" alt="">
                    </div>
                    <h3>Sri Lanka</h3>
                    <p>Enjoy the rich culture and history of Sri Lanka.</p>
                    <button class="btn btn-outline-success book-now-btn" data-destination="Switzerland">Book Now</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Booking Confirmation -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Confirm Your Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="bookingMessage">Are you sure you want to book a trip to <strong id="destinationName"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmBooking" class="btn btn-success">Confirm</button>
            </div>
        </div>
    </div>
</div>

      
      
    

      
       
      <!--*************** Testionial  Starts Here *************** -->
    <section class="customer-serv">
            <div class="container">
                <div class="row session-title">
                    <h2>Happy Customers</h2>

                </div>

                <div class="row ro-clo">
                    <div data-anijs="if: scroll, on: window, do: bounceInLeft animated, before: scrollReveal" class="col-12  col-md-6 col-lg-4">
                        <div class="shado-2 card-b">
                            <p>Classic Aqua water purify is good.Because its cure our purify that is called  health and gives good life. I suggest classic aqua for its best purify of water</p>
                        </div>
                        <div class="cust-det row">
                            <div class="col-sm-3 col-3 img-circl">
                                <img alt="" src="{{asset('assets/images/testimonial/member-01.jpg')}}">
                            </div>
                            <div class="col-sm-5 col-5 an-mtc no-padding">
                                <b>Sarath Ali</b>
                                <p>(Sales Agent)</p>
                            </div>
                            <div class="col-sm-4 col-4 star-par">
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12  col-md-6 col-lg-4">
                        <div class="shado-2 card-b">
                            <p> have use this product at my home last 1 and half year of this. This product quality is good.Its good quality product for use it can improve water Quality.
                            </p>
                        </div>
                        <div class="cust-det row">
                            <div class="col-sm-3 col-3 img-circl">
                                <img alt="" src="assets/images/testimonial/member-02.jpg">
                            </div>
                            <div class="col-sm-5 col-5 an-mtc no-padding">
                                <b>Binny Aderson</b>
                                <p>(Sales Agent)</p>
                            </div>
                            <div class="col-sm-4  col-4 star-par">
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-anijs="if: scroll, on: window, do: bounceInRight animated, before: scrollReveal" class="col-12  col-md-6 col-lg-4">
                        <div class="shado-2 card-b">
                            <p>Very essensial product.it is clean and helthy water is mutually most important so that acqa is fufil its quality.our life now a days very tressful and restless</p>
                        </div>
                        <div class="cust-det row">
                            <div class="col-sm-3 col-3 img-circl">
                                <img alt="" src="assets/images/testimonial/member-03.jpg">
                            </div>
                            <div class="col-sm-5 col-5 an-mtc no-padding">
                                <b>Arjun Samluel</b>
                                <p>(Sales Agent)</p>
                            </div>
                            <div class="col-sm-4 col-4 star-par">
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
       
            
     <!--*************** Key Features Starts Here ***************-->

    <div id="features" class="features container-fluid">
        <div class="container">
            <div class="session-title">
                <h2>Key Features of this Phone</h2>
            </div>
            <div class="ker-featur-row row">
                <div data-aos="fade-right" data-aos-duration="1500" class="col-md-4 featurecol feature-left">
                    <div class="single-feature">
                       
                       <div class="detail">
                           <h6>100% Safety</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                 Voluptatem, inventore</p>
                       </div>
                       <div class="icon">
                           <i class="far fa-bell"></i>
                       </div>
                        
                        
                    </div>
                    <div class="single-feature">
                       
                         <div class="detail">
                        <h6>Afordable Packages</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                        <div class="icon">
                             <i class="far fa-heart"></i>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4 featur-image">
                    <img src="assets/images/traveler.png" alt="">
                </div>
                <div data-aos="fade-left" data-aos-duration="1500" class="col-md-4 featurecol feature-right">
                    
                    <div class="single-feature">
                       <div class="icon">
                        <i class="far fa-images"></i>
                        </div>
                        <div class="detail">
                        <h6>Tourist Guid</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                    </div>
                    <div class="single-feature">
                           <div class="icon">
                            <i class="fab fa-audible"></i>
                          </div>
                            <div class="detail">
                            <h6>Exciting Places</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Voluptatem, inventore</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    
     <!--*************** Blog Starts Here ***************-->
                     
    <div class="container-fluid blog">
        <div class="container">
             <div class="session-title">
                <h2>Our Blog</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin nisi id consequat bibendum. Phasellus at convallis elit. In purus enim, scelerisque id arcu vitae</p>
            </div>
                <div class="blog-row row">
                    <div class="col-lg-4 col-md-6 ">
                       <div class="blog-col">
                            <img src="assets/images/destination/d1.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     <div class="col-lg-4 col-md-6">
                       <div class="blog-col">
                            <img src="assets/images/destination/d2.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     <div class="col-lg-4 col-md-6 ">
                       <div class="blog-col">
                            <img src="assets/images/destination/d3.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     
            </div>
        </div>
        
    </div>    
    
              
<!--*************** Footer  Starts Here *************** -->                                  

   <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 about">
                <h2>About Us</h2>
                <p>Phasellus scelerisque ornare nisl sit amet pulvinar. Nunc non scelerisque augue. Proin et sollicitudin velit. </p>
                
                <div class="foot-address">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="addet">
                        BlueDart
                        Marthandam (K.K District)
                        Tamil Nadu, IND 
                    </div>
                </div>
                <div class="foot-address">
                    <div class="icon">
                        <i class="far fa-envelope-open"></i>
                    </div>
                    <div class="addet">
                        info@smarteyeapps.com <br>
                        sales@smarteyeapps.com
                    </div>
                </div>
                <div class="foot-address">
                    <div class="icon">
                         <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="addet">
                        +23 323 43434 <br>
                        +1 3232 434 55
                    </div>
                </div>
            </div>
            <div class="col-md-3 fotblog">
                <h2>From latest Blog</h2>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
            </div>
            <div class="col-md-3 glink">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href=""><i class="fas fa-angle-double-right"></i>Home</a></li>
                    <li><a href="about_us.html"><i class="fas fa-angle-double-right"></i>About Us</a></li>
                    <li><a href="services.html"><i class="fas fa-angle-double-right"></i>Services</a></li>
                    <li><a href="blog.html"><i class="fas fa-angle-double-right"></i>Blog</a></li>
                    <li><a href="pricing.html"><i class="fas fa-angle-double-right"></i>Gallery</a></li>
                    <li><a href="contact_us.html"><i class="fas fa-angle-double-right"></i>Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 tags">
                <h2>Easy Tags</h2>
                <ul>
                    <li>Finance</li>
                    <li>Web Design</li>
                    <li>Internet Pro</li>
                    <li>Node Js</li>
                    <li>Java Swing</li>
                    <li>Angular Js</li>
                    <li>Vue Js</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="copy">
            <div class="container">
                <a href="https://www.smarteyeapps.com/">2015 &copy; All Rights Reserved | Designed and Developed by Smarteyeapps</a>
                
                <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
        </span>
            </div>

        </div>
  
        
        
        
   
   
   
    </body>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        let selectedDestination = '';

        $('.book-now-btn').on('click', function () {
            selectedDestination = $(this).data('destination');
            $('#destinationName').text(selectedDestination);
            $('#bookingModal').modal('show');
        });

        // Handle confirmation button click
        $('#confirmBooking').on('click', function () {
            $.ajax({
                url: "{{ route('reservations.store') }}",  // Laravel route
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Include the CSRF token
                },
                data: {
                    destination: selectedDestination,
                    user_id: 2,  // Assuming you are using a default user_id of 1. This should be dynamic in a real application.

                    date_reservation: new Date().toISOString().split('T')[0],
                    statut: 'en attente',
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Réservation réussie!',
                            text: 'Votre réservation pour ' + selectedDestination + ' a été confirmée.',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Un problème est survenu avec votre réservation.',
                            confirmButtonText: 'Réessayer'
                        });
                    }
                    $('#bookingModal').modal('hide');
                },
                error: function (error) {
                    console.error('Erreur:', error.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Une erreur est survenue. Veuillez réessayer.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{asset('assets/plugins/slider/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</html>