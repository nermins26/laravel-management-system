<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends BaseModel
{
    use HasFactory;

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
