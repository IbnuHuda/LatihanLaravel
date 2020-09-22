<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UsersProfile;
use Illuminate\Support\Facades\Storage;


class UsersProfileController extends Controller
{
    public function profileForm() {
        $data = User::select('users.name', 'users_profile.contact', 'users_profile.gender', 'users_profile.place_of_birth', 'users_profile.date_of_birth', 'users_profile.address', 'users_profile.photo', 'users_profile.bio')
            ->leftJoin('users_profile', 'users_profile.user_id', '=', 'users.id')
            ->first();

        return view('pages.vendor.profile', compact('data'));
    }

    public function editProfile(Request $request) {

        $name_data = User::where('id', '=', Auth::user()->id)->first();
        $data = UsersProfile::where('user_id', '=', Auth::user()->id);

        $name_data->update(['name' => $request->name]);

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $validate = $request->validate([
                    'photo' => 'mimes:png,jpg'
                    ]);

                $extension = $request->photo->extension();
                $request->photo->storeAs('public/images/users', $name_data->id . '_' . str_replace(' ', '_', $name_data->name) . '.' . $extension);

                $data->update([
                    'photo' => $name_data->id . '_' . str_replace(' ', '_', $name_data->name) . '.' . $extension
                ]);
            }
        }

        $data->update([
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'bio' => $request->bio,
            'contact' => $request->contact,
            'gender' => $request->gender,
        ]);

        return redirect()->route('usersProfile');
    }

    public function editProfileForm() {
        return view('pages.vendor.profile');
    }

    public function searchUsers($id) {

        $data = User::where('id','=',$id)->first();
        $pData = UsersProfile::where('user_id','=',$data->id)->first();

        return view('pages.vendor.viewProfile', compact('data', 'pData'));
    }
}
