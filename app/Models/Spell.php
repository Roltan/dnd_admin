<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'spells';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'materials'=>'array',
    ];

    public function klass(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Klass::class, 'spell_klass', 'spell_id', 'klass_id');
    }

    public function subKlass(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(SubKlass::class, 'spell_klass', 'spell_id', 'sub_klass_id');
    }
}
