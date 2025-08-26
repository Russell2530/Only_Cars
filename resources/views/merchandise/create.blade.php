@extends('layouts.app')

@section('content')
<!-- Complete redesign with luxury merchandise creation interface -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black py-12">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent mb-4">
                Tambah Merchandise Eksklusif
            </h1>
            <p class="text-gray-300 text-lg">Buat produk premium untuk komunitas OnlyCars</p>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto mt-4"></div>
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8 shadow-2xl">
            <form action="{{ route('merchandise.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Product Name -->
                    <div class="md:col-span-2">
                        <label class="block text-yellow-400 font-semibold text-lg mb-3">Nama Merchandise</label>
                        <input type="text" name="name" 
                               class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
                               placeholder="Masukkan nama produk yang menarik..."
                               required>
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-yellow-400 font-semibold text-lg mb-3">Harga</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-semibold">Rp</span>
                            <input type="number" name="price" 
                                   class="w-full pl-12 pr-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
                                   placeholder="0"
                                   required>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-yellow-400 font-semibold text-lg mb-3">Gambar Produk</label>
                        <input type="file" name="image_merch" 
                               class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:font-semibold hover:file:bg-yellow-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
                               accept="image/*">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-yellow-400 font-semibold text-lg mb-3">Deskripsi</label>
                        <textarea name="description" rows="6"
                                  class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 resize-none" 
                                  placeholder="Deskripsikan produk Anda dengan detail..."></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" class="group relative px-12 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-bold text-lg rounded-xl hover:from-yellow-400 hover:to-yellow-500 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-yellow-500/25">
                        <span class="relative z-10">Simpan Merchandise</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
