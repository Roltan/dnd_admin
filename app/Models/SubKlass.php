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

    public function skills(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Skill::class, 'caster', 'table', 'caster_id');
    }
}
