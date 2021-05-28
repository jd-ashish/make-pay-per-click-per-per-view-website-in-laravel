<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAccount extends Model
{
    use HasFactory;
    protected $table = "user_account";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public static function deleteData($id){
        DB::table('user_account')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('user_account')->where('user_id', '=', $uid)->delete();
    }
    public static function updateData($col,$data){
        DB::table('user_account')
          ->where('user_id', Auth::user()->id)
          ->update([$col=>$data]);
    }
    public function update_withdraw($amt)
    {
        DB::table('user_account')->where('user_id', '=', Auth::user()->id)->increment('withdraw',$amt);
    }
    public function update_withdraw_count($num)
    {
        DB::table('user_account')->where('user_id', '=', Auth::user()->id)->increment('withdraw_count',$num);
    }
}
