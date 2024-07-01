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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/landingPage/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/landingPage/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/landingPage/css/responsive.css') }}" rel="stylesheet" />

<body>
    @include('layouts.header')
    {{-- tes --}}
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                {{-- @foreach ($data as $item) --}}
                    <aside class="col-lg-6">
                        <div class="border rounded-4 mb-3 d-flex justify-content-center">
                            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                                href="{{ asset('/storage/images/product/' . $product->image) }}">
                                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                    src="{{ asset('/storage/images/product/' . $product->image) }}" />
                            </a>
                        </div>
                        <!-- thumbs-wrap.// -->
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-lg-6">
                        <div class="ps-lg-3">
                            <h4 class="title text-dark">
                                {{ $product->name }}
                            </h4>
                            <div class="d-flex flex-row my-3">
                                <span class="text-muted"><i
                                        class="fas fa-cubes fa-sm mx-1"></i>{{ $product->count}} -</span>
                                <span class="text-success ms-2"> In stock</span>
                            </div>

                            <div class="mb-3">
                                <span class="h5">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>

                            <p>
                                {!! $product->description !!}
                            </p>

                            <div class="row">
                                <dt class="col-3">Kategori:</dt>
                                <dd class="col-9">{{ $product->category }}</dd>
                            </div>

                            <hr />

                            <div class="row mb-4">
                                <div class="col-md-4 col-6 mb-3">
                                    <label class="mb-2 d-block">Quantity</label>
                                    <div class="input-group mb-3" style="max-width: 170px;">
                                        <button class="btn btn-white border border-secondary px-3" type="button" id="decrement">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="form-control text-center border border-secondary" placeholder="1" min="1" aria-label="Quantity" id="quantity" value="1">
                                        <button class="btn btn-white border border-secondary px-3" type="button" id="increment">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                            <a href="#" class="btn btn-primary shadow-0"> <i
                                    class="me-1 fa fa-shopping-basket"></i>
                                Add to cart </a>
                        </div>
                    </main>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>
    <!-- content -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var decrementButton = document.getElementById('decrement');
            var incrementButton = document.getElementById('increment');
            var quantityInput = document.getElementById('quantity');

            decrementButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            incrementButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });
        });
    </script>

</body>

</html>
