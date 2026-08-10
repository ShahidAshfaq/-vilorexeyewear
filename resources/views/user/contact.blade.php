@extends('user.partials.layout')

@section('content')

    <style>
        /* =========================================
           CONTACT PAGE - LUXURY THEME
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

        .contact-page {
            background: var(--cream);
            padding: 120px 0 80px;
            min-height: 100vh;
        }

        /* =========================================
           SECTION HEADING
        ========================================= */

        .contact-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .contact-heading .small-title {
            color: var(--gold-dark);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }

        .contact-heading h1 {
            color: var(--black);
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-heading p {
            color: var(--muted);
            max-width: 600px;
            margin: auto;
            line-height: 1.7;
        }

        /* =========================================
           MAIN CARD
        ========================================= */

        .contact-wrapper {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .07);
        }

        /* =========================================
           CONTACT INFORMATION
        ========================================= */

        .contact-info {
            background: var(--black);
            color: #fff;
            height: 100%;
            padding: 45px 35px;
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(200, 165, 106, .08);
            right: -100px;
            top: -80px;
        }

        .contact-info::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(200, 165, 106, .06);
            left: -90px;
            bottom: -70px;
        }

        .contact-info h2 {
            position: relative;
            z-index: 2;
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-info>p {
            position: relative;
            z-index: 2;
            color: #bbb;
            line-height: 1.7;
            margin-bottom: 35px;
        }

        /* =========================================
           INFO ITEM
        ========================================= */

        .contact-info-item {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: flex-start;
            gap: 17px;
            margin-bottom: 28px;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: rgba(200, 165, 106, .15);
            border: 1px solid rgba(200, 165, 106, .35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 18px;
        }

        .contact-info-item h5 {
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .contact-info-item p {
            color: #aaa;
            font-size: 14px;
            margin: 0;
            line-height: 1.6;
        }

        .contact-info-item a {
            color: #aaa;
            text-decoration: none;
            transition: .3s;
        }

        .contact-info-item a:hover {
            color: var(--gold);
        }

        /* =========================================
           SOCIAL ICONS
        ========================================= */

        .contact-social {
            position: relative;
            z-index: 2;
            display: flex;
            gap: 10px;
            margin-top: 35px;
        }

        .contact-social a {
            width: 40px;
            height: 40px;
            border: 1px solid rgba(255, 255, 255, .15);
            border-radius: 50%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: .3s;
        }

        .contact-social a:hover {
            background: var(--gold);
            border-color: var(--gold);
            transform: translateY(-3px);
        }

        /* =========================================
           FORM AREA
        ========================================= */

        .contact-form {
            padding: 45px;
        }

        .contact-form h2 {
            color: var(--black);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .contact-form .form-description {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* =========================================
           FORM GROUP
        ========================================= */

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            color: var(--black);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .form-control-custom {
            width: 100%;
            height: 52px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--light-cream);
            padding: 0 16px;
            color: var(--black);
            outline: none;
            transition: .3s ease;
        }

        .form-control-custom:focus {
            background: #fff;
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(200, 165, 106, .10);
        }

        textarea.form-control-custom {
            height: 140px;
            padding: 15px 16px;
            resize: vertical;
        }

        .form-control-custom::placeholder {
            color: #aaa;
        }

        /* =========================================
           SUBMIT BUTTON
        ========================================= */

        .send-btn {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 50px;
            background: var(--black);
            color: #fff;
            font-weight: 600;
            letter-spacing: .3px;
            transition: .3s ease;
        }

        .send-btn:hover {
            background: var(--gold);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(200, 165, 106, .25);
        }

        /* =========================================
           SUCCESS MESSAGE
        ========================================= */

        .success-message {
            border: none;
            border-left: 4px solid var(--gold);
            background: var(--light-cream);
            color: var(--black);
            border-radius: 10px;
            padding: 15px 18px;
            margin-bottom: 25px;
        }

        .success-message i {
            color: var(--gold-dark);
        }

        /* =========================================
           VALIDATION
        ========================================= */

        .error-text {
            color: #c0392b;
            font-size: 12px;
            margin-top: 5px;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 991px) {

            .contact-page {
                padding: 100px 20px 60px;
            }

            .contact-info {
                padding: 40px 30px;
            }

            .contact-form {
                padding: 40px 30px;
            }
        }

        @media (max-width: 768px) {

            .contact-page {
                padding: 90px 15px 50px;
            }

            .contact-heading h1 {
                font-size: 32px;
            }

            .contact-heading {
                margin-bottom: 35px;
            }

            .contact-wrapper {
                border-radius: 18px;
            }

            .contact-info {
                padding: 35px 25px;
            }

            .contact-form {
                padding: 35px 25px;
            }

            .contact-info h2,
            .contact-form h2 {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {

            .contact-heading h1 {
                font-size: 28px;
            }

            .contact-info {
                padding: 30px 20px;
            }

            .contact-form {
                padding: 30px 20px;
            }

            .contact-icon {
                width: 43px;
                height: 43px;
                min-width: 43px;
            }
        }
    </style>


    <section class="contact-page">

        <div class="container">

            <!-- ================================
                 PAGE HEADING
            ================================= -->

            <div class="contact-heading" data-aos="fade-up">

                <span class="small-title">
                    Get In Touch
                </span>

                <h1>
                    Contact Us
                </h1>

                <p>
                    Have a question or need assistance?
                    We'd love to hear from you. Send us a message
                    and our team will get back to you shortly.
                </p>

            </div>


            <!-- ================================
                 CONTACT WRAPPER
            ================================= -->

            <div class="contact-wrapper" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">


                    <!-- ================================
                         CONTACT INFORMATION
                    ================================= -->

                    <div class="col-lg-5">

                        <div class="contact-info">

                            <h2>
                                Let's Talk
                            </h2>

                            <p>
                                We're here to help and answer any questions
                                you may have. Feel free to contact us.
                            </p>


                            <!-- LOCATION -->

                            <div class="contact-info-item">

                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>

                                <div>

                                    <h5>
                                        Location
                                    </h5>

                                    <p>
                                        Pakistan
                                    </p>

                                </div>

                            </div>


                            <!-- OPEN HOURS -->

                            <div class="contact-info-item">

                                <div class="contact-icon">
                                    <i class="far fa-clock"></i>
                                </div>

                                <div>

                                    <h5>
                                        Open Hours
                                    </h5>

                                    <p>
                                        Monday - Saturday<br>
                                        11:00 AM - 11:00 PM
                                    </p>

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="contact-info-item">

                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>

                                <div>

                                    <h5>
                                        Call Us
                                    </h5>

                                    <p>

                                        <a href="tel:{{ $store->phone }}">
                                            {{ $store->phone }}
                                        </a>

                                    </p>

                                </div>

                            </div>


                            <!-- whatsapp -->

                            <div class="contact-info-item">

                                <div class="contact-icon">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>

                                <div>

                                    <h5>
                                        WhatsApp
                                    </h5>

                                    <p>
                                        @if ($store->whatsapp)
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $store->whatsapp) }}"
                                                target="_blank" rel="noopener noreferrer">
                                                {{ $store->whatsapp }}
                                            </a>
                                        @else
                                            <span class="text-muted">Not available</span>
                                        @endif
                                    </p>

                                </div>

                            </div>


                            <!-- EMAIL -->

                            <div class="contact-info-item">

                                <div class="contact-icon">
                                    <i class="far fa-envelope"></i>
                                </div>

                                <div>

                                    <h5>
                                        Email Us
                                    </h5>

                                    <p>

                                        <a href="mailto:{{ $store->email }}">
                                            {{ $store->email }}
                                        </a>

                                    </p>

                                </div>

                            </div>


                            <!-- SOCIAL -->

                            <div class="contact-social">

                                <a href="{{ $store->facebook }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a href="{{ $store->instagram }}">
                                    <i class="fab fa-instagram"></i>
                                </a>

                                {{-- <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a> --}}

                            </div>

                        </div>

                    </div>


                    <!-- ================================
                         CONTACT FORM
                    ================================= -->

                    <div class="col-lg-7">

                        <div class="contact-form">

                            <h2>
                                Send Us a Message
                            </h2>

                            <p class="form-description">
                                Fill out the form below and we'll get back to you as soon as possible.
                            </p>


                            <!-- SUCCESS -->

                            @if (session('success'))
                                <div class="success-message">

                                    <i class="fas fa-check-circle me-2"></i>

                                    {{ session('success') }}

                                </div>
                            @endif


                            <!-- ERRORS -->

                            @if ($errors->any())
                                <div class="alert alert-danger">

                                    <strong>
                                        Please fix the following:
                                    </strong>

                                    <ul class="mb-0 mt-2">

                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif


                            <form action="{{ route('contact.store') }}" method="POST">

                                @csrf


                                <div class="row">

                                    <!-- NAME -->

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Your Name
                                            </label>

                                            <input type="text" name="name" class="form-control-custom"
                                                placeholder="Enter your name" value="{{ old('name') }}" required>

                                            @error('name')
                                                <div class="error-text">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>


                                    <!-- EMAIL -->

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Email Address
                                            </label>

                                            <input type="email" name="email" class="form-control-custom"
                                                placeholder="Enter your email" value="{{ old('email') }}" required>

                                            @error('email')
                                                <div class="error-text">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>


                                    <!-- PHONE -->

                                    <div class="col-12">

                                        <div class="form-group">

                                            <label>
                                                Phone Number
                                                <span class="text-muted">
                                                    (Optional)
                                                </span>
                                            </label>

                                            <input type="text" name="phone" class="form-control-custom"
                                                placeholder="Enter your phone number" value="{{ old('phone') }}">

                                            @error('phone')
                                                <div class="error-text">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>


                                    <!-- MESSAGE -->

                                    <div class="col-12">

                                        <div class="form-group">

                                            <label>
                                                Your Message
                                            </label>

                                            <textarea name="message" class="form-control-custom" placeholder="Write your message here..." required>{{ old('message') }}</textarea>

                                            @error('message')
                                                <div class="error-text">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>


                                    <!-- BUTTON -->

                                    <div class="col-12">

                                        <button type="submit" class="send-btn">

                                            <i class="fas fa-paper-plane me-2"></i>

                                            Send Message

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
