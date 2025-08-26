@extends('layouts.app')
@section('title', $event->title)
@section('content')
<!-- Complete redesign with luxury event detail layout -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black">
    <!-- Hero Section -->
    <div class="relative h-96 overflow-hidden">
        @if($event->cover_image)
            <img src="{{ asset('storage/'.$event->cover_image) }}" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        @else
            <div class="w-full h-full bg-gradient-to-br from-gray-800 to-gray-900"></div>
        @endif
        
        <!-- Event Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-6xl font-bold text-white mb-4 drop-shadow-2xl">{{ $event->title }}</h1>
                <div class="flex items-center space-x-6 text-yellow-400">
                    <span class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-lg font-semibold">{{ $event->date }}</span>
                    </span>
                    <span class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-lg font-semibold">{{ $event->location }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-6xl mx-auto px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8">
                    <h2 class="text-3xl font-bold text-yellow-400 mb-6">Deskripsi Event</h2>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 text-lg leading-relaxed">{{ $event->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Event Details Card -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Detail Event</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Tanggal</p>
                                <p class="text-white font-semibold">{{ $event->date }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Lokasi</p>
                                <p class="text-white font-semibold">{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <a href="{{ route('events.index') }}" 
                   class="block w-full text-center px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-xl transition-all duration-300 hover:transform hover:scale-105">
                    Kembali ke Events
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
