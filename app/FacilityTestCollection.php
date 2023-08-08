<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityTestCollection extends Model
{
    protected $fillable = [

        'facility',
        'facility_director','facility_address','facility_phone','facility_clia','facility_ordering_provider',
        'specimen_id','test_name','test_device','test_date','test_time'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
