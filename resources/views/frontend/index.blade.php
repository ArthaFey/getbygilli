<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website - Boat GiliWanders</title>
     <!-- Favicon Links -->
    <link rel="icon" href="assets/gili-logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
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
                    Explore Indonesia with Boat Giliwonders – Sail Beyond Limits!
                </h1>
            </div>
            <!-- Form Pencarian -->
            <div id="searchForm">
                <form action="" method="GET" class="flex flex-wrap md:flex-nowrap items-center gap-3 w-full">
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
                            <button class="btn btn-light dropdown-toggle d-flex align-items-center w-full justify-content-between bg-transparent border-0 p-0" type="button" id="passengerDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user text-gray-500 me-2"></i>
                                <span id="passengerCount">1 Passenger</span>
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="passengerDropdownButton">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Adults (12+ years)</span>
                                    <div class="d-flex align-items-center">
                                        <button id="adultMinus" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="adultCount" class="mx-2">1</span>
                                        <button id="adultPlus" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Children (2-11 years)</span>
                                    <div class="d-flex align-items-center">
                                        <button id="childMinus" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="childCount" class="mx-2">0</span>
                                        <button id="childPlus" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button id="doneButton" class="btn btn-primary w-100">Done</button>
                            </div>
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
            <img src="assets/Background Header.jpg" alt="Mobile Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        
        <!-- Content Container -->
        <di class="relative z-10 h-full flex flex-col justify-center p-4">
            <!-- Title -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-white leading-snug">
                    Explore Indonesia with Boat<br>
                    Giliwonders - Sail Beyond<br>
                    Limits!
                </h1>
            </div>
            
            <!-- Search Form -->
            <d class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                <!-- Departure & Destination -->
                <div class="flex flex-col items-center mb-3 gap-3">
                    <!-- Departure Select -->
                    <input type="text" class="border focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center p-3 rounded-lg" placeholder="Enter Departure">
                    
                    <!-- Vertical Swap Button with arrows side by side -->
                    <button type="button" id="swapButton" class="flex items-center justify-center my-1 p-2 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-up mr-2"></i>
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    
                    <!-- Destination Select -->
                    <input type="text" class="border focus:ring-0 text-center text-sm flex-grow bg-transparent h-full w-full max-w-xs text-center p-3 rounded-lg" placeholder="Enter Destination">
                </div>
                
                <!-- Dates -->
                <div class="flex flex-col mb-3 gap-3">
                    <!-- Departure Date -->
                    <div class="flex items-center border border-gray-300 rounded-lg p-3">
                        <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                        <input type="date" 
                               placeholder="dd/mm/yyyy" 
                               class="w-full border-none focus:ring-0 text-sm bg-transparent">
                    </div>
                    
                
                </div>
                
                <!-- Passenger -->
                <div class="flex mb-4">
                    <select class="w-full p-3 border border-gray-300 rounded-lg text-sm text-center focus:ring-2 focus:ring-red-500 focus:border-transparent">
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
                <a href="book info.html" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg text-sm min-w-[120px] h-12 flex items-center justify-center transition duration-200">
                    Find Ticket
                </a>
            </div>
        </div>
    </div>
</header>

<section class="popular-destinations py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 animate__animated animate__fadeIn">
            <h2 class="text-3xl font-bold">Category</h2>
            <div class="flex items-center mt-4 md:mt-0 space-x-4">
            
                <a href="#" id="viewAllBtn" class="text-sm font-medium text-red-600 hover:text-red-700 flex items-center animate__animated animate__fadeIn">
                    View All
                    <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <div id="destinationsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Popular Destinations (Visible by default) -->
            <!-- Destination Card 1 - Bali -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="bali" data-popular="true">
                <img alt="Image of Bali & Nusa Penida" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/e9VeBNq96RwRkdGyS0niBMY7WVZkEL_CMIeWwV71_oE.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Bali & Nusa Penida</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 8 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Ubud → Nusa Penida</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 300,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 2 - Lombok -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="lombok" data-popular="true">
                <img alt="Image of Lombok & Pink Beach" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/_P3nK1TDUhzn27yqaiMC-gxnyuCJNQn0Q_xioXLc6OA.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Lombok & Pink Beach</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 9 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Lombok → Pink Beach</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 350,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 3 - Jawa -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="jawa" data-popular="true">
                <img alt="Image of Jawa & Bromo" class="w-full h-48 object-cover aspect-video" src="assets/Bromo Java.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Java Island & Bromo</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 10 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Surabaya → Mount Bromo</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 350,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 4 - NTT -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="ntt" data-popular="true">
                <img alt="Image of Nusa Tenggara Timur & Komodo Island" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">NTT & Komodo Island</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 10 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Lombok → Komodo Island</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 750,000</span>
                    </div>                    
                </div>
            </div>
            
            
    
        </div>
    </div>
