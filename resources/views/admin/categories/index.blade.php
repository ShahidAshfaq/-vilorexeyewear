@extends('admin.partials.layout')

@section('content')
<div class="container">
    <h1>Categories</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>img</th>
                <th>Name</th>
                <th>Created At</th>
                <th>del</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><img src="{{ asset('/storage/app/public/' . $category->image) }}" height="50px" width="50px" alt="{{ $category->name }}" class="img-thumbnail">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d-m-Y') }}</td>
                    <td><form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
