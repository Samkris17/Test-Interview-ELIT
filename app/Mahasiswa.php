<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    protected $fillable = ['namaMahasiswa','nimMahasiswa','angkatanMahasiswa','judulskripsiMahasiswa','pembimbing1','pembimbing2', 'gambarMahasiswa', 'ijazahMahasiswa'];
}
