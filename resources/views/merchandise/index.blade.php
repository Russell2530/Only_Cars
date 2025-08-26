@extends('layouts.app')
@section('title','Merchandise')
@section('content')
<!-- Redesigned merchandise page with luxury dark theme and premium styling -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Premium Merchandise</h1>
      <p class="text-xl text-gray-300 mb-8">Koleksi merchandise eksklusif OnlyCars untuk para pecinta otomotif</p>
      <a href="{{ route('merchandise.create') }}" class="premium-btn">+ Add New Merchandise</a>
    </div>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @if(session('success')) 
    <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg mb-8">
      {{ session('success') }}
    </div> 
  @endif

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach($merchandise as $m)
      <div class="car-card group">
        @if($m->image_merch)
          <div class="relative overflow-hidden">
            <img src="{{ asset('storage/'.$m->image_merch) }}" 
                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" 
                 alt="{{ $m->name }}">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <div class="text-center">
                <svg class="w-12 h-12 text-white mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="text-white font-semibold">Shop Now</span>
              </div>
            </div>
            <div class="absolute top-4 right-4">
              <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm font-semibold">
                Merch
              </span>
            </div>
          </div>
        @else
          <div class="w-full h-64 bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center">
            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
            </svg>
          </div>
        @endif
        
        <div class="p-6">
          <h3 class="text-xl font-bold text-white mb-3">{{ $m->name }}</h3>
          <div class="mb-4">
            <p class="text-3xl font-bold text-yellow-400">
              Rp {{ number_format($m->price,0,',','.') }}
            </p>
          </div>
          
          <div class="flex flex-wrap gap-2">
            <a href="{{ route('merchandise.show', $m) }}" class="premium-btn text-sm px-4">View Details</a>
            <a href="{{ route('merchandise.edit', $m) }}" class="premium-btn-outline px-6 text-sm">Edit</a>
            <form action="{{ route('merchandise.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this merchandise?')">
              @csrf @method('DELETE')
              <button class="bg-red-600 hover:bg-red-700 text-white px-20 py-2 rounded-lg text-sm font-medium transition-colors">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if($merchandise->isEmpty())
    <div class="text-center py-16">
      <svg class="w-24 h-24 text-gray-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-400 mb-2">No Merchandise Yet</h3>
      <p class="text-gray-500 mb-6">Start building your premium merchandise collection!</p>
      <a href="{{ route('merchandise.create') }}" class="premium-btn">Add First Item</a>
    </div>
  @endif

  <div class="mt-12">
    {{ $merchandise->links() }}
  </div>
</div>
@endsection
