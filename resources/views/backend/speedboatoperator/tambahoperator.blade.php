@extends('backend.template-admin.index')
@section('content')

<style>
    .custom-file-upload:hover {
        border-color: #007bff;
        background-color: #eaf2ff;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload .icon {
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 10px;
    }

    .custom-file-upload .text {
        font-size: 1rem;
        color: #666;
    }

    .image-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 300px;
        border: 2px dashed #ddd;
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        background-color: #f8f8f8;
        padding: 10px;
        transition: border-color 0.3s ease;
    }

    .image-preview:hover {
        border-color: #4B49AC;
    }

    .image-preview img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
        display: none;
    }

    .preview-text {
        font-size: 16px;
        color: #aaa;
    }

    /* Improved container styling */
    .form-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .form-title {
        color: #4B49AC;
        font-weight: 600;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .form-label {
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 6px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #4B49AC;
        box-shadow: 0 0 0 0.2rem rgba(75, 73, 172, 0.25);
    }

    .btn-primary {
        background-color: #4B49AC;
        border-color: #4B49AC;
        padding: 10px 25px;
        border-radius: 6px;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #3a3899;
        border-color: #3a3899;
    }
</style>

<div class="container">
    <div class="form-container">
        <h4 class="form-title">Add Operator</h4>
        
        <form action="/insertopt" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control">
                <div class="image-preview mt-2" id="thumbnailInput">
                    <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                    <span class="preview-text" id="previewText">No image selected</span>
                </div>
            </div>

            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="knocks" class="form-label">Knocks</label>
                    <input type="number" name="knocks" class="form-control" value="{{ old('knocks') }}" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" step="0.1" min="0" max="5" name="rating" class="form-control" value="{{ old('rating') }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="summernote" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="map_link_1" class="form-label">Link Map 1</label>
                <input type="url" name="map1" class="form-control" value="{{ old('map1') }}" required>
            </div>

            <div class="mb-4">
                <label for="map_link_2" class="form-label">Link Map 2</label>
                <input type="url" name="map2" class="form-control" value="{{ old('map2') }}" required>
            </div>
            
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Image preview handling
    document.getElementById("gambar").addEventListener("change", function () {
        const file = this.files[0];
        const previewImage = document.getElementById("previewImage");
        const previewText = document.getElementById("previewText");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewText.style.display = "none";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewText.style.display = "block";
        }
    });
</script>

@endsection