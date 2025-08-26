<!-- Complete redesign with luxury form styling and premium input fields -->
<div class="space-y-6">
    <!-- Title Field -->
    <div class="group">
        <label class="block text-yellow-400 font-semibold mb-3 text-lg">Judul Gallery</label>
        <input type="text" 
               name="title" 
               class="w-full px-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all duration-300 text-lg" 
               value="{{ old('title', $gallery->title ?? '') }}" 
               placeholder="Masukkan judul gallery..."
               required>
    </div>

    <!-- Cover Image Field -->
    <div class="group">
        <label class="block text-yellow-400 font-semibold mb-3 text-lg">Cover Image</label>
        
        @if(!empty($gallery->cover_image))
            <div class="mb-4 p-4 bg-gray-900/30 rounded-xl border border-gray-700">
                <p class="text-gray-300 mb-3 font-medium">Current Image:</p>
                <div class="relative inline-block">
                    <img src="{{ asset('storage/'.$gallery->cover_image) }}" 
                         class="w-48 h-32 object-cover rounded-lg shadow-lg border border-gray-600" 
                         alt="Current cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg"></div>
                </div>
            </div>
        @endif
        
        <div class="relative">
            <input type="file" 
                   name="image_dokumentasi" 
                   class="w-full px-4 py-4 bg-gray-900/50 border border-gray-600 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:font-semibold hover:file:bg-yellow-600 transition-all duration-300" 
                   accept="image/*" 
                   {{ isset($gallery) ? '' : 'required' }}>
            <p class="text-gray-400 text-sm mt-2">Upload gambar dengan format JPG, PNG, atau GIF (Max: 2MB)</p>
        </div>
    </div>
</div>
