<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UsersProfile;
use SebastianBergmann\Environment\Console;

class UsersProfileController extends Controller
{
    //
    public function profileForm() {
        $data = User::select('users.name', 'users_profile.contact', 'users_profile.gender', 'users_profile.place_of_birth', 'users_profile.date_of_birth', 'users_profile.address', 'users_profile.photo', 'users_profile.bio')
            ->join('users_profile', 'users_profile.user_id', '=', 'users.id')
            ->first();

        // $data = User::where('id','=',Auth::user()->id)->get();
        // $pData = UsersProfile::where('user_id','=',Auth::user()->id)->get();



        return view('pages.vendor.profile', compact('data'));
    }

    public function editProfile(Request $request) {

        $name_data = User::where('id', '=', Auth::user()->id);
        $data = UsersProfile::where('user_id', '=', Auth::user()->id);

        $name_data->update(['name' => $request->name]);
        $data->update([
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'bio' => $request->bio,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'photo' => $request->photo
        ]);

        return redirect()->route('usersProfile');
    }

    public function editProfileForm() {
        return view('pages.vendor.profile');
    }
}
