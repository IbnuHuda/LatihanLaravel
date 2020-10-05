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

    public function createTeam(Request $request, $id = null) {
        $data = TeamProfile::where('id' , '=' , Auth::user()->team_id)->first();

        if (Auth::user()->team_id != null) 
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-error', 'You already in team. Cannot create or join team'));

        else if ($data != null && $data->name == $request->name) 
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-error', 'Team name already taken. Try again!'));

        else {

            if ($request->hasFile('photo')) {
                $validate = $request->validate(['photo' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG']);

                $photo = $request->photo->getClientOriginalName();
                
                if ($data != null && $data->photo != null) unlink(public_path('storage') . '/images/team/' . $data->photo);

                $request->photo->storeAs('public/images/team/', Auth::user()->id . "_" . $photo);

                TeamProfile::updateOrCreate(
                    ['id' => $id],
                    ['photo' => Auth::user()->id . "_" . $photo]
                );
            }

            $team = TeamProfile::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request->name,
                    'address' => $request->address,
                    'bio' => $request->bio,
                    'owner' => Auth::user()->name,
                    'access_code' => Str::random(10),
                ]
            );

            User::where('id', '=', Auth::user()->id)->update(['team_id' => $team->id]);

            return redirect()->route('usersDashboard')->with(session()->flash('alert-success', 'Team created!'));
        }
    }

    public function profileTeamForm() {

        if (Auth::user()->team_id == null) {
            return "Not Joined Yet";
        }
        else {
            $data = TeamProfile::where('id' , '=' , Auth::user()->team_id)->first();
            $total = User::where('team_id' , '=' , $data->id)->get();
            $i = 0;
            foreach ($total as $tot){
                $i++;
            }

            return view('pages.vendor.team.profile', compact('data', 'i', 'total'));
        }
    }

    public function joinTeam(Request $request) {
        $access_code = $request->team_join;

        $data = TeamProfile::where('access_code', '=', $access_code)->first();

        if ($data != null) {
            MailController::sendRequestJoinTeam($data->id, $data->user->email, Auth::user()->id, Auth::user()->name);
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-success', 'Your request is processed by team leader!'));
        }
        else
            return redirect()->route('usersCreateTeam')->with(session()->flash('alert-danger', 'Team access code is not found!'));
    }

    public function joinedTeam(Request $request) {
        $data = User::where('id', '=', $request->id)->first();

        if ($data != null) $data->update(['team_id' => $request->team_id]);

        return redirect()->route('usersDashboard')->with(session()->flash('alert-success', 'You joined team!'));
    }

}
