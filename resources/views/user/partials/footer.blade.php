<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            {{-- ================= ABOUT ================= --}}
            <div class="col-lg-4 col-md-6 col-12">

                <div class="footer-widget">

                    <h2 class="footer-logo">

                        <a href="{{ route('home') }}"
                            class="logo d-flex align-items-center justify-content-center justify-content-lg-center">

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

                    </h2>


                    <p class="footer-text">
                        Discover premium quality products at affordable prices.
                        We are committed to providing the best shopping experience
                        with fast delivery and excellent customer support.
                    </p>


                    {{-- SOCIAL ICONS --}}
                    <div class="social-icons">

                        @if ($store->instagram)
                            <a href="{{ $store->instagram }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-instagram"></i>

                            </a>
                        @endif


                        @if ($store->facebook)
                            <a href="{{ $store->facebook }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-facebook-f"></i>

                            </a>
                        @endif


                        @if ($store->tiktok)
                            <a href="{{ $store->tiktok }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-tiktok"></i>

                            </a>
                        @endif


                        @if ($store->twitter)
                            <a href="{{ $store->twitter }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-x-twitter"></i>

                            </a>
                        @endif


                        @if ($store->pinterest)
                            <a href="{{ $store->pinterest }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-pinterest-p"></i>

                            </a>
                        @endif


                        @if ($store->youtube)
                            <a href="{{ $store->youtube }}"
                               target="_blank"
                               rel="noopener noreferrer">

                                <i class="fab fa-youtube"></i>

                            </a>
                        @endif

                    </div>

                </div>

            </div>


            {{-- ================= SHOP ================= --}}
            <div class="col-lg-2 col-md-6 col-6">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        Shop
                    </h4>

                    <ul>

                        @forelse($categories as $category)

                            <li>

                                <a href="{{ route('product.index', ['category_id' => $category->id]) }}">

                                    {{ $category->name }}

                                </a>

                            </li>

                        @empty

                            <li>
                                <span>No categories available</span>
                            </li>

                        @endforelse

                    </ul>

                </div>

            </div>


            {{-- ================= SUPPORT ================= --}}
            <div class="col-lg-2 col-md-6 col-6">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        Support
                    </h4>

                    <ul>

                        <li>
                            <a href="{{ route('user.about') }}">
                                Help Center
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('order.track') }}">
                                Order Status
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('user.privacy') }}">
                                Privacy
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('user.contact') }}">
                                Contact Us
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            {{-- ================= CONTACT ================= --}}
            <div class="col-lg-4 col-md-6 col-12">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        Contact Information
                    </h4>


                    <ul class="contact-list">

                        @if ($store)

                            {{-- ADDRESS --}}
                            @if ($store->address)

                                <li>

                                    <i class="fas fa-map-marker-alt"></i>

                                    <span>

                                        {{ $store->address }}

                                        @if ($store->city)
                                            , {{ $store->city }}
                                        @endif

                                    </span>

                                </li>

                            @endif


                            {{-- PHONE --}}
                            @if ($store->phone)

                                <li>

                                    <i class="fas fa-phone"></i>

                                    <span>
                                        {{ $store->phone }}
                                    </span>

                                </li>

                            @endif


                            {{-- EMAIL --}}
                            @if ($store->email)

                                <li>

                                    <i class="fas fa-envelope"></i>

                                    <span>
                                        {{ $store->email }}
                                    </span>

                                </li>

                            @endif

                        @endif

                    </ul>

                </div>

            </div>

        </div>

    </div>

</footer>
<style>
    /* =========================================
   FOOTER RESPONSIVE
========================================= */

.footer {
    overflow: hidden;
}

.footer-widget {
    width: 100%;
}

.footer-logo {
    margin-bottom: 20px;
}

.footer-logo .store-logo {
    max-width: 150px;
    width: auto;
    height: auto;
    max-height: 60px;
    object-fit: contain;
}

.footer-text {
    max-width: 420px;
}


/* Contact information */

.contact-list {
    padding: 0;
    margin: 0;
    list-style: none;
}

.contact-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 15px;
}

.contact-list li i {
    flex-shrink: 0;
    margin-top: 4px;
}


/* Social icons */

.social-icons {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.social-icons a {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 991px) {

    .footer {
        padding-top: 50px;
        padding-bottom: 30px;
    }

    .footer-widget {
        margin-bottom: 10px;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .footer {
        padding-top: 40px;
        padding-bottom: 25px;
    }

    .footer-logo {
        text-align: center;
    }

    .footer-logo .logo {
        justify-content: center !important;
    }

    .footer-text {
        max-width: 100%;
        text-align: center;
        font-size: 14px;
        line-height: 1.7;
    }

    .social-icons {
        justify-content: center;
        margin-top: 20px;
    }

    .footer-title {
        font-size: 17px;
        margin-bottom: 15px;
    }

    .footer-widget ul {
        padding-left: 0;
    }

    .footer-widget ul li {
        margin-bottom: 10px;
    }

    .contact-list li {
        font-size: 14px;
        gap: 10px;
    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 576px) {

    .footer .container {
        padding-left: 20px;
        padding-right: 20px;
    }

    .footer-text {
        font-size: 13px;
    }

    .footer-title {
        font-size: 16px;
    }

    .footer-widget ul li {
        font-size: 14px;
    }

    .contact-list li {
        font-size: 13px;
    }

    .social-icons a {
        width: 35px;
        height: 35px;
    }

}
</style>