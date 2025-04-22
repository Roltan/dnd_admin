<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlassUnit extends Model
{
    use HasFactory;

    protected $connection = 'dnd_library';

    protected $table = 'klass_units';

    protected $guarded = [];

    public $timestamps = false;

    public function klass(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Klass::class);
    }

    public function subKlass(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubKlass::class);
    }
}
