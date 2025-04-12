<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlass extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'sub_klasses';

    protected $guarded = [];

    public $timestamps = false;

    public function klass(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Klass::class);
    }

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Skill::class, 'caster');
    }

    public function units(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(KlassUnit::class);
    }
}
