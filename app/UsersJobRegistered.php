<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersJobRegistered extends Model
{
    protected $table = 'users_job_registered';

    protected $fillable = ['user_id', 'team_id', 'company_job_id', 'users_description', 'portofolio_uploaded', 'salary', 'score', 'other_question'];

    public function companyJob()
    {
        return $this->belongsTo(CompanyJobs::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function teamProfile()
    {
        return $this->belongsTo(TeamProfile::class, 'team_id', 'id');
    }    
}
