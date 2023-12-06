<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class FieldOfPractice extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'name'
    ];

    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'practice_field');
    }
}
