@extends('backend.template-admin.index')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  </head>

    <title>Operator GetByGilli</title>
  </head>
  <body>
    <h1 class="text-center mb-4 ">Data Operator</h1>
    <div class="container">
        <a href="/tambahopt" type="button" class="btn btn-success">Tambah +</a>
        
          <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
              <form action="/operator" method="GET">
                <input 
                  type="search" 
                  id="inputPassword6" 
                  name="search" 
                  class="form-control" 
                  placeholder="Telusuri" 
                  aria-describedby="passwordHelpInline"
                >
              </form>
            </div>
          </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ( $data as $index => $row )
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>
                            <img src="{{ asset('fotooperator/' .$row->gambar) }}" alt="" height="50px" width="50px" style="border-radius: 10px;">
                        </td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->rating }}</td>
                        <td>
                            <a href="#" type="button" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}" data-title="{{ $row->title }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    <!-- Script Dependencies -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- SweetAlert Delete -->
<script>
  $(document).ready(function () {
    $('.delete').click(function (e) {
      e.preventDefault();

      var beritaid = $(this).data('id');
      var title = $(this).data('title');

      swal({
        title: "Yakin?",
        text: "Kamu AKan Menghapus Data: " + title,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/" + beritaid;
        } else {
          swal("Data Tidak Dihapus");
        }
      });
    });
  });
</script>

<!-- Toastr Alerts -->
<script>
    @if (Session::has('Success'))
      toastr.success(@json(Session::get('Success')));
    @endif
  
    @if (Session::has('update'))
      toastr.success(@json(Session::get('update')));
    @endif
  
    @if (Session::has('delete'))
      toastr.success(@json(Session::get('delete')));
    @endif
  
    @if (Session::has('error'))
      toastr.error(@json(Session::get('error')));
    @endif
  </script>


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