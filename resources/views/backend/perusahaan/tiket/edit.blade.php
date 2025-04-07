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
                    <form method="post" action="{{ route('tiket.update',$tiket->id) }}" enctype="multipart/form-data">
                        @csrf 
                        
                        <input type="hidden" name="perusahaan_id" value="{{ old('perusahaan_id',$tiket->perusahaan_id) }}" id="">

                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Judul Tiket</label>
                            <input type="text" class="form-control" name="judul_tiket" value="{{ old('judul_tiket',$tiket->judul_tiket) }}" id="judul_tiket">
                            
                            <input type="hidden" name="slug" id="slug">
                        </div>
                      
                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Harga Dewasa</label>
                            <input type="number" class="form-control" name="harga_dewasa" value="{{ old('harga_dewasa',$tiket->harga_dewasa) }}" id="">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Harga Anak-Anak</label>
                            <input type="number" class="form-control" name="harga_anak_anak" value="{{ old('harga_anak_anak',$tiket->harga_anak_anak) }}" id="">
                        </div>


                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Keterangan Tiba</label>
                            <textarea name="keterangan_tiba" id="summernote">{{ old('keterangan_tiba',$tiket->keterangan_tiba) }}</textarea>
                        </div>
                      
                        <div class="mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Category</label>      
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>Pilih Category</option>
                            @foreach ($category as $item )
                            <option value="{{ $item->id }}" {{ old('category_id',$tiket->category_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                          </select>
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
    const judul_tiket = document.querySelector('#judul_tiket');
    const slug = document.querySelector('#slug');

    judul_tiket.addEventListener('input', function() {
    fetch('/tiket/checkSlug?judul_tiket=' + encodeURIComponent(judul_tiket.value))
        .then(response => response.json())
        .then(data => {
            if (data.slug) {
                slug.value = data.slug;
            }
        })
        .catch(error => console.log("Error fetching slug: ", error));
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