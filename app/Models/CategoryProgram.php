<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CategoryProgram extends Model
{
    use Sluggable;
    protected $guarded = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',

            ]
        ];
    }
    public function programs(){
        return $this->hasMany(Program::class);
    }
}
