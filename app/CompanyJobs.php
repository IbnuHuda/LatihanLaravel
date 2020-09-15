<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobs extends Model
{
    protected $table = 'company_jobs';

    protected $fillable = ['company_id', 'jobs_name', 'available_positions', 'jobs_requirements', 'minimum_portofolio', 'vendor_accepted_total', 'jobs_expired', 'other'];

    public function companyProfile()
    {
		return $this->belongsTo(CompanyProfile::class);
    }
}
