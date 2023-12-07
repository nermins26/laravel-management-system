<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Practice extends BaseModel
{
    use HasFactory;

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
        return $this->belongsToMany(FieldOfPractice::class, 'field_of_practice_practice');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
