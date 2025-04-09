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
</style>

<div class="container">

            <h4 class="form-title">Add Berita</h4>
            
            <form action="/insertdata" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <div class="image-preview" id="thumbnailInput">
                        <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                        <span class="preview-text" id="previewText">No image selected</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judulProgram" class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="excerpt" class="form-label">Short Content Berita</label>
                    <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content Berita</label>
                    <textarea class="form-control" name="content" id="summernote">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date')is-invalid @enderror" value="{{ old('date') }}" name="date" id="date">
                </div>

                <div class="mb-3">
                    <label for="hit" class="form-label">Hit</label>
                    <input type="text" name="hit" class="form-control" value="{{ old('hit') }}" id="hit">
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>

<script>
    // Image preview handling
    document.getElementById("image").addEventListener("change", function () {
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
