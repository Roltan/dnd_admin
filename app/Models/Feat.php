<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feat extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'feats';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'condition'=>'array',
    ];
}
