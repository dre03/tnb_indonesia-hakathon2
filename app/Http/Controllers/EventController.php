<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Moderator;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('speaker', 'moderator')->latest()->paginate(15);
        $speakers = Speaker::all();
        $moderators = Moderator::all();
        $eventCategorys = EventCategory::all();
        return view('pages.event.index', [
            'title' => 'Event',
            'events' => $events,
            'speakers' => $speakers,
            'moderators' => $moderators,
            'eventCategorys' => $eventCategorys,

        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('pages.event.detail', [
            'title' => 'Detail Event',
            'event' => $event
        ]);
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_published' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'speaker_id' => 'required',
            'moderator_id' => 'required',
            'event_category_id' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'is_published.required' => 'Status wajib diisi',
            'location.required' => 'Lokasi wajib diisi',
            'date.required' => 'Tanggal wajib diisi',
            'time.required' => 'Waktu wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'thumbnail.required' => 'Thumbnail wajib diisi',
            'speaker_id.required' => 'Speaker wajib diisi',
            'moderator_id.required' => 'Moderator wajib diisi',
            'event_category_id.required' => 'Kategori Event wajib diisi',
        ]);

        //upload image
        $thumbnail = $request->file('thumbnail');
        $thumbnail->storeAs('public/thumbnails', $thumbnail->hashName());

        //create speaker
        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_published' => $request->is_published,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'price' => $request->price,
            'speaker_id' => $request->speaker_id,
            'moderator_id' => $request->moderator_id,
            'event_category_id' => $request->event_category_id,
            'thumbnail' => $thumbnail->hashName()
        ]);
        
        //redirect to index
        return redirect()->route('event')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_published' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
            'speaker_id' => 'required',
            'moderator_id' => 'required',
            'event_category_id' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'is_published.required' => 'Status wajib diisi',
            'location.required' => 'Lokasi wajib diisi',
            'date.required' => 'Tanggal wajib diisi',
            'time.required' => 'Waktu wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'speaker_id.required' => 'Speaker wajib diisi',
            'moderator_id.required' => 'Moderator wajib diisi',
            'event_category_id.required' => 'Kategori Event wajib diisi',
        ]);

        //get event by ID
        $event = Event::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('thumbnail')) {

            //upload new image
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/thumbnails', $thumbnail->hashName());

            //delete old thumbnail
            Storage::delete('public/thumbnails/' . $event->thumbnail);

            //update event with new image
            $event->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_published' => $request->is_published,
                'location' => $request->location,
                'date' => $request->date,
                'time' => $request->time,
                'price' => $request->price,
                'thumbnail' => $thumbnail->hashName(),
                'speaker_id' => $request->speaker_id,
                'moderator_id' => $request->moderator_id,
                'event_category_id' => $request->event_category_id
            ]);
        } else {
            //update event without image
            $event->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_published' => $request->is_published,
                'location' => $request->location,
                'date' => $request->date,
                'time' => $request->time,
                'price' => $request->price,
                'speaker_id' => $request->speaker_id,
                'moderator_id' => $request->moderator_id,
                'event_category_id' => $request->event_category_id
            ]);
        }

        //redirect to index
        return redirect()->route('event')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->participants()->exists()) {
            // Jika terdapat event yang terkait, kembalikan dengan pesan notifikasi
            return redirect()->route('event')->with(['error' => 'Tidak dapat menghapus event karena terdapat peserta yang terkait.']);
        }
        //delete image
        Storage::delete('public/thumbnails/' . $event->thumbnail);

        //delete moderator
        $event->delete();

        //redirect to index
        return redirect()->route('event')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
