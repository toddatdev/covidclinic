<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportResult extends Model
{
    protected $fillable = [

        'lgg', 'lgg_result',
        'lgm','lgm_result',
        'flua','flua_result',
        'flub', 'flub_result',
        'flusars','flusars_result',
        'result_report'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
