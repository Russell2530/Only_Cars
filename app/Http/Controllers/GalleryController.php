<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->paginate(12);
        return view('gallery.index', compact('gallery'));
    }
    public function create()
    {
        return view('gallery.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image_dokumentasi' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $data['image_dokumentasi'] = $request->file('image_dokumentasi')->store('gallery', 'public');
        Gallery::create($data);
        return redirect('gallery');
    }
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }
    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image_dokumentasi' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);
        if ($request->hasFile('image_dokumentasi')) {
            if ($gallery->image_dokumentasi && Storage::disk('public')->exists($gallery->image_dokumentasi)) {
                Storage::disk('public')->delete($gallery->image_dokumentasi);
            }
            $data['image_dokumentasi'] = $request->file('image_dokumentasi')->store('gallery', 'public');
        }
        $gallery->update($data);
        return redirect('gallery');
    }
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_dokumentasi && Storage::disk('public')->exists($gallery->image_dokumentasi)) {
            Storage::disk('public')->delete($gallery->image_dokumentasi);
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Foto dihapus.');
    }
}
