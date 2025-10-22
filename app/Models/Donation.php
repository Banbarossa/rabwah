<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'donor_name',
        'donor_email',
        'donation_type',
        'amount',
        'status',
        'snap_token',
    ];
}