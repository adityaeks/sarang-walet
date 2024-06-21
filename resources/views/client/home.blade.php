<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pasakrorasakti</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/landingPage/css/bootstrap.css') }}" />
    <!--slick slider stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('assets/landingPage/css/slick-theme.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('assets/landingPage/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/landingPage/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/landingPage/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>

    <div class="main_body_content">

        <div class="hero_area">
            <!-- header section strats -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            Pasakrorasakti
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.about') }}"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="chocolate.html">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="testimonial.html">Testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                            <div class="quote_btn-container">
                                <form class="form-inline">
                                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->
            <!-- slider section -->
            <section class="slider_section" id="home">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($home as $index => $item)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="detail_box">
                                                <h1>
                                                    <span>
                                                        {{ $item->name }}
                                                    </span>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ml-auto">
                                            <div class="img-box">
                                                <img src="{{ asset('/storage/images/home/' . $item->image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <!-- end slider section -->
        </div>

        <!-- about section -->
        <section class="about_section layout_padding ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    {{ $about->title }}
                                </h2>
                            </div>
                            <p>
                                {{ $about->content }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="{{ asset('/storage/images/about/' . $about->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about section -->

        <!-- chocolate section -->

        <section class="chocolate_section ">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Varian Sarang Walet
                    </h2>
                    <p>
                        Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="chocolate_container">
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Premium <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 14.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Standart <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 11.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Pecahan <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 9.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Premium <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 14.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Standart <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 11.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="assets/landingPage/images/chocolate3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Pecahan <span>Sarang Walet</span>
                            </h6>
                            <h5>
                                Rp 9.000.000
                            </h5>
                            <a href="">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end chocolate section -->

        <!-- offer section -->

        <section class="offer_section layout_padding">
            <div class="container">
                <div class="box">
                    <div class="detail-box">
                        <h2>
                            Sedang Diskon
                        </h2>
                        <h3>
                            Diskon Sampai 10% <br>
                            Standart Sarang Walet
                        </h3>
                        <a href="">
                            Buy Now
                        </a>
                    </div>
                    <div class="img-box">
                        <img src="assets/landingPage/images/offer-img.png" alt="">
                    </div>
                </div>
                <div class="btn-box">
                    <a href="">
                        <span>
                            See More
                        </span>
                        <img src="assets/landingPage/images/color-arrow.png" alt="">
                    </a>
                </div>
            </div>
        </section>

        <!-- end offer section -->

        <!-- client section -->

        <section class="client_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <div class="img-box sub_img-box">
                            <img src="assets/landingPage/images/client-chocolate.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 px-0">
                        <div class="client_container">
                            <div class="heading_container">
                                <h2>
                                    Testimonial
                                </h2>
                            </div>
                            <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($testimonial as $index => $item)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="box">
                                                <div class="img-box">
                                                    <img src="{{ asset('/storage/images/testimonial/' . $item->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="detail-box">
                                                    <h4>
                                                        {{ $item->name }}
                                                    </h4>
                                                    <p>
                                                        {{ $item->coment }}
                                                    </p>
                                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="carousel_btn-box">
                                    <a class="carousel-control-prev" href="#customCarousel2" role="button"
                                        data-slide="prev">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#customCarousel2" role="button"
                                        data-slide="next">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end client section -->


        <!-- contact section -->

        <section class="contact_section layout_padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                        <div class="form_container">
                            <div class="heading_container">
                                <h2>
                                    Contact Us
                                </h2>
                            </div>
                            <form action="">
                                <div>
                                    <input type="text" placeholder="Full Name " />
                                </div>
                                <div>
                                    <input type="text" placeholder="Phone number" />
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="text" class="message-box" placeholder="Message" />
                                </div>
                                <div class="d-flex ">
                                    <button>
                                        SEND NOW
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6  px-0">
                        <div class="map_container">
                            <div class="map">
                                <div id="googleMap"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end contact section -->

    </div>

    @include('layouts.footer')

    <!-- jQery -->
    <script src="assets/landingPage/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/landingPage/js/bootstrap.js"></script>
    <!-- slick slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <!-- custom js -->
    <script src="assets/landingPage/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
