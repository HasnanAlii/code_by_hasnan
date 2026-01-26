<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'foto',
        'id_projek'
    ];

    public function projek()
    {
        return $this->belongsTo(projek::class, 'id_projek');
    }

}
