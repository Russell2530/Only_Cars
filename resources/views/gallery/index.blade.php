@extends('layouts.app')
@section('title','Gallery')
@section('content')
<!-- Redesigned gallery with luxury masonry-style layout -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Photo Gallery</h1>
      <p class="text-xl text-gray-300 mb-8">Koleksi foto terbaik dari komunitas OnlyCars</p>
      <a href="{{ route('gallery.create') }}" class="premium-btn">+ Add New Photo</a>
    </div>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($gallery as $g)
      <div class="car-card group">
        @if($g->image_dokumentasi)
          <div class="relative overflow-hidden">
            <img src="{{ asset('storage/'.$g->image_dokumentasi) }}" 
                 class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" 
                 alt="{{ $g->title }}">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <div class="text-center">
                <svg class="w-12 h-12 text-white mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                <span class="text-white font-semibold">View Full Size</span>
              </div>
            </div>
            <div class="absolute top-4 right-4">
              <span class="bg-yellow-400 text-black px-2 py-1 rounded-full text-xs font-semibold">
                Gallery
              </span>
            </div>
          </div>
        @else
          <div class="w-full h-80 bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center">
            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
            </svg>
          </div>
        @endif
        
        <div class="p-4">
          <h3 class="text-lg font-semibold text-white mb-3">{{ $g->title }}</h3>
          <div class="flex gap-2">
            <a href="{{ route('gallery.edit',$g) }}" class="premium-btn-outline text-xs py-3">Edit</a>
            <form action="{{ route('gallery.destroy',$g) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this photo?')">
              @csrf @method('DELETE')
              <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-4 rounded-lg text-xs font-medium transition-colors">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if($gallery->isEmpty())
    <div class="text-center py-16">
      <svg class="w-24 h-24 text-gray-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-400 mb-2">No Photos Yet</h3>
      <p class="text-gray-500 mb-6">Start building your automotive photo collection!</p>
      <a href="{{ route('gallery.create') }}" class="premium-btn">Add First Photo</a>
    </div>
  @endif

  <div class="mt-12">
    {{ $gallery->links() }}
  </div>
</div>
@endsection
