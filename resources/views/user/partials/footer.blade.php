<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            {{-- ================= ABOUT ================= --}}
            <div class="col-lg-4 col-md-6 col-12">

                <div class="footer-widget">

                    <h2 class="footer-logo">

                        <a href="{{ route('home') }}"
                            class="logo d-flex align-items-left justify-content-left justify-content-lg-ledt">

                            @if ($store?->logo)
                                <img src="{{ asset('storage/app/public/' . $store->logo) }}" class="store-logo img-fluid"
                                    alt="{{ $store->name }}">
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
                            <a href="{{ $store->instagram }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-instagram"></i>

                            </a>
                        @endif


                        @if ($store->facebook)
                            <a href="{{ $store->facebook }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-facebook-f"></i>

                            </a>
                        @endif


                        @if ($store->tiktok)
                            <a href="{{ $store->tiktok }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-tiktok"></i>

                            </a>
                        @endif


                        @if ($store->twitter)
                            <a href="{{ $store->twitter }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-x-twitter"></i>

                            </a>
                        @endif


                        @if ($store->pinterest)
                            <a href="{{ $store->pinterest }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-pinterest-p"></i>

                            </a>
                        @endif


                        @if ($store->youtube)
                            <a href="{{ $store->youtube }}" target="_blank" rel="noopener noreferrer">

                                <i class="fab fa-youtube"></i>

                            </a>
                        @endif

                    </div>

                </div>

            </div>


            {{-- ================= SHOP ================= --}}
            <div class="col-lg-2 col-md-6 col-6">

                <div class="footer-widget alin">

                    <h4 class="footer-title">
                        Shop
                    </h4>

                    <ul class="alin">

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

                <div class="footer-widget alin">

                    <h4 class="footer-title ">
                        Support
                    </h4>

                    <ul class="alin">

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

                <div class="footer-widget alin">

                    <h4 class="footer-title">
                        Contact Information
                    </h4>

                    <ul class="contact-list alin">

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
.alin{ 
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
  
    padding: o;
    align-items: flex-start;
}
</style>