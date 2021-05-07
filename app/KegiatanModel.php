<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    protected $table = "tkegiatan";
    protected $primaryKey = "id_kegiatan";
    public $timestamps = false;
}
