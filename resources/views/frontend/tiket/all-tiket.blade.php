<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Explore Indonesia</title>
  <!-- Favicon Links -->
  <link rel="icon" href="../assets/gili-logo.png" type="image/png">

  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="../css/home.css">

  <style>
    .no-tiket {
      text-align: center;
      margin-top: 50px;
    }
    .no-tiket img {
      width: 300px;
      height: auto;
    }
    .no-tiket h2 {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-top: 20px;
    }
  </style>

  @php
    use Carbon\carbon;
    Carbon::setLocale('id')
  @endphp
 </head>
 <body class="bg-gray-100">


    <header class="relative w-full">
        <!-- Versi Desktop (lg ke atas) -->
        <div class="hidden lg:block relative">
            <img src="../assets/Background Header.jpg" alt="Banner" class="w-full h-56 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center px-5 md:px-16">
                <div class="flex flex-col md:flex-row items-start md:items-center space-x-0 md:space-x-4">
                    <img src="../assets/gili-logo.png" alt="Gili Wonders" class="w-16 md:w-20 h-auto mb-2 md:mb-0">
                </div>
                <div class="w-full mb-3">
                    <h1 class="text-2xl font-bold text-white">
                        Explore Indonesia with Boat Giliwonders 
                    </h1>
                </div>
                <!-- Form Pencarian -->
                <div id="searchForm">
                    <form action="{{ route('search.tiket') }}" method="GET" class="flex flex-wrap md:flex-nowrap items-center gap-3 w-full">
                        @csrf
                        <div class="flex items-center border rounded-lg px-3 py-2 bg-white w-full md:w-1/3 h-12 relative">
                            <!-- Input Departure & Destination -->
                            <input type="text" class="border-none focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center" placeholder="Enter Departure">
                           
                            <button type="button" id="swapBtn" class="flex-shrink-0 px-2">
                                <i class="fas fa-right-left text-lg text-gray-600"></i>
                            </button>
                            <!-- Dropdown Destination -->
                            <input type="text" class="border-none focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center" placeholder="Enter Destination">
                        
                        </div>
                        <!-- Input Tanggal Berangkat -->
                        <div class="flex items-center border rounded-lg px-4 py-3 bg-white w-full md:w-1/6 h-12">
                            <input type="date" name="date" class="border-none focus:ring-0 w-full text-sm bg-transparent h-full" required>
                        </div>
                      
                        <!-- Input Penumpang -->
                        <div class="flex items-center border rounded-lg px-4 py-3 bg-white w-full md:w-1/6 h-12">
                            <div class="dropdown w-full">
                                <select class="w-full border-none border-gray-300 rounded-lg text-sm text-center">
                                    <option value="" disabled selected hidden>1 Passenger</option>
                                    <option value="1">1 Passenger</option>
                                    <option value="2">2 Passengers</option>
                                    <option value="3">3 Passengers</option>
                                    <option value="4">4 Passengers</option>
                                    <option value="5">5 Passengers</option>
                                    <option value="6">6 Passengers</option>
                                    <option value="7">7 Passengers</option>
                                    <option value="8">8 Passengers</option>
                                </select>
                            </div>
                        </div>
                        <!-- Tombol Menuju Book Info -->
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg text-sm min-w-[120px] h-12 flex items-center justify-center transition duration-200">
                            Find Ticket
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    
        <!-- Versi Mobile & Tablet (sm sampai lg) -->
        <div class="lg:hidden relative min-h-[400px]">
            <!-- Full Background Image -->
            <div class="absolute inset-0 z-0">
                <img src="../assets/Background Header.jpg" alt="Mobile Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            
            <!-- Content Container -->
            <di class="relative z-10 h-full flex flex-col justify-center p-4">
                <!-- Title -->
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-white leading-snug">
                        Explore Indonesia with Boat<br>
                        Giliwanders - Sail Beyond<br>
                        Limits!
                    </h1>
                </div>
                
                <!-- Search Form -->
                <d class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                    <!-- Departure & Destination -->

                    <form action="{{ route('search.tiket') }}" method="get">
                        @csrf
                    <div class="flex flex-col items-center mb-3 gap-3">
                        <!-- Departure Select -->
                        <input type="text"  name="departure" class="border focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center p-3 rounded-lg" placeholder="Enter Departure">
                        
                        <!-- Vertical Swap Button with arrows side by side -->
                        <button type="button" id="swapBtn" class="flex-shrink-0 px-2">
                            <i class="fas fa-right-left text-lg text-gray-600 rotate-90"></i>
                        </button>
                        
                        <!-- Destination Select -->
                        <input type="text" name="destination" class="border focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center p-3 rounded-lg" placeholder="Enter Destination">
                    </div>
                    
                    <!-- Dates -->
                    <div class="flex flex-col mb-3 gap-3">
                        <!-- Departure Date -->
                        <div class="flex items-center border border-gray-300 rounded-lg p-3">
                            <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                            <input type="date" 
                                   placeholder="dd/mm/yyyy" 
                                   class="w-full border-none focus:ring-0 text-sm bg-transparent" name="date">
                        </div>
                        
                    
                    </div>
                    
                    <!-- Passenger -->
                    <div class="flex mb-4">
                        <select name="passenger" class="w-full p-3 border border-gray-300 rounded-lg text-sm text-center focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="" disabled selected hidden>1 Passenger</option>
                            <option value="1">1 Passenger</option>
                            <option value="2">2 Passengers</option>
                            <option value="3">3 Passengers</option>
                            <option value="4">4 Passengers</option>
                            <option value="5">5 Passengers</option>
                            <option value="6">6 Passengers</option>
                            <option value="7">7 Passengers</option>
                            <option value="8">8 Passengers</option>
                        </select>
                    </div>
                    
                    <!-- Find Ticket Button -->
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg text-sm min-w-[120px] h-12 flex items-center justify-center transition duration-200">
                        Find Ticket
                    </button>
                </form>
                </div>
            </div>
        </div>
    </header>




