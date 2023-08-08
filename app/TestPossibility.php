<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPossibility extends Model
{
    protected $fillable = [
      'test_name_id',
      'name',
      'description',
      'suggestion',
    ];

    public function testName(){

        return $this->belongsTo(TestName::class,'test_name_id','id');

    }

    public function medicalTestResult(){

        return $this->belongsTo(MedicalTestResult::class);

    }
}
