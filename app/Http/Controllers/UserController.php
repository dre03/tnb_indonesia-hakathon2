<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->latest()->paginate();
        return view('pages.user.index', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    public function profile()
    {
        return view('pages.profile.index', [
            'title' => 'Profile'
        ]);
    }

    public function updateProfile(Request $request)
    {
        //validate form
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'username' => ['required', 'unique:users,username,' . auth()->id()],
                'brith_date' => 'required',
                'brith_place' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'profile' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'phone_number.required' => 'No Telpon wajib diisi',
                'username.required' => 'Username wajib diisi',
                'brith_date.required' => 'Tanggal lahir Kelamin wajib diisi',
                'brith_place.required' => 'Temat Lahir wajib diisi',
                'gender.required' => 'Jenis Kelamin wajib diisi',
                'address.required' => 'Alamat wajib diisi',
            ]
        );
        
        //get user by ID
        $user = Auth::user();

        //check if image is uploaded
        if ($request->hasFile('profile')) {

            //upload new image
            $profile = $request->file('profile');
            $profile->storeAs('public/users', $profile->hashName());

            //delete old profile
            Storage::delete('public/users/' . $user->profile);

            //update user with new image
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'brith_date' => $request->brith_date,
                'brith_place' => $request->brith_place,
                'gender' => $request->gender,
                'address' => $request->address,
                'profile' => $profile->hashName(),
            ]);
        } else {

            //update user without image
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'brith_date' => $request->brith_date,
                'brith_place' => $request->brith_place,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
        }

        //redirect to index
        return redirect()->route('profile')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
