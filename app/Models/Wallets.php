<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wallets extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public static function deleteData($id){
        DB::table('wallets')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('wallets')->where('user_id', '=', $uid)->delete();
    }
}
