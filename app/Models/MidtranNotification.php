<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MidtranNotification extends Model
{
    protected $guarded = [];
    public function donation(){
        return $this->belongsTo(Donation::class);
    }
}
