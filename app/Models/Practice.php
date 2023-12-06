<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
       'name',
       'email',
       'website_url'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function fieldsOfPractice()
    {
        return $this->belongsToMany(FieldOfPractice::class, 'practice_field');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
