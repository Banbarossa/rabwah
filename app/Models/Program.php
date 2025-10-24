<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;
    use Sluggable;

    protected $guarded = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',

            ]
        ];
    }
    public function category(){
        return $this->belongsTo(CategoryProgram::class,'category_program_id');
    }
    public function donations(){
        return $this->hasMany(Donation::class);
    }
}
