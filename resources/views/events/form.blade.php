<!-- Complete form redesign with luxury styling and modern inputs -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Title Field -->
    <div class="md:col-span-2">
        <label class="block text-yellow-400 font-semibold text-lg mb-3">Judul Event</label>
        <input type="text" name="title" 
               class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
               value="{{ old('title', $event->title ?? '') }}" 
               placeholder="Masukkan judul event yang menarik..."
               required>
    </div>

    <!-- Date Field -->
    <div>
        <label class="block text-yellow-400 font-semibold text-lg mb-3">Tanggal Event</label>
        <input type="date" name="date" 
               class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
               value="{{ old('date', $event->date ?? '') }}" 
               required>
    </div>

    <!-- Location Field -->
    <div>
        <label class="block text-yellow-400 font-semibold text-lg mb-3">Lokasi</label>
        <input type="text" name="location" 
               class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
               value="{{ old('location', $event->location ?? '') }}" 
               placeholder="Lokasi event..."
               required>
    </div>

    <!-- Description Field -->
    <div class="md:col-span-2">
        <label class="block text-yellow-400 font-semibold text-lg mb-3">Deskripsi</label>
        <textarea name="description" rows="6"
                  class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 resize-none" 
                  placeholder="Deskripsikan event Anda dengan detail...">{{ old('description', $event->description ?? '') }}</textarea>
    </div>

    <!-- Cover Image Field -->
    <div class="md:col-span-2">
        <label class="block text-yellow-400 font-semibold text-lg mb-3">Cover Image</label>
        @if(!empty($event->cover_image))
            <div class="mb-6 relative group">
                <img src="{{ asset('storage/'.$event->cover_image) }}" 
                     class="w-full max-w-md h-48 object-cover rounded-xl border-2 border-gray-600 group-hover:border-yellow-500 transition-all duration-300">
                <div class="absolute inset-0 bg-black/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        @endif
        <div class="relative">
            <input type="file" name="cover_image" 
                   class="w-full px-6 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:font-semibold hover:file:bg-yellow-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300" 
                   accept="image/*" 
                   {{ isset($event) ? '' : 'required' }}>
        </div>
    </div>
</div>
