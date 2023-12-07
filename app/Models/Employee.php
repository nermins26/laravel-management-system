<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'practice_id'
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
