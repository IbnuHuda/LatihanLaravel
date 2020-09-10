<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobStep extends Model
{
    protected $table = 'company_job_step';

    protected $fillable = ['company_job_id', 'step_name', 'user_id_accepted', 'inweb_message_to_vendor'];
}
