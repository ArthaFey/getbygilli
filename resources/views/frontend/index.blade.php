<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website - Boat GiliWanders</title>
     <!-- Favicon Links -->
    <link rel="icon" href="../assets/gili-logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">

<style>
    .rotate-90 {
    transform: rotate(90deg); /* Rotasi 90 derajat untuk membuat ikon vertikal */
}
</style>

@php
    use Carbon\carbon;
    Carbon::setLocale('id');
@endphp
</head>


<header class="relative w-full">
    <!-- Versi Desktop (lg ke atas) -->
    <div class="hidden lg:block relative">
        <img src="../assets/Background Header.jpg" alt="Banner" class="w-full h-56 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center px-5 md:px-16">
            <div class="flex flex-col md:flex-row items-start md:items-center space-x-0 md:space-x-4">
                <img src="assets/gili-logo.png" alt="Gili Wonders" class="w-16 md:w-20 h-auto mb-2 md:mb-0">
            </div>
            <div class="w-full mb-3">
                <h1 class="text-2xl font-bold text-white">
                    Explore Indonesia with Boat Giliwanders – Sail Beyond Limits!
                </h1>
            </div>
            <!-- Form Pencarian -->
            <div id="searchForm">
                <form action="{{ route('search.tiket') }}" method="GET" class="flex flex-wrap md:flex-nowrap items-center gap-3 w-full">
                    @csrf
                    <div class="flex items-center border rounded-lg px-3 py-2 bg-white w-full md:w-1/3 h-12 relative">
                        <!-- Input Departure & Destination -->
                        <input type="text" name="departure" class="border-none focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center" placeholder="Enter Departure">
                       
                        <button type="button" id="swapBtn" class="flex-shrink-0 px-2">
                            <i class="fas fa-right-left text-lg text-gray-600"></i>
                        </button>
                        <!-- Dropdown Destination -->
                        <input type="text" name="destination" class="border-none focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center" placeholder="Enter Destination">
                    
                    </div>
                    <!-- Input Tanggal Berangkat -->
                    <div class="flex items-center border rounded-lg px-4 py-3 bg-white w-full md:w-1/6 h-12">
                        <input type="date" name="date" class="border-none focus:ring-0 w-full text-sm bg-transparent h-full" required>
                    </div>
                  
                    <!-- Input Penumpang -->
                    <div class="flex items-center border rounded-lg px-4 py-3 bg-white w-full md:w-1/6 h-12">
                        <div class="dropdown w-full">
                            <select class="w-full border-none border-gray-300 rounded-lg text-sm text-center" name="passenger">
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
                    <input type="text" name="departure" class="border focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center p-3 rounded-lg" placeholder="Enter Departure">
                    
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
                    <select  name="passenger" class="w-full p-3 border border-gray-300 rounded-lg text-sm text-center focus:ring-2 focus:ring-red-500 focus:border-transparent">
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


<!-- Category Start -->
<section class="popular-destinations py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <span class="section__subtitle block text-sm text-red-600 animate__animated animate__fadeIn">Our Category</span>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 animate__animated animate__fadeIn">
            <h2 class="text-3xl font-bold">Category</h2>
        </div>

        <div id="destinationsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Popular Destinations (Visible by default) -->
            <!-- Destination Card 1 - Bali -->
            @foreach ($category as $item )
            <a href="{{ route('category.all',$item->slug) }}">
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="bali" data-popular="true">
                <img alt="" class="w-full h-48 object-cover aspect-video" src="{{ asset('foto/' . $item->foto) }}" />
                <div class="p-4">
                    <div class=" text-center">
                        <h3 class="text-lg font-semibold ">{{ $item->name }}</h3>
                    </div>                   
                </div>
            </div>
        </a>
            @endforeach
            
           
        </div>
    </div>
</section> 
<!-- Category End -->

<!-- Tiket Start -->
<section class="popular-destinations py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <span class="section__subtitle block text-sm text-red-600 animate__animated animate__fadeIn">Our Visit</span>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 animate__animated animate__fadeIn">
            <h2 class="text-3xl font-bold">Explore Beautiful Destinations</h2>
            <div class="flex items-center mt-4 md:mt-0 space-x-4">
            
                <a href="{{ route('all.tiket') }}" id="viewAllBtn" class="text-sm font-medium text-red-600 hover:text-red-700 flex items-center animate__animated animate__fadeIn">
                    View All
                    <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <div id="destinationsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    
            @foreach($tiket as $item)
            <a href="{{ route('booking.tiket',$item->slug) }}">
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="bali" data-popular="true">
                <img alt="Image of Bali & Nusa Penida" class="w-full h-48 object-cover aspect-video" src="{{ asset('foto/' . $item->foto) }}" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">{{ $item->judul_tiket }}</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">{{ Carbon::parse($item->tanggal_keberangkatan)->isoFormat('D MMM Y') }} - Recent</p>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500 text-red-600">IDR{{ number_format($item->harga_dewasa,0,) }}</span>
                    </div>                    
                </div>
            </div>
        </a>
            @endforeach
        
            
            

    </div>
