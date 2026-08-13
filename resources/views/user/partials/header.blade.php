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
                    <span>
                       
                    </span>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <span>
                         <i class="fab fa-whatsapp me-2"></i>
                         Whatsapp us:
                        <strong>{{ $store->whatsapp ?? 'Velorix Eyewear' }}</strong>
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

    {{-- <div class="main-header">

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
                    <a href="{{ route('home') }}"
                        class="logo d-flex align-items-center justify-content-center justify-content-lg-center">

                        @if ($store?->logo)
                            <img src="{{ asset('storage/app/public/' . $store->logo) }}" class="store-logo img-fluid"
                                alt="{{ $store->name }}">
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

                <div class="col-lg-3 col-2 d-flex align-items-center justify-content-center justify-content-lg-center">

                    <div class="header-icons">

                        <a href="#">
                            <i class="far fa-user"></i>
                        </a>

                        <a href="#">
                            <i class="far fa-heart"></i>
                        </a>

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

                                        <img src="{{ asset('/storage/app/public/' . $item->image) }}">

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

    </div> --}}



    <!-- ================= NAVBAR ================= -->

  <nav class="navbar-menu" id="desktopNavbar">

    <div class="container">

        <div class="navbar-inner">

           


            <!-- ================= LOGO ================= -->

            <div class="navbar-logo">

                <a href="{{ route('home') }}"
                   class="logo d-flex align-items-center">

                    @if ($store?->logo)

                        <img
                            src="{{ asset('storage/app/public/' . $store->logo) }}"
                            class="store-logo img-fluid"
                            alt="{{ $store->name }}"
                        >

                    @else

                        <span>{{ $store->name }}</span>

                    @endif

                </a>

            </div>

            
            <!-- ================= DESKTOP NAVIGATION ================= -->

            <div class="desktop-navigation d-none d-lg-block">

                <ul class="navbar-links">

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

             <!-- ================= MOBILE MENU BUTTON ================= -->

            <button
                class="mobile-toggle d-lg-none text-dark"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu">

                <i class="fas fa-bars"></i>

            </button>
            <!-- ================= CART ================= -->

            <div class="navbar-cart d-none d-lg-flex">

                <div class="dropdown">

                    <a href="#"
                       data-bs-toggle="dropdown"
                       class="cart-link text-dark"
                       aria-expanded="false">

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

                            <p class="text-center p-3 mb-0">
                                Cart Empty
                            </p>

                        @endforelse


                        @if ($cartCount)

                            <a href="{{ route('cart.index') }}"
                               class="btn btn-dark w-100 mt-3">

                                View Cart

                            </a>

                        @endif

                    </div>
                    

                </div>

            </div>

        </div>

    </div>

</nav>
{{-- <hr> --}}
    <script>
document.addEventListener('DOMContentLoaded', function () {

    const navbar = document.getElementById('desktopNavbar');

    if (!navbar) return;

    let lastScroll = window.pageYOffset;

    window.addEventListener('scroll', function () {

        // Desktop only
        if (window.innerWidth < 992) {

            navbar.classList.remove('navbar-fixed');

            lastScroll = window.pageYOffset;

            return;
        }

        const currentScroll =
            window.pageYOffset ||
            document.documentElement.scrollTop;


        // At top
        if (currentScroll <= 10) {

            navbar.classList.remove('navbar-fixed');

            lastScroll = currentScroll;

            return;
        }


        // Scrolling up
        if (currentScroll < lastScroll) {

            navbar.classList.add('navbar-fixed');

        }


        // Scrolling down
        else if (currentScroll > lastScroll) {

            navbar.classList.remove('navbar-fixed');

        }


        lastScroll = currentScroll;

    });

});
</script>

<style>
    /*======================================*
* NAVIGATION
*======================================*/

.navbar-menu {
    background: var(--white);
    width: 100%;
    position: relative;
    z-index: 9999;
}


/*======================================*
* STICKY NAVBAR
*======================================*/

/* .navbar-menu.navbar-fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;

    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.15);

    animation: navbarSlideDown 0.4s ease forwards;
} */



/*======================================*
* NAVBAR INNER
*======================================*/

.navbar-inner {
    min-height: 78px;

    display: flex;
    align-items: center;

    gap: 30px;
}


/*======================================*
* LOGO
*======================================*/

.navbar-logo {
    flex-shrink: 0;
}

.navbar-logo .logo {
    text-decoration: none;
}

.navbar-logo .store-logo {
    max-height: 58px;
    width: auto;
    max-width: 180px;
    object-fit: contain;
}


/*======================================*
* DESKTOP NAVIGATION
*======================================*/

.desktop-navigation {
    flex: 1;
}

