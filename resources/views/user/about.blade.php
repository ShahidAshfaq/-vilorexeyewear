@extends('user.partials.layout')

@section('content')

<style>
    /* =========================================
       EYEWEAR ABOUT PAGE
       Uses existing theme variables
    ========================================= */
    :root {
        --gold: #C8A56A;
        --gold-dark: #A67C3D;
        --black: #111111;
        --cream: #F8F3EC;
        --light-cream: #FCFAF7;
        --white: #ffffff;
        --border: #E8E0D4;
        --muted: #777777;
    }
    .eyewear-about {
        background: var(--cream);
        padding-top: 120px;
    }

    /* =========================================
       HERO
    ========================================= */

    .about-hero {
        padding: 30px 0 90px;
    }

    .about-eyebrow {
        display: inline-block;
        color: var(--gold-dark);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .about-hero h1 {
        font-size: 55px;
        line-height: 1.1;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 22px;
    }

    .about-hero h1 span {
        color: var(--gold-dark);
    }

    .about-hero-text {
        color: var(--muted);
        font-size: 16px;
        line-height: 1.9;
        max-width: 570px;
        margin-bottom: 30px;
    }

    .about-shop-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--black);
        color: #fff;
        padding: 14px 27px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .3s ease;
    }

    .about-shop-btn:hover {
        background: var(--gold);
        color: #fff;
        transform: translateY(-3px);
    }

    /* =========================================
       HERO IMAGE
    ========================================= */

    .about-hero-image {
        position: relative;
        padding: 15px;
    }

    .about-hero-image::before {
        content: "";
        position: absolute;
        width: 75%;
        height: 75%;
        right: 0;
        top: 0;
        background: var(--gold);
        opacity: .12;
        border-radius: 30px;
    }

    .about-hero-image img {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, .12);
    }

    /* =========================================
       BRAND STATISTICS
    ========================================= */

    .brand-stats {
        background: var(--black);
        padding: 45px 0;
    }

    .stat-item {
        text-align: center;
        color: #fff;
        padding: 10px 20px;
    }

    .stat-item h3 {
        color: var(--gold);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-item p {
        color: #aaa;
        font-size: 13px;
        margin: 0;
    }

    /* =========================================
       OUR STORY
    ========================================= */

    .our-story {
        padding: 100px 0;
        background: var(--light-cream);
    }

    .story-image img {
        width: 100%;
        height: 460px;
        object-fit: cover;
        border-radius: 22px;
    }

    .story-content {
        padding-left: 35px;
    }

    .section-eyebrow {
        color: var(--gold-dark);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }

    .story-content h2 {
        color: var(--black);
        font-size: 38px;
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 20px;
    }

    .story-content p {
        color: var(--muted);
        line-height: 1.9;
        font-size: 15px;
    }

    /* =========================================
       FEATURES
    ========================================= */

    .eyewear-features {
        padding: 100px 0;
        background: var(--cream);
    }

    .section-heading {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-heading h2 {
        color: var(--black);
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .section-heading p {
        color: var(--muted);
        max-width: 600px;
        margin: auto;
        line-height: 1.7;
    }

    .feature-card {
        height: 100%;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 35px 28px;
        text-align: center;
        transition: .35s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: var(--gold);
        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
    }

    .feature-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 22px;
        border-radius: 50%;
        background: rgba(200, 165, 106, .12);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .feature-card h4 {
        color: var(--black);
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .feature-card p {
        color: var(--muted);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    /* =========================================
       VISION SECTION
    ========================================= */

    .vision-section {
        background: var(--black);
        padding: 90px 0;
    }

    .vision-content {
        text-align: center;
        max-width: 800px;
        margin: auto;
    }

    .vision-content .section-eyebrow {
        color: var(--gold);
    }

    .vision-content h2 {
        color: #fff;
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .vision-content p {
        color: #aaa;
        line-height: 1.9;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .vision-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 26px;
        border: 1px solid var(--gold);
        border-radius: 50px;
        color: var(--gold);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: .3s ease;
    }

    .vision-btn:hover {
        background: var(--gold);
        color: #fff;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 991px) {

        .eyewear-about {
            padding-top: 100px;
        }

        .about-hero {
            padding-bottom: 70px;
        }

        .about-hero h1 {
            font-size: 45px;
        }

        .about-hero-image {
            margin-top: 30px;
        }

        .about-hero-image img {
            height: 420px;
        }

        .story-content {
            padding-left: 0;
            padding-top: 30px;
        }

        .our-story,
        .eyewear-features {
            padding: 75px 20px;
        }
    }

    @media (max-width: 768px) {

        .eyewear-about {
            padding-top: 90px;
        }

        .about-hero h1 {
            font-size: 36px;
        }

        .about-hero-text {
            font-size: 15px;
        }

        .about-hero-image img {
            height: 350px;
        }

        .story-image img {
            height: 350px;
        }

        .story-content h2,
        .section-heading h2 {
            font-size: 30px;
        }

        .vision-content h2 {
            font-size: 32px;
        }

        .stat-item h3 {
            font-size: 26px;
        }

        .brand-stats {
            padding: 30px 0;
        }
    }

    @media (max-width: 480px) {

        .about-hero {
            padding-bottom: 55px;
        }

        .about-hero h1 {
            font-size: 30px;
        }

        .about-hero-image img {
            height: 280px;
            border-radius: 18px;
        }

        .story-image img {
            height: 280px;
            border-radius: 18px;
        }

        .story-content h2,
        .section-heading h2 {
            font-size: 27px;
        }

        .vision-content h2 {
            font-size: 27px;
        }

        .stat-item {
            margin-bottom: 15px;
        }

        .feature-card {
            padding: 30px 22px;
        }
    }
</style>


<div class="eyewear-about">


    <!-- =========================================
         ABOUT HERO
    ========================================== -->

    <section class="about-hero">

        <div class="container">

            <div class="row align-items-cente g-5">

                <!-- CONTENT -->

                <div class="col-lg-6" data-aos="fade-right">

                    <span class="about-eyebrow">
                        About Our Eyewear
                    </span>

                    <h1>
                        See Better.<br>
                        <span>Look Better.</span>
                    </h1>

                    <p class="about-hero-text">
                        We believe eyewear is more than just a necessity.
                        It's a reflection of your personality, your lifestyle
                        and your unique sense of style.
                    </p>

                    <p class="about-hero-text">
                        Our collection brings together carefully selected
                        frames, quality lenses and timeless designs to help
                        you see clearly while looking your best.
                    </p>

                    <a href="{{ route('product.index') }}" class="about-shop-btn">
                        Explore Collection
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>


                <!-- IMAGE -->

                <div class="col-lg-6" data-aos="fade-left">

                    <div class="about-hero-image">

                        <img
                            src="{{ asset('user/assets/img/about.jpg') }}"
                            alt="Premium Eyewear Collection"
                        >

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         STATS
    ========================================== -->

    <section class="brand-stats">

        <div class="container">

            <div class="row g-4">

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h3>100+</h3>
                        <p>Eyewear Styles</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Happy Customers</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h3>100%</h3>
                        <p>Quality Focused</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h3>24/7</h3>
                        <p>Customer Support</p>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         OUR STORY
    ========================================== -->

    <section class="our-story">

        <div class="container">

            <div class="row align-items-center g-5">

                <!-- IMAGE -->

                <div class="col-lg-6" data-aos="fade-right">

                    <div class="story-image">

                        <img
                            src="{{ asset('user/assets/img/about.jpg') }}"
                            alt="Our Eyewear Story"
                        >

                    </div>

                </div>


                <!-- CONTENT -->

                <div class="col-lg-6" data-aos="fade-left">

                    <div class="story-content">

                        <span class="section-eyebrow">
                            Our Story
                        </span>

                        <h2>
                            Eyewear Made for Your Everyday Life
                        </h2>

                        <p>
                            Finding the right pair of glasses should be
                            simple, enjoyable and personal. That's why
                            we created our online eyewear store.
                        </p>

                        <p>
                            From classic frames to modern designs, our
                            collection is selected with different faces,
                            lifestyles and personal styles in mind.
                        </p>

                        <p>
                            We focus on combining comfort, quality and
                            style so that every customer can find eyewear
                            they feel confident wearing every day.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         WHY CHOOSE OUR EYEWEAR
    ========================================== -->

    <section class="eyewear-features">

        <div class="container">

            <div class="section-heading" data-aos="fade-up">

                <span class="section-eyebrow">
                    Why Shop With Us
                </span>

                <h2>
                    More Than Just a Pair of Glasses
                </h2>

                <p>
                    We care about the complete eyewear experience,
                    from choosing your frame to receiving it at your door.
                </p>

            </div>


            <div class="row g-4">


                <!-- QUALITY -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-gem"></i>
                        </div>

                        <h4>
                            Quality Frames
                        </h4>

                        <p>
                            Carefully selected frames designed for
                            comfort, durability and everyday style.
                        </p>

                    </div>

                </div>


                <!-- LENSES -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-eye"></i>
                        </div>

                        <h4>
                            Quality Lenses
                        </h4>

                        <p>
                            Choose from different lens options designed
                            around your visual needs and lifestyle.
                        </p>

                    </div>

                </div>


                <!-- STYLE -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="300"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-glasses"></i>
                        </div>

                        <h4>
                            Modern Designs
                        </h4>

                        <p>
                            Discover stylish designs ranging from
                            timeless classics to contemporary frames.
                        </p>

                    </div>

                </div>


                <!-- DELIVERY -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-truck"></i>
                        </div>

                        <h4>
                            Reliable Delivery
                        </h4>

                        <p>
                            We make sure your eyewear reaches you safely
                            with a smooth and reliable delivery process.
                        </p>

                    </div>

                </div>


                <!-- SUPPORT -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>

                        <h4>
                            Customer Support
                        </h4>

                        <p>
                            Need help selecting your frame or lens?
                            Our team is ready to assist you.
                        </p>

                    </div>

                </div>


                <!-- SECURE -->

                <div
                    class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="300"
                >

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>

                        <h4>
                            Secure Shopping
                        </h4>

                        <p>
                            Shop confidently with a secure checkout
                            and careful handling of your information.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         BRAND VISION
    ========================================== -->

    <section class="vision-section">

        <div class="container">

            <div class="vision-content" data-aos="fade-up">

                <span class="section-eyebrow">
                    Our Vision
                </span>

                <h2>
                    Clear Vision. Confident Style.
                </h2>

                <p>
                    Our vision is to make quality eyewear accessible
                    and enjoyable for everyone. Whether you're looking
                    for everyday glasses, stylish frames or lenses
                    suited to your lifestyle, we're here to help you
                    find the right fit.
                </p>

                <a
                    href="{{ route('product.index') }}"
                    class="vision-btn"
                >
                    Shop Eyewear
                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


</div>

@endsection