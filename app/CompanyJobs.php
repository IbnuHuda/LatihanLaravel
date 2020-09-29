<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobs extends Model
{
    protected $table = 'company_jobs';

    protected $fillable = ['user_company_id', 'jobs_name', 'available_positions', 'jobs_description', 'jobs_requirements', 'minimum_portofolio', 'vendor_accepted_total', 'jobs_expired', 'other'];

    public function userCompany()
    {
		return $this->belongsTo(UserCompany::class);
    }

    public function usersJobRegistered()
    {
    	return $this->hasMany(UsersJobRegistered::class);
    }
}
