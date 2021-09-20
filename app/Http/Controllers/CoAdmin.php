<?php

namespace App\Http\Controllers;

use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Authenticate;
use DB;
use App\pengguna;
use App\kecamatan;
use App\puskesmas;

class CoAdmin extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{
            
            return view('/admin/home');
        }

    }
    
    public function dtapeng()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $idp = pengguna::getId();
            $data = DB::SELECT("select*from pengguna order by PENG_ID ASC");
            $kec = DB::SELECT("select*from kecamatan a, puskesmas b where a.KEC_ID = b.KEC_ID and a.HAPUS = 0 group by a.KEC_ID");
            $pus = DB::SELECT("select*from puskesmas where HAPUS = 0");
            return view('/admin/dt_pengguna',['idp'=>$idp,'data'=>$data,'kec'=>$kec,'pus'=>$pus]);

        }
    }
    
    public function kecAjax($id){
        if($id==0){
            $pusk = puskesmas::all();
        }else{  
            $pusk = puskesmas::where('KEC_ID','=',$id)->where('HAPUS','=','0')->get();
        }
        return $pusk;
    }

    public function addpeng(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $fo = $request->foto;
        $ke = $request->kec;
        $pu = $request->pus;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

       $data = new pengguna();
        if($id == null){
            $data->PENG_ID = 1;
        }else{
            $data->PENG_ID = $id;
        }

        if($le == 'Operator Kecamatan'){

            $data->KEC_ID = $ke;

        }else if($le == 'Petugas Puskesmas'){

            $data->KEC_ID = $ke;
            $data->PUSK_ID = $pu;

        }else{
            
        }

        $data->NAMA = ucfirst($na);
        $data->EMAIL = $em;
        $data->USERNAME = $us;
        $data->PASSWORD = $pa;
        $data->LEVEL = $le;
        $data->FOTO = $foto;
        $data->save();

        return redirect('datapengguna')->with('addpeng','.');

    }

    public function edpeng($id)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $kec = DB::SELECT("select*from kecamatan a, puskesmas b where a.KEC_ID = b.KEC_ID and a.HAPUS = 0 group by a.KEC_ID");
            $pus = DB::SELECT("select*from puskesmas where HAPUS = 0");
            $data = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            return view('/admin/ed_pengguna',['kec'=>$kec,'pus'=>$pus,'data'=>$data]);

        }
    }

    public function updpeng(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $ke = $request->kec;
        $pu = $request->pus;

        if($request->file('foto')==null){

            if($le == 'Operator Kecamatan'){

                 $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>$ke,'PUSK_ID'=>null]);

            }else if($le == 'Petugas Puskesmas'){

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>$ke,'PUSK_ID'=>$pu]);

            }else{

                $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>null,'PUSK_ID'=>null]);
            }

        }else{

            $gam = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            foreach ($gam as $key) {
               if($key->FOTO == 'defaultprofile.png'){

                }else{
                    $image_path = "assets/foto/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $photo_path=$request->file('foto');
                $m_path=$photo_path->getClientOriginalName();
                $photo_path->move('assets/foto/',$m_path);

                if($le == 'Operator Kecamatan'){

                     $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>$ke,'PUSK_ID'=>null,'FOTO'=>"$m_path"]);

                }else if($le == 'Petugas Puskesmas'){

                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>$ke,'PUSK_ID'=>$pu,'FOTO'=>"$m_path"]);

                }else{

                    $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'KEC_ID'=>null,'PUSK_ID'=>null,'FOTO'=>"$m_path"]);
                }

        }
        
        return redirect('datapengguna')->with('updpeng','.');
    }

    public function delpeng($id)
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $gam = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            foreach ($gam as $key) {
                   if($key->FOTO == 'defaultprofile.png'){

                    }else{
                        $image_path = "assets/foto/$key->FOTO";
                        if(File::exists($image_path)) {
                        File::delete($image_path);
                        }
                    }
                }
            DB::table('pengguna')->where('PENG_ID',$id)->delete();

            return redirect('datapengguna')->with('delpeng','.');
        }
    }

    public function dtakec()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from kecamatan where HAPUS = 0");
            return view('/admin/dt_kec',['data'=>$data]);

        }
    }

    public function crekec()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $idk = kecamatan::getId();
            return view('/admin/add_kec',['idk'=>$idk]);

        }
    }

    public function addkec(Request $request)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $id = $request->idk;
            $na = $request->nama;
            $ko = $request->koor;

         
           $data = new kecamatan();
            if($id == null){
                $data->KEC_ID = 1;
            }else{
                $data->KEC_ID = $id;
            }
            $data->KEC = ucfirst($na);
            $data->KOORDINAT = $ko;
            $data->save();

            return redirect('datakecamatan')->with('addpeng','.');
        }
    }

    public function edkec($id){

        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from kecamatan where KEC_ID = '$id'");
            return view('/admin/ed_kec',['data'=>$data]);

        }
    }

    public function updkec(Request $request,$id)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $na = $request->nama;
            $ko = $request->koor;

            if($ko == null){

                $data = DB::table('kecamatan')->where('KEC_ID',$id)->update(['KEC'=>ucfirst($na)]);

            }else{

                $data = DB::table('kecamatan')->where('KEC_ID',$id)->update(['KEC'=>ucfirst($na),'KOORDINAT'=>$ko]);

            }
            
            return redirect('datakecamatan')->with('updpeng','.');
        }
    }

    public function delkec($id)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            // DB::table('kecamatan')->where('KEC_ID',$id)->delete();
            $data = DB::table('kecamatan')->where('KEC_ID',$id)->update(['HAPUS'=>'1']);
            return redirect('datakecamatan')->with('delpeng','.');

        }
    }

    public function dtapus()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $idp = puskesmas::getId();
            $kec = DB::SELECT("select*from kecamatan where HAPUS = 0");
            $data = DB::SELECT("select*from kecamatan a, puskesmas b where a.KEC_ID = b.KEC_ID and a.HAPUS = 0 and b.HAPUS = 0");
            return view('/admin/dt_puskesmas',['idp'=>$idp,'data'=>$data,'kec'=>$kec]);

        }
    }

    public function edpus($id)
    {

        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $kec = DB::SELECT("select*from kecamatan whetre HAPUS = 0");
            $data = DB::SELECT("select*from puskesmas where PUSK_ID = '$id'");

            return view('/admin/ed_puskesmas',['data'=>$data,'kec'=>$kec]);
        }
    }

    public function addpus(Request $request)
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $id = $request->idp;
            $ke = $request->kec;
            $na = $request->nama;
            $lo = $request->long;
            $la = $request->lati;

         
           $data = new puskesmas();
            if($id == null){
                $data->PUSK_ID = 1;
            }else{
                $data->PUSK_ID = $id;
            }
            $data->KEC_ID = $ke;
            $data->PUSKESMAS = ucfirst($na);
            $data->LONGITUDE = $lo;
            $data->LATITUDE = $la;
            $data->save();

            return redirect('datapuskesmas')->with('addpeng','.');

        }
    }

    public function updpus(Request $request,$id)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $ke = $request->kec;
            $na = $request->nama;
            $lo = $request->long;
            $la = $request->lati;


            $data = DB::table('puskesmas')->where('PUSK_ID',$id)->update(['KEC_ID'=>$ke,'PUSKESMAS'=>ucfirst($na),'LONGITUDE'=>$lo,'LATITUDE'=>$la]);
            
            return redirect('datapuskesmas')->with('updpeng','.');
        }
    }

    public function delpus($id)
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $data = DB::table('puskesmas')->where('PUSK_ID',$id)->update(['HAPUS'=>'1']);

            return redirect('datapuskesmas')->with('delpeng','.');

        }
    }

    public function dtasuwkec(Request $request)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $cbper =  $request->per;
            $cbbln =  $request->bulan;
            if($cbbln == null){
                $cbbln = date('m');
            }else{
                $cbbln =  $request->bulan;
            }

            $cbthn =  $request->tahun;
            $bulan = date('m');
            $tahun = DB::SELECT("SELECT YEAR(TGL) as tahun FROM tb_umur GROUP BY tahun");


            if($cbper == null){
                
                $data = DB::SELECT("
                    SELECT a.KEC_ID,a.KEC,
                        ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                        ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                        ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                        SUM(c.NORMAL) as ANORMAL,

                        ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                        ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                        ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                        SUM(d.NORMAL) as BNORMAL,

                        ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                        ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                        ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                        ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                        ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                        SUM(e.NORMAL) as CNORMAL 
                    FROM kecamatan a, puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                    WHERE a.KEC_ID = b.KEC_ID 
                    AND b.PUSK_ID = c.PUSK_ID 
                    AND b.PUSK_ID = d.PUSK_ID 
                    AND b.PUSK_ID = e.PUSK_ID
                    AND MONTH(c.TGL) = '$bulan'
                    AND MONTH(d.TGL) = '$bulan'
                    AND MONTH(e.TGL) = '$bulan'
                    AND a.HAPUS = 0 AND b.HAPUS = 0 
                    GROUP BY a.KEC_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)
                ");

            }else{

                if($cbper == 'Bulan'){

                    $data = DB::SELECT("
                        SELECT a.KEC_ID,a.KEC,
                            ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                            ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                            ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                            SUM(c.NORMAL) as ANORMAL,

                            ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                            ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                            ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                            SUM(d.NORMAL) as BNORMAL,

                            ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                            ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                            ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                            ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                            ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                            SUM(e.NORMAL) as CNORMAL 
                        FROM kecamatan a, puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                        WHERE a.KEC_ID = b.KEC_ID 
                        AND b.PUSK_ID = c.PUSK_ID 
                        AND b.PUSK_ID = d.PUSK_ID 
                        AND b.PUSK_ID = e.PUSK_ID
                        AND MONTH(c.TGL) = '$cbbln'
                        AND MONTH(d.TGL) = '$cbbln'
                        AND MONTH(e.TGL) = '$cbbln'
                        AND YEAR(c.TGL) = '$cbthn'
                        AND YEAR(d.TGL) = '$cbthn'
                        AND YEAR(e.TGL) = '$cbthn'
                        AND a.HAPUS = 0 AND b.HAPUS = 0 
                        GROUP BY a.KEC_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)
                    ");

                }else{

                    $data = DB::SELECT("
                        SELECT a.KEC_ID,a.KEC,
                            ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                            ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                            ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                            SUM(c.NORMAL) as ANORMAL,

                            ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                            ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                            ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                            SUM(d.NORMAL) as BNORMAL,

                            ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                            ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                            ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                            ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                            ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                            SUM(e.NORMAL) as CNORMAL 
                        FROM kecamatan a, puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                        WHERE a.KEC_ID = b.KEC_ID 
                        AND b.PUSK_ID = c.PUSK_ID 
                        AND b.PUSK_ID = d.PUSK_ID 
                        AND b.PUSK_ID = e.PUSK_ID
                        AND YEAR(c.TGL) = '$cbthn'
                        AND YEAR(d.TGL) = '$cbthn'
                        AND YEAR(e.TGL) = '$cbthn'
                        AND a.HAPUS = 0 AND b.HAPUS = 0 
                        GROUP BY a.KEC_ID, YEAR(c.TGL), YEAR(d.TGL), YEAR(e.TGL)
                    ");

                }


            }
            return view('/admin/dt_suwkec',['data'=>$data,'tahun'=>$tahun,'bulan'=>$bulan,'cbbln'=>$cbbln]);

        }
    }

    public function dtasuwpus(Request $request)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $cbper =  $request->per;
            $cbbln =  $request->bulan;
            if($cbbln == null){
                $cbbln = date('m');
            }else{
                $cbbln =  $request->bulan;
            }

            $cbthn =  $request->tahun;
            $bulan =  date('m');
            $tahun = DB::SELECT("SELECT YEAR(TGL) as tahun FROM tb_umur GROUP BY tahun");

            if($cbper == null){

                $data = DB::SELECT("SELECT b.PUSKESMAS,
                        ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                        ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                        ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                        SUM(c.NORMAL) as ANORMAL,

                        ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                        ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                        ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                        SUM(d.NORMAL) as BNORMAL,

                        ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                        ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                        ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                        ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                        ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                        SUM(e.NORMAL) as CNORMAL 
                    FROM puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                    WHERE b.PUSK_ID = c.PUSK_ID 
                    AND b.PUSK_ID = d.PUSK_ID 
                    AND b.PUSK_ID = e.PUSK_ID
                    AND MONTH(c.TGL) = '$bulan'
                    AND MONTH(d.TGL) = '$bulan'
                    AND MONTH(e.TGL) = '$bulan'
                    AND b.HAPUS = 0 
                    GROUP BY b.PUSK_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)");
            }else{

                if($cbper == 'Bulan'){

                    $data = DB::SELECT("SELECT b.PUSKESMAS,
                        ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                        ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                        ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                        SUM(c.NORMAL) as ANORMAL,

                        ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                        ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                        ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                        SUM(d.NORMAL) as BNORMAL,

                        ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                        ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                        ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                        ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                        ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                        SUM(e.NORMAL) as CNORMAL 
                    FROM puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                    WHERE b.PUSK_ID = c.PUSK_ID 
                    AND b.PUSK_ID = d.PUSK_ID 
                    AND b.PUSK_ID = e.PUSK_ID
                    AND MONTH(c.TGL) = '$cbbln'
                    AND MONTH(d.TGL) = '$cbbln'
                    AND MONTH(e.TGL) = '$cbbln'
                    AND YEAR(c.TGL) = '$cbthn'
                    AND YEAR(d.TGL) = '$cbthn'
                    AND YEAR(e.TGL) = '$cbthn'
                    AND b.HAPUS = 0 
                    GROUP BY b.PUSK_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)");

                }else{

                    $data = DB::SELECT("SELECT b.PUSKESMAS,
                        ROUND(SUM(c.S_PENDEK)/SUM(c.NORMAL) * 100,2) AS S_PENDEK, 
                        ROUND(SUM(c.PENDEK)/SUM(c.NORMAL) * 100,2) AS PENDEK, 
                        ROUND(SUM(c.TINGGI)/SUM(c.NORMAL) * 100,2) AS TINGGI, 
                        SUM(c.NORMAL) as ANORMAL,

                        ROUND(SUM(d.BERAT_S)/SUM(d.NORMAL) * 100,2) AS BERAT_S, 
                        ROUND(SUM(d.BERAT_K)/SUM(d.NORMAL) * 100,2) AS BERAT_K, 
                        ROUND(SUM(d.BERAT_L)/SUM(d.NORMAL) * 100,2) AS BERAT_L, 
                        SUM(d.NORMAL) as BNORMAL,

                        ROUND(SUM(e.G_BURUKA)/SUM(e.NORMAL) * 100,2) AS G_BURUKA, 
                        ROUND(SUM(e.G_BURUKB)/SUM(e.NORMAL) * 100,2) AS G_BURUKB, 
                        ROUND(SUM(e.G_BLEBIH)/SUM(e.NORMAL) * 100,2) AS G_BLEBIH, 
                        ROUND(SUM(e.G_LEBIH)/SUM(e.NORMAL) * 100,2) AS G_LEBIH, 
                        ROUND(SUM(e.OBESITAS)/SUM(e.NORMAL) * 100,2) AS OBESITAS, 
                        SUM(e.NORMAL) as CNORMAL 
                    FROM puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                    WHERE b.PUSK_ID = c.PUSK_ID 
                    AND b.PUSK_ID = d.PUSK_ID 
                    AND b.PUSK_ID = e.PUSK_ID
                    AND YEAR(c.TGL) = '$cbthn'
                    AND YEAR(d.TGL) = '$cbthn'
                    AND YEAR(e.TGL) = '$cbthn'
                    AND b.HAPUS = 0 
                    GROUP BY b.PUSK_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)");

                }
            }

            return view('/admin/dt_suwpus',['data'=>$data,'tahun'=>$tahun,'bulan'=>$bulan,'cbbln'=>$cbbln]);
        }
    }

}
