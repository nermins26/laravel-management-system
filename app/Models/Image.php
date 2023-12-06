<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Image extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'url',
        'size',
        'alt',
        'extension',
        'description'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
