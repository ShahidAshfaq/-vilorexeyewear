@extends('user.partials.layout')
@section('content')
    <section class="hero-section">

        {{-- @foreach ($userProfiles as $profile)
            <div class="container">

                <div class="row align-items-cente min-vh-100">

                    <div class="col-lg-6 pt-3">

                        <span class="hero-badge">

                            Premium Eyewear Collection

                        </span>

                        <h1 class="hero-title mt-4">

                            Discover Luxury

                            <br>

                            Eyewear Collection

                        </h1>

                        <p class="hero-text mt-4">

                            {{ $profile->name }}

                        </p>

                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">

                            <a href="{{ route('product.index') }}"
                                class="btn btn-dark btn-lg rounded-pill px-4 px-sm-5 w-100 w-sm-auto">
                                Shop Now
                            </a>

                            <a href="#categories"
                                class="btn btn-outline-dark btn-lg rounded-pill px-4 px-sm-5 w-100 w-sm-auto">
                                Browse Categories
                            </a>

                        </div>

                        <div class="row text-center mt-5 g-3">

                            <div class="col-12 col-sm-6 col-md-4">
                                🚚 Free Shipping
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                💎 Premium Quality
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                🔒 Secure Payment
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 text-center position-relative">

                        <img src="{{ asset('/storage/app/public/' . $profile->image) }}" class="img-fluid hero-image">

                        <div class="floating-card shadow">

                            <img src="{{ asset('/storage/app/public/' . $profile->image) }}">

                            <h6 class="mt-3">

                                Luxury Sunglasses

                            </h6>

                            <strong>

                                Rs. 4,999

                            </strong>

                        </div>

                    </div>

                </div>

            </div>
        @endforeach --}}
        @if($userProfile)

    <div class="container">

        <div class="row align-items-center min-vh-100">

            {{-- LEFT CONTENT --}}

            <div class="col-lg-6 pt-3 text-center">

                <span class="hero-badge">

                    Premium Eyewear Collection

                </span>


                <h1 class="hero-title mt-4">

                    {{ $userProfile->name }}

                </h1>


                <p class="hero-text mt-4">

                    {{ $userProfile->description }}

                </p>


                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">

                    <a href="{{ route('product.index') }}"
                       class="btn btn-dark btn-lg rounded-pill px-4 px-sm-5 w-100 w-sm-auto">

                        Shop Now

                    </a>


                    <a href="#categories"
                       class="btn btn-outline-dark btn-lg rounded-pill px-4 px-sm-5 w-100 w-sm-auto">

                        Browse Categories

                    </a>

                </div>


                {{-- <div class="row text-center mt-5 g-3">

                    <div class="col-12 col-sm-6 col-md-4">

                        🚚 Free Shipping

                    </div>


                    <div class="col-12 col-sm-6 col-md-4">

                        💎 Premium Quality

                    </div>


                    <div class="col-12 col-sm-6 col-md-4">

                        🔒 Secure Payment

                    </div>

                </div> --}}

            </div>


            {{-- RIGHT HERO IMAGE --}}

            <div class="col-lg-6 text-center position-relative">

                @if($userProfile->image)

                    <img
                        src="{{ asset('/storage/app/public/' . $userProfile->image) }}"
                        class="img-fluid hero-image"
                        alt="{{ $userProfile->name }}"
                    >

                @endif


                {{-- Floating Card --}}

                <div class="floating-card shadow">

                    @if($userProfile->logo)

                        <img
                            src="{{ asset('/storage/app/public/' . $userProfile->image) }}"
                            alt="{{ $userProfile->name }}"
                        >

                    @endif


                    <h6 class="mt-3">

                        {{ $userProfile->name }}

                    </h6>


                    <strong>

                        Premium Eyewear

                    </strong>

                </div>

            </div>

        </div>

    </div>

@else

    <div class="container text-center py-5">

        <h2>Welcome to Our Store</h2>

        <p class="text-muted">
            Discover our premium eyewear collection.
        </p>

        <a href="{{ route('product.index') }}"
           class="btn btn-dark rounded-pill px-4">

            Shop Now

        </a>

    </div>

@endif

