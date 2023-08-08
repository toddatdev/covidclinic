<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityReportInfo extends Model
{
    protected $fillable = [
        'facility_director','facility_address','facility_phone','facility_clia','facility_ordering_provider','status',
    ];


    public function report()
    {
        return $this->belongsTo(FacilityReportInfo::class);
    }

}
