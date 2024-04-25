<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){

        $events = Event::orderBy('created_at', 'desc')->where('is_published', 1)->limit(5)->get();
        $speakers = Speaker::limit(4)->get();
        return view('landingPages.index', [
            'events' => $events,
            'speakers' => $speakers,
        ]);
    }

    public function detail($id){
        $event = Event::find($id);
        return view('landingPages.detailEvent', [
            'event' => $event
        ]);
    }

    public function daftarEvent(Request $request){
        $request->validate([
            'name' => 'required',
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
        ]);

        //redirect to index
        return redirect()->route('event')->with(['success' => 'Data Berhasil Disimpan!']);
    }


}
