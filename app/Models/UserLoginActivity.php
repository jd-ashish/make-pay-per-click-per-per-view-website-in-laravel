<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserLoginActivity extends Model
{
    use HasFactory;
    protected $table = "user_login_activity";

    public static function updateData($id=null,$data,$uid=null){
        if($uid!=null){
            DB::table('user_login_activity')
            ->where('user_id', $uid)
            ->update($data);
        }else{
            DB::table('user_login_activity')
            ->where('id', $id)
            ->update($data);
        }
        
    }
}
