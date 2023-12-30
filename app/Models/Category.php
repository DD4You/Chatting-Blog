<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        parent::boot();

        self::creating(fn ($model) => $model->slug = Str::slug($model->name));

        self::updating(fn ($model) => $model->slug = Str::slug($model->name));
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
