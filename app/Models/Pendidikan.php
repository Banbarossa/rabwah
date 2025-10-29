<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendidikan extends Model
{
    /** @use HasFactory<\Database\Factories\PendidikanFactory> */
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $guarded = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
