<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatisticCompany extends Model
{
    protected $table = 'statistic_company';

    protected $fillable = ['user_company_id', 'job_published_amount', 'users_accepted_amount', 'users_active_on_jobs'];
}
