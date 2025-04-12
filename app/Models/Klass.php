<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Klass extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'klass';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'save_stat'=>'array',
        'equipment'=>'array',
    ];

    public function abilities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Ability::class);
    }

    public function subKlass(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(SubKlass::class);
    }

    public function units(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(Unit::class);
    }

    public function proficiencies(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Proficiency::class);
    }

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Skill::class, 'caster', 'table', 'caster_id');
    }
}
