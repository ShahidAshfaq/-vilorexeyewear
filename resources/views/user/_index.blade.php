@extends('user.partials.layout')
@section('content')

<main class="main">

  <!-- 🟡 HERO SECTION -->
  <section id="hero" class="hero section position-relative text-center text-lg-start dark-background">
    @foreach ($userProfiles as $profile)
    <img src="{{ asset('/storage/app/public/' . $profile->image) }}" alt="Hero Banner" class="w-100" data-aos="fade-in" style="object-fit:cover;height:80vh;opacity:0.9;">
    @php $sitename = "Store"; @endphp

    <div class="container position-absolute top-50 start-50 translate-middle text-white">
      <h2 data-aos="fade-up" class="fw-bold display-5">Welcome to <span style="color:#FFC107;">{{ $sitename }}</span></h2>
      <p data-aos="fade-up" data-aos-delay="200" class="lead mb-3">{{ $profile->name }}</p>
      <a href="{{ route('menu.index') }}" class="btn btn-warning text-dark fw-semibold rounded-pill px-4 py-2" data-aos="fade-up" data-aos-delay="300">
        🛍️ Shop Now
      </a>
    </div>
    @endforeach
  </section>

  <!-- 🟡 FEATURED CATEGORIES -->
  <section class="featured-categories py-5 bg-light">
    <div class="container text-center" data-aos="fade-up">
      <h2 class="fw-bold mb-2">Shop by Category</h2>
      <p class="text-muted mb-4">Explore what you love</p>
      <div class="row g-4 justify-content-center">
        @foreach($categories->take(6) as $category)
        <div class="col-lg-2 col-md-4 col-6">
          <a href="{{ route('menu.index', ['category_id' => $category->id]) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
              <img src="{{ asset('/storage/app/public/' . $category->image) }}" class="card-img-top" style="height:140px;object-fit:cover;">
            </div>
            <h6 class="mt-2 fw-semibold text-dark">{{ $category->name }}</h6>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- 🟡 NEW ARRIVALS / FEATURED PRODUCTS -->
  <section class="featured-products py-5">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up">
        <h2 class="fw-bold mb-2">✨ New Arrivals</h2>
        <p class="text-muted">Discover the latest additions</p>
      </div>
      @include('user.partials._menu')
    </div>
  </section>

  <!-- 🟡 PROMO BANNER -->
  <section class="promo-banner py-5 text-center text-white" style="background: linear-gradient(90deg, #FFC107, #FFB347);">
    <div class="container" data-aos="fade-up">
      <h2 class="fw-bold">🔥 Limited Time Offer</h2>
      <p>Get up to <span class="fw-bold">40% off</span> on selected products!</p>
      <a href="{{ route('menu.index') }}" class="btn btn-light px-4 py-2 fw-semibold rounded-pill mt-2 text-dark">Shop Deals</a>
    </div>
  </section>

  <!-- 🟡 TESTIMONIALS -->
  <section class="testimonials py-5 bg-light">
    <div class="container text-center" data-aos="fade-up">
      <h2 class="fw-bold mb-4">What Our Customers Say</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="card shadow-sm border-0 p-4 rounded-4">
            <p class="text-muted">"Amazing quality and super fast delivery!"</p>
            <h6 class="fw-semibold mb-0 mt-3 text-dark">– Ayesha Khan</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm border-0 p-4 rounded-4">
            <p class="text-muted">"I love their packaging and natural products. Highly recommend!"</p>
            <h6 class="fw-semibold mb-0 mt-3 text-dark">– Ali Raza</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 🟡 NEWSLETTER -->
  <section class="newsletter py-5 text-center" style="background-color:#fff8e1;">
    <div class="container" data-aos="fade-up">
      <h2 class="fw-bold mb-3">Subscribe for Special Offers</h2>
      <p class="text-muted mb-4">Join our mailing list for new products and exclusive discounts.</p>
      <form class="d-flex justify-content-center flex-wrap gap-2">
        <input type="email" class="form-control w-50 rounded-pill border-0 shadow-sm px-3" placeholder="Enter your email">
        <button class="btn btn-warning text-dark fw-semibold rounded-pill px-4">Subscribe</button>
      </form>
    </div>
  </section>

  <!-- 🟡 TRUST BADGES -->
  <section class="trust-badges py-5 bg-light">
    <div class="container text-center" data-aos="fade-up">
      <div class="row g-4">
        <div class="col-md-3 col-6"><i class="fas fa-shipping-fast fs-2 text-warning"></i><p class="mt-2 mb-0 fw-semibold">Fast Delivery</p></div>
        <div class="col-md-3 col-6"><i class="fas fa-lock fs-2 text-warning"></i><p class="mt-2 mb-0 fw-semibold">Secure Payment</p></div>
        <div class="col-md-3 col-6"><i class="fas fa-sync fs-2 text-warning"></i><p class="mt-2 mb-0 fw-semibold">Easy Returns</p></div>
        <div class="col-md-3 col-6"><i class="fas fa-headset fs-2 text-warning"></i><p class="mt-2 mb-0 fw-semibold">24/7 Support</p></div>
      </div>
    </div>
  </section>

</main>

<!-- 🟡 CSS Enhancements -->
<style>
.hero {
  position: relative;
  overflow: hidden;
}
.hero img {
  filter: brightness(70%);
}
.btn-warning:hover {
  background-color: #e0a800 !important;
  transform: scale(1.05);
  transition: 0.3s ease;
}
.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.08);
}
.section-title h2 {
  color: #333;
}
.text-muted {
  color: #6c757d !important;
}
</style>

@endsection
