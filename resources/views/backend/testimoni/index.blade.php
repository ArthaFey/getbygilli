@extends('backend.template-admin.index')
@section('content')
<div class="container">
  <h1 class="">ULASAN PENGGUNA</h1>

  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a href="/tambah_ulasan" class="btn btn-success mb-3">Tambah </a>
    <form class="form-inline d-flex gap-2" action="{{ route('ulasan') }}" method="get">
      @csrf
      <input class="form-control " type="search" name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
</nav>


  <table class="table">
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
        <td>{!! $row->ulasan !!}</td>
        <td>{{ $row->rate }}</td>
        <td>
          <a href="#" class="btn btn-danger delete"  onclick="comfirmDelete('{{ route('delete.testimoni', $row->id) }}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"  >Delete</a>
          <a href="/editulasan/{{ $row->id }}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="">
    {{ $data->links() }}
  </div>
  
</div>

<!-- Tambahkan ini di luar table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection
