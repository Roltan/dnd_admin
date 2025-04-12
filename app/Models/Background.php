<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'backgrounds';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'equipment' => 'array',
    ];

    public function proficiencies(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Proficiency::class);
    }

    public function abilities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Ability::class);
    }

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Skill::class, 'caster');
    }
}