.navbar-links {

    display: flex;

    justify-content: center;
    align-items: center;

    gap: 30px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.navbar-links li {
    position: relative;
    list-style: none;
}

.navbar-links li a {

    position: relative;

    display: block;

    color: #000 !importent;

    text-decoration: none;

    padding: 30px 0;

    font-weight: 500;

    white-space: nowrap;

    transition: .3s;
}

.navbar-links li a:hover {
    color: var(--primary);
}


/*======================================*
* NAVIGATION UNDERLINE
*======================================*/

.navbar-links li a::after {

    content: "";

    position: absolute;

    left: 0;
    bottom: 22px;

    width: 0;
    height: 2px;

    background: var(--primary);

    transition: .3s;
}

.navbar-links li a:hover::after {
    width: 100%;
}


/*======================================*
* CART
*======================================*/

.navbar-cart {

    flex-shrink: 0;

    align-items: center;
    justify-content: flex-end;
}

.navbar-cart .cart-link {

    position: relative;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    color: #fff;

    font-size: 23px;

    text-decoration: none;

    transition: .3s;
}

.navbar-cart .cart-link:hover {
    color: var(--primary);
}


/*======================================*
* CART COUNT
*======================================*/

.cart-count {

    position: absolute;

    top: -10px;
    right: -12px;

    width: 20px;
    height: 20px;

    border-radius: 50%;

    background: var(--primary);

    color: #fff;

    font-size: 11px;

    display: flex;

    align-items: center;
    justify-content: center;
}


/*======================================*
* CART DROPDOWN
*======================================*/

.cart-dropdown {

    width: 340px;

    border: none;

    border-radius: 12px;

    padding: 20px;

    box-shadow: var(--shadow);

    margin-top: 18px;
}

.cart-item {

    display: flex;

    gap: 15px;

    margin-bottom: 18px;

    align-items: center;
}

.cart-item:last-child {
    margin-bottom: 0;
}

.cart-item h6 {

    font-size: 15px;

    margin-bottom: 5px;
}

.cart-item small {
    color: var(--text-light);
}


/*======================================*
* MOBILE MENU BUTTON
*======================================*/

.mobile-toggle {

    border: none;

    background: transparent;

    color: #fff;

    font-size: 25px;

    padding: 5px;

    line-height: 1;

    cursor: pointer;
}

.mobile-toggle:hover {
    color: var(--primary);
}


/*======================================*
* OFFCANVAS
*======================================*/

.offcanvas {
    width: 300px;
}

.offcanvas-header {

    border-bottom: 1px solid var(--border);

    padding: 20px;
}

.offcanvas-body {
    padding: 25px;
}

.mobile-nav {

    margin: 25px 0 0;

    padding: 0;

    list-style: none;
}

.mobile-nav li {

    list-style: none;

    border-bottom: 1px solid #eee;
}

.mobile-nav a {

    display: block;

    padding: 15px 0;

    color: var(--secondary);

    text-decoration: none;

    font-weight: 500;

    transition: .3s;
}

.mobile-nav a:hover {

    color: var(--primary);

    padding-left: 10px;
}


/*======================================*
* MOBILE SEARCH
*======================================*/

.offcanvas .search-box {

    display: flex;

    width: 100%;

    border: 1px solid var(--border);

    border-radius: 30px;

    overflow: hidden;
}

.offcanvas .search-box input {

    flex: 1;

    min-width: 0;

    border: none;

    outline: none;

    padding: 12px 15px;
}

.offcanvas .search-box button {

    border: none;

    background: transparent;

    padding: 0 15px;

    cursor: pointer;
}


/*======================================*
* TABLET
*======================================*/

@media (max-width: 991px) {

    .top-bar {
        display: none;
    }

    .navbar-menu {
        display: block;
    }

    .navbar-inner {

        min-height: 70px;

        position: relative;

        justify-content: space-between;

        gap: 15px;
    }

    .mobile-toggle {
        display: block;

        flex: 0 0 auto;
    }

    .navbar-logo {

        position: absolute;

        left: 50%;

        transform: translateX(-50%);
    }

    .navbar-logo .store-logo {

        max-height: 50px;

        max-width: 160px;
    }

}


/*======================================*
* MOBILE
*======================================*/

@media (max-width: 767px) {

    .navbar-inner {
        min-height: 65px;
    }

    .navbar-logo .store-logo {

        max-height: 45px;

        max-width: 145px;
    }

    .mobile-toggle {
        font-size: 23px;
    }

    .offcanvas {
        width: 290px;
    }

}


/*======================================*
* SMALL MOBILE
*======================================*/

@media (max-width: 576px) {

    .navbar-inner {
        min-height: 62px;
    }

    .navbar-logo .store-logo {

        max-height: 42px;

        max-width: 130px;
    }

    .offcanvas {
        width: 280px;
    }

}
</style>

</header>




<!-- ================= MOBILE MENU ================= -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">

    <div class="offcanvas-header">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            @if ($store?->logo)
                <img src="{{ asset('storage/app/public/' . $store->logo) }}" class="store-logo"
                    alt="{{ $store->name }}">
            @else
                <span>{{ $store->name }}</span>
            @endif
        </a>

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
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {

        const navbar = document.getElementById('desktopNavbar');

        if (!navbar) return;

        let lastScroll = 0;
        let navbarTop = navbar.offsetTop;

        window.addEventListener('scroll', function() {

            // Desktop only
            if (window.innerWidth <= 991) {
                navbar.classList.remove('navbar-fixed');
                return;
            }

            const currentScroll =
                window.pageYOffset || document.documentElement.scrollTop;

            /* =========================
               SCROLL DOWN
            ========================= */
            if (currentScroll > lastScroll) {

                navbar.classList.remove('navbar-fixed');

            }

            /* =========================
               SCROLL UP
            ========================= */
            else if (currentScroll < lastScroll) {

                if (currentScroll > navbarTop) {
                    navbar.classList.add('navbar-fixed');
                }

            }

            /* =========================
               AT TOP
            ========================= */
            if (currentScroll <= 10) {
                navbar.classList.remove('navbar-fixed');
            }

            lastScroll = currentScroll <= 0 ? 0 : currentScroll;

        });

    });
</script> --}}

