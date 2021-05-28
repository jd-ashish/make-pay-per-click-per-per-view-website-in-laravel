<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'referred_by',
        'user_type',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function details(){
        return $this->hasOne(UsersDetails::class,'uid','id');
    }
    public function Account(){
        return $this->hasOne(UserAccount::class,'user_id','id');
    }
    public function Notification(){
        return $this->hasMany(\App\Notificaton::class,'user_id','id')->where('view','=',0)->orderBy('created_at', 'desc');
    }
    
    public function wallets()
    {
        return $this->hasMany(Wallets::class)->orderBy('created_at', 'desc');
    }
    public function Withdraw()
    {
        return $this->hasMany(Withdraw::class)->orderBy('created_at', 'desc');
    }
    public function login_log()
    {
        return $this->hasMany(UserLoginActivity::class)->orderBy('created_at', 'desc');
    }
    public function Transaction()
    {
        return $this->hasMany(Transaction::class)->orderBy('created_at', 'desc');
    }
    public function Clicks()
    {
        return $this->hasMany(Clicks::class)->orderBy('created_at', 'desc');
    }
    public function UserAdsViewStatus()
    {
        return $this->hasMany(UserAdsViewStatus::class)->orderBy('created_at', 'desc');
    }
    public function walletUpdate($amt)
    {
        DB::table('users')->where('id', '=', Auth::user()->id)->increment('balance',$amt);
    }
    public function walletUpdateDesc($amt)
    {
        DB::table('users')->where('id', '=', Auth::user()->id)->decrement('balance',$amt);
    }
    public static function walletUpdateById($amt,$id)
    {
        DB::table('users')->where('id', '=', $id)->increment('balance',$amt);
    }
    public static function deleteData($id){
        DB::table('users')->where('id', '=', $id)->delete();
    }
    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

    
}
