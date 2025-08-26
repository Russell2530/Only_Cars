@extends('layouts.app')
@section('title','Edit Event')
@section('content')
<!-- Complete redesign with luxury dark theme and premium styling -->
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black py-12">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent mb-4">
                Edit Event
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full"></div>
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700/50 shadow-2xl p-8">
            <form action="{{ route('events.update',$event) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf @method('PUT')
                @include('events.form')
                
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
                    <a href="{{ route('events.index') }}" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-all duration-300 font-medium">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-black font-bold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
