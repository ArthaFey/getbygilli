@extends('backend.template-admin.index')
@section('content')

<div class="container">
<table class="table">
    <h1>Category</h1>
    <a href="{{ route('category.tambah') }}" class="btn btn-success">Tambah</a>
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Category</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $index => $item )
      <tr>
        <td class="text-center">{{ $category->firstItem() + $index  }}</td>
        <td class="text-center">
          <img src="{{ asset('foto/' . $item->foto) }}" alt="" height="50px;" width="50px;" style="border-radius: 10px;">
        </td>
        <td class="text-center">{{ $item->name }}</td>
        <td class="text-center">
            <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary">Edit</a>
            <a href="#" onclick="comfirmDelete('{{ route('category.delete',$item->id) }}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection