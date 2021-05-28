<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserAdsViewStatus extends Model
{
    use HasFactory;
    protected $table = "user_ads_view_status";

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Ads()
    {
        return $this->belongsTo(Ads::class,'ads_id','id');
    }
    public static function deleteData($id){
        DB::table('user_ads_view_status')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('user_ads_view_status')->where('user_id', '=', $uid)->delete();
    }
}
