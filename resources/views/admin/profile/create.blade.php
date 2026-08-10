@extends('admin.partials.layout')


@section('content')
<div class="container">
    <h2>Create Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
    <form action="{{ route('setting.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Store Name
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                required
            >

        </div>


        {{-- Hero Image --}}

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Hero / Banner Image
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
                accept="image/*"
                required
            >

            <small class="text-muted">
                This image will appear in the hero section.
            </small>

        </div>


        {{-- Logo --}}

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Store Logo
            </label>

            <input
                type="file"
                name="logo"
                class="form-control"
                accept="image/*"
            >

            <small class="text-muted">
                This logo will appear in the header.
            </small>

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">
                Phone
            </label>

            <input
                type="text"
                name="phone"
                class="form-control"
            >

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
            >

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">
                WhatsApp
            </label>

            <input
                type="text"
                name="whatsapp"
                class="form-control"
            >

        </div>


        <div class="col-md-12 mb-3">

            <label class="form-label">
                Address
            </label>

            <textarea
                name="address"
                class="form-control"
                rows="3"
            ></textarea>

        </div>


        <div class="col-md-12 mb-3">

            <label class="form-label">
                Store Description
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="4"
            ></textarea>

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">
                Facebook
            </label>

            <input
                type="url"
                name="facebook"
                class="form-control"
            >

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">
                Instagram
            </label>

            <input
                type="url"
                name="instagram"
                class="form-control"
            >

        </div>

    </div>


    <button type="submit" class="btn btn-primary">

        <i class="fas fa-save me-2"></i>

        Save Store Settings

    </button>

</form>
</div>
@endsection
