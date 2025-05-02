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

<!-- Summernote CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">

<div class="" style="background-color: white;">
    <div class="container mt-4 mb-4">
        <div class="form-card">
            <h4 class="form-title">Tambah Data</h4>
            
            <form action="/insertdata" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">foto</label>
                    <input type="file" id="image" name="foto" class="form-control">
                    <div class="image-preview" id="thumbnailInput">
                        <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                        <span class="preview-text" id="previewText">No image selected</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judulProgram" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="rate" class="form-label">rate</label>
                    <select class="form-control" name="rate" id="rate">
                        <option value="1">★☆☆☆☆ (1)</option>
                        <option value="2">★★☆☆☆ (2)</option>
                        <option value="3">★★★☆☆ (3)</option>
                        <option value="4">★★★★☆ (4)</option>
                        <option value="5">★★★★★ (5)</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Ulasan</label>
                    <textarea class="form-control" name="ulasan" id="content">{{ old('ulasan') }}</textarea>
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Summernote Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            placeholder: '',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ],
            colors: [
                ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
                ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
                ['#F7977A', '#F9AD81', '#FDC68A', '#FFF79A', '#C4DF9B', '#A2D39C', '#82CA9D', '#7BCDC8'],
                ['#6ECFF6', '#7EA7D8', '#8493CA', '#8882BE', '#A187BE', '#BC8DBF', '#F49AC2', '#F6989D']
            ]
        });
    });
</script>

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