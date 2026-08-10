<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            <!-- About -->
            <div class="col-lg-4 col-md-6">

                <div class="footer-widget">

                    <h2 class="footer-logo">
                        Store
                    </h2>

                    <p class="footer-text">
                        Discover premium quality products at affordable prices.
                        We are committed to providing the best shopping experience
                        with fast delivery and excellent customer support.
                    </p>

                    <h5 class="footer-title mt-4">
                        Connect With Us
                    </h5>

                    <div class="social-icons">

                        {{-- @if($store) --}}

    {{-- Instagram --}}
    @if($store->instagram)
        <a href="{{ $store->instagram }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
        </a>
    @endif


    {{-- Facebook --}}
    @if($store->facebook)
        <a href="{{ $store->facebook }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-facebook-f"></i>
        </a>
    @endif


    {{-- TikTok --}}
    @if($store->tiktok)
        <a href="{{ $store->tiktok }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-tiktok"></i>
        </a>
    @endif


    {{-- X / Twitter --}}
    @if($store->twitter)
        <a href="{{ $store->twitter }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-x-twitter"></i>
        </a>
    @endif


    {{-- Pinterest --}}
    @if($store->pinterest)
        <a href="{{ $store->pinterest }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-pinterest-p"></i>
        </a>
    @endif


    {{-- YouTube --}}
    @if($store->youtube)
        <a href="{{ $store->youtube }}"
           target="_blank"
           rel="noopener noreferrer">
            <i class="fab fa-youtube"></i>
        </a>
    @endif

{{-- @endif --}}

                    </div>

                </div>

            </div>



            <!-- Shop -->

            <div class="col-lg-2 col-md-6">

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



            <!-- Support -->

            <div class="col-lg-2 col-md-6">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        Support
                    </h4>

                    <ul>

                        <li>
                            <a href="{{ route('user.about') }}">Help Center</a>
                        </li>

                        <li>
                            <a href="{{ route('order.track') }}">Order Status</a>
                        </li>
                        <li>
                            <a href="{{ route('user.privacy') }}"> Privacy</a>
                        </li>


                        {{-- <li>
                            <a href="">Returns</a>
                        </li> --}}


                        <li>
                            <a href="{{ route('user.contact') }}">Contact Us</a>
                        </li>

                    </ul>

                </div>

            </div>



            <!-- Contact -->

            <div class="col-lg-4 col-md-6">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        Contact Information
                    </h4>

                    <ul class="contact-list">

                        @if($store)

    {{-- Address --}}
    @if($store->address)
        <li>
            <i class="fas fa-map-marker-alt"></i>

            <span>
                {{ $store->address }}
                @if($store->city)
                    , {{ $store->city }}
                @endif
            </span>
        </li>
    @endif


    {{-- Phone --}}
    @if($store->phone)
        <li>
            <i class="fas fa-phone"></i>

            <span>
                {{ $store->phone }}
            </span>
        </li>
    @endif


    {{-- Email --}}
    @if($store->email)
        <li>
            <i class="fas fa-envelope"></i>

            <span>
                {{ $store->email }}
            </span>
        </li>
    @endif

@endif

                        <li>

                            <i class="far fa-clock"></i>

                            <span>

                                Monday-Friday : 9AM - 6PM

                                <br>

                                Saturday : 10AM - 4PM

                                <br>

                                Sunday : Closed

                            </span>

                        </li>

                    </ul>



                    <!-- App Buttons -->

                    {{-- <div class="app-buttons mt-4">

                        <a href="#" class="app-btn">

                            <i class="fab fa-apple"></i>

                            App Store

                        </a>

                        <a href="#" class="app-btn">

                            <i class="fab fa-google-play"></i>

                            Google Play

                        </a>

                    </div> --}}

                </div>

            </div>

        </div>

    </div>



    <!-- Bottom Footer -->

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center gy-3">

                <div class="col-lg-6">

                    <p>

                        © {{ date('Y') }}

                        <strong>Store</strong>

                        All Rights Reserved.

                    </p>

                </div>



                <div class="col-lg-3 text-center">

                    <div class="payment-icons">

                        <i class="fab fa-cc-visa"></i>

                        <i class="fab fa-cc-mastercard"></i>

                        <i class="fab fa-cc-paypal"></i>

                        <i class="fab fa-cc-apple-pay"></i>

                    </div>

                </div>



                <div class="col-lg-3">

                    <div class="footer-links">

                        <a href="#">
                            Terms
                        </a>

                        <a href="#">
                            Privacy
                        </a>

                        <a href="#">
                            Cookies
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</footer>