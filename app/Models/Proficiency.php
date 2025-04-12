<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'proficiencies';

    protected $guarded = [];

    public $timestamps = false;

    public function klass(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Klass::class);
    }
}
