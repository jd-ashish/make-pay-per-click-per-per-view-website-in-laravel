<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class TrantransactionController extends Controller
{
    public function __construct()
    {
        
        #https://github.com/razorpay/razorpay-php
    }
    public function Trantransaction_pay(Request $request)
    {
        
        $user = User::where('id',Auth::user()->id)->first();
        
        

        if($request->amount==0){
            if($user->Account){
                if(Auth::user()->Account->membership_id==$request->member_id){
                    return back()->with('warning','You have already subscribed for this plan!');
                }
                $user->Account->membership_id = $request->member_id;
                $user->save();
            }else{
                $acc = new UserAccount();
                $acc->user_id = Auth::user()->id;
                $acc->withdraw += 0;
                $acc->withdraw_count += 0;
                $acc->membership_id = $request->member_id;
                $acc->save();
            }
    
            $trans = new Transaction();
            $trans->user_id = Auth::user()->id;
            $trans->title = "Buy Subscription at ".$request->amount;
            $trans->credit = "0";
            $trans->debit = $request->amount;
            $trans->final = $user->balance;
            $trans->type = "debit";
            $trans->description = "Buy Subscription";
            $trans->status = "on";
            $trans->save();

            $notify = new Notificaton();
            $notify->user_id = Auth::user()->id;
            $notify->title = "Buy Subscription at ".env('CURRENCY_TYPE')." ".$request->amount;
            $notify->description = "Buy Subscription at ".env('CURRENCY_TYPE')." ".$request->amount;
            $notify->type = 'success';
            $notify->link = "";
            $notify->status = 1;
            $notify->save();
            return back()->with('success','Premium subscription successfully!');
        }else{
            // $member = Membership::where('id',$request->member_id)->first();
            // $details = [
            //     'subject' => 'Mail from '.setting_val('APP_NAME') . " By upgrading to premium",
            //     "amt"=>$request->amount,
            //     "member_id"=>$request->member_id,
            //     "member"=>$member
            // ];
            // // return view('mail',compact('details'));
            // Mail::to('ranjanashish254@gmail.com')->send(new \App\Mail\InvoiceBill($details));
            // return "fff ".env('MAIL_DRIVER');
            if(Auth::user()->Account->membership_id==$request->member_id){
                return back()->with('warning','You have already subscribed for this plan!');
            }
            
            $api = new Api(env('RZP_api_key'), env('RZP_api_secret'));
            $order  = $api->order->create(array('receipt' => str_replace(" ","",Auth::user()->name)."_".$request->member_id, 'amount' => $request->amount*100, 'currency' => env('CURRENCY_SYMB'))); // Creates order
            $orderId = $order['id']; // Get the created Order ID
            $member = Membership::where('id',$request->member_id)->first();
            $arr = array("amt"=>$request->amount,"member_id"=>$request->member_id);
            return view('admin.payment.razorpay',compact('arr','order','member'));
            return $request->amount;
        }
            
    }
    public function rzp_fail(Request $request)
    {
        return $_POST;
    }
}
