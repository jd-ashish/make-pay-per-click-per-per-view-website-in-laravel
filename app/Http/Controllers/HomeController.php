<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Country;
use App\Models\User;
use App\Models\Wallets;
use App\Models\Withdraw;
use App\Newsletter;
use App\Notificaton;
use App\ReferralCommission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function forms_contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $cu = new ContactUs();
        $cu->name = $request->name;
        $cu->email = $request->email;
        $cu->subjects = $request->subject;
        $cu->sms = $request->message;
        $cu->save();
        return "OK";
        return true;
    }
    public function index()
    {
        return view('admin.dash');
    }
    public function wallet_index()
    {
        $wallet = Auth::user()->wallets;
        return view('admin.index.wallet',compact('wallet'));
    }
    public function withdraw_request_index()
    {
        $Withdraw = Withdraw::get();
        return view('admin.index.withdrawl_request',compact('Withdraw'));
    }
    public function withdraw_request_pending()
    {
        if(Auth::user()->user_type=="user"){
            $Withdraw = Withdraw::where('user_id',Auth::user()->id)->where('status','pending')->get();
        }else{
            $Withdraw = Withdraw::where('status','pending')->get();
        }
        
        return view('admin.index.withdrawl_request',compact('Withdraw'));
    }
    public function withdraw_request_denied()
    {
        if(Auth::user()->user_type=="user"){
            $Withdraw = Withdraw::where('user_id',Auth::user()->id)->where('status','denied')->get();
        }else{
            $Withdraw = Withdraw::where('status','denied')->get();
        }
        return view('admin.index.withdrawl_request',compact('Withdraw'));
    }
    public function withdraw_request_success()
    {
        if(Auth::user()->user_type=="user"){
            $Withdraw = Withdraw::where('user_id',Auth::user()->id)->where('status','success')->get();
        }else{
            $Withdraw = Withdraw::where('status','success')->get();
        }
        return view('admin.index.withdrawl_request',compact('Withdraw'));
    }
    public function withdraw_index()
    {
        $Withdraw = Auth::user()->Withdraw;
        return view('admin.index.withdraw',compact('Withdraw'));
    }
    public function notification_views_change_status(Request $request)
    {
        Notificaton::incrementViews($request->id);
        
        return "success";
    }
    public function NotificationViewAll(Request $request)
    {
        Notificaton::NotificationViewAll();
        
        return "success";
    }
    public function profile()
    {
        // Twilio::message("+917079692988", "testing");
        // send_otp("+917079692988","258479");

        
        if(setting_val('sms_pkg')=="twilio"){
            $idd=json_data();
        }else{
            $idd = json_decode(json_encode(array()));
        }
        


        $wallet = Auth::user()->wallets;
        $contry = Country::get();
        return view('admin.extra.profile',compact('wallet','contry','idd'));
    }
    public function Transaction_index()
    {
        $Transaction = Auth::user()->Transaction;
        return view('admin.index.transaction',compact('Transaction'));
    }
    public function ReferralCommission()
    {
        $referred_by = User::where('referred_by',Auth::user()->id)->get();
        $ReferralCommissions = ReferralCommission::get();
        return view('admin.Referral.ReferralCommission',compact('referred_by','ReferralCommissions'));
    }
    
    public function AccountSettings()
    {
        
        $contry = Country::get();
        $referred_by = User::where('referred_by',Auth::user()->id)->get();
        $ReferralCommissions = ReferralCommission::get();
        return view('admin.settings.account',compact('referred_by','ReferralCommissions','contry'));
    }
    public function frontend()
    {
        
        $contry = Country::get();
        $referred_by = User::where('referred_by',Auth::user()->id)->get();
        $ReferralCommissions = ReferralCommission::get();
        return view('admin.settings.frontend',compact('referred_by','ReferralCommissions','contry'));
    }
}
