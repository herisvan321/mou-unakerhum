<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    protected $table = "tdata";
    protected $primaryKey = "id_data";
    public $timestamps = false;
}
