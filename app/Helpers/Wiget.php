<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Str;
use Response;
use Hash;
use App\User;
use App\DataModel;
use App\KegiatanModel;
use App\SlideShowModel;
 
class Wiget {
    public static function countLOL() {
        $i = DataModel::where("jenis_doc", 0)->count();
        return $i;
    }
    public static function countLOA() {
        $i = DataModel::where("jenis_doc", 1)->count();
        return $i;
    }
    public static function countMOU() {
        $i = DataModel::where("jenis_doc", 2)->count();
        return $i;
    }
    public static function countKegiatan() {
        $i = KegiatanModel::count();
        return $i;
    }
    public static function dataSlideShow(){
        $i = SlideShowModel::orderBy("id_slide", "desc")->paginate(3);
        return $i;
    }
}