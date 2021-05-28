<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'address',
        'city',
        'state',
        'zip',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'uid','id');
    }
    public static function deleteData($id){
        DB::table('users_details')->where('id', '=', $id)->delete();
    }
    public static function deleteUserData($uid){
        DB::table('users_details')->where('uid', '=', $uid)->delete();
    }
    
    

    public static function updateData($col,$data){
        DB::table('users_details')
          ->where('uid', Auth::user()->id)
          ->update([$col=>$data]);
    }
}

