<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use Response;
use Hash;
use DB;
use App\User;
use App\DataModel;
use App\KegiatanModel;
use App\SlideShowModel;
use App\DataKeputusanModel;

class DataController extends Controller
{
    public function index($search = FALSE){
        if($search == "LOL"){
            $jenis_doc = 0;
        }elseif($search == "LOA"){
            $jenis_doc = 1;
        }elseif($search == "MOU"){
            $jenis_doc = 2;
        }

        if($search == TRUE){
            $i = DataModel::where("status_data", 1)->where("jenis_doc", $jenis_doc)->orderBy("id_data", "desc")->get();
        }else{
            $i = DataModel::where("status_data", 1)->orderBy("id_data", "desc")->get();
        }
        $data = [];
        foreach($i as $key => $v){
            $data[$key] = $v;
            $data[$key]->kegiatan = KegiatanModel::where("id_data", $v->id_data)->where("status_kegiatan", 1)->get();
        }
        $lol = array();
        $loa = array();
        $mou = array();
        $tahun = array();

        $arrchart = array();
        $arrtingkatkerjasama = array();
        $arrpie = array();
        $arrgabung = array();

        $tahunkurang = date('Y', strtotime('- 5 year', strtotime(date("Y"))));
        $tahunsekarang = date("Y");

        $datagroub = DataModel::where("status_data", 1)
        ->select('tahun_tanda_tangan', DB::raw('count(jenis_doc) as total') )
        ->groupBy('tahun_tanda_tangan')
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->get();
        $dataisi = DataModel::where("status_data", 1)
        ->select('tahun_tanda_tangan', DB::raw('count(jenis_doc) as total'), 'jenis_doc' )
        ->groupBy('tahun_tanda_tangan',  "jenis_doc")
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->get();
        

        $datalol = DataModel::where("status_data", 1)
        ->where("jenis_doc", 0)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();


        $dataloa = DataModel::where("status_data", 1)
        ->where("jenis_doc", 1)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();

        $datamou = DataModel::where("status_data", 1)
        ->where("jenis_doc", 2)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();

        array_push($arrpie, array('Kerjasama', 'Nilai Per 5 tahun terahir')); 
        if($search != "LOL" && $search != "LOA" && $search != "MOU") :
            array_push($arrpie, ["LOL", $datalol]);
            array_push($arrpie, ["LOA", $dataloa]);
            array_push($arrpie, ["MOU", $datamou]);
        endif;
        // return $datagroub;
        if($search != "LOL" && $search != "LOA" && $search != "MOU") :
            array_push($arrchart, array('Tahun', 'LOL', 'LOA', 'MOU')); 
        else:
            if($search == "LOL") :
                array_push($arrchart, array('Tahun', 'LOL')); 
            elseif($search == "LOA") :  
                array_push($arrchart, array('Tahun', 'MOU')); 
            elseif($search == "MOU") :
                array_push($arrchart, array('Tahun', 'LOA')); 
            endif;
        endif;
        
        array_push($arrtingkatkerjasama, array('Tahun', 'Internasional', 'Nasional', 'Lokal')); 
        
        $total = 0;
        $flol = 0;
        $floa = 0;
        $fmou = 0;
        foreach($datagroub as $vgroub){
            $flol = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(jenis_doc) as total'), 'jenis_doc' )
                    ->where("jenis_doc", 0)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();
                    
            $floa = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(jenis_doc) as total'), 'jenis_doc' )
                    ->where("jenis_doc", 1)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();
                    
            $fmou = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(jenis_doc) as total'), 'jenis_doc' )
                    ->where("jenis_doc", 2)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();


            $tk_internasional = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(tingkatan_kerja) as total'), 'tingkatan_kerja' )
                    ->where("tingkatan_kerja", 0)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();
                    
            $tk_nasional = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(tingkatan_kerja) as total'), 'tingkatan_kerja' )
                    ->where("tingkatan_kerja", 1)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();
                    
            $tk_lokal = DataModel::where("status_data", 1)
                    ->select('tahun_tanda_tangan', DB::raw('count(tingkatan_kerja) as total'), 'tingkatan_kerja' )
                    ->where("tingkatan_kerja", 2)
                    ->where("tahun_tanda_tangan", $vgroub->tahun_tanda_tangan)
                    ->count();
            
                    
            if($search != "LOL" && $search != "LOA" && $search != "MOU") :
                array_push($arrchart, array("$vgroub->tahun_tanda_tangan", (int) $flol, (int) $floa, (int) $fmou));
            else:
                if($search == "LOL") :
                    array_push($arrchart, array("$vgroub->tahun_tanda_tangan", (int) $flol));
                elseif($search == "LOA") :  
                    array_push($arrchart, array("$vgroub->tahun_tanda_tangan", (int) $floa));
                elseif($search == "MOU") :
                    array_push($arrchart, array("$vgroub->tahun_tanda_tangan", (int) $fmou));
                endif;
            endif;
            
            if($search == "LOL") :
                array_push($arrpie, ["$vgroub->tahun_tanda_tangan", $flol]);
            elseif($search == "LOA") :  
                array_push($arrpie, ["$vgroub->tahun_tanda_tangan", $floa]);
            elseif($search == "MOU") :
                array_push($arrpie, ["$vgroub->tahun_tanda_tangan", $fmou]);
            endif;
            
            array_push($arrtingkatkerjasama, array("$vgroub->tahun_tanda_tangan", (int) $tk_internasional, (int) $tk_nasional, (int) $tk_lokal));
            
        }

        $datainternasional = DataModel::where("status_data", 1)
        ->where("tingkatan_kerja", 0)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();


        $datanasional = DataModel::where("status_data", 1)
        ->where("tingkatan_kerja", 1)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();

        $datalokal = DataModel::where("status_data", 1)
        ->where("tingkatan_kerja", 2)
        ->whereBetween('tahun_tanda_tangan', [$tahunkurang, $tahunsekarang])
        ->count();

        $tingkatan_kerja = array();

        array_push($tingkatan_kerja, array('Tingkatan Kerja', 'Nilai Per 5 tahun terahir')); 
        array_push($tingkatan_kerja, ["Internasional", $datainternasional]);
        array_push($tingkatan_kerja, ["Nasional", $datanasional]);
        array_push($tingkatan_kerja, ["Lokal", $datalokal]);
        // return $tingkatan_kerja;
        $kondisi = DataKeputusanModel::find(1);
        // return $i;
        return view("page.index", compact("i", "arrchart", "arrpie", 'tingkatan_kerja', 'arrtingkatkerjasama', 'kondisi', 'search'));
    }

