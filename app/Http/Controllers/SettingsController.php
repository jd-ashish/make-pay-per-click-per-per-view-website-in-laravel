<?php

namespace App\Http\Controllers;

use App\Models\Clicks;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\UserAdsViewStatus;
use App\Models\UsersDetails;
use App\Models\Wallets;
use App\Notificaton;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Image;


class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {

        // return $_POST;
        if($request->status_ref==""){
            $status_ref = "of";
        }else{
            $status_ref = "on";
        }
        $this->setng("status_ref",$status_ref);
        $this->setng("CommissionAmount_ref",$request->CommissionAmount_ref);
        $this->setng("user1CommissionPercent_ref",$request->user1CommissionPercent_ref);
        $this->setng("user2CommissionPercent_ref",$request->user2CommissionPercent_ref);
        $this->setng("price_table",$request->price_table);
        $this->setng("address",$request->address);
        $this->setng("city",$request->city);
        $this->setng("state",$request->state);
        $this->setng("zip",$request->zip);
        $this->setng("country",$request->country);
        $this->setng("withdraw_limit",$request->withdraw_limit);
        $this->setng("Withdraw_options",json_encode($request->Withdraw_options));
        $this->setng("instant_withdraw",$request->instant_withdraw);
        $this->setng("APP_NAME",$request->APP_NAME);
        $this->setng("APP_DESC",$request->APP_DESC);

        

        $this->setng("CURRENCY_TYPE",$request->currencies_sumb);

        $this->overWriteEnvFile("timezone",$request->time_zoon);
        $this->overWriteEnvFile("CURRENCY_SYMB",$request->currencies_code);
        $this->overWriteEnvFile("CURRENCY_TYPE",$request->currencies_sumb);
        


        
        if($request->APP_NAME!=env('APP_NAME')){
            $this->overWriteEnvFile("APP_NAME",$request->APP_NAME);
        }
        if($request->APP_DESC!=env('APP_DESC')){
            $this->overWriteEnvFile("APP_DESC",$request->APP_DESC);
        }

        return back()->with('success', 'Settings update successfully ');
    }
    public function fend_store(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            // $key gives you the key. 2 and 7 in your case.
            $this->setng($key,$value);
        }
        return back()->with('success', 'Settings update successfully ');
    }
    public static function overWriteEnvFile($type, $val)
    {
        
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
    public static function setng($var = null,$val = null)
    {
        if(Settings::where('var',$var)->first()){
            Settings::updateData($var, $val);
        }else{
            $se = new Settings();
            $se->var = $var;
            $se->val = $val;
            $se->save();
        }
        return true;
    }
    public function setting_fevicon_update(Request $request)
    {
        // return $_FILES;
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(32, 32, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
    
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        
        $Notificaton_insert = array(
            "uid"=>Auth::user()->id,
            "link"=>"",
            "status"=>1,
            "type"=>"success",
            "title"=>"Fevicon update successfully",
            "desc"=>"Fevicon update successfully",
        );
        Notificaton_insert($Notificaton_insert);
        if(setting_val('fevicon_image')!=""){
            $this->setng("fevicon_image","images/".$input['imagename']);
            unlink(setting_val('fevicon_image'));
            
        }else{
            $this->setng("fevicon_image","images/".$input['imagename']);
        }
        if(setting_val('fevicon_thumbnail')!=""){
            $this->setng("fevicon_thumbnail","thumbnail/".$input['imagename']);
            unlink(setting_val('fevicon_thumbnail'));
        }else{
            $this->setng("fevicon_thumbnail","thumbnail/".$input['imagename']);
        }
       
        
        return "success";
    }
    public function user_account_delete(Request $request)
    {
        Clicks::deleteUserData($request->uid);
        Transaction::deleteUserData($request->uid);
        
        UserAccount::deleteUserData($request->uid);
        UserAdsViewStatus::deleteUserData($request->uid);
        UsersDetails::deleteUserData($request->uid);
        Notificaton::deleteUserData($request->uid);
        Wallets::deleteUserData($request->uid);
        User::deleteData($request->uid);
        return redirect(route('users.index'))->with('success', 'congratulation you have deleted account successfully');
    }
}
