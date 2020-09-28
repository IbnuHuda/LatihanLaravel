<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamProfile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\MailController;

class TeamProfileController extends Controller
{

    public function createTeamForm() {
        return view('pages.vendor.createTeam');
    }

    public function createTeam(Request $request) {

        $data = TeamProfile::where('id' , '=' , Auth::user()->team_id)->first();

        if ($data != null && $data->name == $request->name) {
            return "name has taken";
        }
        elseif ($data != null && $data->owner == Auth::user()->name) {
            return "you are already on the team";
        }
        else {
            if($file = $request->file('photo')){
                $photo = $file->getClientOriginalName();
                $file->storeAs('public/images/team/',$request->input('name') . "_" . $photo);
            }

            $upload_photo = $request->input('name') . "_" . $photo;

            TeamProfile::insert([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'bio' => $request->input('bio'),
                'owner' => Auth::user()->name,
                'access_code' => Str::random(10),
                'photo' => $upload_photo
            ]);


            $update_id = TeamProfile::where('name' , '=' , $request->name)->first();
            if ($update_id->owner == Auth::user()->name) {
                $update = User::where('id', '=', Auth::user()->id);
                $update->update([
                    'team_id' => $update_id->id
                ]);
            }

            return redirect()->route('usersProfileTeam');
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

            return view('pages.vendor.teamProfile', compact('data','i', 'total'));
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