    public function kegiatanIndex($id){
        $cid = base64_decode($id);
        $i = DataModel::find($cid);
        $i->kegiatan = KegiatanModel::where("id_data", $i->id_data)->orderBy("id_kegiatan", "desc")->get();
        return view("page.kegiatan", compact("i"));
    }

    public function vLogin(){
        $auth = Auth::check();
        if($auth){
            return redirect("/dashboard");
        }
        return view("page.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:8'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->level == 0){
                return redirect("/dashboard");
            }
            return redirect("/");
        }else{
            return redirect("/login")->with('error', 'Periksa Email dan Password Anda Kembali');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect("/");
    }

    public function dashboard($id_user = FALSE, $kondisi_data = FALSE){
        $id = Auth::user()->id;
        $cid = base64_decode($id_user);
        $i = DataModel::where("id_user", $id)->orderBy("id_data", "desc")->get();
        $v = KegiatanModel::where("id_user", $id)->orderBy("id_kegiatan", "desc")->get();
        $data = [];
        foreach($v as $key => $va){
            $data[$key] = $va;
            $data[$key]->isidata = DataModel::find($va->id_data);
        } 
        $user = Auth::user();
        if($user->level == 0){
            $kondisi = DataKeputusanModel::find(1);
            if($kondisi_data == TRUE){
                $i = DataModel::where("id_user", $cid)->orderBy("id_data", "desc")->get();
                $v = KegiatanModel::where("id_user", $cid)->orderBy("id_kegiatan", "desc")->get();
                $data = [];
                foreach($v as $key => $va){
                    $data[$key] = $va;
                    $data[$key]->isidata = DataModel::find($va->id_data);
                } 
            }else{
                $i = SlideShowModel::orderBy("id_slide", "desc")->get();
                $v = User::where("level", "!=", 0)->orderBy("id", "desc")->get();
                $vdata = [];
                foreach($v as $key => $va){
                    $vdata[$key] = $va;
                    $vdata[$key]->kerjasama = DataModel::where("id_user", $va->id)->count();
                    $vdata[$key]->kegiatan = KegiatanModel::where("id_user", $va->id)->count();
                }
                $kondisi_data = "default";
            }
            return view('page.dashboard', compact('i', 'v', 'kondisi', 'kondisi_data'));
        }elseif($user->level == 1){
            return view('page.dashboard', compact('i', 'v'));
        }
        // return $v;
        
    }

