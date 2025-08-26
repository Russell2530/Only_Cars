@extends('layouts.app')
@section('title','Tambah Event')
@section('content')
<!-- Complete redesign with luxury dark theme and modern form styling -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black py-12">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent mb-4">
                Tambah Event Eksklusif
            </h1>
            <p class="text-gray-300 text-lg">Buat event premium untuk komunitas OnlyCars</p>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto mt-4"></div>
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8 shadow-2xl">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @include('events.form')
                
                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" class="group relative px-12 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-bold text-lg rounded-xl hover:from-yellow-400 hover:to-yellow-500 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-yellow-500/25">
                        <span class="relative z-10">Simpan Event</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
