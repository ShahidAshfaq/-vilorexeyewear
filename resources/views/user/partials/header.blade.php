<header id="header">

    @php
        use App\Models\Cart;

        $cartItems = Cart::where('session_id', session()->getId())
            ->with('product')
            ->get();

        $cartCount = $cartItems->sum('quantity');
    @endphp

    <!-- ================= TOP BAR ================= -->

    <div class="top-bar">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-4 col-md-6 d-none d-md-block">

                    <span>
                        <i class="fas fa-phone-alt me-2"></i>
                        Need Help? Call us:
                        <strong>{{ $store->phone ?? 'Velorix Eyewear' }}</strong>
                    </span>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <span>
                        🎁 20% OFF on your first order
                    </span>

                </div>

                <div class="col-lg-4 col-md-6">

                    <div class="top-right">

                        <select class="form-select form-select-sm">
                            <option>EN</option>
                            {{-- <option>UR</option> --}}
                        </select>

                        <select class="form-select form-select-sm">
                            <option>PKR</option>
                            {{-- <option>USD</option> --}}
                        </select>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ================= MAIN HEADER ================= -->

    <div class="main-header">

        <div class="container">

            <div class="row align-items-center">

                <!-- Mobile Menu -->

                <div class="col-2 d-lg-none">

                    <button class="mobile-toggle" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">

                        <i class="fas fa-bars"></i>

                    </button>

                </div>



                <!-- Logo -->

               <div class="col-lg-3 col-8">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    @if($store?->logo)
                        <img
                            src="{{ asset('storage/app/public/' . $store->logo) }}"
                            class="store-logo"
                            alt="{{ $store->name }}"
                        >
                    @else
                        <span>{{ $store->name }}</span>
                    @endif
                </a>
            </div>



                <!-- Search -->

                <div class="col-lg-6 d-none d-lg-block">

                    <form action="{{ route('product.index') }}">

                        <div class="search-box">

                            <input type="text" name="search" placeholder="Search products">

                            <button>

                                <i class="fas fa-search"></i>

                            </button>

                        </div>

                    </form>

                </div>



                <!-- Icons -->

                <div class="col-lg-3 col-2">

                    <div class="header-icons">

                        {{-- <a href="#">
                            <i class="far fa-user"></i>
                        </a>

                        <a href="#">
                            <i class="far fa-heart"></i>
                        </a> --}}

                        <!-- Cart -->

                        <div class="dropdown">

                            <a href="#" data-bs-toggle="dropdown">

                                <i class="fas fa-shopping-cart"></i>

                                @if ($cartCount)
                                    <span class="cart-count">

                                        {{ $cartCount }}

                                    </span>
                                @endif

                            </a>

                            <div class="dropdown-menu dropdown-menu-end cart-dropdown">

                                @forelse($cartItems as $item)
                                    <div class="cart-item">

                                        {{-- <img src="{{ asset('/storage/app/public/' . $item->image) }}"> --}}

                                        <div>

                                            <h6>

                                                {{ $item->product->title }}

                                            </h6>

                                            <small>

                                                {{ $item->quantity }}
                                                ×
                                                Rs {{ number_format($item->price) }}

                                            </small>

                                        </div>

                                    </div>

                                @empty

                                    <p class="text-center p-3">

                                        Cart Empty

                                    </p>
                                @endforelse

                                @if ($cartCount)
                                    <a href="{{ route('cart.index') }}" class="btn btn-dark w-100 mt-3">

                                        View Cart

                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ================= NAVBAR ================= -->

    <nav class="navbar-menu">

        <div class="container">

            <ul>

                <li>

                    <a href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                <li>

                    <a href="{{ route('user.about') }}">

                        About

                    </a>

                </li>

                <li>

                    <a href="{{ route('product.index') }}">

                        Products

                    </a>

                </li>

                {{-- <li>

                    <a href="{{ route('user.blog') }}">

                        Blog

                    </a>

                </li> --}}

                <li>

                    <a href="{{ route('user.contact') }}">

                        Contact

                    </a>

                </li>
                <li>

                    <a href="{{ route('order.track') }}">

                        Order Track

                    </a>

                </li>

            </ul>

        </div>

    </nav>

</header>




<!-- ================= MOBILE MENU ================= -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">

    <div class="offcanvas-header">

        <h5>Store</h5>

        <button class="btn-close" data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body">

        <form class="mb-4" action="{{ route('product.index') }}">

            <div class="search-box">

                <input type="text" name="search" placeholder="Search Products">

                <button>

                    <i class="fas fa-search"></i>

                </button>

            </div>

        </form>

        <ul class="mobile-nav">

            <li>

                <a href="{{ route('home') }}">

                    Home

                </a>

            </li>

            <li>

                <a href="{{ route('user.about') }}">

                    About

                </a>

            </li>

            <li>

                <a href="{{ route('product.index') }}">

                    Products

                </a>

            </li>

            {{-- <li>

                <a href="{{ route('user.blog') }}">

                    Blog

                </a>

            </li> --}}

            <li>

                <a href="{{ route('user.contact') }}">

                    Contact

                </a>

            </li>
             <li>

                    <a href="{{ route('order.track') }}">

                        Order Track

                    </a>

                </li>

        </ul>

    </div>

</div>
