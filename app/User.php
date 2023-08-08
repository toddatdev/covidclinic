<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','is_admin', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function patientInformations()
    {
        return $this->hasMany(PatientInformation::class);
    }

    public function facilityTestCollection()
    {
        return $this->hasMany(FacilityTestCollection::class);
    }

    public function reportResult()
    {
        return $this->hasMany(ReportResult::class);
    }

    public function medicalTestResult()
    {
        return $this->hasMany(MedicalTestResult::class);
    }
}
