<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReferralUser extends Model
{
    use HasFactory;
    protected $table = "referral_user";


    public static function incressAmount($id,$amount){
        DB::table('referral_user')->where('id', '=', $id)->increment('amount',$amount);
    }
}
