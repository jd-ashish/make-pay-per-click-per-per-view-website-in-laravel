<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReferralCommission extends Model
{
    protected $table = "referral_commission";


    public static function trun(){
        DB::table('referral_commission')->truncate();
    }
    public static function deleteData($id){
        DB::table('referral_commission')->where('id', '=', $id)->delete();
    }
}
