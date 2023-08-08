<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientInformation extends Model
{
    protected $fillable = [

        'first_name','last_name','patient_dob','gender','phone_no','email'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
