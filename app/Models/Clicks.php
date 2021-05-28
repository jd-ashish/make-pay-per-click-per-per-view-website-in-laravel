<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clicks extends Model
{
    use HasFactory;
    protected $table = "clicks";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public static function deleteData($id){
        DB::table('clicks')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('clicks')->where('user_id', '=', $uid)->delete();
    }
}
