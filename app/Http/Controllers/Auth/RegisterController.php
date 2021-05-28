<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\Wallets;
use App\ReferralCommission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        
        if(array_key_exists('ref_id',$data)){
            if(setting_val('status_ref')=="on"){

                $c_amt = (int)setting_val('CommissionAmount_ref');
                $u1 = (int)setting_val('user1CommissionPercent_ref');
                $u1_amt = $c_amt*($u1/100);
                $u2 = (int)setting_val('user2CommissionPercent_ref');
                $u2_amt = $c_amt*($u2/100);
                // CommissionAmount_ref
                // user1CommissionPercent_ref in %
                // user2CommissionPercent_ref in %

                User::walletUpdateById($u1_amt,$data['ref_id']);
                $arr_wallet = array(
                    "uid"=>$data['ref_id'],
                    "amount"=>$u1_amt,
                    "type"=>"Credit",
                    "pt"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u1_amt,
                    "pd"=>"",
                );
                wallet_trans($arr_wallet);
                $Transaction_insert = array(
                    "uid"=>$data['ref_id'],
                    "credit"=>$u1_amt,
                    "debit"=>0,
                    "final"=>User::where('id',$data['ref_id'])->first()->balance,
                    "type"=>"Credit",
                    "title"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u1_amt,
                    "description"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u1_amt ." Your referal joined by ".$data['name'],
                );
                Transaction_insert($Transaction_insert);
                $Notificaton_insert = array(
                    "uid"=>$data['ref_id'],
                    "link"=>"",
                    "status"=>1,
                    "type"=>"credit",
                    "title"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u1_amt,
                    "desc"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u1_amt ." Your referal joined by ".$data['name'],
                );
                Notificaton_insert($Notificaton_insert);

                // $u = User::where('id',$data['ref_id'])->first();
                // $uad = UserAccount::where('user_id',$u->id)->first();
                // $mem = Membership::where('id',$uad->membership_id)->first();
                // if($mem){
                //     if($mem->referral_commission > 0){
                //         //start lavel earning
                //         for($i=0; $i<$mem->referral_commission; $i++){
                //             //ReferralCommission
                //         }
                //     }
                // }
                $user =  User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'status' => "on",
                    'referred_by' => $data['ref_id'],
                    'password' => Hash::make($data['password']),
                ]);

                User::walletUpdateById($u2_amt,$user->id);
                $arr_wallet2 = array(
                    "uid"=>$user->id,
                    "amount"=>$u2_amt,
                    "type"=>"Credit",
                    "pt"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u2_amt,
                    "pd"=>"",
                );
                wallet_trans($arr_wallet2);
                $Transaction_insert2 = array(
                    "uid"=>$user->id,
                    "credit"=>$u2_amt,
                    "debit"=>0,
                    "final"=>$u2_amt,
                    "type"=>"Credit",
                    "title"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u2_amt,
                    "description"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u2_amt ." Your referal joined by ".User::where('id',$data['ref_id'])->first()->name,
                );
                Transaction_insert($Transaction_insert2);
                $Notificaton_insert2 = array(
                    "uid"=>$user->id,
                    "link"=>"",
                    "status"=>1,
                    "type"=>"credit",
                    "title"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u2_amt,
                    "desc"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $u2_amt ." Your referal joined by ".User::where('id',$data['ref_id'])->first()->name,
                );
                Notificaton_insert($Notificaton_insert2);
                return $user;
            }else{
                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'status' => "on",
                    'referred_by' => $data['ref_id'],
                    'password' => Hash::make($data['password']),
                ]);
            }
            
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
