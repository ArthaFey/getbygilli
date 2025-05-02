@extends('backend.template-admin.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card for User Profile -->
                <div class="card shadow mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pemesan</h6>
                    </div>
                    <div class="card-body">
                        <!-- User Profile Information -->
                        <div class="row">
                        
                            <div class="col-md-8">
                                <p class="text-black">Nama: {{ $transaksi->name }} </p>
                                <p class="text-black">No Telp: {{ $transaksi->no_telp }} </p>
                                <p class="text-black">Email: {{ $transaksi->email }} </p>
                                <p class="text-black">Date of Birth: {{ $transaksi->tanggal_lahir }} </p>
                                <p class="text-black">Gender: {{ $transaksi->gender }} </p>
                                <p class="text-black">Passport Number: {{ $transaksi->passport_no }} </p>
                                <p class="text-black">Passport Issue Date: {{ $transaksi->passport_issue }} </p>
                                <p class="text-black">Passport Expiration Date: {{ $transaksi->passport_expiry }} </p>
                                <p class="text-black">Nationality / Citizenship: {{ $transaksi->nationality }} </p>
                                <p class="text-black">Baggage: {{ $transaksi->baggage }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
