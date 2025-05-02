@extends('backend.template-admin.index')
@section('content')

  </head>
  <body>

    <div class="container">
    <h1 class="">Berita</h1>

    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/tambahdata" class="btn btn-success">Tambah</a>
      <form class="form-inline d-flex gap-2" action="{{ route('news') }}" method="get">
        @csrf
        <input class="form-control " type="search" name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
  </nav>

    <div class="container">
      
          <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
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
                    <td>
                      <img src="{{ asset('fotoberita/' .$row->image) }}" alt="" height="50px" width="50px" style="border-radius: 10px;">
                    </td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->hit }}</td>
                    <td>
                      <a href="/tampilkandata/{{ $row->id }}" class="btn btn-primary">Edit</a>
                      <a href="#" onclick="comfirmDelete('/delete-berita/{{ $row->id }}')" onclick="return confirm('Apakah Anda Yakin menghapus data Ini')"  class="btn btn-danger delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        
              <div class="">
                {{ $data->links() }}
              </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>

@endsection