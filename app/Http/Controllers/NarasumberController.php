<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NarasumberController extends Controller
{
    public function index()
    {

        $speakers = Speaker::latest()->paginate(15);
        $moderators = Moderator::latest()->paginate(10);

        return view('pages.narasumber.index', [
            'title' => 'Narasumber',
            'speakers' => $speakers,
            'moderators' => $moderators,
        ]);
    }

    public function storeSpeaker(Request $request)
    {
        //validate form
        $request->validate([
            'nameSpeaker' => 'required',
            'positionSpeaker' => 'required',
            'genderSpeaker' => 'required',
            'profileSpeaker' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nameSpeaker.required' => 'Nama wajib diisi',
            'positionSpeaker.required' => 'Jabatan wajib diisi',
            'genderSpeaker.required' => 'Jenis Kelamin wajib diisi',
            'profileSpeaker.required' => 'Profile Wajib diisi',
        ]);

        //upload image
        $profileSpeaker = $request->file('profileSpeaker');
        $profileSpeaker->storeAs('public/speakers', $profileSpeaker->hashName());

        //create speaker
        Speaker::create([
            'name' => $request->nameSpeaker,
            'position' => $request->positionSpeaker,
            'gender' => $request->genderSpeaker,
            'profile' => $profileSpeaker->hashName(),
        ]);

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function updateSpeaker(Request $request, $id)
    {
        //validate form
        $request->validate(
            [
                'nameSpeaker' => 'required',
                'positionSpeaker' => 'required',
                'genderSpeaker' => 'required',
                'profileSpeaker' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nameSpeaker.required' => 'Nama wajib diisi',
                'positionSpeaker.required' => 'Jabatan wajib diisi',
                'genderSpeaker.required' => 'Jenis Kelamin wajib diisi',
            ]
        );

        //get speaker by ID
        $speaker = Speaker::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('profileSpeaker')) {

            //upload new image
            $profileSpeaker = $request->file('profileSpeaker');
            $profileSpeaker->storeAs('public/speakers', $profileSpeaker->hashName());

            //delete old profileSpeaker
            Storage::delete('public/speakers/' . $speaker->profileSpeaker);

            //update speaker with new image
            $speaker->update([
                'name' => $request->nameSpeaker,
                'position' => $request->positionSpeaker,
                'gender' => $request->genderSpeaker,
                'profile' => $profileSpeaker->hashName(),
            ]);
        } else {

            //update speaker without image
            $speaker->update([
                'name' => $request->nameSpeaker,
                'position' => $request->positionSpeaker,
                'gender' => $request->genderSpeaker,
            ]);
        }

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroySpeaker($id)
    {
        $speaker = Speaker::findOrFail($id);

        if ($speaker->events()->exists()) {
            // Jika terdapat event yang terkait, kembalikan dengan pesan notifikasi
            return redirect()->route('narasumber')->with(['error' => 'Tidak dapat menghapus pemateri karena terdapat event
        yang terkait.']);
        }
        //delete image
        Storage::delete('public/speakers/' . $speaker->profile);

        //delete speaker
        $speaker->delete();

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // CREATE MODERATOR
    public function storeModerator(Request $request)
    {
        //validate form
        $request->validate([
            'nameModerator' => 'required',
            'positionModerator' => 'required',
            'genderModerator' => 'required',
            'profileModerator' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nameModerator.required' => 'Nama wajib diisi',
            'positionModerator.required' => 'Jabatan wajib diisi',
            'genderModerator.required' => 'Jenis Kelamin wajib diisi',
            'profileModerator.required' => 'Profile Wajib diisi',
        ]);

        //upload image
        $profileModerator = $request->file('profileModerator');
        $profileModerator->storeAs('public/moderators', $profileModerator->hashName());

        //create Moderator
        Moderator::create([
            'name' => $request->nameModerator,
            'position' => $request->positionModerator,
            'gender' => $request->genderModerator,
            'profile' => $profileModerator->hashName(),
        ]);

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function updateModerator(Request $request, $id)
    {
        //validate form
        $request->validate(
            [
                'nameModerator' => 'required',
                'positionModerator' => 'required',
                'genderModerator' => 'required',
                'profileModerator' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nameModerator.required' => 'Nama wajib diisi',
                'positionModerator.required' => 'Jabatan wajib diisi',
                'genderModerator.required' => 'Jenis Kelamin wajib diisi',
            ]
        );

        //get Moderator by ID
        $moderator = Moderator::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('profileModerator')) {

            //upload new image
            $profileModerator = $request->file('profileModerator');
            $profileModerator->storeAs('public/Moderators', $profileModerator->hashName());

            //delete old profileModerator
            Storage::delete('public/moderators/' . $moderator->profileModerator);

            //update Moderator with new image
            $moderator->update([
                'name' => $request->nameModerator,
                'position' => $request->positionModerator,
                'gender' => $request->genderModerator,
                'profile' => $profileModerator->hashName(),
            ]);
        } else {

            //update Moderator without image
            $moderator->update([
                'name' => $request->nameModerator,
                'position' => $request->positionModerator,
                'gender' => $request->genderModerator,
            ]);
        }

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroyModerator($id)
    {
        $moderator = Moderator::findOrFail($id);

        if ($moderator->events()->exists()) {
            // Jika terdapat event yang terkait, kembalikan dengan pesan notifikasi
            return redirect()->route('narasumber')->with(['error' => 'Tidak dapat menghapus pemateri karena terdapat event
        yang terkait.']);
        }
        //delete image
        Storage::delete('public/moderators/' . $moderator->profile);

        //delete moderator
        $moderator->delete();

        //redirect to index
        return redirect()->route('narasumber')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
