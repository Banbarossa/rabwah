<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $guarded=[];
    public function program(){
        return $this->belongsTo(Program::class);
    }
    public function donor(){
        return $this->belongsTo(Donor::class);
    }

    public function notifications(){
        return $this->hasMany(MidtranNotification::class);
    }
}
