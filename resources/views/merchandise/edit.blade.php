@extends('layouts.app')
@section('title','Edit Merchandise')
@section('content')
<!-- Complete redesign with luxury dark theme and premium merchandise styling -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black py-12">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent mb-4">
                Edit Merchandise
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full"></div>
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700/50 shadow-2xl p-8">
            <form action="{{ route('merchandise.update', $merchandise->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf @method('PUT')
                
                <!-- Product Name -->
                <div class="group">
                    <label class="block text-yellow-400 font-semibold mb-3 text-lg">Nama Merchandise</label>
                    <input type="text" 
                           name="name" 
                           value="{{ $merchandise->name }}" 
                           class="w-full px-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 text-lg" 
                           placeholder="Masukkan nama merchandise..."
                           required>
                </div>

                <!-- Price -->
                <div class="group">
                    <label class="block text-yellow-400 font-semibold mb-3 text-lg">Harga</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-semibold">Rp</span>
                        <input type="number" 
                               name="price" 
                               value="{{ $merchandise->price }}" 
                               class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 text-lg" 
                               placeholder="0"
                               required>
                    </div>
                </div>

                <!-- Description -->
                <div class="group">
                    <label class="block text-yellow-400 font-semibold mb-3 text-lg">Deskripsi</label>
                    <textarea name="description" 
                              rows="5"
                              class="w-full px-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 text-lg resize-none" 
                              placeholder="Masukkan deskripsi merchandise...">{{ $merchandise->description }}</textarea>
                </div>

                <!-- Product Image -->
                <div class="group">
                    <label class="block text-yellow-400 font-semibold mb-3 text-lg">Gambar Produk</label>
                    
                    @if($merchandise->image_merch)
                        <div class="mb-4 p-4 bg-gray-900/30 rounded-xl border border-gray-700">
                            <p class="text-gray-300 mb-3 font-medium">Current Image:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/'.$merchandise->image_merch) }}" 
                                     class="w-48 h-48 object-cover rounded-lg shadow-lg border border-gray-600" 
                                     alt="Current product">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg"></div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="relative">
                        <input type="file" 
                               name="image_merch" 
                               class="w-full px-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:font-semibold hover:file:bg-yellow-600 transition-all duration-300" 
                               accept="image/*">
                        <p class="text-gray-400 text-sm mt-2">Upload gambar produk dengan format JPG, PNG, atau GIF (Max: 2MB)</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
                    <a href="{{ route('merchandise.index') }}" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-all duration-300 font-medium">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-black font-bold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Update Merchandise
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
