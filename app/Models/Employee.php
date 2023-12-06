<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Employee extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone'
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
