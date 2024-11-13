<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public const DURATION_TYPE_YEAR = 'year';
    public const DURATION_TYPE_MONTH = 'month';

    protected $fillable = [
        'amount',
        'interest_rate',
        'duration',
        'duration_type'
    ];
}
