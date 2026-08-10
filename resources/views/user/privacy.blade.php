@extends('user.partials.layout')

@section('content')

<section class="velorix-privacy py-5">

    <div class="container">

        <!-- PAGE HEADER -->
        <div class="privacy-header text-center mb-5">

            <span class="privacy-label">
                VELORIX
            </span>

            <h1>
                Privacy Policy
            </h1>

            <p>
                Your privacy matters to us. Learn how Velorix collects,
                uses and protects your information.
            </p>

            <small>
                Last Updated: {{ date('d M Y') }}
            </small>

        </div>


        <div class="row g-4">

            <!-- SIDEBAR -->
            <div class="col-lg-3">

                <div class="privacy-sidebar">

                    <h6>On This Page</h6>

                    <a href="#introduction">
                        Introduction
                    </a>

                    <a href="#information">
                        Information We Collect
                    </a>

                    <a href="#use">
                        How We Use Information
                    </a>

                    <a href="#orders">
                        Orders & Payments
                    </a>

                    <a href="#cookies">
                        Cookies
                    </a>

                    <a href="#security">
                        Data Security
                    </a>

                    <a href="#third-party">
                        Third-Party Services
                    </a>

                    <a href="#rights">
                        Your Rights
                    </a>

                    <a href="#children">
                        Children's Privacy
                    </a>

                    <a href="#changes">
                        Policy Changes
                    </a>

                    <a href="#contact">
                        Contact Us
                    </a>

                </div>

            </div>


            <!-- CONTENT -->
            <div class="col-lg-9">

                <div class="privacy-content">


                    <!-- INTRODUCTION -->
                    <div class="privacy-section" id="introduction">

                        <span class="section-number">
                            01
                        </span>

                        <h2>
                            Introduction
                        </h2>

                        <p>
                            Welcome to <strong>Velorix</strong>, your trusted
                            online eyewear store. We respect your privacy and
                            are committed to protecting the personal information
                            you provide while using our website.
                        </p>

                        <p>
                            This Privacy Policy explains what information we
                            collect, how we use it, how we protect it and the
                            choices you have regarding your information.
                        </p>

                    </div>


                    <!-- INFORMATION -->
                    <div class="privacy-section" id="information">

                        <span class="section-number">
                            02
                        </span>

                        <h2>
                            Information We Collect
                        </h2>

                        <p>
                            When you browse our website or place an order,
                            we may collect information necessary to provide
                            our services.
                        </p>

                        <h5>
                            Personal Information
                        </h5>

                        <ul>
                            <li>Your name</li>
                            <li>Phone number</li>
                            <li>Email address</li>
                            <li>Delivery address</li>
                            <li>City and postal information</li>
                            <li>Order details</li>
                        </ul>

                        <h5>
                            Website Information
                        </h5>

                        <ul>
                            <li>IP address</li>
                            <li>Browser type</li>
                            <li>Device information</li>
                            <li>Pages visited</li>
                            <li>Website interaction data</li>
                        </ul>

                    </div>


                    <!-- USE -->
                    <div class="privacy-section" id="use">

                        <span class="section-number">
                            03
                        </span>

                        <h2>
                            How We Use Your Information
                        </h2>

                        <p>
                            Velorix may use your information for the following
                            purposes:
                        </p>

                        <ul class="check-list">

                            <li>
                                <i class="fas fa-check"></i>
                                Processing and delivering your orders
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                Contacting you about your order
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                Providing customer support
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                Improving our products and website
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                Sending important service updates
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                Preventing fraud and unauthorized activity
                            </li>

                        </ul>

                    </div>


                    <!-- ORDERS -->
                    <div class="privacy-section" id="orders">

                        <span class="section-number">
                            04
                        </span>

                        <h2>
                            Orders & Payments
                        </h2>

                        <p>
                            When you place an order with Velorix, we collect
                            the information required to process and deliver
                            your purchase.
                        </p>

                        <p>
                            Depending on the payment method available on our
                            website, payment information may be processed
                            through secure third-party payment providers.
                        </p>

                        <div class="privacy-note">

                            <i class="fas fa-shield-alt"></i>

                            <div>

                                <strong>
                                    Secure Transactions
                                </strong>

                                <p class="mb-0">
                                    We take reasonable measures to protect
                                    your order and payment-related information.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- COOKIES -->
                    <div class="privacy-section" id="cookies">

                        <span class="section-number">
                            05
                        </span>

                        <h2>
                            Cookies
                        </h2>

                        <p>
                            Velorix may use cookies and similar technologies
                            to improve your browsing experience.
                        </p>

                        <p>
                            Cookies may help us remember your preferences,
                            maintain shopping cart functionality and
                            understand how visitors use our website.
                        </p>

                        <p>
                            You can control or disable cookies through your
                            browser settings. However, disabling certain
                            cookies may affect some website functionality.
                        </p>

                    </div>


                    <!-- SECURITY -->
                    <div class="privacy-section" id="security">

                        <span class="section-number">
                            06
                        </span>

                        <h2>
                            Data Security
                        </h2>

                        <p>
                            Velorix takes reasonable technical and
                            organizational measures to protect your personal
                            information from unauthorized access, alteration,
                            disclosure or destruction.
                        </p>

                        <p>
                            However, no method of transmission or electronic
                            storage can be guaranteed to be completely secure.
                        </p>

                    </div>


                    <!-- THIRD PARTY -->
                    <div class="privacy-section" id="third-party">

                        <span class="section-number">
                            07
                        </span>

                        <h2>
                            Third-Party Services
                        </h2>

                        <p>
                            We may work with trusted third-party service
                            providers to help operate our store and provide
                            services to you.
                        </p>

                        <p>
                            These services may include payment processing,
                            delivery, analytics, hosting and communication
                            services.
                        </p>

                        <p>
                            Third-party providers may only receive information
                            necessary to perform their specific services.
                        </p>

                    </div>


                    <!-- RIGHTS -->
                    <div class="privacy-section" id="rights">

                        <span class="section-number">
                            08
                        </span>

                        <h2>
                            Your Privacy Rights
                        </h2>

                        <p>
                            Depending on applicable law, you may have rights
                            regarding your personal information, including:
                        </p>

                        <ul>

                            <li>
                                Request access to your personal information.
                            </li>

                            <li>
                                Request correction of inaccurate information.
                            </li>

                            <li>
                                Request deletion of certain information.
                            </li>

                            <li>
                                Ask questions about how your information is used.
                            </li>

                        </ul>

                        <p>
                            To make a privacy-related request, please contact
                            us using the information provided below.
                        </p>

                    </div>


                    <!-- CHILDREN -->
                    <div class="privacy-section" id="children">

                        <span class="section-number">
                            09
                        </span>

                        <h2>
                            Children's Privacy
                        </h2>

                        <p>
                            Velorix does not knowingly collect personal
                            information from children without appropriate
                            consent where required by applicable law.
                        </p>

                        <p>
                            If you believe that a child has provided us with
                            personal information, please contact us so that
                            appropriate action can be taken.
                        </p>

                    </div>


                    <!-- CHANGES -->
                    <div class="privacy-section" id="changes">

                        <span class="section-number">
                            10
                        </span>

                        <h2>
                            Changes to This Privacy Policy
                        </h2>

                        <p>
                            We may update this Privacy Policy from time to time
                            to reflect changes in our services, technology or
                            legal requirements.
                        </p>

                        <p>
                            Any updates will be published on this page with
                            the revised "Last Updated" date.
                        </p>

                    </div>


                    <!-- CONTACT -->
                    <div class="privacy-section contact-section" id="contact">

                        <span class="section-number">
                            11
                        </span>

                        <h2>
                            Contact Velorix
                        </h2>

                        <p>
                            If you have any questions or concerns about this
                            Privacy Policy or how we handle your information,
                            please contact us.
                        </p>


                        <div class="row g-3 mt-3">

                            <div class="col-md-4">

                                <div class="contact-box">

                                    <i class="fas fa-envelope"></i>

                                    <small>
                                        Email
                                    </small>

                                    <strong>
                                         {{ $store->email }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="contact-box">

                                    <i class="fas fa-phone"></i>

                                    <small>
                                        Phone
                                    </small>

                                    <strong>
                                         {{ $store->phone }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="contact-box">

                                    <i class="fas fa-map-marker-alt"></i>

                                    <small>
                                        Location
                                    </small>

                                    <strong>
                                        Pakistan
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>


<style>

/* =========================================
   VELORIX PRIVACY POLICY
========================================= */

.velorix-privacy {

    background: #FFF9F3;

    min-height: 100vh;

    color: #2E2724;

}


/* HEADER */

.privacy-header {

    max-width: 750px;

    margin-left: auto;

    margin-right: auto;

}


.privacy-label {

    color: #C59A62;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 3px;

}


.privacy-header h1 {

    font-family: 'Playfair Display', serif;

    font-size: clamp(38px, 5vw, 58px);

    font-weight: 700;

    margin: 10px 0;

    color: #2E2724;

}


.privacy-header p {

    color: #7A706A;

    line-height: 1.7;

    font-size: 15px;

}


.privacy-header small {

    color: #A28F7C;

}


/* SIDEBAR */

.privacy-sidebar {

    background: #fff;

    border: 1px solid #EBD8C3;

    border-radius: 18px;

    padding: 22px;

    position: sticky;

    top: 100px;

}


.privacy-sidebar h6 {

    font-weight: 700;

    margin-bottom: 15px;

    color: #2E2724;

}


.privacy-sidebar a {

    display: block;

    color: #766A61;

    text-decoration: none;

    padding: 8px 0;

    font-size: 13px;

    transition: .2s ease;

}


.privacy-sidebar a:hover {

    color: #C59A62;

    padding-left: 5px;

}


/* CONTENT */

.privacy-content {

    background: #fff;

    border: 1px solid #EBD8C3;

    border-radius: 20px;

    padding: clamp(25px, 5vw, 50px);

}


.privacy-section {

    position: relative;

    padding-bottom: 38px;

    margin-bottom: 38px;

    border-bottom: 1px solid #F0E4D6;

}


.privacy-section:last-child {

    border-bottom: none;

    margin-bottom: 0;

}


/* NUMBER */

.section-number {

    color: #C59A62;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 1px;

}


.privacy-section h2 {

    font-family: 'Playfair Display', serif;

    color: #2E2724;

    font-size: 27px;

    margin: 6px 0 15px;

    font-weight: 700;

}


.privacy-section h5 {

    color: #403631;

    font-size: 16px;

    margin-top: 22px;

    font-weight: 700;

}


.privacy-section p {

    color: #6F655E;

    line-height: 1.8;

    font-size: 14px;

}


.privacy-section ul {

    padding-left: 20px;

}


.privacy-section li {

    color: #6F655E;

    margin-bottom: 9px;

    font-size: 14px;

    line-height: 1.6;

}


/* CHECK LIST */

.check-list {

    list-style: none;

    padding-left: 0 !important;

}


.check-list li {

    display: flex;

    align-items: flex-start;

    gap: 10px;

}


.check-list i {

    color: #C59A62;

    margin-top: 4px;

}


/* SECURITY BOX */

.privacy-note {

    display: flex;

    align-items: flex-start;

    gap: 15px;

    background: #FFF9F3;

    border: 1px solid #EBD8C3;

    border-radius: 14px;

    padding: 18px;

    margin-top: 20px;

}


.privacy-note > i {

    color: #C59A62;

    font-size: 22px;

}


.privacy-note strong {

    color: #3B312C;

    font-size: 14px;

}


/* CONTACT */

.contact-section {

    padding-bottom: 0;

}


.contact-box {

    height: 100%;

    background: #FFF9F3;

    border: 1px solid #EBD8C3;

    border-radius: 14px;

    padding: 18px;

}


.contact-box i {

    display: block;

    color: #C59A62;

    font-size: 20px;

    margin-bottom: 10px;

}


.contact-box small {

    display: block;

    color: #94877C;

    margin-bottom: 4px;

}


.contact-box strong {

    display: block;

    color: #3B312C;

    font-size: 13px;

    word-break: break-word;

}


/* MOBILE */

@media (max-width: 991px) {

    .privacy-sidebar {

        position: static;

    }

}


@media (max-width: 576px) {

    .velorix-privacy {

        padding-top: 25px !important;

    }


    .privacy-content {

        padding: 25px 20px;

        border-radius: 15px;

    }


    .privacy-header h1 {

        font-size: 38px;

    }


    .privacy-section h2 {

        font-size: 23px;

    }


    .contact-box {

        padding: 15px;

    }

}

</style>

@endsection