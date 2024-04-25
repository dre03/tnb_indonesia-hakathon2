<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countParticipant = Participant::with('participantStatus')->where('status_id', 3)->get()->count();
        $countEvent = Event::where('is_published', 1)->get()->count();
        $countPayment = Payment::where('status_id', 2)->get()->count();
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'countParticipant' => $countParticipant,
            'countEvent' => $countEvent,
            'countPayment' => $countPayment,
        ]);
    }
}
