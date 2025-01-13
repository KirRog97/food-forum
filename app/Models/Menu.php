<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture_id',
        'description'
    ];

    protected $with = [
        'picture:id,path'
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function picture(): BelongsTo
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
