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
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between align-items-center">
    <h1 class="">Transaksi</h1>
    <form class="form-inline d-flex gap-2" action="{{ route('transaksi') }}" method="get">
      @csrf
      <input class="form-control " type="search" name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
</nav>

  <!-- Tabel Data -->
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Tiket</th>
        <th class="text-center">Tiket Dewasa</th>
        <th class="text-center">Tiket Anak-Anak</th>
        <th class="text-center">Total Harga</th>
        <th class="text-center">Nama Pembeli</th>
        <th class="text-center">Email</th>
        <th class="text-center">No Telpon</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaksi as $index => $item)
      <tr class="{{ $item->is_read ? '' : 'table-warning' }}">
        <td class="text-center">
          {{  $transaksi->firstItem() + $index }}
        </td>
        <td class="text-center">{{ $item->tiket }}</td>
        <td class="text-center">{{ $item->jumlah_tiket_dewasa }}</td>
        <td class="text-center">{{ $item->jumlah_tiket_anak_anak }}</td>
        <td class="text-center">IDR {{ number_format($item->total_harga,0,) }}</td>
        <td class="text-center">{{ $item->name }}</td>
        <td class="text-center">{{ $item->email }}</td>
        <td class="text-center">{{ $item->no_telp }}</td>
        <td class="text-center">
            @if(!$item->is_read)
              <a href="{{ route('payment.markAsRead', $item->id) }}" class="btn btn-sm btn-primary">Accept</a>
            @endif   
            <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-primary">Show Detail</a>
          </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="">
    {{ $transaksi->links() }}
  </div>

</div>

@endsection
