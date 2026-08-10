@extends('admin.partials.layout')



@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                {{-- <th>Image</th> --}}
                <th>Actions</th>
            </tr>
        </thead>    
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }} RS</td>
                    {{-- <td>
                        @foreach (json_decode($product->image) as $image)
                        <img src="{{ asset('/storage/app/public/' . $image) }}" alt="Product Image" width="150">
                        @endforeach
                    </td> --}}
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
