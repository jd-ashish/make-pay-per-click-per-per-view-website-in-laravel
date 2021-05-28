<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    public function withdrawl_request(Request $request)
    {
        #balance  min="{{ setting_val('withdraw_limit') }}" max="{{ Auth::user()->balance }}"
        if($request->balance >= setting_val('withdraw_limit') && $request->balance <= Auth::user()->balance ){
            $windraw = new Withdraw();
            $windraw->user_id = Auth::user()->id;
            $windraw->amount = $request->balance;
            $windraw->payment_method = $request->pm;
            $windraw->payment_details = $request->pd;
            $windraw->status ="pending";
            $windraw->save();

            Auth::user()->Account->update_withdraw($request->balance);
            Auth::user()->Account->update_withdraw_count(1);

            Auth::user()->walletUpdateDesc($request->balance);

                $arr_wallet = array(
                    "uid"=>Auth::user()->id,
                    "amount"=>$request->balance,
                    "type"=>"Credit",
                    "pt"=>"Referal bonous credit ".env('CURRENCY_TYPE')." ". $request->balance,
                    "pd"=>"",
                );
                wallet_trans($arr_wallet);
                $Transaction_insert = array(
                    "uid"=>Auth::user()->id,
                    "credit"=>"0",
                    "debit"=>$request->balance,
                    "final"=>Auth::user()->balance,
                    "type"=>"Debit",
                    "title"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance,
                    "description"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance . " With in some day or time amount will credit in your account given by you",
                );
                Transaction_insert($Transaction_insert);
                $Notificaton_insert = array(
                    "uid"=>Auth::user()->id,
                    "link"=>"",
                    "status"=>1,
                    "type"=>"credit",
                    "title"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance,
                    "desc"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance . " With in some day or time amount will credit in your account given by you",
                );
                Notificaton_insert($Notificaton_insert);

                $details = [
                    'subject' => "Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance ." At ". env('APP_NAME'),
                    "amt"=>$request->balance,
                    "pm"=>$request->pm,
                    "pd"=>$request->pd,
                ];
                // return view('mail',compact('details'));
                Mail::to(Auth::user()->email)->send(new \App\Mail\Withdrawl($details));

                return redirect(route('home'))->with('success', 'congratulation Withdral successfully');
        }
        return redirect(route('home'))->with('error', 'Something going wrong');
    }
    public function change_withdrawl_request_status(Request $request)
    {
        $windraw = Withdraw::where('id',$request->id)->first();
        $user = User::where('id',$windraw->user_id)->first();
        
        switch ($request->val) {
            case 'success':
                    Withdraw::updateAllData($request->id,['status'=>$request->val,'description'=>$request->desc]);
                    $Notificaton_insert = array(
                        "uid"=>$windraw->user_id,
                        "link"=>"",
                        "status"=>1,
                        "type"=>"credit",
                        "title"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $windraw->amount,
                        "desc"=>"Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $windraw->amount . " In your ".$windraw->payment_method ,
                    );
                    Notificaton_insert($Notificaton_insert);
            
                    $details = [
                        'subject' => "Withdrawl successfully  ".env('CURRENCY_TYPE')." ". $request->balance ." At ". env('APP_NAME'),
                        "amt"=>$windraw->amount,
                        "pm"=>$windraw->payment_method,
                        "pd"=>$windraw->payment_details,
                    ];
                    // return view('mail',compact('details'));
                    Mail::to($user->email)->send(new \App\Mail\Withdrawl($details));
                break;
            case 'pending':
                    Withdraw::updateAllData($request->id,['status'=>$request->val,'description'=>$request->desc]);
                $Notificaton_insert = array(
                    "uid"=>$windraw->user_id,
                    "link"=>"",
                    "status"=>1,
                    "type"=>"error",
                    "title"=>"Withdrawl in pending  ".env('CURRENCY_TYPE')." ". $windraw->amount,
                    "desc"=>"Withdrawl pending  ".env('CURRENCY_TYPE')." ". $windraw->amount . "Some technical issus",
                );
                Notificaton_insert($Notificaton_insert);
        
                
                break;
            case 'denied':
                    Withdraw::updateAllData($request->id,['status'=>$request->val,'description'=>$request->desc]);
                $Notificaton_insert = array(
                    "uid"=>$windraw->user_id,
                    "link"=>"",
                    "status"=>1,
                    "type"=>"error",
                    "title"=>"Your Withdrawl Amount  ".env('CURRENCY_TYPE')." ". $windraw->amount ." Would not bee process due to ".$request->desc,
                    "desc"=>"Your Withdrawl Amount  ".env('CURRENCY_TYPE')." ". $windraw->amount ." Would not bee process due to ".$request->desc,
                );
                Notificaton_insert($Notificaton_insert);
        
                $details = [
                    'subject' => "Your Withdrawl Amount  ".env('CURRENCY_TYPE')." ". $windraw->amount ." Would not bee process due to ".$request->desc,
                    "status"=>'error',
                    'desc'=>"Your Withdrawl Amount  ".env('CURRENCY_TYPE')." ". $windraw->amount ." Would not bee process due to ".$request->desc,
                    "amt"=>$windraw->amount,
                    "pm"=>$windraw->payment_method,
                    "pd"=>$windraw->payment_details,
                ];
                // return view('mail',compact('details'));
                Mail::to($user->email)->send(new \App\Mail\Withdrawl($details));
                break;
            default:
                if($request->val!=""){
                    Withdraw::updateAllData($request->id,['status'=>$request->val,'description'=>"",'payment_method'=>$request->pm,'payment_details'=>$request->pd]);
                }else{
                    Withdraw::updateAllData($request->id,['payment_method'=>$request->pm,'payment_details'=>$request->pd]);
                }
                
                $Notificaton_insert = array(
                    "uid"=>$windraw->user_id,
                    "link"=>"",
                    "status"=>1,
                    "type"=>"error",
                    "title"=>"Withdrawl payment method or payment description change or update successfully",
                    "desc"=>"Withdrawl payment method or payment description change or update successfully",
                );
                Notificaton_insert($Notificaton_insert);
                break;
        }
        

        

        return "success";
    }

}
