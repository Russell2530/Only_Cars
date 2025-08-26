<!doctype html>
<html lang="en" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>OnlyCars - @yield('title')</title>
  <!-- Replaced Bootstrap with Tailwind CSS and added luxury fonts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/89106721c4.js" crossorigin="anonymous"></script>
  <style>
    /* Added luxury car community styling */
    :root {
      --background: #1e293b;
      --foreground: #f8fafc;
      --card: #334155;
      --card-foreground: #f8fafc;
      --primary: #fbbf24;
      --primary-foreground: #1e293b;
      --secondary: #94a3b8;
      --secondary-foreground: #1e293b;
      --muted: #64748b;
      --border: #475569;
      --ring: #fbbf24;
    }
    
    * {
      font-family: 'poppins', sans-serif;
    }
    body {
      background: var(--background);
      color: var(--foreground);
    }
    
    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
    }
    
    .luxury-nav {
      background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
    }
    
    .car-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      transition: all 0.3s ease;
      overflow: hidden;
    }
    
    .car-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      border-color: var(--primary);
    }
    
    .premium-btn {
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      color: var(--primary-foreground);
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }
    
    .premium-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(251, 191, 36, 0.3);
      color: var(--primary-foreground);
      text-decoration: none;
    }
    
    .premium-btn-outline {
      background: transparent;
      color: var(--primary);
      border: 2px solid var(--primary);
      border-radius: 8px;
      padding: 10px 22px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }
    
    .premium-btn-outline:hover {
      background: var(--primary);
      color: var(--primary-foreground);
      text-decoration: none;
    }
    
    .hero-section {
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.9) 100%),
                  url('/placeholder.svg?height=600&width=1200') center/cover;
      min-height: 60vh;
    }
  </style>
</head>
<body>
<!-- Redesigned navigation with luxury styling -->
<nav class="luxury-nav sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <div class="flex items-center">
        <a href="{{ route('welcome') }}" class="text-2xl font-bold text-yellow-400">
          OnlyCars
        </a>
        <span class="ml-2 mt-1 text-sm text-gray-400">Premium Community</span>
      </div>
      
      <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-8">
          <a href="{{ route('events.index') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 text-sm transition-colors font-bold">Events</a>
          <a href="{{ route('gallery.index') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 text-sm font-bold transition-colors">Gallery</a>
          <a href="{{ route('merchandise.index') }}" class="text-gray-300 hover:text-yellow-400 px-3 py-2 text-sm font-bold transition-colors">Merchandise</a>
        </div>
      </div>
      
      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button type="button" class="text-gray-400 hover:text-yellow-400 focus:outline-none focus:text-yellow-400" onclick="toggleMobileMenu()">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-700 mt-2">
        <a href="{{ route('events.index') }}" class="text-gray-300 hover:text-yellow-400 block px-3 py-2 text-base font-medium">Events</a>
        <a href="{{ route('gallery.index') }}" class="text-gray-300 hover:text-yellow-400 block px-3 py-2 text-base font-medium">Gallery</a>
        <a href="{{ route('merchandise.index') }}" class="text-gray-300 hover:text-yellow-400 block px-3 py-2 text-base font-medium">Merchandise</a>
      </div>
    </div>
  </div>
</nav>

<main class="min-h-screen">
  @yield('content')
</main>

<!-- Added luxury footer -->
<footer class="bg-slate-900 border-t border-gray-700">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div>
        <h3 class="text-xl font-bold text-yellow-400 mb-4">OnlyCars</h3>
        <p class="text-gray-400">Komunitas otomotif premium Indonesia untuk para pecinta mobil sejati.</p>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
        <ul class="space-y-2">
          <li><a href="{{ route('events.index') }}" class="text-gray-400 hover:text-yellow-400 transition-colors">Events</a></li>
          <li><a href="{{ route('gallery.index') }}" class="text-gray-400 hover:text-yellow-400 transition-colors">Gallery</a></li>
          <li><a href="{{ route('merchandise.index') }}" class="text-gray-400 hover:text-yellow-400 transition-colors">Merchandise</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-white mb-4">Connect</h4>
        <p class="text-gray-400">Follow us untuk update terbaru dari komunitas OnlyCars.</p>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-8 pt-8 text-center">
      <p class="text-gray-400">&copy; 2024 OnlyCars. All rights reserved.</p>
    </div>
  </div>
</footer>

<script>
  function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }
</script>
</body>
</html>
