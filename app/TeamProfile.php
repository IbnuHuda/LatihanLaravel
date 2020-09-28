<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamProfile extends Model
{
    protected $table = 'users_team_profile';

    protected $fillable = ['name', 'owner', 'access_code', 'address', 'photo', 'bio'];

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
