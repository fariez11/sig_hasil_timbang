<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class bbadantinggi extends Model
{
    protected $table = 'bb_tinggi';
    protected $fillable = [
        'BT_ID', 'PUSK_ID','G_BURUKA','G_BURUKB', 'G_BLEBIH','G_LEBIH','OBESITAS','NORMAL','TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('bb_tinggi')->orderBy('BT_ID','DESC')->take(1)->get();
    }
}
