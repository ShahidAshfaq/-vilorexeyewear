@extends('admin.partials.layout')

@section('content')

<!-- Include necessary CSS and JS files for CKEditor -->
<!-- Ensure the CKEditor script is added in your Blade template -->
<script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

<div class="container mt-5">
    <h1>Create Blog</h1>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Blog Title -->
        <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <!-- Blog Content -->
        <div class="form-group mb-3">
            <label for="content">Content:</label>
            <textarea class="form-control" id="editor" rows="10" name="content" required></textarea>
        </div>

        <!-- Blog Category -->
        <div class="form-group mb-3">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Blog Title -->
        <div class="form-group mb-3">
            <label for="title">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>

        <!-- Blog Title -->
        <div class="form-group mb-3">
            <label for="title">Auther:</label>
            <input type="text" class="form-control" id="auther" name="author" required>
        </div>

        <!-- Blog Image -->
        <div class="form-group mb-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file form-control" id="image" name="image">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Blog</button>
    </form>
</div>

<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('content', {
        toolbar: [
            { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
            { name: 'about', items: ['About'] }
        ]
    });
</script>
<script>
    document.getElementById('title').addEventListener('input', function() {
        let title = this.value;
        let slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>

@endsection
