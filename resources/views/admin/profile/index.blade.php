
@extends('admin.partials.layout')

@section('content')

<style>

/* =========================================
   STORE PROFILE PAGE
========================================= */

.store-profile-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
}


/* =========================================
   BANNER
========================================= */

.profile-banner {
    position: relative;
    height: 230px;
    overflow: hidden;
}

.profile-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-banner::after {
    content: "";
    position: absolute;
    inset: 0;

    background: linear-gradient(
        to top,
        rgba(0,0,0,.65),
        rgba(0,0,0,0)
    );
}


/* =========================================
   LOGO
========================================= */

.profile-logo {
    position: absolute;

    left: 30px;
    bottom: -42px;

    width: 95px;
    height: 95px;

    padding: 8px;

    background: #fff;

    border: 4px solid #fff;

    border-radius: 18px;

    box-shadow: 0 6px 20px rgba(0,0,0,.18);

    z-index: 5;
}

.profile-logo img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    border-radius: 12px;
}


/* =========================================
   PROFILE BODY
========================================= */

.profile-body {
    padding: 60px 30px 30px;
}


/* =========================================
   HEADER
========================================= */

.profile-header {
    display: flex;

    justify-content: space-between;
    align-items: flex-start;

    gap: 20px;

    margin-bottom: 25px;
}

.profile-name {
    font-size: 25px;

    font-weight: 700;

    color: #333;

    margin-bottom: 5px;
}

.profile-id {
    color: #999;

    font-size: 13px;
}

.profile-status {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 12px;

    background: rgba(25,135,84,.1);

    color: #198754;

    border-radius: 20px;

    font-size: 12px;

    font-weight: 600;
}

.profile-status-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #198754;
}


/* =========================================
   EDIT BUTTON
========================================= */

.edit-profile-btn {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    padding: 11px 20px;

    background: var(--gold-dark);

    color: #fff !important;

    border-radius: 9px;

    text-decoration: none !important;

    font-size: 13px;

    font-weight: 600;

    border: 1px solid var(--gold-dark);

    transition: .25s ease;

    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}

.edit-profile-btn:hover {
    background: #fff;

    color: var(--gold-dark) !important;

    transform: translateY(-2px);
}


/* =========================================
   DESCRIPTION
========================================= */

.profile-description {
    padding: 18px;

    background: #fafafa;

    border: 1px solid #eee;

    border-radius: 12px;

    margin-bottom: 25px;

    color: #666;

    font-size: 14px;

    line-height: 1.7;
}


/* =========================================
   SECTION TITLE
========================================= */

.info-section-title {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 15px;

    color: #333;

    font-size: 16px;

    font-weight: 700;
}

.info-section-title i {
    color: var(--gold-dark);
}


/* =========================================
   INFORMATION GRID
========================================= */

.profile-info-grid {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 14px;

    margin-bottom: 28px;
}

.profile-info-item {
    display: flex;

    align-items: center;

    gap: 13px;

    padding: 15px;

    background: #fff;

    border: 1px solid #eee;

    border-radius: 12px;

    transition: .2s ease;
}

.profile-info-item:hover {
    background: #fffdf8;

    border-color: rgba(212,175,55,.3);
}

.profile-info-icon {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 10px;

    background: rgba(212,175,55,.1);

    color: var(--gold-dark);

    font-size: 15px;
}

.profile-info-content {
    min-width: 0;
}

.profile-info-content small {
    display: block;

    color: #999;

    font-size: 11px;

    margin-bottom: 3px;

    text-transform: uppercase;

    letter-spacing: .3px;
}

.profile-info-content span,
.profile-info-content a {
    display: block;

    color: #444;

    font-size: 13px;

    font-weight: 600;

    text-decoration: none;

    word-break: break-word;
}

.profile-info-content a:hover {
    color: var(--gold-dark);
}


/* =========================================
   SOCIAL LINKS
========================================= */

.social-section {
    padding-top: 5px;
}

.social-links {
    display: flex;

    flex-wrap: wrap;

    gap: 10px;
}

.social-link {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 9px 14px;

    background: #f8f8f8;

    border: 1px solid #eee;

    border-radius: 9px;

    color: #555;

    text-decoration: none;

    font-size: 13px;

    transition: .2s ease;
}

.social-link:hover {
    background: var(--gold-dark);

    color: #fff;

    border-color: var(--gold-dark);

    transform: translateY(-2px);
}


/* =========================================
   META INFORMATION
========================================= */

.profile-meta {
    margin-top: 25px;

    padding-top: 20px;

    border-top: 1px solid #eee;

    display: flex;

    justify-content: space-between;

    flex-wrap: wrap;

    gap: 10px;

    color: #999;

    font-size: 12px;
}


/* =========================================
   EMPTY
========================================= */

.empty-profile {
    text-align: center;

    padding: 70px 20px;

    background: #fff;

    border-radius: 18px;

    border: 1px solid #eee;
}

.empty-profile i {
    font-size: 45px;

    color: #ccc;

    margin-bottom: 15px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .profile-banner {
        height: 170px;
    }

    .profile-body {
        padding: 55px 18px 20px;
    }

    .profile-header {
        flex-direction: column;
    }

    .profile-info-grid {
        grid-template-columns: 1fr;
    }

    .profile-logo {
        left: 18px;

        width: 80px;
        height: 80px;

        bottom: -35px;
    }

    .profile-name {
        font-size: 21px;
    }

    .edit-profile-btn {
        width: 100%;
    }

}

</style>


{{-- SUCCESS MESSAGE --}}

