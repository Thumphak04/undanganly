<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Template extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'detail_templates',
        'thumbnail',
        'preview_url',
        'demo_url',
        'price',
        'badge',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($template) {
            $template->slug = Str::slug($template->name);
        });

        static::updating(function ($template) {
            if ($template->isDirty('name')) {
                $template->slug = Str::slug($template->name);
            }
        });
    }
}