    public function keputusanKerjasama(Request $r, $id){
        $cid = base64_decode($id);
        $i = DataKeputusanModel::find($cid);
        $i->kondisi = $r->kondisi;
        $i->update();
        return back();
    }

    public function donwloadKerjasama($id){
        $cid = base64_decode($id);
        $kondisi = DataKeputusanModel::find(1);
        if($kondisi->kondisi == 0){
            $i = DataModel::find($cid);
            $file= public_path(). "/data_file/".$i->file_data;
            return Response::download($file);
        }else{
            return redirect('/login');
        }
    }

    public function data(Request $r, $kondisi = FALSE, $id = FALSE){
        $skondisi = "save";
        $cid = base64_decode($id);
        $i = [];
        if($kondisi == "save"){
            $r->validate([
                'jenis_doc' => 'required',
                'no_doc' => 'required',
                'no_doc_1' => 'required',
                'mitra' => 'required',
                'tingkatan_kerja' => 'required',
                'bentuk_kerjasama' => 'required',
                'file_data' => 'required',
                'status_data' => 'required'
            ]);
            $file = $r->file('file_data');
            $ext = $file->getClientOriginalExtension();
            $namafile = Str::random(17).".$ext";
            $i = new DataModel();
            $i->id_user = Auth::user()->id;
            $i->jenis_doc = $r->jenis_doc;
            $i->no_doc = $r->no_doc;
            $i->no_doc_1 = $r->no_doc_1;
            $i->mitra = $r->mitra;
            $i->tingkatan_kerja = $r->tingkatan_kerja;
            $i->bentuk_kerjasama = $r->bentuk_kerjasama;
            $i->tahun_tanda_tangan = $r->tahun_tanda_tangan;
            $i->tahun_berakhir  = $r->tahun_akhir;
            // $i->level_file  = $r->level_file;
            $i->file_data = $namafile;
            $i->status_data = $r->status_data;
           
            $i->save();
            $tujuan_upload = 'data_file/';
            $file->move($tujuan_upload,$namafile);
            return back()->with("sukses", "data berhasil disimpan");
        }elseif($kondisi == "show"){
            $i = DataModel::find($cid);
            $skondisi = "update";
        }elseif($kondisi == "show-delete"){
            $i = DataModel::find($cid);
            $skondisi = "delete";
        }elseif($kondisi == "download"){
            $i = DataModel::find($cid);
            $file= public_path(). "/data_file/".$i->file_data;
            return Response::download($file);
        }elseif($kondisi == "update"){
            $r->validate([
                'no_doc' => 'required',
                'no_doc_1' => 'required',
                'mitra' => 'required',
                'masa_berlaku' => 'required',
                'tingkatan_kerja' => 'required',
                'bentuk_kerjasama' => 'required',
                'status_data' => 'required'
            ]);
            $file = $r->file('file_data');
            
            
            $i = DataModel::find($cid);
            $i->no_doc = $r->no_doc;
            $i->no_doc_1 = $r->no_doc_1;
            $i->mitra = $r->mitra;
            $i->masa_berlaku = $r->masa_berlaku;
            $i->tingkatan_kerja = $r->tingkatan_kerja;
            $i->bentuk_kerjasama = $r->bentuk_kerjasama;
            if($r->file_data != ""){
                $ext = $file->getClientOriginalExtension();
                $namafile = Str::random(17).".$ext";
                $i->file_data = namafile;
            }
            $i->status_data = $r->status_data;
            $i->update();
            $tujuan_upload = 'data_file/';
            if($r->file_data != ""){
                $file->move($tujuan_upload,$namafile);
            }
           
            return redirect("/dashboard");
        }elseif($kondisi == "delete"){
            $i = DataModel::find($cid);
            $i->delete();
            return redirect("/dashboard");
        }
        return view('page.insert', compact("skondisi", 'i', 'id'));
    }
    
