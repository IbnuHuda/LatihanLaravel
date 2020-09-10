<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profile';

    protected $fillable = ['user_company_id', 'name', 'work_field', 'date_of_built', 'company_address', 'company_logo', 'contact_number', 'contact_email', 'company_description'];
}
