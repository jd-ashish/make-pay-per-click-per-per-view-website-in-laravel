<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Newsletter extends Model
{
    protected $table = "newsletter";


    public static function trun(){
        DB::table('newsletter')->truncate();
    }
    public static function deleteData($id){
        DB::table('newsletter')->where('id', '=', $id)->delete();
    }
}
