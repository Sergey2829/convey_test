<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = ['plan_name', 'price', 'features'];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
