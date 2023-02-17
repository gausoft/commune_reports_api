<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'status',
        'user_id'
    ];

    protected $casts = [
        'location' => 'array',
    ];

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
