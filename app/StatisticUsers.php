<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatisticUsers extends Model
{
    protected $table = 'statistic_users';

    protected $fillable = ['user_id', 'portofolio_sent_amount', 'job_registered_amount', 'rating_granted'];
}
