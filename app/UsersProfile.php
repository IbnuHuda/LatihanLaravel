<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    protected $table = 'users_profile';

    protected $fillable = ['user_id', 'user_company_id', 'gender', 'place_of_birth', 'date_of_birth', 'address', 'contact', 'photo', 'bio'];

    public function user()
    {
		return $this->belongsTo(User::class);
    }
}
