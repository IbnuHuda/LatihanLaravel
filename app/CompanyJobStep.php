<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobStep extends Model
{
    protected $table = 'company_job_step';

    protected $fillable = ['company_job_id', 'step_name', 'user_id_accepted', 'inweb_message_to_vendor'];

    public function companyJob()
    {
		return $this->belongsTo(CompanyJobs::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id_accepted', 'id');
    }
}
