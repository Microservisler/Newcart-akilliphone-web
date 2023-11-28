<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet - Akıllıphone</title>
    <link rel="stylesheet" href="{{ url('assets/css/shopping/style.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('head', '')
    <style>
        .decrease-increase{
            text-align: center;
            border: none;
            margin: 0px;
            width: 40px;
            height: 100%;
            background: #F9F9F9;
        }
        .basket-messages {
            font-size: 12px;
            clear: both;
            width: 100%;
            margin-bottom: 15px;
            padding-right: 22px;
        }
        .basket-message {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #313131;
        }
        .basket-message.text-danger {
            color: #e91e63;
        }
        .basket-message.text-success {
            color: #32a200;
        }
    </style>

</head>

<body>
<section class="shopping_section">
    <div class="container">
        @yield('content', '')
    </div>
</section>
@yield('recently-viewed', '')
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script src="{{ url('assets/js/owl.carousel.min.js') }}?_v={{ env('ASSETS_VER') }}"></script>
<script src="{{ url('assets/js/basketService.js') }}?_v={{ env('ASSETS_VER') }}{{ time() }}"></script>

<script>
    lazyload();
    $(function() {
        $('[data-decrease]').click(decrease);
        $('[data-increase]').click(increase);
        $('[data-value]').change(valueChange);
    });

    function decrease() {
        var value = $(this).parent().find('[data-value]').val();
        if(value > 1) {
            value--;
            $(this).parent().find('[data-value]').val(value);
        }
    }

    function increase() {
        var value = $(this).parent().find('[data-value]').val();
        if(value < 100) {
            value++;
            $(this).parent().find('[data-value]').val(value);
        }
    }

    function valueChange() {
        var value = $(this).val();
        if(value == undefined || isNaN(value) == true || value <= 0) {
            $(this).val(1);
        } else if(value >= 101) {
            $(this).val(100);
        }
    }

    $(document).ready(function () {
        $(".product-slider").owlCarousel({
            responsiveClass: true,
            dotsClass: 'custom-dots owl-dots',
            responsive: {
                0: {
                    items: 2,
                    margin: 8,
                    dots: true,
                },
                425: {
                    items: 2,
                    margin: 15,
                },
                500: {
                    items: 3,
                    margin: 20,
                },
                768: {
                    items: 4,
                    margin: 15,
                },
                1024: {
                    items: 5,
                    margin: 10,
                },
                1200: {
                    items: 6,
                    margin: 30,
                    dots: false,
                    drag: false,
                    mouseDrag: false,
                }
            }
        });

    });
</script>
@yield('js', '')
<script>
    @if($flash = session()->get('flash-error'))
    Swal.fire({
        title: '{{ $flash[0] }} {{ $flash[1] }}',
        toast: true,
        position: 'top-end',
        timer: 3000,
        icon: 'error',
        showConfirmButton: false,
    });
    @endif
    @if($flash = session()->get('flash-success'))
    Swal.fire({
        title: '{{ $flash[0] }} {{ $flash[1] }}',
        toast: true,
        position: 'top-end',
        timer: 3000,
        icon: 'success',
        showConfirmButton: false,
    });
    @endif
</script>

</body>
</html>
