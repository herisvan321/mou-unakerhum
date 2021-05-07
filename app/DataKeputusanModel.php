<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeputusanModel extends Model
{
    protected $table = "data_keputusan";
    protected $primaryKey = "id_keputusan";
    public $timestamps = false;
}
