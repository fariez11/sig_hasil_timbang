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

class CoDinkes extends Controller
{
     public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{
            
            return view('/dinkes/home');
        }

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

        return redirect('ddatapengguna')->with('addpeng','.');

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
        
        return redirect('ddatapengguna')->with('updpeng','.');
    }

    public function delpeng($id)
    {
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

        return redirect('ddatapengguna')->with('delpeng','.');
    }
}
