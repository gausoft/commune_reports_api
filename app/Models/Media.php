<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    protected $table = 'medias';
    
    use HasFactory;

    protected $fillable = [
        'path',
        'mime_type',
        'mediable_id',
        'mediable_type',
    ];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
