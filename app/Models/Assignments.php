<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Assignments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class)->orderBy('created_at', 'desc');
    }

    public function grade(): HasOne
    {
        return $this->hasOne(Grade::class);
    }
}
