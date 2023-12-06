<?php

namespace App\Traits;

trait UsesUuid
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
}