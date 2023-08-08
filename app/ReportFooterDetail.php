<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportFooterDetail extends Model
{
    protected $fillable = [
        'name', 'lic','npi','address','city', 'state', 'zip','email','phone',
    ];
}
