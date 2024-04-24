<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){

        $events = Event::limit(5)->get();
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


}
