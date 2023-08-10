<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    use HasFactory;

    public function images(): HasMany
    {
        return $this->hasMany(images::class);
    }
}
