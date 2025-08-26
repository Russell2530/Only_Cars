<?php
namespace App\Http\Controllers;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    public function index()
    {
        $merchandise = Merchandise::latest()->paginate(12);
        return view('merchandise.index', compact('merchandise'));
    }
    public function create()
    {
        return view('merchandise.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'nullable|string',
            'image_merch'=>'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);
        $data['image_merch'] = $request->file('image_merch')->store('merchandise','public');
        Merchandise::create($data);
        return redirect()->route('merchandise.index')->with('success','Merchandise ditambahkan.');
    }
    public function show(Merchandise $merchandise)
    {
        return view('merchandise.show', compact('merchandise'));
    }
    public function edit(Merchandise $merchandise)
    {
        return view('merchandise.edit', compact('merchandise'));
    }
    public function update(Request $request, Merchandise $merchandise)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'nullable|string',
            'image_merch'=>'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);
        if ($request->hasFile('image_merch')) {
            if ($merchandise->image_merch && Storage::disk('public')->exists($merchandise->image_merch)) {
                Storage::disk('public')->delete($merchandise->image_merch);
            }
            $data['image_merch'] = $request->file('image_merch')->store('merchandise','public');
        }
        $merchandise->update($data);
        return redirect('merchandise');
    }
    public function destroy(Merchandise $merchandise)
    {
        if ($merchandise->image_merch && Storage::disk('public')->exists($merchandise->image_merch)) {
            Storage::disk('public')->delete($merchandise->image_merch);
        }
        $merchandise->delete();
        return redirect()->route('merchandise.index')->with('success','Merchandise dihapus.');
    }
}
