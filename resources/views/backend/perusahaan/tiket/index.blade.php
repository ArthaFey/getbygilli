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

<style>
  .btn-group {
  display: flex;
  flex-direction: column;
  gap: 5px;
}
</style>
@php
use Carbon\carbon;
Carbon::setLocale('id');
@endphp
<div class="container">

<h1 class="">Tiket {{ $perusahaan->nama }}</h1>
     
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between align-items-center">
    <a href="{{ route('tiket.tambah',$perusahaan->id) }}" class="btn btn-success">Tambah</a>
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
        <th class="text-center">Foto</th>
        <th class="text-center">Judul Tiket</th>
        <th class="text-center">Tanggal Keberangkatan</th>
        <th class="text-center">Harga Dewasa</th>
        <th class="text-center">Harga Anak-anak</th>
        <th class="text-center">Category</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tiket as $index => $item)
      <tr>
        
        <td class="text-center">
          {{  $tiket->firstItem() + $index }}
        </td>
        <td class="text-center">
          <img src="{{ asset('foto/' . $item->foto) }}" alt="" height="50px" width="50px" style="border-radius: 10px;" >
        </td>
        <td class="text-center">{{ $item->judul_tiket }}</td>
        <td class="text-center">{{ Carbon::parse($item->tanggal_keberangkatan)->isoFormat('D MMM Y') }}</td>
        <td class="text-center">{{ $item->harga_dewasa }}</td>
        <td class="text-center">{{ $item->harga_anak_anak }}</td>
        <td class="text-center">{{ $item->category->name }}</td>
        
        <td class="text-center">
          <div class="btn-group">
            <a href="{{ route('deskripsi.show', $item->id) }}" class="btn btn-warning" style="border-radius: 10px;">Deskripsi Perjalanan</a>
            <a href="{{ route('foto.show', $item->id) }}" class="btn btn-warning" style="border-radius: 10px;">Foto Transportasi</a>
            <a href="{{ route('tiket.edit', $item->id) }}" class="btn btn-primary" style="border-radius: 10px;">Edit</a>
            <a href="#" onclick="comfirmDelete('{{ route('tiket.delete', $item->id) }}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger" style="border-radius: 10px;">Delete</a>
          </div>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>


  <div class="">
    {{ $tiket->links() }}
  </div>

</div>

@endsection
