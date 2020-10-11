<?php

namespace App\Http\Controllers;

use App\User;
use App\TeamProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;

class TeamProfileController extends Controller
{
    public function createTeamForm() {
        return view('pages.vendor.team.create');
    }

    public function createTeam(Request $request) {
        $data = TeamProfile::where('id' , '=' , Auth::user()->team_id)->first();

        if (Auth::user()->team_id != null)
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-error', 'You already in team. Cannot create or join team'));

        else if ($data != null && $data->name == $request->name)
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-error', 'Team name already taken. Try again!'));

        else {

            if ($request->hasFile('photo')) {
                // $validate = $request->validate(['photo' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG']);

                $photo = $request->photo->getClientOriginalName();

                if ($data != null && $data->photo != null) unlink(public_path('storage') . '/images/team/' . $data->photo);

                $request->photo->storeAs('public/images/team/', Auth::user()->id . "_" . $photo);
            }

            $team = TeamProfile::create(
                [
                    'photo' => Auth::user()->id . "_" . $photo,
                    'name' => $request->name,
                    'address' => $request->address,
                    'bio' => $request->bio,
                    'owner' => Auth::user()->name,
                    'access_code' => Str::random(10),
                ]
            );

            User::where('id', '=', Auth::user()->id)->update(['team_id' => $team->id]);

            return redirect()->route('usersProfileTeam')->with(session()->flash('alert-success', 'Team created!'));
        }
    }

    public function profileTeamForm() {

        if (Auth::user()->team_id == null) {
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-danger', "You're not in team. Please create or join team."));
        }
        else {
            $data = TeamProfile::where('id' , '=' , Auth::user()->team_id)->first();
            $total = User::where('team_id' , '=' , $data->id)->orderBy('id', 'desc')->get();
            $i = 0;
            foreach ($total as $tot) $i++;

            return view('pages.vendor.team.profile', compact('data', 'i', 'total'));
        }
    }

    public function joinTeam(Request $request) {
        $access_code = $request->team_join;

        $data = TeamProfile::where('access_code', '=', $access_code)->first();

        if ($data != null) {
            MailController::sendRequestJoinTeam($data->id, $data->users[0]->email, Auth::user()->id, Auth::user()->name);
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-success', 'Your request is processed by team leader!'));
        }
        else
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-danger', 'Team access code is not found!'));
    }

    public function joinedTeam(Request $request) {
        $data = User::where('id', '=', $request->id)->first();

        $data->team_id = $request->team_id;
        $data->save();

        return redirect()->route('usersDashboard')->with(session()->flash('alert-success', $data->name . ' joined team!'));
    }

}
