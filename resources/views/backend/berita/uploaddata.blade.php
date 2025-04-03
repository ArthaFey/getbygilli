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



<div class="" style="background-color: white;">
<div class="container mt-4 mb-4">
    <div class="form-card">
        <h4 class="form-title">Add Berita</h4>
        
        <form action="{{ route('tambahdata') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Custom File Upload -->
          


            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" id="image" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                <div class="image-preview" id="thumbnailInput">
                    <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                    <span class="preview-text" id="previewText">No image selected</span>
                </div>
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

          

            <div class="mb-3">
                <label for="judulProgram" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul')is-invalid @enderror" value="{{ old('judul') }}"  name="judul" id="judul">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input type="hidden" id="slug" name="slug">

            <div class="mb-3">
                <label for="" class="form-label">Content</label>
               <textarea name="deskripsi" id="ckeditor">{{ old('deskripsi') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Date</label>
                <input type="date" class="form-control @error('date')is-invalid @enderror" value="{{ old('date') }}" value="{{ old('date') }}"  name="date" id="date">
            </div>
            

            <!-- Submit Button -->
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</div>



<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/berita/checkSlug?judul=' + judul.value)
        .then(response => response.json())
        .then(data =>  slug.value = data.slug)
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
                previewText.style.display = "none"; // Hide text when image is selected
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewText.style.display = "block"; // Show text if no image selected
        }
    });
</script>


@endsection