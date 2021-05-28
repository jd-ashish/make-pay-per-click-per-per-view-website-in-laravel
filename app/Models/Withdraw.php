<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Withdraw extends Model
{
    use HasFactory;
    protected $table = "withdraw";
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public static function updateAllData($id,$data){
        DB::table('withdraw')
          ->where('id', $id)
          ->update($data);
    }
}
