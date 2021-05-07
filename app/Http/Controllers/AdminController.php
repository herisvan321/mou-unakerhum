<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use Response;
use Hash;
use App\User;
use App\SlideShowModel;
use App\DataModel;
use App\KegiatanModel;

class AdminController extends Controller
{
    public function index(){
        return ;
    }
    public function dataUser(Request $r, $kondisi = FALSE, $id = FALSE){
        $user = Auth::user();
        $cid = base64_decode($id);
        if($user->level != 0){
            Auth::logout();
            return redirect("login")->with('error', 'Anda bukan admin');
        }
        $i = array();
        $skondisi = "save";
        if($kondisi == "save"){
            $r->validate([
                'name' => 'required|min:5',
                'username' => 'required|min:5',
                'email' => 'required|min:5|unique:users',
                'password' => 'required|min:8'
            ]);
            $i = new User();
            $i->name = $r->name;
            $i->email = $r->email;
            $i->username = str_replace(' ', '', $r->username);
            $i->password = Hash::make($r->password);
            $i->level = 1;
            $i->save();
            return back()->with("sukses", "data berhasil disimpan");;
        }elseif($kondisi == "show"){
            $i = User::find($cid);
            $skondisi = "update";        
        }elseif($kondisi == "show-delete"){
            $i = User::find($cid);
            $skondisi = "delete";
        }elseif($kondisi == "update"){
            $r->validate([
                'name' => 'required|min:5'
            ]);
            $i = User::find($cid);
            $i->name = $r->name;
            if($r->password != "") {
                $r->validate([
                    'password' => 'required|min:8'
                ]);
                $i->password = Hash::make($r->password);
            }
            $i->update();
            return redirect("/dashboard");
        }elseif($kondisi == "delete"){
            $i = User::find($cid);
            $i->delete();
            return redirect("/dashboard");
        }
        return view("page.akunbaru", compact("skondisi", "i", "id"));
    }
    public function slideShow(Request $r, $kondisi = FALSE, $id = FALSE){
        $user = Auth::user();
        $cid = base64_decode($id);
        $cekdata = SlideShowModel::all();
        $i = array();
        if($user->level != 0){
            Auth::logout();
            return redirect("login")->with('error', 'Anda bukan admin');
        }
        $skondisi = "save";
        if($kondisi == "save"){
            if(@count($cekdata) >= 3){
                return redirect("/dashboard");
            }
            $r->validate([
                'title' => 'required|'
            ]);
            $file = $r->file('file_data');
            $ext = $file->getClientOriginalExtension();
            $namafile = Str::random(17).".$ext";

            $i = new SlideShowModel();
            $i->title = $r->title;
            $i->file = $namafile;
            $i->save();
            $tujuan_upload = 'slideshow/';
            $file->move($tujuan_upload,$namafile);
            return redirect("/dashboard");
        }elseif($kondisi == "show"){
            $i = SlideShowModel::find($cid);  
            $skondisi = "update";      
        }elseif($kondisi == "show-delete"){
            $i = SlideShowModel::find($cid);
            $skondisi = "delete";
        }elseif($kondisi == "update"){
            // $r->validate([
            //     'name' => 'required|min:5'
            // ]);
            $i = SlideShowModel::find($cid);
            $i->name = $r->name;
            $i->file = $namafile;
            $i->update();
            $tujuan_upload = 'slideshow/';
            $file->move($tujuan_upload,$namafile);
            return redirect("/dashboard");
        }elseif($kondisi == "delete"){
            $i = SlideShowModel::find($cid);
            $target = "slideshow/".$i->file;
            if(file_exists($target)){
                unlink($target);
            }
            $i->delete();
            return redirect("/dashboard");
        }
        return view("page.slideshow", compact("skondisi", "i", "id", "cekdata"));
    }
}
