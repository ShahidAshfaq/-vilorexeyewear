<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $store->name ?? 'Vilorex Eye Wearr')</title>

    <meta name="description"
        content="@yield('description', $store->description ?? 'Shop quality eyewear online.')">

    <meta name="keywords"
        content="ecommerce, store, shopping, eyewear">

    @if($store?->logo)
        <link rel="icon"
            type="image/png"
            href="{{ asset('storage/app/public/' . $store->logo) }}">
    @endif
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- AOS -->
    <link href="{{ asset('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Swiper -->
    <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('user/assets/css/style.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>

    <!-- ==========================
            HEADER
    =========================== -->
    @include('user.partials.header')



    <!-- ==========================
            PAGE CONTENT
    =========================== -->
    <main>
        
        @yield('content')

    </main>



    <!-- ==========================
            FOOTER
    =========================== -->
    @include('user.partials.footer')



    <!-- Scroll Top -->
    <button id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </button>



    <!-- Bootstrap -->
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AOS -->
    <script src="{{ asset('user/assets/vendor/aos/aos.js') }}"></script>

    <!-- Swiper -->
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

    <script>

        AOS.init({
            duration:800,
            once:true
        });

    </script>

    @stack('js')

</body>

</html>