@extends('backend.template-admin.index')
@section('content')

{{-- <style>
  .page-item.active .page-link {
    background-color: #28a745 !important; /* Warna hijau */
    border-color: #28a745 !important;
}

.page-link {
    color: #fff !important; /* Warna teks */
}

.page-link:hover {
    background-color: #218838 !important; /* Warna hijau lebih gelap saat hover */
    border-color: #218838 !important;
}
</style> --}}

<div class="container">

<h1 class="">Deskripsi Perjalanan {{ $tiket->judul_tiket }}</h1>
     
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between align-items-center">
    <a href="{{ route('deskripsi.tambah',$tiket->id) }}" class="btn btn-success">Tambah</a>
    <form class="form-inline d-flex gap-2">
      <input class="form-control " type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
</nav>

  <!-- Tabel Data -->
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Icon</th>
        <th class="text-center">Waktu</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($deskripsi as $index => $item)
      <tr>
        
        <td class="text-center">
          {{  $deskripsi->firstItem() + $index }}
        </td>
        <td class="text-center">
            <img src="{{ asset('foto/' . $item->icon) }}" alt=""  height="50px" width="50px" style="border-radius: 10px;">
        </td>
        <td class="text-center">{{ $item->waktu }}</td>
        
        <td class="text-center">
          <a href="{{ route('deskripsi.edit',$item->id) }}" class="btn btn-primary">Edit</a>
          <a href="#" onclick="comfirmDelete('{{ route('deskripsi.delete',$item->id) }}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


  <div class="">
    {{ $deskripsi->links() }}
  </div>

</div>

@endsection
