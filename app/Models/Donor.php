<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use softDeletes;
    protected $guarded = [];
    public function donations(){
        return $this->hasMany(Donation::class);
    }
}
