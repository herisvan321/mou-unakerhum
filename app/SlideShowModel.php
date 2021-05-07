<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideShowModel extends Model
{
    protected $table = "slideshow";
    protected $primaryKey = "id_slide";
    public $timestamps = false;
}
