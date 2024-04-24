<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\ParticipantStatus;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(){
        $participants = Participant::latest()->paginate();
        $participantStatus = ParticipantStatus::all();

        return view('pages.participant.index', [
        'title' => 'Peserta',
        'participants' => $participants,
        'participantStatus' => $participantStatus
        ]);
    }

    public function update(Request $request)
    {
        $participant = Participant::find($request->id);
        $participant->update([
            'status_id' => $request->status
        ]);

        return redirect()->route('participant')->with(['success' => 'Peserta atas nama ' . $participant->user->name . ' berhasil diubah menjadi ' . $participant->participantStatus->status]);
    }
}
