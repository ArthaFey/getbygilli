@extends('backend.template-admin.index')
@section('content')
<div class="container">
  <h1 class="text-center">ULASAN PENGGUNA</h1>
  <table class="table">
    <a href="/tambah_ulasan" class="btn btn-success mb-3">Tambah +</a>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Foto</th>
        <th scope="col">Ulasan</th>
        <th scope="col">Rate</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
      @foreach ($data as $row)
      <tr>
        <th scope="row">{{ $no++ }}</th>
        <td>{{ $row->nama }}</td>
        <td>
          <img src="{{ asset('fotoprofile/' . $row->foto) }}" alt="" style="width: 40px;">
        </td>
        <td>{{ $row->ulasan }}</td>
        <td>{{ $row->rate }}</td>
        <td>
          <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>
          <a href="/editulasan/{{ $row->id }}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Tambahkan ini di luar table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function () {
    $('.delete').click(function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success me-2",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons.fire({
        title: "Yakin ingin menghapus?",
        text: "Data ini tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "/delete/" + id;
        }
      });
    });
  });
</script>
@endsection
