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

    <style>
        .more-link {
            color: #007bff;
            /* Blue color */
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>


</head>

<body>

    <div class="main_body_content">

        <div class="hero_area">
            <!-- header section strats -->
            @include('layouts.header')
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
        <section class="about_section layout_padding">
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
                                {{ Str::words($about->content, 50, '...') }}
                            </p>
                            <a href="{{ route('client.about') }}" class="more-link">Read More</a>
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
                    @foreach ($data as $item)
                        <div class="box">
                            <a href="{{ route('client.product_detail', $item->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('/storage/images/product/' . $item->image) }}" alt>
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        Premium <span>{{ $item->name }}</span>
                                    </h6>
                                    <h5>
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </h5>
                                    <a href>
                                        BUY NOW
                                    </a>
                                </div>
                            </a>
                        </div>
                    @endforeach
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

        <section class="client_section" id="testimonial">
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

        <section class="contact_section layout_padding" id="contact">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var maxLength = 200; // Max length of content to show initially
            var content = $('.about-content').html(); // Get the content
            var moreText = content.substr(maxLength); // Get the part to be hidden

            // Initial display of content
            $('.about-content').html(content.substr(0, maxLength));
            $('.about-more').html(moreText);

            // Toggle Read More link
            $('.more-link').click(function(event) {
                event.preventDefault();
                var $this = $(this);
                var text = $this.text();
                $('.about-more').toggle();
                $('.about-content').toggle();
                $this.text(text == "Read More" ? "Read Less" : "Read More");
            });
        });
    </script>


</body>

</html>
