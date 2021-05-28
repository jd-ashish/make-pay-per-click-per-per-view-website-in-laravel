<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Session;
use Redirect;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function create()
    {        
        return view('razorpay');
    }

    public function payment(Request $request)
    {
        $input = $request->all();
        $user = User::where('id',Auth::user()->id)->first();

        $api = new Api(env('RZP_api_key'), env('RZP_api_secret'));

        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        // print_r(json_decode($payment,true));
        if($payment['status']=="captured"){
            if($user->Account){
                if(Auth::user()->Account->membership_id==$request->member_id){
                    return redirect(route('home'))->with('warning','You have already subscribed for this plan!');
                }
                UserAccount::updateData('membership_id',$request->member_id);
                
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
            $trans->title = "Buy ".$payment['description']." Subscription at ".env('CURRENCY_TYPE')." ".$request->amount." Using online payment";
            $trans->credit = "0";
            $trans->debit = $request->amount;
            $trans->final = $user->balance;
            $trans->type = "debit";
            $trans->description = "Buy ".$payment['description']." Subscription Using online payment not using wallet";
            $trans->status = "on";
            $trans->json = json_encode($payment->toArray());
            $trans->save();

            $notify = new Notificaton();
            $notify->user_id = Auth::user()->id;
            $notify->title = "Buy ".$payment['description']." Subscription at ".env('CURRENCY_TYPE')." ".$request->amount." Using online payment";
            $notify->description = "Buy ".$payment['description']." Subscription Using online payment not using wallet ".env('CURRENCY_TYPE')." ".$request->amount;
            $notify->type = 'success';
            $notify->link = "";
            $notify->status = 1;
            $notify->json = json_encode($payment->toArray());
            $notify->save();

            $member = Membership::where('id',$request->member_id)->first();
            $details = [
                'subject' => 'Mail from '.setting_val('APP_NAME') . " By upgrading to premium",
                "amt"=>$request->amount,
                "member_id"=>$request->member_id,
                "member"=>$member
            ];
            // return view('mail',compact('details'));
            Mail::to(Auth::user()->email)->send(new \App\Mail\InvoiceBill($details));

            return redirect(route('home'))->with('success','Premium subscription successfully!');
        }
        return $text =  json_encode($payment->toArray());
        // print_r($payment);
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 


        //         print_r($response);
        //     } catch (\Exception $e) {
        //         return  $e->getMessage();
        //         \Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }
        // }
        
        // \Session::put('success', 'Payment successful');
        // return redirect()->back();
    }
    public function payment_addwallet(Request $request)
    {
        $input = $request->all();
        $user = User::where('id',Auth::user()->id)->first();

        $api = new Api(env('RZP_api_key'), env('RZP_api_secret'));

        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        // print_r(json_decode($payment,true));
        if($payment['status']=="captured"){
            
    
            User::walletUpdateById($request->balance,Auth::user()->id);
            $arr_wallet = array(
                "uid"=>Auth::user()->id,
                "amount"=>$request->balance,
                "type"=>"Credit",
                "pt"=>"Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance,
                "pd"=>json_encode($payment->toArray()),
            );
            wallet_trans($arr_wallet);

            $trans = new Transaction();
            $trans->user_id = Auth::user()->id;
            $trans->title = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $trans->credit = "0";
            $trans->debit = $request->amount;
            $trans->final = $user->balance;
            $trans->type = "debit";
            $trans->description = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $trans->status = "on";
            $trans->json = json_encode($payment->toArray());
            $trans->save();

            $notify = new Notificaton();
            $notify->user_id = Auth::user()->id;
            $notify->title = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $notify->description = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $notify->type = 'success';
            $notify->link = "";
            $notify->status = 1;
            $notify->json = json_encode($payment->toArray());
            $notify->save();

            
            $details = [
                'subject' => "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance ." At ". env('APP_NAME'),
                "amt"=>$request->balance,
                "oid"=>$request->oid,
            ];
            // return view('mail',compact('details'));
            Mail::to(Auth::user()->email)->send(new \App\Mail\AddWallet($details));

            return redirect(route('home'))->with('success','Wallet addedd successfully!');
        }
            $trans = new Transaction();
            $trans->user_id = Auth::user()->id;
            $trans->title = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $trans->credit = "0";
            $trans->debit = $request->amount;
            $trans->final = $user->balance;
            $trans->type = "debit";
            $trans->description = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $trans->status = "fail";
            $trans->json = json_encode($payment->toArray());
            $trans->save();

            $notify = new Notificaton();
            $notify->user_id = Auth::user()->id;
            $notify->title = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $notify->description = "Add money to wallet ".env('CURRENCY_TYPE'). " " .$request->balance;
            $notify->type = 'success';
            $notify->link = "";
            $notify->status = 0;
            $notify->json = json_encode($payment->toArray());
            $notify->save();
            return redirect(route('home'))->with('warning','Wallet addedd failed!');
    }
}