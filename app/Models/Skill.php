<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $connection = 'dnd_library';

    protected $table = 'skills';

    protected $guarded = [];

    public $timestamps = false;

    public function caster(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'caster_type', 'caster_id');
    }
}
