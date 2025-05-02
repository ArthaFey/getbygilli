<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../assets/gili-logo.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .header-container {
            background-image: url('../foto/Background Header.jpg');
            background-size: cover;
            background-position: center;
            height: 120px;
        }
        .bullet-point::before {
            content: "•";
            margin-right: 8px;
            color: #6b7280;
        }
    </style>

    @php
        use Carbon\carbon;
        Carbon::setLocale('id');
    @endphp
</head>
<body class="bg-gray-100">
    <!-- Header with centered text -->
    <div class="header-container relative animate__animated animate__fadeIn">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-between px-6">
            <img alt="Company Logo" class="h-10" src="../assets/gili-logo.png"/> 
            <h1 class="text-white text-lg font-bold absolute left-1/2 transform -translate-x-1/2">Boat Gili Wanders</h1>
        </div>
    </div>

    <!-- Back Button -->
    <div class="container mx-auto px-4 mt-4 animate__animated animate__fadeInUp animate__delay-0.5s">
        <a href="{{ route('home') }}" class="flex items-center text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>


    <!-- Container utama -->
    <div class="container mx-auto px-4 mt-5">
        
        <div class="flex flex-col md:flex-row gap-1">
            <!-- Contact Details -->
        <div class="bg-white p-6 rounded shadow w-full md:w-2/3 animate__animated animate__fadeInUp animate__delay-0.9s">
                <h3 class="text-lg font-semibold mb-4">{{ Carbon::parse($tiket->tanggal_keberangkatan)->isoFormat('D MMM Y') }}</h3>
        
        <div class="justify-between items-center">
            <div class="mb-3">
                <p class="text-sm text-gray-900">{!! $tiket->keterangan_tiba !!}</p>
            </div>
            <div>
                @foreach ($tiket->deskripsitiket as $item )      
                <div class="">
                    <div class="flex items-center ">
                        <img src="{{ asset('foto/' .$item->icon) }}" alt="" class="h-7 mr-2">
                        <p class="text-sm text-gray-800 font-semibold">{{ $item->waktu }}</p>
                    </div>
                    
                    <div class="text-sm text-gray-700">
                    <p class="">{!! $item->keterangan !!}</p>
                    </div>
                
                </div> 
                @endforeach
            </div>
        </div>
        </div>
        </div>


        <div class="flex flex-col md:flex-row gap-1 mt-3 mb-3">
         
            <div class="flex items-center bg-white p-6 rounded shadow w-full md:w-2/3 animate__animated animate__fadeInUp animate__delay-0.9s">
                <!-- Logo Provider -->
                <div class="mr-4">
                    <img src="{{ asset('foto/' . $tiket->perusahaan->logo) }}" alt="Provider Logo" class="w-10 h-10 rounded-full">
                </div>
    
                <!-- Gambar Van & Kapal -->
                <div class="flex space-x-2">
                    @foreach ($tiket->fototransportasi as $fotoTransportasi )
                    <img src="{{ asset('foto/' . $fotoTransportasi->foto) }}" alt="Van" class="w-20 h-15 object-cover rounded">
                    @endforeach
                </div>
            </div>
            
    
        </div>
        
        <div class="items-center bg-white border-l-4 border-yellow-500 text-yellow-800 p-4 rounded-lg shadow w-full md:w-2/3 animate__animated animate__fadeInUp animate__delay-0.9s">
            <div class="flex items-center space-x-3">
                <!-- Icon Warning -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12l-9-9-9 9h18z" />
                </svg>
                <p class="text-sm">{!! $tiket->note !!}</p>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        <!-- Main Passenger Form -->
        <form method="POST" action="{{ route('checkout.tiket') }}" class="animate__animated animate__fadeInUp animate__delay-1.3s">
            @csrf
        <div class="flex flex-col md:flex-row gap-2 mt-3">

            <input type="hidden" name="tiket" value="{{ $tiket->judul_tiket }}">
            <input type="hidden" name="tanggal_keberangkatan" value="{{ $tiket->deskripsitiket->first()->waktu }}">
            <input type="hidden" name="tanggal_tiba" value="{{ $tiket->deskripsitiket->last()->waktu }}">
            <input type="hidden" name="from" value="{{ $tiket->from }}">
            <input type="hidden" name="to" value="{{ $tiket->to }}">
            <input type="hidden" name="operator" value="{{ $tiket->perusahaan->nama }}">
            <input type="hidden" name="class" value="{{ $tiket->class }}">
            <input type="hidden" name="hotline" value="{{ $tiket->hotline }}">
            <input type="hidden" name="gmaps" value="{{ $tiket->gmaps }}">
           
           
            <div class="bg-white p-6 rounded shadow w-full md:w-2/3 animate__animated animate__fadeInUp animate__delay-0.9s">
                <h3 class="text-md font-semibold mb-3 border-b pb-2">Harga Tiket</h3>
        
                <!-- Tiket Dewasa -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tiket Dewasa</label>
                    <div class="flex items-center space-x-4">
                        <p class="bg-green-400 px-2 rounded-full text-white" id="harga-dewasa">{{ number_format($tiket->harga_dewasa,0,) }}</p>
                        <button type="button" class="text-lg text-gray-700" onclick="decrease('adult-ticket', 'harga-dewasa')">-</button>
                        <input id="adult-ticket" name="jumlah_tiket_dewasa" type="number" value="0" min="0" class="w-12 text-center border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-yellow-500" readonly />
                        <button type="button" class="text-lg text-gray-700" onclick="increase('adult-ticket', 'harga-dewasa')">+</button>
                    </div>
                </div>

                <!-- Tiket Anak-anak -->
                <div>
                    <label class="block text-sm font-medium">Tiket Anak-anak</label>
                    <div class="flex items-center space-x-4">
                        <p class="bg-green-400 px-2 rounded-full text-white" id="harga-anak">{{ number_format($tiket->harga_anak_anak,0,) }}</p>
                        <button type="button" class="text-lg text-gray-700" onclick="decrease('child-ticket', 'harga-anak')">-</button>
                        <input id="child-ticket" name="jumlah_tiket_anak_anak" type="number" value="0" min="0" class="w-12 text-center border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-yellow-500" readonly />
                        <button type="button" class="text-lg text-gray-700" onclick="increase('child-ticket', 'harga-anak')">+</button>
                    </div>
                </div>

            </div>
         
         
            <div class="bg-white p-4 rounded shadow w-full md:w-1/3 md:self-start animate__animated animate__fadeInUp animate__delay-1.1s">
                <div class="flex justify-between text-sm">
                    <span>Tickets</span>
                    <span class="font-semibold bg-red-600 text-white px-4 rounded-lg" id="tiket">IDR 0</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between text-sm font-semibold">
                    <span>Total</span>
                    <input type="hidden" name="total_harga" id="harga-total">
                    <span id="total-harga" class="bg-red-600 text-white px-4 rounded-lg">IDR 0</span>
                </div>
            </div>
        
        </div>

        <div class="flex flex-col md:flex-row gap-2 mt-3">
            <div class="bg-white p-6 rounded shadow w-full md:w-2/3 animate__animated animate__fadeInUp animate__delay-0.9s">
                <h3 class="text-md font-semibold mb-3 border-b pb-2">Contact Details</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Mobile</label>
                    <input type="text" name="no_telp" class="w-full border p-2 rounded" placeholder="ID +62" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" class="w-full border p-2 rounded" placeholder="your@email.com" required>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow w-full md:w-2/3 mt-4">
                <h3 class="text-md font-semibold mb-3 border-b pb-2">Main Passenger</h3>
                <div>
                    <label class="block text-sm font-medium">Full Name</label>
                    <input type="text" name="name" class="w-full border p-2 rounded" required>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Date of Birth</label>
                    <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" required>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Gender</label>
                    <select name="gender" class="w-full border p-2 rounded" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Passport Number</label>
                    <input type="text" name="passport_no" class="w-full border p-2 rounded" required>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Passport Expiration Date</label>
                    <input type="date" name="passport_expiry" class="w-full border p-2 rounded" required>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Passport Issue Date</label>
                    <input type="date" name="passport_issue" class="w-full border p-2 rounded" required>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium">Nationality / Citizenship</label>
                    <select name="nationality" class="w-full border p-2 rounded" required>
                        @foreach($countries as $country)
                            <option value="{{ $country['country'] }}">
                                {{ $country['country'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-4">
                    <label class="block text-sm font-medium">Baggage</label>
                    <select name="baggage" class="w-full border p-2 rounded" required>
                        <option value="">-- SELECT --</option>
                        <option value="Cabin (7 kg)">Cabin (7 kg)</option>
                        <option value="Checked (20 kg)">Checked (20 kg)</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded mt-4 hover:bg-red-700 transition">Submit</button>
        </div>

        </div>
    </form>

  
    <!-- Footer -->
    <footer class="bg-red-800 text-white py-12 mt-6 animate__animated animate__fadeInUp animate__delay-1.9s">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <a href="#" class="text-2xl font-bold flex items-center space-x-2">
                    <i class="fas fa-ship text-xl"></i>
                    <span>Boat Giliwanders</span>
                </a>
                <div class="mt-4 space-y-2">
                    <p><i class="fa fa-phone me-2"></i> +62 8122840166</p>
                    <p><i class="fa fa-envelope me-2"></i> boatgiliwanders@gmail.com</p>
                    <p><i class="fa fa-globe me-2"></i> www.giliwanders.com</p>
                </div>
            </div>


            <div>
                <h3 class="text-xl font-bold">Address</h3>
                <p class="mt-4">Jl. Ganetri IV No. 4<br>DPS, Bali, Indonesia</p>
            </div>

            <div>
                <h3 class="text-xl font-bold">Follow Us</h3>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="w-10 h-10 flex items-center justify-center bg-white text-red-700 rounded-full hover:bg-gray-200 transition">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center bg-white text-red-700 rounded-full hover:bg-gray-200 transition">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center bg-white text-red-700 rounded-full hover:bg-gray-200 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 text-center mt-8 pt-4 border-t border-white">
            <span>&copy; 2025 Gili Wonders. All Rights Reserved.</span>
            <div class="mt-2">
                <a href="#" class="text-sm hover:underline">Designed by PT. Indo Apps Solusindo</a>
            </div>
        </div>
    </footer>

    <script>
        // Add intersection observer for scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate__animated');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const animation = entry.target.classList[1];
                        entry.target.classList.add(animation);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            animatedElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>

<script>
    function calculateTotal() {
        // Get the prices
        const hargaDewasa = parseInt(document.getElementById('harga-dewasa').textContent.replace(/[^0-9]/g, ''));
        const hargaAnak = parseInt(document.getElementById('harga-anak').textContent.replace(/[^0-9]/g, ''));

        // Get the quantities
        const adultTicket = parseInt(document.getElementById('adult-ticket').value);
        const childTicket = parseInt(document.getElementById('child-ticket').value);

        // Calculate the total ticket price
        const totalDewasa = hargaDewasa * adultTicket;
        const totalAnak = hargaAnak * childTicket;

        // Update the total display
        const total = totalDewasa + totalAnak;
        document.getElementById('tiket').textContent = 'IDR ' + total.toLocaleString();
        document.getElementById('total-harga').textContent = 'IDR ' + total.toLocaleString();
        document.getElementById('harga-total').value = total;
    }

    function increase(ticketType, hargaId) {
        let inputElement = document.getElementById(ticketType);
        inputElement.value = parseInt(inputElement.value) + 1;
        calculateTotal();
    }

    function decrease(ticketType, hargaId) {
        let inputElement = document.getElementById(ticketType);
        if (parseInt(inputElement.value) > 0) {
            inputElement.value = parseInt(inputElement.value) - 1;
            calculateTotal();
        }
    }
</script>


</body>
</html>