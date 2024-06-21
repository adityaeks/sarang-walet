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
    <link rel="stylesheet" type="text/css" href="assets/landingPage/css/bootstrap.css" />
    <!--slick slider stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- slick slider -->

    <link rel="stylesheet" href="assets/landingPage/css/slick-theme.css" />
    <!-- font awesome style -->
    <link href="assets/landingPage/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/landingPage/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="assets/landingPage/css/responsive.css" rel="stylesheet" />
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .chocolate-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .img-box {
            text-align: center;
            margin-bottom: 10px;
            width: 100%;
            height: 200px;
            /* Atur tinggi sesuai kebutuhan Anda */
            overflow: hidden;
        }

        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Agar gambar terpotong jika perlu */
            border-radius: 8px;
            /* Memberikan sudut bulat pada gambar */
        }


        .detail-box {
            text-align: center;
        }

        .detail-box h6 {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .detail-box h6 span {
            font-weight: bold;
            color: #555;
        }

        .detail-box h5 {
            font-size: 18px;
            color: #f44336;
            margin-bottom: 10px;
        }

        .detail-box a {
            display: inline-block;
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .detail-box a:hover {
            background-color: #d32f2f;
        }
    </style>

</head>

<body>
    @include('layouts.header')


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
            <div class="chocolate-container">
                @foreach ($data as $item)
                    <div class="card">
                        <div class="img-box">
                            <img src="{{ asset('/storage/images/product/' . $item->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Premium <span>{{ $item->name }}</span>
                            </h6>
                            <h5>
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </h5>
                            <a href="#">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        F
    </section>

    @include('layouts.footer')


    <!-- end about section -->

    {{-- @yield('content') --}}
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
