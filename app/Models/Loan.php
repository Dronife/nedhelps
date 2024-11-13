<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public const DURATION_TYPE_YEAR = 'year';
    public const DURATION_TYPE_MONTH = 'month';

    protected $fillable = [
        'amount',
        'interest_rate',
        'duration',
        'duration_type'
    ];
}
