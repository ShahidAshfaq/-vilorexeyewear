
@extends('admin.partials.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('setting.update', $store->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')


    <div class="row">

        {{-- Store Name --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Store Name
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $store->name) }}"
                required
            >

        </div>


        {{-- Hero Image --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Hero / Banner Image
            </label>

            @if($store->image)

                <div class="mb-2">
                    <img
                        src="{{ asset('/storage/app/public/' . $store->image) }}"
                        alt="Hero Image"
                        style="
                            width: 180px;
                            height: 100px;
                            object-fit: cover;
                            border-radius: 8px;
                            border: 1px solid #ddd;
                        "
                    >
                </div>

            @endif

            <input
                type="file"
                name="image"
                class="form-control"
                accept="image/*"
            >

            <small class="text-muted">
                Leave empty to keep the current hero image.
            </small>

        </div>


        {{-- Store Logo --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Store Logo
            </label>

            @if($store->logo)

                <div class="mb-2">
                    <img
                        src="{{ asset('/storage/app/public/' . $store->logo) }}"
                        alt="Store Logo"
                        style="
                            width: 120px;
                            height: 70px;
                            object-fit: contain;
                            border-radius: 8px;
                            border: 1px solid #ddd;
                            padding: 5px;
                            background: #fff;
                        "
                    >
                </div>

            @endif

            <input
                type="file"
                name="logo"
                class="form-control"
                accept="image/*"
            >

            <small class="text-muted">
                Leave empty to keep the current logo.
            </small>

        </div>


        {{-- Phone --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Phone
            </label>

            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone', $store->phone) }}"
            >

        </div>


        {{-- Email --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $store->email) }}"
            >

        </div>


        {{-- WhatsApp --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                WhatsApp
            </label>

            <input
                type="text"
                name="whatsapp"
                class="form-control"
                value="{{ old('whatsapp', $store->whatsapp) }}"
            >

        </div>


        {{-- Address --}}
        <div class="col-md-12 mb-3">

            <label class="form-label">
                Address
            </label>

            <textarea
                name="address"
                class="form-control"
                rows="3"
            >{{ old('address', $store->address) }}</textarea>

        </div>


        {{-- Description --}}
        <div class="col-md-12 mb-3">

            <label class="form-label">
                Store Description
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="4"
            >{{ old('description', $store->description) }}</textarea>

        </div>


        {{-- Facebook --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Facebook
            </label>

            <input
                type="url"
                name="facebook"
                class="form-control"
                value="{{ old('facebook', $store->facebook) }}"
            >

        </div>


        {{-- Instagram --}}
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Instagram
            </label>

            <input
                type="url"
                name="instagram"
                class="form-control"
                value="{{ old('instagram', $store->instagram) }}"
            >

        </div>

    </div>


    {{-- Buttons --}}
    <div class="mt-3">

        <button type="submit" class="btn btn-primary">

            <i class="fas fa-save me-2"></i>

            Update Store Settings

        </button>

        <a
            href="{{ route('setting.index') }}"
            class="btn btn-secondary ms-2"
        >
            <i class="fas fa-arrow-left me-2"></i>
            Cancel
        </a>

    </div>

</form>

@endsection
