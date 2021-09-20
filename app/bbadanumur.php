<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class bbadanumur extends Model
{
    protected $table = 'bb_umur';
    protected $fillable = [
        'BB_ID', 'PUSK_ID','BERAT_S','BERAT_K','BERAT_L','NORMAL','TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('bb_umur')->orderBy('BB_ID','DESC')->take(1)->get();
    }
}
