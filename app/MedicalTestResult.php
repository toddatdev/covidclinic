<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class MedicalTestResult extends Model
{
    protected $fillable = [
      'user_id',
      'test_name_id',
      'test_possibility_id',
      'patient_id',
      'facility_test_collection_id',
      'specimen_id',
      'status',
      'description',
    ];



    public function user(){

       return $this->belongsTo(User::class);

    }

    public function testName(){

       return $this->belongsTo(TestName::class);

    }

    public function testPossibilities(){

        return $this->hasMany(TestPossibility::class);

    }

}
