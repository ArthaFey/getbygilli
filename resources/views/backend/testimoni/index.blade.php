@extends('backend.template-admin.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giliwanders Travel Boat Reviews</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- Tailwind via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .blog-header {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://storage.googleapis.com/a1aa/image/4kYDbe9_mPPrjHxPXwWNPCbcuTGXh7tz2L58yK4ahOE.jpg');
      background-size: cover;
      background-position: center;
      height: 300px;
    }
    .review-card {
      transition: all 0.3s ease;
    }
    .review-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Reviews Section -->
  <div class="container py-12">
    <div class="text-center mb-12">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Travel Boat Reviews</h1>
      <p class="text-gray-600">Ulasan dari pelanggan kami di seluruh Indonesia.</p>
    </div>

    <div class="row g-4">
      <!-- Review Card 1 -->
      <div class="col-md-4">
        <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100">
          <p class="text-gray-700 mb-4">
            "Perjalanan dengan Giliwanders sangat menyenangkan dan aman."
          </p>
          <div class="d-flex align-items-center mb-4">
            <img alt="Portrait of John Doe" class="rounded-full me-3" width="50" height="50" src="https://storage.googleapis.com/a1aa/image/etfk38kfRY401Y9jJ--HtxnUsjs_08fJL5iXZoLG4zI.jpg">
            <div>
              <p class="text-gray-800 fw-semibold mb-0">John Doe</p>
              <p class="text-gray-500 mb-0">Tour Guide</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-4">
            <div class="text-warning me-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text-gray-600 mb-0">4.5</p>
          </div>
          <p class="text-gray-500 text-sm mb-0">
            Diunggah pada 12 Januari 2023
          </p>
        </div>
      </div>

      <!-- Review Card 2 -->
      <div class="col-md-4">
        <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100">
          <p class="text-gray-700 mb-4">
            "Pelayanan yang diberikan sangat memuaskan dan ramah."
          </p>
          <div class="d-flex align-items-center mb-4">
            <img alt="Portrait of Smith" class="rounded-full me-3" width="50" height="50" src="https://storage.googleapis.com/a1aa/image/IwfX0I_mjRft1FlKrZ8bwoxxeY1cA6X4vS4GGVxXoto.jpg">
            <div>
              <p class="text-gray-800 fw-semibold mb-0">Smith</p>
              <p class="text-gray-500 mb-0">Traveller</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-4">
            <div class="text-warning me-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <p class="text-gray-600 mb-0">5.0</p>
          </div>
          <p class="text-gray-500 text-sm mb-0">
            Diunggah pada 5 Februari 2023
          </p>
        </div>
      </div>

      <!-- Review Card 3 -->
      <div class="col-md-4">
        <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100">
          <p class="text-gray-700 mb-4">
            "Pengalaman liburan bersama keluarga menjadi lebih berkesan."
          </p>
          <div class="d-flex align-items-center mb-4">
            <img alt="Portrait of Samantha Family" class="rounded-full me-3" width="50" height="50" src="https://storage.googleapis.com/a1aa/image/fuW9DplULikcC0L-EAx1eIBb306LaBmAF51K1Wulylo.jpg">
            <div>
              <p class="text-gray-800 fw-semibold mb-0">Samantha Family</p>
              <p class="text-gray-500 mb-0">Ibu Rumah Tangga</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-4">
            <div class="text-warning me-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <p class="text-gray-600 mb-0">5.0</p>
          </div>
          <p class="text-gray-500 text-sm mb-0">
            Diunggah pada 20 Maret 2023
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
