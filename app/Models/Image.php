<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'alt',
        'description',
        'order',
        'type'
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        if (!$this->file_path) {
            return null;
        }

        return Storage::url($this->file_path);
    }

    public function scopeTattoos($query)
    {
        return $query->where('type', 'tattoo');
    }

    public function scopeSketches($query)
    {
        return $query->where('type', 'sketch');
    }
}
