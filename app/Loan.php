<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['loan_amount', 'loan_term', 'interest_rate'];
    public function repayment_schedules()
    {
        return $this->hasMany('App\Repayment_schedule');
    }
}
