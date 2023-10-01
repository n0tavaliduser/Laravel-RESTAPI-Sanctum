<?php

namespace App\Traits;

trait BlameableTrait
{
    protected static function bootCreatedUpdatedByTrait()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });

        static::saving(function ($model) {
            $model->updated_by = auth()->id();
        });
    }
}
