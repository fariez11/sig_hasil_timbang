<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tbadanumur extends Model
{
    protected $table = 'tb_umur';
    protected $fillable = [
        'TB_ID','PUSK_ID','S_PENDEK','PENDEK','TINGGI','NORMAL','TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('tb_umur')->orderBy('TB_ID','DESC')->take(1)->get();
    }
}
