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
use App\tbadanumur;
use App\bbadanumur;
use App\bbadantinggi;

class CoOperator extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{
            
            return view('/okec/home');
        }

    }


    public function updpet(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;

        if($request->file('foto')==null){
            
            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa]);
        
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

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'FOTO'=>"$m_path"]);
        }
        
        return redirect()->back();
    }

    public function dtahastim(Request $request)
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $ses = Session::get('ikec');
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
                
                $data = DB::SELECT("
                    SELECT a.KEC_ID,a.KEC,MONTHNAME(c.TGL) as bulan,
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
                    FROM kecamatan a,puskesmas b, tb_umur c, bb_umur d, bb_tinggi e 
                    WHERE b.KEC_ID = '$ses'
                    AND a.KEC_ID = b.KEC_ID
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
                        SELECT a.KEC_ID,a.KEC,MONTHNAME(c.TGL) as bulan,
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
                        WHERE b.KEC_ID = '$ses'
                        AND a.KEC_ID = b.KEC_ID
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
                        SELECT a.KEC_ID,a.KEC,MONTHNAME(c.TGL) as bulan,
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
                        WHERE a.KEC_ID = '$ses'
                        AND a.KEC_ID = b.KEC_ID
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
            return view('/okec/dt_hastim',['data'=>$data,'tahun'=>$tahun,'bulan'=>$bulan,'cbbln'=>$cbbln]);

        }
    }
}