@if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="fas fa-check-circle me-2"></i>

        {{ $message }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


<div class="container-fluid">

    <div class="row g-4">

        @forelse ($userProfiles as $profile)

            <div class="col-12">

                <div class="store-profile-card">


                    {{-- =================================
                         BANNER
                    ================================== --}}

                    <div class="profile-banner">

                        @if ($profile->image)

                            <img
                                src="{{ asset('/storage/app/public/' . $profile->image) }}"
                                alt="{{ $profile->name }}"
                            >

                        @else

                            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">

                                <i class="fas fa-image fa-3x text-muted"></i>

                            </div>

                        @endif


                        {{-- LOGO --}}

                        <div class="profile-logo">

                            @if ($profile->logo)

                                <img
                                    src="{{ asset('/storage/app/public/' . $profile->logo) }}"
                                    alt="{{ $profile->name }} Logo"
                                >

                            @else

                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">

                                    <i class="fas fa-store text-muted fa-2x"></i>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- =================================
                         BODY
                    ================================== --}}

                    <div class="profile-body">


                        {{-- HEADER --}}

                        <div class="profile-header">

                            <div>

                                <div class="profile-name">
                                    {{ $profile->name }}
                                </div>

                                <div class="profile-id">
                                    Profile ID: #{{ $profile->id }}
                                </div>

                            </div>


                            <div>

                                <a
                                    href="{{ route('setting.edit', $profile->id) }}"
                                    class="edit-profile-btn"
                                >
                                    <i class="fas fa-pen"></i>

                                    Edit Profile
                                </a>

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div class="mb-3">

                            <span class="profile-status">

                                <span class="profile-status-dot"></span>

                                Active Profile

                            </span>

                            <a href="{{ route('setting.edit', $profile->id) }}"
                            class="btn btn-sm btn-primary">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                        </div>

                        {{-- DESCRIPTION --}}

                        @if ($profile->description)

                            <div class="profile-description">

                                <strong>
                                    About Store
                                </strong>

                                <br>

                                {{ $profile->description }}

                            </div>

                        @endif


                        {{-- =================================
                             CONTACT INFORMATION
                        ================================== --}}

                        <div class="info-section-title">

                            <i class="fas fa-address-card"></i>

                            Contact Information

                        </div>


                        <div class="profile-info-grid">


                            {{-- Phone --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>

                                <div class="profile-info-content">

                                    <small>Phone</small>

                                    @if ($profile->phone)

                                        <a href="tel:{{ $profile->phone }}">
                                            {{ $profile->phone }}
                                        </a>

                                    @else

                                        <span>Not provided</span>

                                    @endif

                                </div>

                            </div>


                            {{-- Email --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="profile-info-content">

                                    <small>Email</small>

                                    @if ($profile->email)

                                        <a href="mailto:{{ $profile->email }}">
                                            {{ $profile->email }}
                                        </a>

                                    @else

                                        <span>Not provided</span>

                                    @endif

                                </div>

                            </div>


                            {{-- WhatsApp --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">

                                    <i class="fab fa-whatsapp"></i>

                                </div>

                                <div class="profile-info-content">

                                    <small>WhatsApp</small>

                                    @if ($profile->whatsapp)

                                        <a
                                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            {{ $profile->whatsapp }}
                                        </a>

                                    @else

                                        <span>Not provided</span>

                                    @endif

                                </div>

                            </div>


                            {{-- Website --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">

                                    <i class="fas fa-globe"></i>

                                </div>

                                <div class="profile-info-content">

                                    <small>Website</small>

                                    @if ($profile->website)

                                        <a
                                            href="{{ $profile->website }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            {{ $profile->website }}
                                        </a>

                                    @else

                                        <span>Not provided</span>

                                    @endif

                                </div>

                            </div>


                            {{-- Address --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">

                                    <i class="fas fa-map-marker-alt"></i>

                                </div>

                                <div class="profile-info-content">

                                    <small>Address</small>

                                    <span>
                                        {{ $profile->address ?: 'Not provided' }}
                                    </span>

                                </div>

                            </div>


                            {{-- City --}}

                            <div class="profile-info-item">

                                <div class="profile-info-icon">

                                    <i class="fas fa-city"></i>

                                </div>

                                <div class="profile-info-content">

                                    <small>City</small>

                                    <span>
                                        {{ $profile->city ?: 'Not provided' }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- =================================
                             SOCIAL MEDIA
                        ================================== --}}

                        <div class="social-section">

                            <div class="info-section-title">

                                <i class="fas fa-share-alt"></i>

                                Social Media

                            </div>


                            <div class="social-links">


                                @if ($profile->facebook)

                                    <a
                                        href="{{ $profile->facebook }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="social-link"
                                    >

                                        <i class="fab fa-facebook-f"></i>

                                        Facebook

                                    </a>

                                @endif


                                @if ($profile->instagram)

                                    <a
                                        href="{{ $profile->instagram }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="social-link"
                                    >

                                        <i class="fab fa-instagram"></i>

                                        Instagram

                                    </a>

                                @endif


                                @if (!$profile->facebook && !$profile->instagram)

                                    <span class="text-muted">
                                        No social media accounts added.
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- =================================
                             PROFILE META
                        ================================== --}}

                        <div class="profile-meta">

                            <span>
                                <i class="far fa-calendar-plus me-1"></i>

                                Created:
                                {{ $profile->created_at?->format('d M Y, h:i A') }}
                            </span>


                            <span>
                                <i class="far fa-clock me-1"></i>

                                Last Updated:
                                {{ $profile->updated_at?->format('d M Y, h:i A') }}
                            </span>

                        </div>


                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-profile">

                    <i class="fas fa-store d-block"></i>

                    <h5>
                        No Store Profile Found
                    </h5>

                    <p class="text-muted mb-0">
                        Store information has not been configured yet.
                    </p>

                </div>

            </div>

        @endforelse
        <a href="{{ route('setting.edit', $profile->id) }}">edit</a>
    </div>

</div>

@endsection
