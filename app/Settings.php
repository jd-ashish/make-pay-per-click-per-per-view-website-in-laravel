<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Settings extends Model
{
    protected $table = "settings";

    public static function updateData($col,$data){
        DB::table('settings')
          ->where('var', $col)
          ->update(['val'=>$data]);
      }
}
