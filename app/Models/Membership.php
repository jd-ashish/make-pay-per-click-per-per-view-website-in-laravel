<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Membership extends Model
{
    use HasFactory;
    protected $table = "membership";
    public static function deleteData($id){
        DB::table('membership')->where('id', '=', $id)->delete();
    }
    
    
}
