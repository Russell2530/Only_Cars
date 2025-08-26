<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(9);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'date'=>'required|date',
            'location'=>'required|string|max:255',
            'description'=>'nullable|string',
            'cover_image'=>'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('events','public');
        }

        Event::create($data);
        return redirect()->route('events.index')->with('success','Event berhasil ditambahkan.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'date'=>'required|date',
            'location'=>'required|string|max:255',
            'description'=>'nullable|string',
            'cover_image'=>'nullable|image|mimes:jpg,jpeg,png,avif|max:4096',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($event->cover_image && Storage::disk('public')->exists($event->cover_image)) {
                Storage::disk('public')->delete($event->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('events','public');
        }

        $event->update($data);
        return redirect('events');
    }

    public function destroy(Event $event)
    {
        if ($event->cover_image && Storage::disk('public')->exists($event->cover_image)) {
            Storage::disk('public')->delete($event->cover_image);
        }
        $event->delete();
        return redirect()->route('events.index')->with('success','Event dihapus.');
    }
}
