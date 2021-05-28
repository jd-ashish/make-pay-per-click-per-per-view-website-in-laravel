<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Membership;
use App\Models\ReferralUser;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\UserAdsViewStatus;
use App\Models\Wallets;
use App\Notificaton;
use App\ReferralCommission;
use DateTime;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PtcAdsController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $ads = Ads::get();

        return view('admin.ptc.index',compact('ads'));
    }
    public function MyAds()
    {
        if(Auth::user()->Account){
            $adss = \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first();
        
            $ads = Ads::orderByRaw('RAND()')->take($adss->daily_limit)->get();
    
            return view('admin.ptc.users.index',compact('ads'));
        }else{
            return back()->with('error', 'You you do not have any plan plan start from 0 to as per requeriment ');
        }
        
    }
    public function MyAdsView($id)
    {
        $uads = UserAdsViewStatus::where('user_id',Auth::user()->id)->where('ads_id',$id)->where('ads_view_status',1)->orderBy('created_at', 'desc')->first();
        if($uads){
            // echo $uads->created_at;


        if(Time_return(strtotime($uads->updated_at),"hours")>=24){
            //new data insert for add
            $ads = \App\Models\Ads::where('id',$id)->first();

            return view('admin.ptc.users.viewads',compact('ads'));
        }else{
            $bulk = UserAdsViewStatus::where('user_id',Auth::user()->id)->where('ads_view_status',1)->orderBy('created_at', 'desc')->get();
            $cont = 0;
            foreach ($bulk as $key => $value) {
                // echo Time_return(strtotime($value->updated_at),'hours')."<br>";
                if(Time_return(strtotime($value->updated_at),'hours')<24){
                    // echo $value->id." ".Time_return(strtotime($value->updated_at),'hours')." hrs <br>";
                    $cont = $key+1;
                    continue;
                }
            }
            $adss = \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first();
            if($cont >= $adss->daily_limit){
                //To-day limit end
                return redirect(route('MyAds.index'))->with('error', 'You have already execute to-day quta for this ads');
            }else{
                $check = "";
                foreach ($bulk as $key1 => $value) {
                    // echo $value->ads_id.'<br>';
                    // echo Time_return(strtotime($value->updated_at),'hours')."<br>";
                    if($value->ads_id==$id && Time_return(strtotime($value->updated_at),'hours')<24){
                        // echo $value->id." ".Time_return(strtotime($value->updated_at),'hours')." hrs <br>";
                        echo $id;
                        $check .= "true";
                        return redirect(route('MyAds.index'))->with('error', 'This ads already used to-day quata try another ads');
                        continue;
                    }
                }
                
                //To-day limit avlable
                $ads = \App\Models\Ads::where('id',$id)->first();

                return view('admin.ptc.users.viewads',compact('ads'));
            }
        }



            // return redirect(route('MyAds.index'))->with('error', 'You have already used');
        }else{
            $ads = \App\Models\Ads::where('id',$id)->first();

            return view('admin.ptc.users.viewads',compact('ads'));
        }
        
    }
    public function earn(Request $request)
    {
        $uad = UserAdsViewStatus::where('user_id',Auth::user()->id)->where('ads_id',$request->adid)->where('ads_view_status',1)->first();
        if($uad){

            if(Time_return(strtotime($uad->updated_at),"hours")>=24){
               //new data insert for add
               $cnt = level(Auth::user()->referred_by);
               if(Auth::user()->referred_by!=0){
                    // return $cnt;
                    for($i=0; $i<count($cnt); $i++){
                        // if(level(Auth::user()->referred_by)[$i][0])
                        $refid = $cnt[$i][0]['refid'];
                        $u = User::where('id',$refid)->first();
                        if($u){
                            $uad3 = UserAccount::where('user_id',$u->id)->first();
                            if($uad3){
                                $mem3 = Membership::where('id',$uad3->membership_id)->first();
                                if($mem3){
                                    print_r(json_decode($mem3,true));
                                    if($mem3->referral_commission > 0){
                                        if(($i+1)<=$mem3->referral_commission){
                                            $level = $mem3->referral_commission;
                                            $rc = ReferralCommission::where('level',($i+1))->first()->commission;
                                            $uads = Ads::where('id',$request->adid)->first();

                                            $amt_f = ($uads->amount*($rc/100));
                                            $ref_u = ReferralUser::where('refer_id',$refid)->where('level',($i+1))->where('auth_id',Auth::user()->id)->first();
                                            if($ref_u){
                                                
                                                ReferralUser::incressAmount($ref_u->id,$amt_f);
                                                
                                                // return User::where('id',$ref_u->id)->first();

                                                
                                                
                                            }else{
                                                $referral_user = new ReferralUser();
                                                $referral_user->refer_id = $refid;
                                                $referral_user->level = ($i+1);
                                                $referral_user->auth_id = Auth::user()->id;
                                                $referral_user->amount = ($uads->amount*($rc/100));
                                                $referral_user->save();
                                            }
                                            //update this details about to ballance

                                            User::walletUpdateById($amt_f,$refid);
                                            $arr_wallet = array(
                                                "uid"=>$refid,
                                                "amount"=>$amt_f,
                                                "type"=>"Credit",
                                                "pt"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                "pd"=>"",
                                            );
                                            wallet_trans($arr_wallet);
                                            $Transaction_insert = array(
                                                "uid"=>$refid,
                                                "credit"=>$amt_f,
                                                "debit"=>0,
                                                "final"=>User::where('id',$refid)->first()->balance,
                                                "type"=>"Credit",
                                                "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                "description"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                            );
                                            Transaction_insert($Transaction_insert);
                                            $Notificaton_insert = array(
                                                "uid"=>$refid,
                                                "link"=>"",
                                                "status"=>1,
                                                "type"=>"credit",
                                                "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                "desc"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                            );
                                            Notificaton_insert($Notificaton_insert);
                                            // echo $uads->amount*($rc/100). " RS Total ".$uads->amount." <br>";
                                            
                                        }else{
                                            // echo $mem3->referral_commission." <br> ". ($i+1) ." <br> ";
                                        }
                                        
                                    }
                                }
                            }
                        }
                        // print_r(json_decode($u,true));
                        
                        // if(($cnt)[$i][0]['level']==)
                    }
                }
            
               $uads = new UserAdsViewStatus();
                $uads->user_id = Auth::user()->id;
                $uads->ads_id = $request->adid;
                $uads->ads_view_status = 1;
                $uads->save();

                Ads::incrementViews($request->adid);
                $uads = Ads::where('id',$request->adid)->first();
                Auth::user()->walletUpdate($uads->amount);

                $wallet = new Wallets();
                $wallet->user_id = Auth::user()->id;
                $wallet->amount = $uads->amount;
                $wallet->type = "Credit";
                $wallet->payment_type = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                $wallet->payment_details = "";
                $wallet->save();


                $Transaction = new Transaction();
                $Transaction->user_id = Auth::user()->id;
                $Transaction->credit = $uads->amount;
                $Transaction->final = Auth::user()->balance;
                $Transaction->type = "Credit";
                $Transaction->title = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                $Transaction->description = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                $Transaction->save();

                $notify = new Notificaton();
                   $notify->user_id = Auth::user()->id;
                   $notify->title = "Ads view credit";
                   $notify->description = "Get reward by view ads you have rewarded ".env('CURRENCY_TYPE')." ". $uads->amount;
                   $notify->type = 'credit';
                   $notify->link = "";
                   $notify->status = 1;
                   $notify->save();
               return redirect(route('MyAds.index'))->with('success', 'congratulation you have earn successfully');
            }else{
                $bulk = UserAdsViewStatus::where('user_id',Auth::user()->id)->where('ads_view_status',1)->orderBy('created_at', 'desc')->get();
                $cont = 0;
                foreach ($bulk as $key => $value) {
                    // echo Time_return(strtotime($value->updated_at),'hours')."<br>";
                    if(Time_return(strtotime($value->updated_at),'hours')<24){
                        // echo $value->id." ".Time_return(strtotime($value->updated_at),'hours')." hrs <br>";
                        $cont = $key+1;
                        continue;
                    }
                }
                $adss = \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first();
                if($cont >= $adss->daily_limit){
                    //To-day limit end
                    return redirect(route('MyAds.index'))->with('error', 'You have already execute to-day quta for this ads');
                }else{

                    
                    foreach ($bulk as $key1 => $value) {
                        // echo $value->ads_id.'<br>';
                        // echo Time_return(strtotime($value->updated_at),'hours')."<br>";
                        if($value->ads_id==$id && Time_return(strtotime($value->updated_at),'hours')<24){
                            // echo $value->id." ".Time_return(strtotime($value->updated_at),'hours')." hrs <br>";
                            echo $id;
                            $check .= "true";
                            return redirect(route('MyAds.index'))->with('error', 'This ads already used to-day quata try another ads');
                            continue;
                        }
                    }



                    $cnt = level(Auth::user()->referred_by);
                    if(Auth::user()->referred_by!=0){
                        // return $cnt;
                        for($i=0; $i<count($cnt); $i++){
                            // if(level(Auth::user()->referred_by)[$i][0])
                            $refid = $cnt[$i][0]['refid'];
                            $u = User::where('id',$refid)->first();
                            if($u){
                                $uad3 = UserAccount::where('user_id',$u->id)->first();
                                if($uad3){
                                    $mem3 = Membership::where('id',$uad3->membership_id)->first();
                                    if($mem3){
                                        print_r(json_decode($mem3,true));
                                        if($mem3->referral_commission > 0){
                                            if(($i+1)<=$mem3->referral_commission){
                                                $level = $mem3->referral_commission;
                                                $rc = ReferralCommission::where('level',($i+1))->first()->commission;
                                                $uads = Ads::where('id',$request->adid)->first();

                                                $amt_f = ($uads->amount*($rc/100));
                                                $ref_u = ReferralUser::where('refer_id',$refid)->where('level',($i+1))->where('auth_id',Auth::user()->id)->first();
                                                if($ref_u){
                                                    
                                                    ReferralUser::incressAmount($ref_u->id,$amt_f);
                                                    
                                                    // return User::where('id',$ref_u->id)->first();

                                                    
                                                    
                                                }else{
                                                    $referral_user = new ReferralUser();
                                                    $referral_user->refer_id = $refid;
                                                    $referral_user->level = ($i+1);
                                                    $referral_user->auth_id = Auth::user()->id;
                                                    $referral_user->amount = ($uads->amount*($rc/100));
                                                    $referral_user->save();
                                                }
                                                //update this details about to ballance

                                                User::walletUpdateById($amt_f,$refid);
                                                $arr_wallet = array(
                                                    "uid"=>$refid,
                                                    "amount"=>$amt_f,
                                                    "type"=>"Credit",
                                                    "pt"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                    "pd"=>"",
                                                );
                                                wallet_trans($arr_wallet);
                                                $Transaction_insert = array(
                                                    "uid"=>$refid,
                                                    "credit"=>$amt_f,
                                                    "debit"=>0,
                                                    "final"=>User::where('id',$refid)->first()->balance,
                                                    "type"=>"Credit",
                                                    "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                    "description"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                );
                                                Transaction_insert($Transaction_insert);
                                                $Notificaton_insert = array(
                                                    "uid"=>$refid,
                                                    "link"=>"",
                                                    "status"=>1,
                                                    "type"=>"credit",
                                                    "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                    "desc"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                                );
                                                Notificaton_insert($Notificaton_insert);
                                                // echo $uads->amount*($rc/100). " RS Total ".$uads->amount." <br>";
                                                
                                            }else{
                                                // echo $mem3->referral_commission." <br> ". ($i+1) ." <br> ";
                                            }
                                            
                                        }
                                    }
                                }
                            }
                            // print_r(json_decode($u,true));
                            
                            // if(($cnt)[$i][0]['level']==)
                        }
                    }
                    
                    //To-day limit avlable
                   //new data insert for add
                   $uads = new UserAdsViewStatus();
                   $uads->user_id = Auth::user()->id;
                   $uads->ads_id = $request->adid;
                   $uads->ads_view_status = 1;
                   $uads->save();
       
                   Ads::incrementViews($request->adid);
                   $uads = Ads::where('id',$request->adid)->first();
                   Auth::user()->walletUpdate($uads->amount);
       
                   $wallet = new Wallets();
                   $wallet->user_id = Auth::user()->id;
                   $wallet->amount = $uads->amount;
                   $wallet->type = "Credit";
                   $wallet->payment_type = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                   $wallet->payment_details = "";
                   $wallet->save();
       
       
                   $Transaction = new Transaction();
                   $Transaction->user_id = Auth::user()->id;
                   $Transaction->credit = $uads->amount;
                   $Transaction->final = Auth::user()->balance;
                   $Transaction->type = "Credit";
                   $Transaction->title = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                   $Transaction->description = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
                   $Transaction->save();

                   $notify = new Notificaton();
                   $notify->user_id = Auth::user()->id;
                   $notify->title = "Ads view credit";
                   $notify->description = "Get reward by view ads you have rewarded ".env('CURRENCY_TYPE')." ". $uads->amount;
                   $notify->type = 'credit';
                   $notify->link = "";
                   $notify->status = 1;
                   $notify->save();
                    return redirect(route('MyAds.index'))->with('success', 'congratulation you have earn successfully');
                }
            }
            
            // echo $uad->created_at;
            // // return redirect(route('MyAds.index'))->with('error', 'You have already used');
        }else{


            //level 1 earning
            
            
            // $rc = ReferralCommission::get();
            // foreach ($rc as $key => $value) {
            //     echo $value->level."<br>";
            // }

            // for($i=1; $i<count(level(Auth::user()->referred_by)); $i++){
            //     // if(level(Auth::user()->referred_by)[$i][0])
            //     // return level(Auth::user()->referred_by)[$i];
            // }
            $cnt = level(Auth::user()->referred_by);

            if(Auth::user()->referred_by!=0){
            
                // return $cnt;
                for($i=0; $i<count($cnt); $i++){
                    // if(level(Auth::user()->referred_by)[$i][0])
                    $refid = $cnt[$i][0]['refid'];
                    $u = User::where('id',$refid)->first();
                    if($u){
                        $uad3 = UserAccount::where('user_id',$u->id)->first();
                        if($uad3){
                            $mem3 = Membership::where('id',$uad3->membership_id)->first();
                            if($mem3){
                                print_r(json_decode($mem3,true));
                                if($mem3->referral_commission > 0){
                                    if(($i+1)<=$mem3->referral_commission){
                                        $level = $mem3->referral_commission;
                                        $rc = ReferralCommission::where('level',($i+1))->first()->commission;
                                        $uads = Ads::where('id',$request->adid)->first();

                                        $amt_f = ($uads->amount*($rc/100));
                                        $ref_u = ReferralUser::where('refer_id',$refid)->where('level',($i+1))->where('auth_id',Auth::user()->id)->first();
                                        if($ref_u){
                                            
                                            ReferralUser::incressAmount($ref_u->id,$amt_f);
                                            
                                            // return User::where('id',$ref_u->id)->first();

                                            
                                            
                                        }else{
                                            $referral_user = new ReferralUser();
                                            $referral_user->refer_id = $refid;
                                            $referral_user->level = ($i+1);
                                            $referral_user->auth_id = Auth::user()->id;
                                            $referral_user->amount = ($uads->amount*($rc/100));
                                            $referral_user->save();
                                        }
                                        //update this details about to ballance

                                        User::walletUpdateById($amt_f,$refid);
                                        $arr_wallet = array(
                                            "uid"=>$refid,
                                            "amount"=>$amt_f,
                                            "type"=>"Credit",
                                            "pt"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                            "pd"=>"",
                                        );
                                        wallet_trans($arr_wallet);
                                        $Transaction_insert = array(
                                            "uid"=>$refid,
                                            "credit"=>$amt_f,
                                            "debit"=>0,
                                            "final"=>User::where('id',$refid)->first()->balance,
                                            "type"=>"Credit",
                                            "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                            "description"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                        );
                                        Transaction_insert($Transaction_insert);
                                        $Notificaton_insert = array(
                                            "uid"=>$refid,
                                            "link"=>"",
                                            "status"=>1,
                                            "type"=>"credit",
                                            "title"=>"Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                            "desc"=>"Congratulations ! Ads view by ". Auth::user()->name ." Referal bonous credit ".env('CURRENCY_TYPE')." ". $amt_f,
                                        );
                                        Notificaton_insert($Notificaton_insert);
                                        // echo $uads->amount*($rc/100). " RS Total ".$uads->amount." <br>";
                                        
                                    }else{
                                        // echo $mem3->referral_commission." <br> ". ($i+1) ." <br> ";
                                    }
                                    
                                }
                            }
                        }
                    }
                    // print_r(json_decode($u,true));
                    
                    // if(($cnt)[$i][0]['level']==)
                }
            }
            // return $cnt;
            

            $check = "";
            $uads = new UserAdsViewStatus();
            $uads->user_id = Auth::user()->id;
            $uads->ads_id = $request->adid;
            $uads->ads_view_status = 1;
            $uads->save();

            Ads::incrementViews($request->adid);
            $uads = Ads::where('id',$request->adid)->first();
            Auth::user()->walletUpdate($uads->amount);

            $wallet = new Wallets();
            $wallet->user_id = Auth::user()->id;
            $wallet->amount = $uads->amount;
            $wallet->type = "Credit";
            $wallet->payment_type = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
            $wallet->payment_details = "";
            $wallet->save();


            $Transaction = new Transaction();
            $Transaction->user_id = Auth::user()->id;
            $Transaction->credit = $uads->amount;
            $Transaction->final = Auth::user()->balance;
            $Transaction->type = "Credit";
            $Transaction->title = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
            $Transaction->description = "Ads view credit ".env('CURRENCY_TYPE')." ". $uads->amount;
            $Transaction->save();

                $notify = new Notificaton();
                $notify->user_id = Auth::user()->id;
                $notify->title = "Ads view credit";
                $notify->description = "Get reward by view ads you have rewarded ".env('CURRENCY_TYPE')." ". $uads->amount;
                $notify->type = 'credit';
                $notify->link = "";
                $notify->status = 1;
                $notify->save();

            return redirect(route('MyAds.index'))->with('success', 'congratulation you have earn successfully');
        }
        
        
        
    }
    public function fail(Request $request)
    {
        
        return redirect(route('MyAds.index'))->with('error',$request->fail);
    }
    public function test()
    {
        
        return view('admin.ptc.users.test');
    }
    public function create()
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        return view('admin.ptc.create');
    }
    public function edit($id)
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $ads = Ads::where('id',$id)->first();
        if($ads){
            return view('admin.ptc.edit',compact('ads'));
        }else{
            return back()->with('error','Record not found!');
        }
        
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $ads = new Ads();
        $ads->title = $request->title;
        $ads->amount = $request->amount;
        $ads->duration = $request->duration;
        $ads->max_show = $request->max_show;
        if($request->status==""){
            $ads->status = "off";
        }else{
            $ads->status = $request->status;
        }
        $ads->type = $request->ads_type;
        switch ($request->ads_type) {
            case '1':
                    $ads->type_data = $request->website_link;
                    $ads->save();
                    return back()->with('success','Ads created successfully!');
                break;
            case '2':
                
          
                $image = $request->file('banner_image');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
             
                $destinationPath = public_path('/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
           
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $input['imagename']);
           
                $ads->type_data = $input['imagename'];
                $ads->save();
                return back()
                    ->with('success','Image Upload successful')
                    ->with('imageName',$input['imagename']);
                    // $ads->type_data = $request->title;
                break;
            case '3':
                    $ads->type_data = $request->script;
                    $ads->save();
                    return back()->with('success','Ads created successfully!');
                break;
        }
        
        
    }
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $ads = Ads::findOrFail($request->id);
        $ads->title = $request->title;
        $ads->amount = $request->amount;
        $ads->duration = $request->duration;
        $ads->max_show = $request->max_show;
        if($request->status==""){
            $ads->status = "off";
        }else{
            $ads->status = $request->status;
        }
        
        $ads->type = $request->ads_type;
        switch ($request->ads_type) {
            case '1':
                    $ads->type_data = $request->website_link;
                    $ads->save();
                    return back()->with('success','Ads created successfully!');
                break;
            case '2':
                
          
                $image = $request->file('banner_image');
                if($image){
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
             
                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($image->getRealPath());
                    $img->resize(200, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename']);
               
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $input['imagename']);
               
                    $ads->type_data = $input['imagename'];
                    $ads->save();
                    return back()
                        ->with('success','Image Ads created successfully')
                        ->with('imageName',$input['imagename']);
                        // $ads->type_data = $request->title;
                }else{
                    $ads->save();
                    return back()
                        ->with('success','Image Ads created successfully!');
                }
                
                break;
            case '3':
                    $ads->type_data = $request->script;
                    $ads->save();
                    return back()->with('success','Ads created successfully!');
                break;
        }
        
        
    }
    public function destroy($id)
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $Ads = Ads::findOrFail($id);
        if(Ads::destroy($id)){
            return back()->with('success','Ads deleted successfully!');
        }else{
            return back()->with('error','Something going wrong!');
        }
    }


}
