<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $berita->title }}</title>
    <!-- Favicon Links -->
    <link rel="icon" href="../assets/gili-logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .blog-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        .feature-list li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        .feature-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #B61C1C;
            font-weight: bold;
        }
        .hover-red:hover {
            color: #B61C1C;
        }
        .focus-red:focus {
            --tw-ring-color: #B61C1C;
        }
    </style>

    @php
        use Carbon\carbon;
        Carbon::setLocale('id');
    @endphp
</head>
<body class="bg-gray-50">
    <!-- Header with background image -->
<header class="relative h-20 bg-cover bg-center" style="background-image: url('../assets/Background\ Header.jpg') ;">
    <div class="container mx-auto px-4 h-full flex items-center">
      <div class="flex items-center space-x-3">
        <img 
          alt="Boat Gili Wanders logo" 
          class="h-10 w-10 object-cover rounded-full" 
          src="../assets/gili-logo.png" 
        />
        <h1 class="text-lg font-bold text-white">
          Boat Gili Wanders
        </h1>
      </div>
    </div>
  </header>
  
  <!-- Breadcrumb -->
  <nav class="bg-gray-100 py-2">
    <div class="container mx-auto px-4 text-sm">
      <a href="{{ route('home') }}" class="text-gray-600 hover:underline">Home</a>
      <span class="mx-1 text-gray-400">/</span>
      <a href="{{ route('home') }}" class="text-blue-600 hover:underline font-medium">Blog</a>
    </div>
  </nav>
  

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8 animate__animated animate__fadeIn">
            <!-- Blog Content -->
            <article class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Featured Image -->
                    <img src="{{ asset('fotoberita/' . $berita->image) }}" 
                         alt="Luxury Catamaran Cruise" 
                         class="w-full h-64 md:h-96 object-cover">
                    
                    <!-- Blog Header -->
                    <div class="p-6">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                           {{ $berita->title }}
                        </h1>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span>{{ Carbon::parse($berita->date)->isoFormat('D MMM Y') }}</span>
                        </div>
                        
                        <!-- Blog Content -->
                        <div class="blog-content text-gray-700">
                          {!! $berita->content !!}
                        </div>
                    </div>
                </div>
            </article>
            
            <!-- Sidebar -->
            <aside class="lg:w-1/3">
                
                <!-- Blog News -->
                <div class="bg-white rounded-lg shadow-md p-4 animate__animated animate__fadeInRight">
                    <h3 class="font-bold text-lg text-gray-800 mb-4">BLOG NEWS</h3>
                    <div class="space-y-4">
                        @foreach ($news as $item )
                        <div class="flex items-start">
                            <img src="{{ asset('fotoberita/' . $item->image) }}" 
                                 alt="Private Speedboat" 
                                 class="w-20 h-16 object-cover rounded mr-3">
                            <div>
                                <a href="{{ route('detail.berita',$item->id) }}" class="text-gray-800 hover-red font-medium">{{ $item->title }}</a>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <footer class="footer bg-red-800 text-white py-12">
        <div class="footer__container container grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <a href="#" class="footer__logo text-2xl font-bold"><i class="fas fa-ship text-xl"></i> Boat Giliwanders</a>
                <div class="footer__description mt-4 space-y-2">
                    <p><i class="fa fa-phone me-3"></i>Phone: +62 8122840166</p>
                    <p><i class="fa fa-envelope me-3"></i>Email: cs@giliwonders.com.id</p>
                    <p><i class="fa fa-globe me-3"></i>Website: www.giliwonders.com</p>
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
    
            <!-- Address -->
            <div>
                <h3 class="footer__title text-xl font-bold">Address</h3>
                <p class="mt-4">Jl. Ganetri IV No. 4<br>DPS, Bali, Indonesia</p>
            </div>
    
            <!-- Social Media -->
            <div>
                <h3 class="footer__title text-xl font-bold">Social Media</h3>
                <ul class="footer__social flex space-x-4 mt-4">
                    <li>
                        <a href="https://www.instagram.com/giliwonders" target="_blank" class="block">
                            <div class="bg-white text-red-700 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 transition">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@giliwonders" target="_blank" class="block">
                            <div class="bg-white text-red-700 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 transition">
                                <i class="fab fa-youtube text-xl"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/giliwonders" target="_blank" class="block">
                            <div class="bg-white text-red-700 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 transition">
                                <i class="fab fa-instagram text-xl"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__info container text-center mt-8 pt-4 border-t border-white-800">
            <span class="footer__copy">©2025 Gili Wonders. All Rights Reserved</span>
            <div class="footer__privacy mt-2">
                <a href="https://www.indoapps.id/" class="text-sm hover:underline">Designed by PT. Indo Apps Solusindo</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>