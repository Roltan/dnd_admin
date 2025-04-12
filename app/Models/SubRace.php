<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRace extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'sub_races';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'abilities_bonus' => 'array',
    ];

    public function race(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Skill::class, 'caster', 'table', 'caster_id');
    }
}
