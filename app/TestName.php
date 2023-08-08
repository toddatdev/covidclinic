<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestName extends Model
{
    protected $fillable = [
        'test_name','information'
    ];

    public function testPossibilities()
    {
        return $this->hasMany(TestPossibility::class);
    }

    public function medicalTestResult()
    {
        return $this->hasMany(MedicalTestResult::class);
    }

}
