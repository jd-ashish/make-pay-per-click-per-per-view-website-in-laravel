<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Country;
use App\Models\ReferralUser;
use App\Models\User;
use App\Models\UserAdsViewStatus;
use App\Models\UsersDetails;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Razorpay\Api\Api;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserSystemInfoHelper;
use App\Models\Testimonials;
use Illuminate\Database\QueryException;

class UsersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rate_us(Request $request)
    {
        return view('admin.faq.rate');
    }
    public function testiminial_save(Request $request)
    {

        $Testimonials = new Testimonials();
        $Testimonials->user_id = Auth::user()->id;
        $Testimonials->description = $request->description;
        $Testimonials->status = "on";
        $Testimonials->save();
        return back()->with('success','Thanks for support us!');

    }
    public function index(Request $request)
    {
        return view('admin.users.index');
    }
    public function getUsers(Request $request)
    {
        $users = User::get();
        return $users;
    }
    public function User_login_logs(Request $request)
    {
        $user = User::where('id',$request->id)->get();
        return view('admin.table.login_log_table',compact('user'));
    }
    public function profile_verify_phone(Request $request)
    {
        try {
            $user = User::where('phone',$request->num)->where('id','!=',Auth::user()->id)->first();
            if($user){
                return json_encode(array(
                    'error'=>true,
                    "message"=>"Phone ".$request->num." already exist!"
                ));
            }else{
                $otp = OTP_G(6);
                send_otp($request->num,$otp);
                return json_encode(array(
                    'error'=>false,
                    "message"=>"OTP send successfully",
                    "otp"=>$otp
                ));
            }
        } catch (QueryException $th) {
            return json_encode(array(
                'error'=>true,
                "message"=>$th->errorInfo[2]
            ));
            // dd($th->errorInfo[2]);
        }
    }
    public function profile_update_phone(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->phone = $request->num;
        $user->sms_verified_at = date('Y-m-d h:i:s',time());
        $user->save();
        return "success";
    }
    public function check_online(Request $request)
    {
        return Cache::has('user-is-online-'.$request->uid);
    }
    public function active_user(Request $request)
    {
        $c=0;
        $na = 0;
        foreach(User::get() as $key => $value){
            if ($value->isOnline()==1){
                $c++;
                continue;
            }
            $na++;
        }
        $u = array("active"=>$c,"noneActive"=>$na);
        return $u;
    }
    public function user_growth()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

        $months = User::select (DB::raw("Month(created_at) as month"))->whereYear('created_at',date("Y"))->groupBy (DB::raw("Month(created_at)"))->pluck("month");

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0); 
        foreach($months as $index=> $month){
            $datas [($month-1)] = $users[$index];
        }

        return ($datas);
    }
    public function with_drawl()
    {
        if(Auth::user()->user_type=="user"){
            $Withdraw = Withdraw::select(DB::raw("SUM(amount) as count"))
            ->where('user_id',Auth::user()->id)
            ->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

            $months = Withdraw::select (DB::raw("Month(created_at) as month"))
            ->where('user_id',Auth::user()->id)
            ->whereYear('created_at',date("Y"))->groupBy (DB::raw("Month(created_at)"))->pluck("month");
        }else{
            $Withdraw = Withdraw::select(DB::raw("SUM(amount) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

            $months = Withdraw::select (DB::raw("Month(created_at) as month"))->whereYear('created_at',date("Y"))->groupBy (DB::raw("Month(created_at)"))->pluck("month");
        }
        

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0); 
        foreach($months as $index=> $month){
            $datas [($month-1)] = $Withdraw[$index];
        }

        return ($datas);
    }
    public function Today_ads()
    {

        $date           = \Carbon\Carbon::now();
        $uploadsByDay   = Ads::whereDate('created_at', '>', Carbon::now()->subDays(30))->get();
        $chartDatas = UserAdsViewStatus::select([
            DB::raw("DATE_FORMAT(created_at, '%d') AS date"),
            DB::raw('COUNT(id) AS count'),
         ])
         ->where('user_id',Auth::user()->id)
         ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
         ->groupBy('date')
         ->orderBy('date', 'ASC')
         ->get()
         ->toArray();
         
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
        // foreach($chartDatas as $index=> $day){
        //     $datas [($day)] = $chartDatas[$index];
        // }
        $aar = array();
        foreach ($chartDatas as $key => $value) {
            $arr[] = $value['date'];
            
        }
        
        foreach($arr as $index=> $day){
            unset($chartDatas[$index]['date']);
            if(is_array($chartDatas[$index])){
                $vd = $chartDatas[$index]['count'];
            }else{
                $vd = 0;
            }
            $datas[$day] = $vd;
        }
        return ($datas);
        return ($chartDatas[0]['date']);
    }
    public function details_by_id($id)
    {
        $user = User::where('id',$id)->first();
        $contry = Country::get();
        $ReferralUser = ReferralUser::where('refer_id',$id)->get();
        return view('admin.users.details',compact('user','contry','ReferralUser'));
    }
    public function profile_update_ById(Request $request){
        // return $_POST;
        // return date('Y-m-d h:i:s',time());
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->status=="on"){
            if($user->status==""){
                $user->status = "on";
            }
        }else{
            // 2021-04-11 16:42:08
            $user->status = "";
            
        }
        $user->save();

        $ud = UsersDetails::where("uid",$request->id)->first();
        if($ud){
            UsersDetails::updateData("country",$request->country);
            UsersDetails::updateData("state",$request->state);
            UsersDetails::updateData("city",$request->city);
            UsersDetails::updateData("address",$request->address);
            UsersDetails::updateData("zip",$request->zip);
        }else{
            $UsersDetails = new UsersDetails();
            $UsersDetails->uid = $request->id;
            $UsersDetails->country = $request->country;
            $UsersDetails->state = $request->state;
            $UsersDetails->city = $request->city;
            $UsersDetails->address = $request->address;
            $UsersDetails->zip = $request->zip;
            $UsersDetails->save();
        }
        $Notificaton_insert = array(
            "uid"=>$request->id,
            "link"=>"",
            "status"=>1,
            "type"=>"success",
            "title"=>"Profile update by admin successfully",
            "desc"=>"Profile update by admin successfully",
        );
        Notificaton_insert($Notificaton_insert);
        $Notificaton_insert = array(
            "uid"=> Auth::user()->id,
            "link"=>"",
            "status"=>1,
            "type"=>"success",
            "title"=> $request->name." Profile update by you successfully",
            "desc"=> $request->name." Profile update by you successfully",
        );
        Notificaton_insert($Notificaton_insert);

        return back()->with('success',$request->name.' Profile update successfully!');
        return $_POST;
    }
    public function profile_update(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            // $user->email = $request->email;
            // $user->phone = $request->number;
            if($request->password!=""){
                if($request->password==$request->password2){
                    $user->password = Hash::make($request->password);
                }else{
                    return back()->with('warning',"Password not match!");
                }
            }
            // $user->password = Hash::make($request->password);
            $user->save();

            
            $ud = UsersDetails::where("uid",Auth::user()->id)->first();
            if($ud){
                UsersDetails::updateData("country",$request->country);
                UsersDetails::updateData("state",$request->state);
                UsersDetails::updateData("city",$request->city);
                UsersDetails::updateData("address",$request->address);
                UsersDetails::updateData("zip",$request->zip);
            }else{
                $UsersDetails = new UsersDetails();
                $UsersDetails->uid = Auth::user()->id;
                $UsersDetails->country = $request->country;
                $UsersDetails->state = $request->state;
                $UsersDetails->city = $request->city;
                $UsersDetails->address = $request->address;
                $UsersDetails->zip = $request->zip;
                $UsersDetails->save();
            }
            

            $Notificaton_insert = array(
                "uid"=>Auth::user()->id,
                "link"=>"",
                "status"=>1,
                "type"=>"success",
                "title"=>"Profile update successfully",
                "desc"=>"Profile update successfully",
            );
            Notificaton_insert($Notificaton_insert);

            return back()->with('success','Profile update successfully!');
        } catch (QueryException $th) {
            return back()->with('warning',$th->errorInfo[2]);
            // dd($th->errorInfo[2]);
        }

        

    }
    public function profile_update_dp(Request $request)
    {
        // return $_FILES;
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
    
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        
        $ud = UsersDetails::where("uid",Auth::user()->id)->first();
        $Notificaton_insert = array(
            "uid"=>Auth::user()->id,
            "link"=>"",
            "status"=>1,
            "type"=>"success",
            "title"=>"Profile picture or DP update successfully",
            "desc"=>"Profile picture or DP update successfully",
        );
        Notificaton_insert($Notificaton_insert);
        if($ud){
            if($ud->avtar_image!=""){
                UsersDetails::updateData("avtar_image","images/".$input['imagename']);
                unlink($ud->avtar_image);
                
            }else{
                UsersDetails::updateData("avtar_image","images/".$input['imagename']);
            }
            if($ud->avtar_thumbnail!=""){
                UsersDetails::updateData("avtar_thumbnail","thumbnail/".$input['imagename']);
                unlink($ud->avtar_thumbnail);
            }else{
                UsersDetails::updateData("avtar_thumbnail","thumbnail/".$input['imagename']);
            }
            
            
        }else{
            
            
        }
       
        
        return "success";
    }
    public function profile_avtar_delete(Request $request)
    {
        
        $ud = UsersDetails::where("uid",Auth::user()->id)->first();
        if($ud){
            if($ud->avtar_image!=""){
                UsersDetails::updateData("avtar_image","");
                unlink($ud->avtar_image);
                
            }else{
                UsersDetails::updateData("avtar_image","");
            }
            if($ud->avtar_thumbnail!=""){
                UsersDetails::updateData("avtar_thumbnail","");
                unlink($ud->avtar_thumbnail);
            }else{
                UsersDetails::updateData("avtar_thumbnail","");
            }
            $Notificaton_insert = array(
                "uid"=>Auth::user()->id,
                "link"=>"",
                "status"=>1,
                "type"=>"success",
                "title"=>"Profile picture delete  successfully",
                "desc"=>"Profile picture  delete  successfully",
            );
            Notificaton_insert($Notificaton_insert);
            return back()->with('success','Successfully avtar deleted!');
        }else{
            $Notificaton_insert = array(
                "uid"=>Auth::user()->id,
                "link"=>"",
                "status"=>1,
                "type"=>"warning",
                "title"=>"Your profile is incompelete",
                "desc"=>"Your profile is incompelete",
            );
            Notificaton_insert($Notificaton_insert);
            return back()->with('warning','Your profile is incompelete!');
            
        }
       
        
    }
    
    public function wallet_add_money(Request $request)
    {
        $api = new Api(env('RZP_api_key'), env('RZP_api_secret'));
        $order  = $api->order->create(array('receipt' => str_replace(" ","",Auth::user()->name)."_".$request->member_id, 'amount' => $request->balance*100, 'currency' => env('CURRENCY_SYMB'))); // Creates order
        $orderId = $order['id']; // Get the created Order ID
        $arr = array("amt"=>$request->balance);
        return view('admin.payment.rzp_add_wallet',compact('arr','order'));
    }


}
