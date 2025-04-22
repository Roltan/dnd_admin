<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $connection = 'dnd_library';

    protected $table = 'races';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'lang' => 'array',
        'ideology' => 'array',
        'abilities_bonus' => 'array',
    ];

    public function subRace(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(SubRace::class);
    }

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Skill::class, 'caster');
    }
}
