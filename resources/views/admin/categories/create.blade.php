@extends('admin.partials.layout')

@section('content')
<div class="container">
    <h1>Add Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group mt-3">
            <label for="image" class="form-label">Category Image:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>
</div>
@endsection
