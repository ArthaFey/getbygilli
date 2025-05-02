<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>E-Ticket - Boat Giliwanders</title>
  <link rel="icon" href="assets/gili-logo.png" type="image/png">
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f3f4f6;
      color: #000;
    }

    header {
      background-image: url('assets/Background Header.jpg');
      background-size: cover;
      background-position: center;
      height: 80px;
      display: flex;
      align-items: center;
      padding: 0 20px;
    }

    header .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    header img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    header h1 {
      font-size: 18px;
      font-weight: bold;
      color: white;
    }

    nav {
      background-color: #f3f4f6;
      padding: 10px 20px;
    }

    #download-btn {
      background-color: #2563eb;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }

    #download-btn:hover {
      background-color: #1d4ed8;
    }

    .container {
      max-width: 900px;
      margin: 20px auto;
      padding: 20px;
    }

    #ticket-container {
      background-color: white;
      padding: 24px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .ticket-header {
      text-align: center;
      font-size: 13px;
      margin-bottom: 20px;
      color: #6b7280;
    }

    .ticket-grid {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .ticket-grid img {
      height: 80px;
      object-fit: contain;
    }

    .voucher {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top: 2px solid #e5e7eb;
      padding-top: 16px;
    }

    .voucher h2 {
      font-size: 18px;
      font-weight: bold;
    }

    .voucher span {
      color: green;
    }

    .voucher p {
      font-size: 14px;
      font-weight: bold;
      color: #374151;
      margin-left: 10px;
    }

    .section-title {
      background-color: #e0f2fe;
      padding: 6px;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .info-grid {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 50px;
      font-size: 14px;
      margin-bottom: 16px;
    }

    .info-grid p {
      margin: 4px 0;
    }

    .info-grid .note {
      font-size: 12px;
      color: #6b7280;
      margin-left: 30px;
    }

    .information {
      background-color: #e0f2fe;
      padding: 6px;
      font-size: 14px;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
    }

    .images-row {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .images-row img {
      max-width: 100%;
      border: 1px solid #d1d5db;
    }

    .footer-note {
      text-align: center;
      font-size: 10px;
      font-weight: bold;
      margin-top: 20px;
    }

    .footer-copy {
      text-align: center;
      font-size: 9px;
      margin-bottom: 20px;
    }

    @media print {
      body * {
        visibility: hidden;
      }

      #ticket-container, #ticket-container * {
        visibility: visible;
      }

      #ticket-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
      }

      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div id="ticket-container">
      <p class="ticket-header">This is your e-ticket.</p>

      <div class="ticket-grid">
        <img src="https://giliwanders.com/assets/gili-logo.png" alt="Logo">
        <div></div>

      </div>

      <div class="voucher">
        <h2>Voucher <span>PAID</span></h2>
        <p>Booking ID # {{ $order_id }}</p>
      </div>

      <div class="section-title">ITINERARY: {{ $tiket }}</div>

      <div class="info-grid">
        <div>
          <p><strong>From:</strong> {{ $from }}</p>
          <p><strong>To:</strong> {{ $to }}</p>
          <p><strong>Date:</strong> {{ $tanggal_keberangkatan }}</p>
          <p class="note">Estimated Arrival {{ $tanggal_tiba }}</p>
        </div>
        <div style="margin-left: 50px;">
          <p><strong>Operator:</strong> {{ $operator }}</p>
          <p><strong>Class:</strong> {{ $class }}</p>
          <p><strong>Hotline:</strong> {{ $hotline }}</p>
        </div>
      </div>

      <div class="section-title">PASSENGERS:</div>
      <p><strong>Tiket Anak-Anak / Ticket Kids:</strong> {{ $jumlah_tiket_anak_anak }}</p>
      <p><strong>Tiket Dewasa / Ticket Adult:</strong>   {{ $jumlah_tiket_dewasa }}</p>

      <div class="information">INFORMATION</div>

      <div class="images-row">
        <div>
          <a href="{{ $gmaps ?? '#' }}" target="_blank">
            <img src="https://giliwanders.com/assets/maps.jpg" alt="Map Serangan Harbor" style="width:100%; max-width:300px;">
          </a>
          
          <p><strong>Boarding point</strong></p>
          <p>{{ $from }}</p>
          <p><strong>Arrival point</strong></p>
          <p>{{ $to }}</p>
        </div>
        <div style="margin-left: 10px;">
          <img src="assets/kapal.jpg" alt="Boat Giliwanders" />
        </div>
      </div>

      <p class="footer-note">Booking# {{ $order_id }}, {{ $tanggal_keberangkatan }}</p>
      <p class="footer-copy">2025 © Boat Giliwanders. All rights reserved.</p>
    </div>
  </div>
</body>
</html>


