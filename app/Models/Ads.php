<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ads extends Model
{
    use HasFactory;
    public function UserAdsViewStatus()
    {
        return $this->hasMany(UserAdsViewStatus::class,'ads_id','id')->orderBy('created_at', 'desc');
    }
    public static function updateViews($id,$data){
        DB::table('ads')->where('id', '=', $id)->update($data);
    }
    public static function incrementViews($id){
        DB::table('ads')->where('id', '=', $id)->increment('views');
    }
    public static function deleteData($id){
        DB::table('ads')->where('id', '=', $id)->delete();
    }
    
}
