<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        parent::boot();

        self::creating(fn ($blog) => $blog->slug = Str::slug($blog->title));

        self::updating(fn ($blog) => $blog->slug = Str::slug($blog->title));
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query): void
    {
        $query->where('status', 'Published');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
