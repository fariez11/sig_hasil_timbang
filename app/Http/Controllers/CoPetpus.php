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

class CoPetpus extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{
            
            return view('/ppusk/home');
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

    public function dtastunting()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $sesp = Session::get('pusk');
            $idt = tbadanumur::getId();
            $data = DB::SELECT("select*from tb_umur where PUSK_ID = '$sesp'");
            return view('/ppusk/dt_stunting',['idt'=>$idt,'data'=>$data]);

        }
    }

    public function addstunting(Request $request)
    {
        $pusk = Session::get('pusk');
        $id = $request->ids;
        $sp = $request->spen;
        $pe = $request->pend;
        $ti = $request->ting;
        $no = $request->norm;
        $tg = date('Y-m-d');

     
       $data = new tbadanumur();
        if($id == null){
            $data->TB_ID = 1;
        }else{
            $data->TB_ID = $id;
        }
        $data->PUSK_ID = $pusk;
        $data->S_PENDEK = $sp;
        $data->PENDEK = $pe;
        $data->TINGGI = $ti;
        $data->NORMAL = $no;
        $data->TGL = $tg;
        $data->save();

        return redirect('datastunting')->with('addpeng','.');
    }

    public function updstunting(Request $request,$id)
    {
        $sp = $request->spen;
        $pe = $request->pend;
        $ti = $request->ting;
        $no = $request->norm;

            $data = DB::table('tb_umur')->where('TB_ID',$id)->update(['S_PENDEK'=>$sp,'PENDEK'=>$pe,'TINGGI'=>$ti,'NORMAL'=>$no]);
        
        return redirect('datastunting')->with('updpeng','.');
    }

    public function delstunting($id)
    {
        DB::table('tb_umur')->where('TB_ID',$id)->delete();

        return redirect('datastunting')->with('delpeng','.');
    }

    public function dtaweight()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $sesp = Session::get('pusk');
            $idb = bbadanumur::getId();
            $data = DB::SELECT("select*from bb_umur where PUSK_ID = '$sesp'");
            return view('/ppusk/dt_weight',['idb'=>$idb,'data'=>$data]);

        }
    }

    public function addweight(Request $request)
    {
        $pusk = Session::get('pusk');
        $id = $request->idb;
        $bs = $request->bbs;
        $bk = $request->bbk;
        $bl = $request->bbl;
        $bn = $request->bbn;
        $tg = date('Y-m-d');

     
       $data = new bbadanumur();
        if($id == null){
            $data->BB_ID = 1;
        }else{
            $data->BB_ID = $id;
        }
        $data->PUSK_ID = $pusk;
        $data->BERAT_S = $bs;
        $data->BERAT_K = $bk;
        $data->BERAT_L = $bl;
        $data->NORMAL = $bn;
        $data->TGL = $tg;
        $data->save();

        return redirect('dataweight')->with('addpeng','.');
    }

    public function updweight(Request $request,$id)
    {
        $bs = $request->bbs;
        $bk = $request->bbk;
        $bl = $request->bbl;
        $bn = $request->bbn;

            $data = DB::table('bb_umur')->where('BB_ID',$id)->update(['BERAT_S'=>$bs,'BERAT_K'=>$bk,'BERAT_L'=>$bl,'NORMAL'=>$bn]);
        
        return redirect('dataweight')->with('updpeng','.');
    }

    public function delweight($id)
    {
        DB::table('bb_umur')->where('BB_ID',$id)->delete();

        return redirect('dataweight')->with('delpeng','.');
    }

    public function dtawasting()
    {   
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            $sesp = Session::get('pusk');
            $idb = bbadantinggi::getId();
            $data = DB::SELECT("select*from bb_tinggi where PUSK_ID = '$sesp'");
            return view('/ppusk/dt_wasting',['idb'=>$idb,'data'=>$data]);

        }
    }

    public function addwasting(Request $request)
    {
        $pusk = Session::get('pusk');
        $id = $request->idb;
        $gs = $request->gzs;
        $gk = $request->gzb;
        $gb = $request->gbl;
        $gl = $request->gzl;
        $ob = $request->obs;
        $gn = $request->gzn;
        $tg = date('Y-m-d');

     
       $data = new bbadantinggi();
        if($id == null){
            $data->BT_ID = 1;
        }else{
            $data->BT_ID = $id;
        }
        $data->PUSK_ID = $pusk;
        $data->G_BURUKA = $gs;
        $data->G_BURUKB = $gk;
        $data->G_BLEBIH = $gb;
        $data->G_LEBIH = $gl;
        $data->OBESITAS = $ob;
        $data->NORMAL = $gn;
        $data->TGL = $tg;
        $data->save();

        return redirect('datawasting')->with('addpeng','.');
    }

    public function updwasting(Request $request,$id)
    {
        $gs = $request->gzs;
        $gk = $request->gzb;
        $gb = $request->gbl;
        $gl = $request->gzl;
        $ob = $request->obs;
        $gn = $request->gzn;

        $data = DB::table('bb_tinggi')->where('BT_ID',$id)->update(['G_BURUKA'=>$gs,'G_BURUKB'=>$gk,'G_BLEBIH'=>$gb,'G_LEBIH'=>$gl,'OBESITAS'=>$ob,'NORMAL'=>$gn]);
        
        return redirect('datawasting')->with('updpeng','.');
    }

    public function delwasting($id)
    {
        DB::table('bb_tinggi')->where('BT_ID',$id)->delete();

        return redirect('datawasting')->with('delpeng','.');
    }
}
