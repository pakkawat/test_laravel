<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment_schedule extends Model
{
    protected $fillable = ['date'];
    public function loan()
    {
        return $this->belongsTo('App\Loan');
    }
}
