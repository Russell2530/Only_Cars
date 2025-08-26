@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- Redesigned homepage with luxury hero section and premium styling -->
   <div class="hero-section relative flex items-center justify-center text-center h-screen">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('img/0826.mp4') }}" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 mb-10">
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
            <span class="text-yellow-400">Only</span>Cars
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Komunitas otomotif premium Indonesia — tempat berkumpulnya para pecinta mobil sejati
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('events.index') }}" class="premium-btn">Explore Events</a>
            <a href="{{ route('gallery.index') }}" class="premium-btn-outline">View Gallery</a>
        </div>
    </div>
</div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Redesigned highlight sections with luxury cards -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">Featured Events</h2>
                <p class="text-gray-400 text-lg">Jangan lewatkan event-event eksklusif dari komunitas OnlyCars</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $e)
                    <div class="car-card group">
                        @if ($e->cover_image)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $e->cover_image) }}"
                                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                                    alt="{{ $e->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                        @else
                            <div
                                class="w-full h-64 bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2">{{ $e->title }}</h3>
                            <p class="text-gray-400 mb-4">
                              <i class="text-red-600 fa-solid fa-location-dot mr-2"></i> {{ $e->location }} •
                              <i class="text-white fa-solid fa-calendar-days mb-1 mr-2 ml-1"></i> {{ $e->date }}
                            </p>
                            <a href="{{ route('events.show', $e) }}" class="premium-btn text-sm">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">Gallery Showcase</h2>
                <p class="text-gray-400 text-lg">Koleksi foto terbaik dari komunitas OnlyCars</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($gallery as $g)
                    <div class="car-card group">
                        @if ($g->image_dokumentasi)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $g->image_dokumentasi) }}"
                                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                                    alt="{{ $g->title }}">
                                <div
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white font-semibold">View Image</span>
                                </div>
                            </div>
                        @else
                            <div
                                class="w-full h-64 bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-4">
                            <p class="text-white font-medium">{{ $g->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">Premium Merchandise</h2>
                <p class="text-gray-400 text-lg">Koleksi merchandise eksklusif OnlyCars</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($merchandise as $m)
                    <div class="car-card group">
                        @if ($m->image_merch)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $m->image_merch) }}"
                                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                                    alt="{{ $m->name }}">
                            </div>
                        @else
                            <div
                                class="w-full h-64 bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2">{{ $m->name }}</h3>
                            <p class="text-2xl font-bold text-yellow-400 mb-4">
                                Rp {{ number_format($m->price, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('merchandise.show', $m) }}" class="premium-btn text-sm">Shop Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
