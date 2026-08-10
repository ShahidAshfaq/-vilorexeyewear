@extends('admin.partials.layout')

@section('content')

    <div class="container">
        <h1>{{ $blog->title }}</h1>

        <div class="mb-3">
            <strong>Category: </strong>{{ $blog->category }}
        </div>

        <div class="mb-3">
            <strong>Author: </strong>{{ $blog->author }}
        </div>

        @if ($blog->image)
            <div class="mb-3">
                <img src="{{ asset('/storage/app/public/' . $blog->image) }}" alt="Blog Image" width="300">
            </div>
        @endif

        <div class="mb-3">
            <strong>Content: </strong>
            <p>{!! $blog->content !!}</p>
        </div>

        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back to All Blogs</a>
    </div>
@endsection
