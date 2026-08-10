@extends('user.partials.layout')

@section('content')




<section class="blog-single">
  <div class="container">
    <div class="row gx-5">
      
      <!-- ===== Left: Blog Content ===== -->
      <div class="col-lg-8 mb-5">
        <div class="single-blog-left">
          <img src="{{ asset('/storage/app/public/' . $blogs->image) }}" 
               alt="{{ $blogs->title }}" 
               class="img-fluid mb-4">

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-muted small">
              <i class="bi bi-calendar me-2"></i>{{ $blogs->created_at->format('d M Y') }}
            </div>
            <div class="text-muted small">
              <i class="bi bi-eye me-2"></i>{{ $blogs->views ?? 0 }} Views
            </div>
          </div>

          <h4 class="blog-category">Category: {{ $categories->firstWhere('id', $blogs->category)->name ?? 'Uncategorized' }}</h4>
          <h2 class="blog-title mt-2">{{ $blogs->title }}</h2>

          <div class="blog-content mt-4">
            {!! $blogs->content !!}
          </div>

          <!-- Share Section -->
          <div class="mt-5 pt-4 border-top">
            <h5 class="mb-3">Share this post</h5>
            <div class="d-flex gap-3">
              <a href="#" class="text-decoration-none"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-decoration-none"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-decoration-none"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="text-decoration-none"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Right: Sidebar ===== -->
      <div class="col-lg-4">
        <div class="single-blog-right">

          <!-- Categories -->
          <div class="pb-5 border-bottom">
            <h5 class="mb-4">Categories</h5>
            <ul class="list-unstyled">
              @foreach($categories as $category)
                <li class="py-2 border-bottom">
                  {{ $category->name }}
                </li>
              @endforeach
            </ul>
          </div>

          <!-- Recent Posts -->
          <div class="recent-posts mt-5 p-4 shadow-sm">
            <h5 class="mb-4 text-center">Recent Posts</h5>
            @foreach ($allblog as $item)
              <div class="d-flex align-items-center mb-3">
                <a href="{{ route('user.show', $item->slug) }}">
                  <img src="{{ asset('/storage/app/public/' . $item->image) }}" 
                       alt="{{ $item->title }}" 
                       class="img-fluid" 
                       style="width: 90px; height: 90px; object-fit: cover;">
                </a>
                <div class="px-3">
                  <span class="text-muted small">{{ $item->created_at->format('d M Y') }}</span>
                  <h6 class="mt-1">
                    <a href="{{ route('user.show', $item->slug) }}" class="fw-semibold">
                      {{ Str::limit($item->title, 45) }}
                    </a>
                  </h6>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Social Links -->
          <div class="pt-5">
            <h5 class="mb-3">Follow Us</h5>
            <ul class="d-flex list-unstyled gap-3 fs-5">
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
