<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pekerjaan extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'mahasiswa_id', 'pekerjaan', 'alamat', 'telepon'
    ];
    public function mahasiswa():BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
