<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbilityBonus extends Model
{
    use HasFactory;

    protected $connection = 'dnd_library';

    protected $table = 'ability_bonuses';

    protected $guarded = [];

    public $timestamps = false;
}
