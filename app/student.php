<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = "tb_siswa";
    protected $fillable = ['nama','kelas','jurusan'];
    public $timestamps = false;
}
