<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Notificaton extends Model
{
    protected $table = "notificaton";


    public static function trun(){
        DB::table('notificaton')->truncate();
    }
    public static function deleteData($id){
        DB::table('notificaton')->where('id', '=', $id)->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public static function deleteUserData($uid){
        DB::table('notificaton')->where('user_id', '=', $uid)->delete();
    }
    public static function incrementViews($id){
        DB::table('notificaton')->where('id', '=', $id)->increment('view');
    }
    public static function NotificationViewAll(){
        DB::table('notificaton')->where('user_id', '=', Auth::user()->id)->where('view','=',0)->increment('view');
    }
}