    public function kegiatan(Request $r, $kondisi = FALSE, $id = FALSE){
        $cid = base64_decode($id);
        $skondisi = "save";
        $i = [];
        if($kondisi == "save"){
            $r->validate([
                'id_data' => 'required',
                'judul' => 'required',
                'waktu_durasi' => 'required',
                'status_kegiatan' => 'required',
                'manfaat' => 'required',
                'bukti_kegiatan' => 'required'

            ]);
            $i = new KegiatanModel();
            $i->id_data = $r->no_document;
            $i->judul = $r->judul;
            $i->waktu_durasi = $r->waktu_durasi;
            $i->manfaat = $r->manfaat;
            $i->bukti_kegiatan = $r->bukti_kegiatan;
            $i->ruang_lingkup = $r->ruang_lingkup;
            $i->lainnya = $r->lainnya;
            $i->id_user = Auth::user()->id;
            $i->status_kegiatan = $r->status_kegiatan;
            $i->save();
            return back()->with("sukses", "data berhasil disimpan");
        }elseif($kondisi == "show"){
            $i = KegiatanModel::find($cid);
            $skondisi = "update";
        }elseif($kondisi == "show-delete"){
            $i = KegiatanModel::find($cid);
            $skondisi = "delete";
        }elseif($kondisi == "update"){
            $r->validate([
                'judul' => 'required',
                'waktu_durasi' => 'required',
                'manfaat' => 'required',
                'status_kegiatan' => 'required',
                'bukti_kegiatan' => 'required'
            ]);
            $i = KegiatanModel::find($cid);
            $i->judul = $r->judul;
            $i->waktu_durasi = $r->waktu_durasi;
            $i->manfaat = $r->manfaat;
            $i->ruang_lingkup = $r->ruang_lingkup;
            $i->status_kegiatan = $r->status_kegiatan;
            $i->bukti_kegiatan = $r->bukti_kegiatan;
            $i->update();
            return redirect("/dashboard");
        }elseif($kondisi == "delete"){
            $i = KegiatanModel::find($cid);
            $i->delete();
            return redirect("/dashboard");
        }
        $v = DataModel::orderBy("no_doc", "asc")->get();
        $vv = DataModel::orderBy("no_doc", "asc")->select("mitra")->groupBy("mitra")->get();
        $data = [];
        foreach($v as $key => $va){
            $data[$key] = $va;
            $data[$key]->kegiatan = KegiatanModel::where("id_data", $va->id_data)->first();
        } 
        // return $vv;
        return view('page.insertkegiatan', compact("skondisi", "i", "v", "id", "vv"));
    }
    public function upAkun(Request $r){
        $r->validate([
            'name' => 'required|min:5'
        ]);
        $id = Auth::user()->id;
        $i = User::find($id);
        $i->name = $r->name;
        if($r->password != "") {
            $r->validate([
                'password' => 'required|min:8'
            ]);
            $i->password = Hash::make($r->password);
        }
        $i->update();
        return back()->with("sukses", "Password berhasil diupdate");
    }
    public function search_level($id){
        $i = DataModel::where("mitra", "LIKE", "%".$id."%")->orderBy("id_data", "desc")->get();
        return $i;
    }
}
