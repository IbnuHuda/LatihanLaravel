<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    protected $table = 'profile_company';
    protected $fillable = ['name', 'work_field', 'date_of_built', 'company_logo', 'contact', 'bio'];

    public function userCompany()
    {
    	return $this->belongsTo(UserCompany::class);
    }
}