</section> 


<section class="popular-destinations py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <span class="section__subtitle block text-sm text-red-600 animate__animated animate__fadeIn">Our Visit</span>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 animate__animated animate__fadeIn">
            <h2 class="text-3xl font-bold">Explore Beautiful Destinations</h2>
        </div>

        <!-- Island Selection (Hidden by default) -->
        <div id="islandSelection" class="mb-6 hidden animate__animated">
            <h3 class="text-sm font-medium mb-2 text-gray-700">Select an Island</h3>
            <div class="flex flex-wrap gap-2">
                <button data-island="popular" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter active">Popular</button>
                <button data-island="bali" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Bali</button>
                <button data-island="jawa" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Jawa</button>
                <button data-island="lombok" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Lombok</button>
                <button data-island="sulawesi" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Sulawesi</button>
                <button data-island="kalimantan" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Kalimantan</button>
                <button data-island="ntt" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 island-filter">Nusa Tenggara Timur</button>
            </div>
        </div>

        <div id="destinationsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Popular Destinations (Visible by default) -->
            <!-- Destination Card 1 - Bali -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="bali" data-popular="true">
                <img alt="Image of Bali & Nusa Penida" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/e9VeBNq96RwRkdGyS0niBMY7WVZkEL_CMIeWwV71_oE.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Bali & Nusa Penida</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 8 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Ubud → Nusa Penida</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 300,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 2 - Lombok -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="lombok" data-popular="true">
                <img alt="Image of Lombok & Pink Beach" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/_P3nK1TDUhzn27yqaiMC-gxnyuCJNQn0Q_xioXLc6OA.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Lombok & Pink Beach</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 9 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Lombok → Pink Beach</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 350,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 3 - Jawa -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="jawa" data-popular="true">
                <img alt="Image of Jawa & Bromo" class="w-full h-48 object-cover aspect-video" src="assets/Bromo Java.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Java Island & Bromo</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 10 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Surabaya → Mount Bromo</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 350,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Destination Card 4 - NTT -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp" data-island="ntt" data-popular="true">
                <img alt="Image of Nusa Tenggara Timur & Komodo Island" class="w-full h-48 object-cover aspect-video" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg" />
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">NTT & Komodo Island</h3>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Popular</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Apr 10 - Recent</p>
                    <span class="text-sm font-medium text-red-600">Lombok → Komodo Island</span>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 750,000</span>
                    </div>                    
                </div>
            </div>
            
            
            <!-- Additional Destinations (Hidden by default) -->
            <!-- Additional Bali Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="bali">
                <img alt="Image of Ubud" class="w-full h-48 object-cover" 
                     src="assets/Ubud Cultural.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Ubud Cultural Experience</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 11 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Ubud → Tegallalang</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 350,000</span>
                    </div>                    
                </div>
            </div>
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="bali">
                <img alt="Image of Ubud" class="w-full h-48 object-cover" 
                     src="assets/Ubud Cultural.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Bali & Lombok</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 11 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Kuta Hotel Transfer → Senggigi Pier</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 1,150,000</span>
                    </div>                    
                </div>
            </div>

            
            
            <!-- Additional Jawa Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="jawa">
                <img alt="Image of Yogyakarta" class="w-full h-48 object-cover" 
                     src="assets/Yogyakarta Heritage Tour.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Yogyakarta Heritage Tour</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 12 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Yogyakarta → Prambanan</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 450,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Additional Lombok Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="lombok">
                <img alt="Image of Mount Rinjani" class="w-full h-48 object-cover" 
                     src="assets/Mount Rinjani Trekking.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Mount Rinjani Trekking</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 13 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Sembalun → Rinjani Summit</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 300,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Additional Sulawesi Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="sulawesi">
                <img alt="Image of Tana Toraja" class="w-full h-48 object-cover" 
                     src="assets/Tana Toraja Culture.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Tana Toraja Culture</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 14 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Makassar → Tana Toraja</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 450,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Additional Kalimantan Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="kalimantan">
                <img alt="Image of Derawan Islands" class="w-full h-48 object-cover" 
                     src="assets/Derawan Island.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Derawan Island Paradise</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 15 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Balikpapan → Derawan</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 550,000</span>
                    </div>                    
                </div>
            </div>
            
            <!-- Additional NTT Destination -->
            <div class="destination-card bg-white shadow-md rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeInUp hidden" data-island="ntt">
                <img alt="Image of Flores" class="w-full h-48 object-cover" 
                     src="assets/Flores Tour.jpg" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Flores Overland Tour</h3>
                    <p class="text-sm text-gray-500 mb-2">Apr 16 - Recent</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-red-600">Labuan Bajo → Ruteng</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-sm font-semibold text-gray-500">IDR 750,000</span>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="where-to-go py-12">
    <div class="where-to-go__container container scroll-animate" data-animation="fadeInUp" data-delay="0.2s"">
        <span class="section__subtitle block text-center text-red-600 animate__animated animate__fadeIn">Our Trip</span>
        <h2 class="section__title text-3xl font-bold text-center mt-2 animate__animated animate__fadeIn">Where to Go</h2>
        
        <!-- Scroll horizontal -->
        <div class="where-to-go__content mt-8 overflow-x-auto whitespace-nowrap pb-4">
            <div class="inline-flex gap-4 w-max px-4">
                
                <!-- Card 1 -->
                <section class="where-to-go__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp w-64 inline-block align-top whitespace-normal">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:-translate-y-2">
                        <img alt="Image of Labuan Bajo & Komodo Island" class="w-full h-48 object-cover" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg">
                        <div class="p-4">
                            <h3 class="text-base font-bold">Pantai Sanur → Nusa Penida</h3>
                            <p class="text-sm text-gray-600">From IDR 300,000</p>
                        </div>
                    </div>
                </section>

                <!-- Card 2 -->
                <section class="where-to-go__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp w-64 inline-block align-top whitespace-normal">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:-translate-y-2">
                        <img alt="Image of Raja Ampat & Wayag Island" class="w-full h-48 object-cover" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg">
                        <div class="p-4">
                            <h3 class="text-base font-bold">Benoa square jimbaran → Senggigi Beach</h3>
                            <p class="text-sm text-gray-600">From IDR 700,000</p>
                        </div>
                    </div>
                </section>

                <!-- Card 3 -->
                <section class="where-to-go__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp w-64 inline-block align-top whitespace-normal">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:-translate-y-2">
                        <img alt="Image of Yogyakarta & Borobudur Temple" class="w-full h-48 object-cover" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg">
                        <div class="p-4">
                            <h3 class="text-base font-bold">Gili Trawangan → Pink Beach</h3>
                            <p class="text-sm text-gray-600">From IDR 500,000</p>
                        </div>
                    </div>
                </section>

                <!-- Card 4 -->
                <section class="where-to-go__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp w-64 inline-block align-top whitespace-normal">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:-translate-y-2">
                        <img alt="Image of Denpasar & Mount Batur" class="w-full h-48 object-cover" src="https://storage.googleapis.com/a1aa/image/ITTGXVvOKuDuyKd5svdUXWbxpRY3kdceJGN04UQ2MTA.jpg">
                        <div class="p-4">
                            <h3 class="text-base font-bold">Lombok → Komodo Island</h3>
                            <p class="text-sm text-gray-600">From IDR 1,000,000</p>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</section>


        <section class="blog py-12">
            <div class="blog__container container">
                <span class="section__subtitle block text-center text-red-600 animate__animated animate__fadeIn">Our Blog & News</span>
                <h2 class="section__title text-3xl font-bold text-center mt-2 animate__animated animate__fadeIn">The Best Trip For You</h2>
                <div class="blog__content grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <!-- Blog Card 1 -->
                    <article class="blog__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                        <div class="blog__image relative">
                            <img src="assets/Background Header.jpg" alt="" class="blog__img w-full h-48 object-cover">
                            <a href="#" class="blog__button absolute bottom-4 right-4 bg-blue-600 text-white p-2 rounded-full"><i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                        <div class="blog__data p-4">
                            <div class="flex items-center text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                <span>March 17, 2025</span>
                            </div>
                            <h2 class="blog__title text-xl font-bold">🚤 Luxury Catamaran Cruise to Nusa Penida & Nusa Lembongan – A VIP Ocean Escape</h2>
                            <p class="blog__description text-gray-600 mt-2">Set sail on a luxurious catamaran and cruise across the turquoise waters of Bali. This exclusive experience offers a seamless blend of adventure, relaxation, and breathtaking scenery, making it a must-do for travelers seeking a premium island-hopping getaway...</p>
                            <div class="blog__footer flex justify-between mt-4">
                                <a href="blog-gw.html">
                                    <button class="border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-100 transition duration-300">
                                        PREVIEW
                                    </button>
                                </a>                                                                                              
                                <div class="flex items-center text-gray-500">
                                    <i class="bx bx-show mr-1"></i>
                                    <span>76,5k</span>
                                </div>
                            </div>
                        </div>
                    </article>
        
                    <!-- Blog Card 2 -->
                    <article class="blog__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                        <div class="blog__image relative">
                            <img src="assets/Background Header.jpg" alt="" class="blog__img w-full h-48 object-cover">
                            <a href="#" class="blog__button absolute bottom-4 right-4 bg-blue-600 text-white p-2 rounded-full"><i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                        <div class="blog__data p-4">
                            <div class="flex items-center text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                <span>March 19, 2025</span>
                            </div>
                            <h2 class="blog__title text-xl font-bold">🚤 Private Speedboat to the Gili Islands – Escape to Paradise</h2>
                            <p class="blog__description text-gray-600 mt-2">Want to avoid the crowds and enjoy a private escape to Gili Trawangan, Gili Meno, and Gili Air? Hop on a high-speed private boat and reach these islands in style.</p>
                            <div class="blog__footer flex justify-between mt-4">
                                <button class="border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-100 transition duration-300">
                                    PREVIEW
                                </button>
                                                                                                
                                <div class="flex items-center text-gray-500">
                                    <i class="bx bx-show mr-1"></i>
                                    <span>76,5k</span>
                                </div>
                            </div>
                        </div>
                    </article>
        
                    <!-- Blog Card 3 -->
                    <article class="blog__card bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                        <div class="blog__image relative">
                            <img src="assets/Background Header.jpg" alt="" class="blog__img w-full h-48 object-cover">
                            <a href="#" class="blog__button absolute bottom-4 right-4 bg-blue-600 text-white p-2 rounded-full"><i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                        <div class="blog__data p-4">
                            <div class="flex items-center text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                <span>March 21, 2025</span>
                            </div>
                            <h2 class="blog__title text-xl font-bold">🏝 Komodo Island Liveaboard – Sail with the Dragons!</h2>
                            <p class="blog__description text-gray-600 mt-2">Venture beyond Bali and embark on a multi-day liveaboard cruise to the legendary Komodo National Park. This once-in-a-lifetime journey combines adventure, wildlife encounters, and stunning landscapes.</p>
                            <div class="blog__footer flex justify-between mt-4">
                                <button class="border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-100 transition duration-300">
                                    PREVIEW
                                </button>
                                                                
                                <div class="flex items-center text-gray-500">
                                    <i class="bx bx-show mr-1"></i>
                                    <span>76,5k</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
