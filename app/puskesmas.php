<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class puskesmas extends Model
{
    protected $table = 'puskesmas';
    protected $fillable = [
        'PUSK_ID','KEC_ID','PUSKESMAS','LONGITUDE','LATITUDE'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('puskesmas')->orderBy('PUSK_ID','DESC')->take(1)->get();
    }
}
