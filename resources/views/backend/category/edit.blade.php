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


<div class="content">
    <div class="container-fluid">
        <h1>Edit Data</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                        @csrf 
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" id="image" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            <div class="image-preview" id="thumbnailInput">
                                
                                @if($category->foto)
                                <img src="{{ asset('foto/' . $category->foto) }}" alt="Old Image Preview" id="previewImage" style="display: block;">
                                @else
                                <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                                <span class="preview-text" id="previewText">No image selected</span>
                                @endif

                            </div>
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Category</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name',$category->name) }}" id="category">
                            
                            <input type="hidden" name="slug" id="slug" value="{{ old('slug',$category->slug) }}">
                        </div>
                      
                    
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<script>
    const category = document.querySelector('#category');
    const slug = document.querySelector('#slug');

    category.addEventListener('change', function() {
        fetch('/category/checkSlug?category=' + category.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
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