<header class="bg-white shadow">
   <div class="container mx-auto px-4 py-4 flex items-center">
      <nav>
         <a class="text-gray-600 hover:text-gray-800 relative inline-block text-lg font-semibold" href="#">
            All Ticket
            <span class="absolute left-0 bottom-[-4px] w-full h-1 bg-red-600"></span>
         </a>
      </nav>
   </div>
</header>




  
    <!-- Main Content -->
<main class="container mx-auto px-4 py-8">
  
    @if (!$tiket->isEmpty())
    <main class="container mx-auto px-4 py-8 ">
        <div class="space-y-6">
            
            @foreach ($tiket as $item )
            <div class="max-w-8xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-4 flex flex-wrap md:flex-nowrap items-center gap-4 scroll-animate" data-animation="fadeInUp">
                
                <div class="flex flex-col items-center w-16">
            
                    <span class="text-sm font-bold text-gray-700 mb-1">{{ $item->deskripsitiket->first()->waktu ?? '' }}</span>
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <div class="w-1 h-16 bg-green-500"></div>
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <span class="text-sm font-bold text-gray-700 mt-1">{{ $item->deskripsitiket->last()->waktu ?? '' }}</span>
                   
                </div>
                
                <img class="w-12 h-12 object-cover rounded-full" src="{{ asset('foto/' . $item->perusahaan->logo) }}" alt="Bali Paradiso">
                <div class="flex-1 min-w-[200px]">
                    {{-- <div class="flex flex-wrap gap-1 mb-2">
                        <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Recommended</span>
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Instant Confirmation</span>
                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs">Fastest</span>
                    </div> --}}
                    <h3 class="text-lg font-semibold">{{ $item->judul_tiket }}</h3>
                    <p class="text-gray-600 text-sm">Berangkat Tanggal {{ Carbon::parse($item->tanggal_keberangkatan)->isoFormat('D MMM Y') }}</p>
                    
                </div>
                <div class="flex space-x-2 w-full md:w-auto">
                    @foreach ($item->fototransportasi as $foto )
                    <img class="w-24 h-16 object-cover rounded-md" src="{{ asset('foto/' . $foto->foto) }}" alt="Van">
                    @endforeach
                </div>
                <div class="text-center md:text-right flex flex-col justify-between p-4 min-w-[150px] w-full md:w-auto">
                    <p class="text-lg font-bold text-red-600">IDR{{ number_format($item->harga_dewasa,0,) }}</p>
                    <a href="{{ route('booking.tiket',$item->slug) }}">
                        <p class="bg-red-600 text-white px-6 py-2 rounded mt-2 w-full md:w-auto">Book Now</p>
                    </a>
                </div>
                
            </div>
            @endforeach
            
           
        </div>
    </main>
    @else
    <div class="no-tiket">
        <!-- Gambar Tidak Ada Tiket -->
        <img src="../assets/no-tiket.png" alt="No Tickets Available" class="mx-auto">
      </div>
    @endif
   

    <div class="flex justify-center mt-8">
        <div class="inline-flex items-center space-x-2">
          <!-- Previous Page Button -->
          <a href="{{ $tiket->previousPageUrl() }}" class="px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none {{ $tiket->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}" {{ $tiket->onFirstPage() ? 'disabled' : '' }}>
              <span class="text-lg">Previous</span>
          </a>
  
          <!-- Page Number Links -->
          @foreach ($tiket->getUrlRange(1, $tiket->lastPage()) as $page => $url)
              <a href="{{ $url }}" class="px-4 py-2 bg-red-200 text-white rounded-full border border-transparent hover:bg-red-100 focus:outline-none {{ $tiket->currentPage() == $page ? 'bg-red-500 text-white' : '' }}">
                  {{ $page }}
              </a>
          @endforeach
  
          <!-- Next Page Button -->
          <a href="{{ $tiket->nextPageUrl() }}" class="px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none {{ $tiket->hasMorePages() ? '' : 'cursor-not-allowed opacity-50' }}" {{ $tiket->hasMorePages() ? '' : 'disabled' }}>
              <span class="text-lg">Next</span>
          </a>
        </div>
      </div>

      
    
    <!-- News Section -->
    <h2 class="text-xl font-bold mt-8 mb-4 scroll-animate" data-animation="fadeIn">
        News
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($news as $berita )
        <a href="{{ route('detail.berita',$berita->id) }}">
        <div class="bg-white shadow rounded-lg overflow-hidden scroll-animate" data-animation="fadeInUp">
            <img alt="Private or Shared Snorkeling Trip" class="w-full h-48 object-cover" height="200" src="{{ asset('fotoberita/' .$berita->image) }}" width="400"/>
            <div class="p-4">
                <h3 class="font-bold">
                    {{ $berita->title }}
                </h3>
                <p class="text-gray-500">
                    {{ $berita->excerpt }}
                </p>
            </div>
        </div>
    </a>
        @endforeach

    </div>
</main>


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

    
    <script src="bookinfo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
