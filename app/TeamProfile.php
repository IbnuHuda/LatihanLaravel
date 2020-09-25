<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamProfile extends Model
{
    protected $table = 'users_team_profile';

    protected $fillable = ['name', 'owner', 'access_code', 'address', 'photo', 'bio'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function requestJoinTeam()
    {
    	return $this->hasMany(RequestJoinTeam::class);
    }
}
