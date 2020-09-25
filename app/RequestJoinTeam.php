<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestJoinTeam extends Model
{
  	protected $table = 'request_join_team';

  	protected $fillable = ['user_id', 'team_id'];

  	public function users() 
  	{
  		return $this->belongsTo(User::class);
  	}

  	public function profileTeam() 
  	{
  		return $this->belongsTo(ProfileTeam::class);
  	}
}
