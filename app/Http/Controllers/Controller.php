<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Authenticate;
use DB;
use App\pengguna;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $data = DB::SELECT("SELECT *, c.NORMAL as ANORMAL, d.NORMAL as BNORMAL, e.NORMAL as CNORMAL FROM kecamatan a, puskesmas b, tb_umur c, bb_umur d, bb_tinggi e WHERE a.KEC_ID = b.KEC_ID AND b.PUSK_ID = c.PUSK_ID AND b.PUSK_ID = d.PUSK_ID AND b.PUSK_ID = e.PUSK_ID");

        return view('/home',['data'=>$data]);

    }



    public function perkec(Request $request)
    {   
        $cbper =  $request->per;
        $cbbln =  $request->bulan;
        if($cbbln == null){
            $cbbln = date('m');
        }else{
            $cbbln =  $request->bulan;
        }

        $cbthn =  $request->tahun;
        $bulan =  date('m');
        $tahun =  DB::SELECT("SELECT YEAR(TGL) as tahun FROM tb_umur GROUP BY tahun");


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

        return view('/dataperkec',['data'=>$data,'tahun'=>$tahun,'bulan'=>$bulan,'cbbln'=>$cbbln]);
    }


    public function perpus(Request $request)
    {   
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

        return view('/dataperpus',['data'=>$data,'tahun'=>$tahun,'bulan'=>$bulan,'cbbln'=>$cbbln]);
    }
    

    public function kec()
    {
        $bulan = date('m');

        $datapeta = DB::SELECT("
            SELECT a.KEC,a.KOORDINAT,
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
            GROUP BY a.KEC_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)");

            foreach ($datapeta as $key => $val) {
                $data['kec']['lahan'][$key] = [
                    'kecamatan' => $val->KEC,
                    'aa1' => $val->S_PENDEK,
                    'aa2' => $val->PENDEK,
                    'aa3' => $val->TINGGI,
                    'aa4' => $val->ANORMAL,
                    'bb1' => $val->BERAT_S,
                    'bb2' => $val->BERAT_K,
                    'bb3' => $val->BERAT_L,
                    'bb4' => $val->BNORMAL,
                    'cc1' => $val->G_BURUKA,
                    'cc2' => $val->G_BURUKB,
                    'cc3' => $val->G_BLEBIH,
                    'cc4' => $val->G_LEBIH,
                    'cc5' => $val->OBESITAS,
                    'cc6' => $val->CNORMAL,
                    'polygon' => $val->KOORDINAT
                ];
            }

            return $data;

    }

    public function pus()
    {
        $bulan = date('m');
        $data = DB::SELECT("SELECT *,
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
            AND b.HAPUS = 0 
            GROUP BY b.PUSK_ID, MONTH(c.TGL), MONTH(d.TGL), MONTH(e.TGL)");

        return view('/mappus',['data'=>$data]);

    }

    public function login()
    {
        $data = DB::SELECT("select*from pengguna");

        return view('/login',['data'=>$data]);

    }

    public function register(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

       $data = new pengguna();
            $data->PENG_ID = $id;
            $data->NAMA = ucfirst($na);
            $data->EMAIL = $em;
            $data->USERNAME = $us;
            $data->PASSWORD = $pa;
            $data->LEVEL = 'Admin';
            $data->FOTO = $foto;
            $data->save();

        return redirect('/')->with('addpeng','.');

    }

    public function actlog(Request $request){
        $username = $request->user;
        $password = $request->pass;
        
        Session::flush();
        $data = DB::table('pengguna')->where([['USERNAME',$username],['PASSWORD',$password]])->get();
        foreach ($data as $key) {
            $nama = $key->USERNAME;
            $level = $key->LEVEL;
        };

        if (count($data) == 0){
            return redirect('/login')->with('gagal','.');
        }else{

            if($level == 'Admin') {
                $na = DB::SELECT("select*from pengguna where USERNAME like '$username'");
                foreach ($na as $nam) {
                    Session::put('nama',$username);
                    Session::put('akun',$nam->PENG_ID);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
                    Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/admin');
            }
            else if($level == 'Petugas Dinkes') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("select*from pengguna where USERNAME like '$username'");
                foreach ($na as $nam) {
                    Session::put('akun',$nam->PENG_ID);
                    Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
                    Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/admin');

            }else if($level == 'Operator Kecamatan') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("select*from pengguna a, kecamatan b where a.KEC_ID = b.KEC_ID and a.USERNAME like '$username'");
                foreach ($na as $nam) {
                    Session::put('ikec',$nam->KEC_ID);
                    Session::put('nkec',$nam->KEC);
                    Session::put('akun',$nam->PENG_ID);
                    Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
                    Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/operator');

            }else if($level == 'Petugas Puskesmas') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("select*from pengguna a, kecamatan b, puskesmas c where a.KEC_ID = b.KEC_ID and a.PUSK_ID = c.PUSK_ID and  a.USERNAME like '$username'");
                foreach ($na as $nam) {
                    Session::put('pusk',$nam->PUSK_ID);
                    Session::put('npus',$nam->PUSKESMAS);
                    Session::put('kec',$nam->KEC);
                    Session::put('akun',$nam->PENG_ID);
                    Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
                    Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/petpuskesmas');

            }
            else {

            return redirect('/login')->with('error','.');
            }
        }

    }

    public function logout(){

        Session::flush();
        return redirect('/');
    }
}
