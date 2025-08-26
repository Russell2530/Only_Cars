@extends('layouts.app')
@section('title','Events')
@section('content')
<!-- Redesigned events page with luxury styling and better layout -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Automotive Events</h1>
      <p class="text-xl text-gray-300 mb-8">Bergabunglah dalam event-event eksklusif komunitas OnlyCars</p>
      <a href="{{ route('events.create') }}" class="premium-btn">+ Create New Event</a>
    </div>
  </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @if(session('success')) 
    <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg mb-8">
      {{ session('success') }}
    </div> 
  @endif

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($events as $event)
      <div class="car-card group">
        @if($event->cover_image)
          <div class="relative overflow-hidden">
            <img src="{{ asset('storage/'.$event->cover_image) }}" 
                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" 
                 alt="{{ $event->title }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute top-4 right-4">
              <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm font-semibold">
                Event
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
          <h3 class="text-xl font-bold text-white mb-3">{{ $event->title }}</h3>
          <div class="space-y-2 mb-6">
            <p class="text-gray-400 flex items-center">
              <i class="text-red-600 fa-solid fa-location-dot mr-2"></i> {{ $event->location }}
            </p>
            <p class="text-gray-400 flex items-center">
              <i class="text-white fa-solid fa-calendar-days mb-1 mr-2"></i> {{ $event->date }}
            </p>
          </div>
          
          <div class="flex flex-wrap gap-2">
            <a href="{{ route('events.show', $event) }}" class="premium-btn text-sm">View Details</a>
            <a href="{{ route('events.edit', $event) }}" class="premium-btn-outline text-sm">Edit</a>
            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?')">
              @csrf @method('DELETE')
              <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if($events->isEmpty())
    <div class="text-center py-16">
      <svg class="w-24 h-24 text-gray-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-400 mb-2">No Events Yet</h3>
      <p class="text-gray-500 mb-6">Be the first to create an exciting automotive event!</p>
      <a href="{{ route('events.create') }}" class="premium-btn">Create First Event</a>
    </div>
  @endif

  <div class="mt-12">
    {{ $events->links() }}
  </div>
</div>
@endsection