</section>

    

    <section id="categories" class="py-5 bg-white">

        <div class="container">

            <div class="row g-4">

                <div class="col-lg-6">

                    <div class="category-large">

                        <div>

                            <span class="badge bg-dark">

                                Trending

                            </span>

                            <h2>

                                New Collection

                            </h2>

                            <p>

                                Premium eyewear crafted for modern style.

                            </p>

                            <a href="{{ route('product.index') }}" class="btn btn-dark rounded-pill">

                                Explore Collection →

                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row g-3">

                        @foreach ($categories->take(4) as $category)
                            <div class="col-6">

                                <a href="{{ route('product.index', ['category_id' => $category->id]) }}"
                                    class="text-decoration-none">

                                    <div class="category-card">

                                        <img src="{{ asset('/storage/app/public/' . $category->image) }}">

                                        <div class="category-overlay">

                                            <h5>

                                                {{ $category->name }}

                                            </h5>

                                            <small>

                                                Shop Now →

                                            </small>

                                        </div>

                                    </div>

                                </a>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="featured-products py-5">

        <div class="container">

            <div class="section-title text-center mb-5">

                <span class="section-subtitle">
                    BEST COLLECTION
                </span>

                <h2 class="fw-bold">
                    Best Sellers
                </h2>

                <p class="text-muted">
                    Discover our most popular eyewear collection.
                </p>

            </div>

            {{-- <div class="row g-4">

                @foreach ($products->take(8) as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="product-card">

                            <!-- Product Image -->

                            <div class="product-image">

                                <img src="{{ asset('/storage/app/public/' . $product->image) }}" alt="{{ $product->title }}">

                                <!-- Badge -->

                                @if ($product->cut_price)
                                    <span class="discount-badge">

                                        {{ round((($product->cut_price - $product->price) / $product->cut_price) * 100) }}% OFF

                                    </span>
                                @endif

                                <!-- Icons -->

                                <div class="product-icons">

                                    <a href="#">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <a href="#">
                                        <i class="far fa-eye"></i>
                                    </a>

                                </div>

                            </div>

                            <!-- Product Body -->

                            <div class="product-body">

                                <small class="text-uppercase text-muted">

                                    {{ optional($product->category)->name }}

                                </small>

                                <h5>

                                    <a href="{{ route('product.show', $product->id) }}">

                                        {{ $product->title }}

                                    </a>

                                </h5>

                                <!-- Rating -->

                                <div class="rating">

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star-half-alt"></i>

                                    <span>(25)</span>

                                </div>

                                <!-- Price -->

                                <div class="price">

                                    <span class="sale-price">

                                        Rs {{ number_format($product->price) }}

                                    </span>

                                    @if ($product->cut_price)
                                        <span class="old-price">

                                            Rs {{ number_format($product->cut_price) }}

                                        </span>
                                    @endif

                                </div>

                                <!-- Button -->

                                <a href="{{ route('cart.add', $product->id) }}"
                                    class="btn btn-dark w-100 rounded-pill mt-3">

                                    <i class="fas fa-shopping-cart me-2"></i>

                                    Add To Cart

                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div> --}}
            @include('user.partials._menu')

        </div>

    </section>

    <section class="py-5 bg-white">

    <div class="container">

        <div class="row g-4">


            {{-- =====================================================
                 TRENDING NOW
            ====================================================== --}}

            <div class="col-lg-6 mb-4">

                <div class="trend-box h-100">

                    <h4 class="trend-title">

                        <i class="fas fa-fire text-danger"></i>

                        Trending Now

                    </h4>


                    @foreach ($products->take(3) as $product)

                        @php
                            $images = json_decode($product->image, true) ?? [];
                            $firstImage = $images[0] ?? 'default-product.jpg';

                            $isOnSale = $product->on_sale && $product->sale_price;
                        @endphp


                        <div class="trend-item">


                            {{-- Product Image --}}

                            <a href="{{ route('product.show', $product->id) }}">

                                <img
                                    src="{{ asset('/storage/app/public/' . $firstImage) }}"
                                    alt="{{ $product->title }}"
                                    style="
                                        width:80px;
                                        height:80px;
                                        object-fit:cover;
                                        border-radius:8px;
                                    "
                                >

                            </a>


                            <div class="flex-grow-1">

                                <h6>

                                    <a href="{{ route('product.show', $product->id) }}">

                                        {{ Str::limit($product->title, 25) }}

                                    </a>

                                </h6>


                                <div class="rating">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                </div>


                                @if($isOnSale)

                                    <strong class="text-danger">

                                        Rs {{ number_format($product->sale_price) }}

                                    </strong>

                                    <small class="text-muted text-decoration-line-through ms-1">

                                        Rs {{ number_format($product->price) }}

                                    </small>

                                @else

                                    <strong>

                                        Rs {{ number_format($product->sale_price) }}

                                    </strong>
                                     <small class="text-danger text-decoration-line-through ms-1">

                                        Rs {{ number_format($product->price) }}

                                    </small>
                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>



            {{-- =====================================================
                 BEST SELLERS
            ====================================================== --}}

            {{-- <div class="col-lg-4 mb-4">

                <div class="trend-box h-100">

                    <h4 class="trend-title">

                        <i class="fas fa-star text-warning"></i>

                        Best Sellers

                    </h4>


                    @foreach ($products->skip(3)->take(3) as $product)

                        @php
                            $images = json_decode($product->image, true) ?? [];
                            $firstImage = $images[0] ?? 'default-product.jpg';

                            $isOnSale = $product->on_sale && $product->sale_price;
                        @endphp


                        <div class="trend-item">


                            Product Image

                            <a href="{{ route('product.show', $product->id) }}">

                                <img
                                    src="{{ asset('/storage/app/public/' . $firstImage) }}"
                                    alt="{{ $product->title }}"
                                    style="
                                        width:80px;
                                        height:80px;
                                        object-fit:cover;
                                        border-radius:8px;
                                    "
                                >

                            </a>


                            <div class="flex-grow-1">

                                <h6>

                                    <a href="{{ route('product.show', $product->id) }}">

                                        {{ Str::limit($product->title, 25) }}

                                    </a>

                                </h6>


                                <div class="rating">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                </div>


                                @if($isOnSale)

                                    <strong class="text-danger">

                                        Rs {{ number_format($product->sale_price) }}

                                    </strong>

                                    <small class="text-muted text-decoration-line-through ms-1">

                                        Rs {{ number_format($product->price) }}

                                    </small>

                                @else

                                    <strong>

                                        Rs {{ number_format($product->price) }}

                                    </strong>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div> --}}



            {{-- =====================================================
                 FEATURED PRODUCTS
            ====================================================== --}}

            <div class="col-lg-6 mb-4">

                <div class="trend-box h-100">

                    <h4 class="trend-title">

                        <i class="far fa-gem text-primary"></i>

                        Featured Items

                    </h4>


                    @php
                        $featuredProducts = $products
                            ->where('featured', 1)
                            ->take(3);
                    @endphp


                    @forelse ($featuredProducts as $product)

                        @php
                            $images = json_decode($product->image, true) ?? [];
                            $firstImage = $images[0] ?? 'default-product.jpg';

                            $isOnSale =
                                $product->on_sale &&
                                $product->sale_price;
                        @endphp


                        <div class="trend-item">


                            {{-- Product Image --}}

                            <a href="{{ route('product.show', $product->id) }}">

                                <img
                                    src="{{ asset('/storage/app/public/' . $firstImage) }}"
                                    alt="{{ $product->title }}"
                                    style="
                                        width:80px;
                                        height:80px;
                                        object-fit:cover;
                                        border-radius:8px;
                                    "
                                >

                            </a>


                            <div class="flex-grow-1">

                                <h6>

                                    <a href="{{ route('product.show', $product->id) }}">

                                        {{ Str::limit($product->title, 25) }}

                                    </a>

                                </h6>


                                {{-- Rating --}}

                                <div class="rating">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                </div>


                                {{-- Price --}}

                                @if($isOnSale)

                                    <strong class="text-danger">

                                        Rs {{ number_format($product->sale_price) }}

                                    </strong>

                                    <small class="text-muted text-decoration-line-through ms-1">

                                        Rs {{ number_format($product->price) }}

                                    </small>

                                @else

                                    <strong>

                                        Rs {{ number_format($product->sale_price) }}

                                    </strong>

                                @endif


                                {{-- Sale --}}

                                @if($isOnSale)

                                    <span class="badge bg-danger ms-1">

                                        Sale

                                    </span>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-4">

                            <i class="far fa-gem text-muted fs-3 mb-2"></i>

                            <p class="text-muted small mb-0">

                                No featured products available.

                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


        </div>

    </div>

</section>


    <section class="flash-sale">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8 text-center">

                    <span class="flash-badge">

                        LIMITED OFFER

                    </span>

                    <h2>

                        Exclusive Flash Sale

                    </h2>

                    <p>

                        Premium eyewear at unbeatable prices.

                    </p>

                    <div class="countdown">

                        <div>

                            <span id="days">00</span>

                            <small>Days</small>

                        </div>

                        <div>

                            <span id="hours">00</span>

                            <small>Hours</small>

                        </div>

                        <div>

                            <span id="minutes">00</span>

                            <small>Minutes</small>

                        </div>

                        <div>

                            <span id="seconds">00</span>

                            <small>Seconds</small>

                        </div>

                    </div>

                    <div class="mt-5">

                        <a href="{{ route('product.index') }}" class="btn btn-dark btn-lg mt-2 rounded-pill px-5">

                            Shop Now

                        </a>

                        <a href="{{ route('product.index') }}"
                            class="btn btn-outline-dark btn-lg mt-2 rounded-pill px-5 ms-2">

                            View Deals

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="brands  bg-white">

        <div class="container">

            <div class="row text-center align-items-center">

                <div class="col">

                    <img src="{{ asset('user/assets/img/brands/1.png') }}" class="brand-logo">

                </div>

                <div class="col">

                    <img src="{{ asset('user/assets/img/brands/2.png') }}" class="brand-logo">

                </div>

                <div class="col">

                    <img src="{{ asset('user/assets/img/brands/3.png') }}" class="brand-logo">

                </div>

                <div class="col">

                    <img src="{{ asset('user/assets/img/brands/4.png') }}" class="brand-logo">

                </div>

                {{-- <div class="col">

                    <img src="{{ asset('user/assets/img/brands/5.png') }}" class="brand-logo">

                </div> --}}

            </div>

        </div>

    </section>

    <section class="testimonials py-5">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-subtitle">

                    HAPPY CUSTOMERS

                </span>

                <h2>

                    What Our Customers Say

                </h2>

            </div>

            <div class="row">

                <div class="col-lg-4">

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            Amazing quality eyewear. Delivery was fast and packaging was excellent.

                        </p>

                        <div class="customer">

                          
                            <img src="https://i.pravatar.cc/80?img=12">

                            <div>

                                <strong>

                                    Ali Raza

                                </strong>

                                <small>

                                    Lahore

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            Premium quality. I ordered two sunglasses and both exceeded my expectations.

                        </p>

                        <div class="customer">

                            <img src="https://i.pravatar.cc/80?img=5">

                            <div>

                                <strong>

                                    Ayesha Khan

                                </strong>

                                <small>

                                    Islamabad

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            Stylish collection with reasonable prices. Highly recommended.

                        </p>

                        <div class="customer">

                            <img src="https://i.pravatar.cc/80?img=15">

                            <div>

                                <strong>

                                    Ahmed

                                </strong>

                                <small>

                                    Karachi

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="instagram py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2>

                    Follow Us On Instagram

                </h2>

                <p>

                    <a href="https://www.instagram.com/vilorexeyewear/" target="_blank" rel="noopener noreferrer"> @vilorexeyewear</a>

                </p>

            </div>

            <div class="row g-3">

                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-lg-2 col-md-4 col-6">

                        <div class="insta-box">

                            <img src="{{ asset('user/assets/img/instagram/' . $i . '.jpeg') }}">

                            <div class="overlay">

                                <i class="fab fa-instagram"></i>

                            </div>

                        </div>

                    </div>
                @endfor

            </div>

        </div>

    </section>

    {{-- <section class="newsletter">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8 text-center">

                    <span>

                        GET LATEST OFFERS

                    </span>

                    <h2>

                        Subscribe To Our Newsletter

                    </h2>

                    <p>

                        Get updates about new arrivals and exclusive discounts.

                    </p>

                    <form class="newsletter-form">

                        <input type="email" placeholder="Enter your email">

                        <button>

                            Subscribe

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section> --}}
@endsection
