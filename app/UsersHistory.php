<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersHistory extends Model
{
    protected $table = 'users_history';

    protected $fillable = ['user_id', 'users_job_regis_id', 'job_name', 'publisher', 'job_description', 'portofolio_up_amount'];
}