</section> 
<!-- Tiket End -->


<!-- News Start -->
<section class="blog py-12">
    <div class="blog__container container">
        <span class="section__subtitle block text-center text-red-600 animate__animated animate__fadeIn">Our Blog & News</span>
        <h2 class="section__title text-3xl font-bold text-center mt-2 animate__animated animate__fadeIn">The Best Trip For You</h2>
        <div class="blog__content grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            

            @foreach($berita as $item)
            <article class="blog__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                <div class="blog__image relative">
                    <img src="{{ asset('fotoberita/' . $item->image) }}" alt="" class="blog__img w-full h-48 object-cover">
                 
                </div>
                <div class="blog__data p-4">
                    <div class="flex items-center text-gray-500 mb-2">
                        <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                        <span>{{ Carbon::parse($item->date)->isoFormat('D MMMM Y') }}</span>
                    </div>
                    <h2 class="blog__title text-xl font-bold">{{ $item->title }}</h2>
                    <p class="blog__description text-gray-600 mt-2">{{ $item->excerpt }}</p>
                    <div class="blog__footer flex n mt-4">
                        <a href="blog-gw.html">
                            <a href="{{ route('detail.berita',$item->id) }}" class="border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-100 transition duration-300">
                                PREVIEW
                            </a>
                        </a>                                                                                              
                        {{-- <div class="flex items-center text-gray-500">
                            <i class="bx bx-show mr-1"></i>
                            <span>76,5k</span>
                        </div> --}}
                    </div>
                </div>
            </article>
            @endforeach

        </div>
    </div>
</section>
<!-- News End -->





<!-- Reviews Start -->
<section class="reviews py-12 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <span class="section__subtitle block text-center text-red-600 text-sm font-semibold tracking-widest mb-2">Our Blog & News</span>
            <h2 class="section__title text-3xl sm:text-4xl font-bold text-center mt-2">The Best Trip For You</h2>
        </div>

        <div class="swiper reviewSwiper w-full mx-auto">
            <div class="swiper-wrapper">
                <!-- Loop through the reviews and create individual slides for each review -->
                @foreach ($review as $item)
                <div class="swiper-slide flex justify-center">
                    <!-- Review Card -->
                    <div class="review-card bg-white rounded-lg shadow-md p-6 sm:p-8 m-2 w-full max-w-md">
                        <div class="mb-4 sm:mb-6">
                            <p class="text-gray-700 italic text-base sm:text-lg mb-4 sm:mb-6">"{{ strip_tags($item->ulasan) }}"</p>
                            <div class="flex items-center">
                                <img alt="Portrait of {{ $item->name }}" class="rounded-full mr-4 object-cover" width="80" height="80" src="{{ asset('fotoprofile/' . $item->foto) }}">
                                <div>
                                    <p class="text-gray-800 font-bold mb-1">{{ $item->nama }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border-t pt-4">
                            <div class="text-yellow-400">
                                @for ($i = 0; $i < $item->rate; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                <span class="text-gray-600 text-sm ml-2">{{ $item->rate }}.0</span>
                            </div>
                            <p class="text-gray-500 text-sm">Diunggah pada {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMM Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Init -->
<script>
    const swiper = new Swiper('.reviewSwiper', {
        loop: true,
        spaceBetween: 16,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>


<!-- Reviews Start -->

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

  
    
    <script src="../js/home.js"></script>
    

    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.all.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css
    " rel="stylesheet">
    @if(session('success')) 
    <script>
        Swal.fire({
            title: "{{ session('success') }}",
            icon: "success",
            draggable: true,
            customClass: {
                popup: 'bg-white text-gray-900 rounded-lg shadow-lg border border-gray-300',
                title: 'text-2xl font-semibold mb-4',
                icon: 'text-green-500',
                content: 'text-sm text-gray-700',
                confirmButton: 'bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400',
            }
        });
    </script>
    @endif
    



</body>
</html>