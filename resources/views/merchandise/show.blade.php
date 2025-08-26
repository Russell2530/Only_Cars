@extends('layouts.app')

@section('content')
<!-- Complete redesign with luxury dark theme and premium layout -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black">
    <!-- Hero Section with Product Image -->
    <div class="relative overflow-hidden bg-gradient-to-r from-gray-900 to-gray-800">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Product Image -->
                <div class="relative">
                    @if($merchandise->image_merch)
                        <div class="relative overflow-hidden rounded-2xl shadow-2xl transform hover:scale-105 transition-all duration-500">
                            <img src="{{ asset('storage/'.$merchandise->image_merch) }}" 
                                 alt="{{ $merchandise->name }}"
                                 class="w-full h-96 object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        </div>
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center shadow-2xl">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-yellow-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-400 text-lg">No Image Available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="space-y-8">
                    <div>
                        <h1 class="text-5xl font-bold text-white mb-4 leading-tight">
                            {{ $merchandise->name }}
                        </h1>
                        <div class="flex items-center space-x-2 mb-6">
                            <span class="px-4 py-2 bg-yellow-400 text-black text-sm font-semibold rounded-full">
                                PREMIUM MERCHANDISE
                            </span>
                        </div>
                    </div>

                    <!-- Price Section -->
                    <div class="bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl p-8 border border-gray-600 shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-sm uppercase tracking-wide mb-2">Harga</p>
                                <p class="text-4xl font-bold text-yellow-400">
                                    Rp {{ number_format($merchandise->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-yellow-400">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($merchandise->description)
                    <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
                        <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Deskripsi Produk
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed">{{ $merchandise->description }}</p>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <a href="{{ route('merchandise.index') }}" 
                           class="flex-1 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black px-8 py-4 rounded-xl font-semibold text-center hover:from-yellow-500 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-yellow-400/25">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Merchandise
                        </a>
                        <button class="flex-1 bg-gradient-to-r from-gray-700 to-gray-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-gray-600 hover:to-gray-500 transform hover:scale-105 transition-all duration-300 shadow-lg border border-gray-500">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0h8m-8 0a2 2 0 11-4 0m12 0a2 2 0 11-4 0"></path>
                            </svg>
                            Hubungi Penjual
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Product Info -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 text-center hover:border-yellow-400 transition-all duration-300">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Kualitas Premium</h3>
                <p class="text-gray-400">Merchandise berkualitas tinggi untuk komunitas OnlyCars</p>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 text-center hover:border-yellow-400 transition-all duration-300">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Harga Terjangkau</h3>
                <p class="text-gray-400">Harga kompetitif untuk semua member komunitas</p>
            </div>

            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 text-center hover:border-yellow-400 transition-all duration-300">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Support 24/7</h3>
                <p class="text-gray-400">Tim support siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</div>
@endsection