<section class="reviews py-12">
    <div class="container">
      <div class="text-center mb-12 animate__animated animate__fadeIn">
        <span class="section__subtitle block text-center text-red-600 animate__animated animate__fadeIn">Our Reviews</span>
        <h2 class="section__title text-3xl font-bold text-center mt-2 animate__animated animate__fadeIn">Unforgettable Experiences, Just for You</h2>
      </div>
  
      <div class="row g-4">
        <!-- Review Card 1 -->
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
          <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-xl hover:border-t-4 hover:border-red-500">
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
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
          <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-xl hover:border-t-4 hover:border-blue-500">
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
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-3s">
          <div class="review-card bg-white rounded-lg shadow-lg p-6 h-100 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-xl hover:border-t-4 hover:border-green-500">
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
  </section>

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
                    <p><i class="fa fa-envelope me-2"></i> cs@giliwonders.com.id</p>
                    <p><i class="fa fa-globe me-2"></i> www.giliwonders.com</p>
                </div>
            </div>

            <!-- Sitemap -->
            <div>
                <h3 class="footer__title text-xl font-bold">Sitemap</h3>
                <ul class="footer__links mt-3 space-y-1">
                    <li><a href="home.html" class="footer__link hover:underline">Home</a></li>
                </ul>
                <ul class="footer__links mt-3 space-y-1">
                    <li><a href="about.html" class="footer__link hover:underline">About Us</a></li>
                </ul>
                <ul class="footer__links mt-3 space-y-1">
                    <li><a href="blog-gw.html" class="footer__link hover:underline">Blog & News</a></li>
                </ul>
                <ul class="footer__links mt-3 space-y-1">
                    <li><a href="contact.html" class="footer__link hover:underline">Contact</a></li>
                </ul>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/home.js">
    </script>
</body>
</html>