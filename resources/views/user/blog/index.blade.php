@extends('user.partials.layout')

@section('content')


<!--===============================
    🏷 Banner Section Start
===================================-->
<section class="about-us-banner mb-160 md-mb-100" data-aos="fade-down">
    <div class="about-three-rapper position-relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center flex-column text-center">
                <div class="d-flex align-items-center justify-content-center mt-240 md-mt-100">
                    <h1 class="mb-30 fw-bold" data-aos="fade-up">Blogs</h1>
                    <p class="text-muted" data-aos="fade-up" data-aos-delay="150">
                        Explore the latest stories, tips, and insights from Shahzore Store.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===============================
    🏷 Banner Section End
===================================-->


<!--===============================
    📰 Blog Grid Section
===================================-->
<section class="home-blog-three mb-160 md-mb-80">
    <div class="container">
        <div class="blog-heading mb-60" data-aos="fade-up">
            <h3>Latest Career Stories</h3>
        </div>

        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100">

                    <!-- Blog Image -->
                    @if ($blog->image)
                        <a href="{{ route('user.show', $blog->slug) }}">
                            <img src="{{ asset('/storage/app/public/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid card-img-top">
                        </a>
                    @else
                        <div class="no-image text-center py-4">
                            <span>No Image Available</span>
                        </div>
                    @endif

                    <!-- Blog Content -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="left-side d-flex align-items-center">
                                <i class="bi bi-person me-2"></i>
                                <span>By Admin</span>
                            </div>
                            <div class="right-side d-flex align-items-center">
                                <i class="bi bi-clock text-muted me-2"></i>
                                <span>{{ $blog->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <div class="category-name mb-2">
                            {{ optional($category->firstWhere('id', $blog->category_id))->name ?? 'Uncategorized' }}
                        </div>

                        <p class="mb-1"><small>{{ $blog->views }} views</small></p>

                        <h5 class="card-title pt-2">
                            <a href="{{ route('user.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h5>

                        <p class="card-text text-muted mt-2">
                            {{-- {!! Str::limit(strip_tags($blog->content), 100) !!} --}}
                        </p>

                        <a href="{{ route('user.show', $blog->slug) }}" class="btn btn-outline-dark mt-3">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
<!--===============================
    📰 Blog Grid End
===================================-->

@endsection
