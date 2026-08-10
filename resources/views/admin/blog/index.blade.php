@extends('admin.partials.layout')

@section('content')

    <div class="container">
        <h1>All Blogs</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Blog</a>
        
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category }}</td>
                        <td>{{ $blog->author }}</td>
                        <td><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></td>
                        <td>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
