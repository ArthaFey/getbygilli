@extends('backend.template-admin.index')
@section('content')

<div class="container mt-3">

    <title>Data Berita</title>

    <h1 class="text-center mb-4">Data Berita</h1>

    <a href="/tambahdata" class="btn btn-success mb-3">Tambah +</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Foto</th>
                <th scope="col">Judul</th>
                <th scope="col">Hit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->category }}</td>
                    <td>
                        <img src="{{ asset('fotoberita/' .$row->image) }}" alt="" style="width: 40px;">
                    </td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->hit }}</td>
                    <td>
                        <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                        <a href="#" onclick="confirmDelete('/delete/{{ $row->id }}')" class="btn btn-danger delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmDelete(url) {
        swal({
            title: "Yakin hapus?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            buttons: ["Batal", "Hapus"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    }
</script>

@endsection
