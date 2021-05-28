<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transaction";

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public static function deleteData($id){
        DB::table('transaction')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('transaction')->where('user_id', '=', $uid)->delete();
    }
}
