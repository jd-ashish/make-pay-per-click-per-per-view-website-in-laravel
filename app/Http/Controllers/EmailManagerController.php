<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailManagerController extends Controller
{
    public function config()
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        return view('admin.email_manager.email_config');
    }
    public function global_template()
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        return view('admin.email_manager.global_template');
    }
    public function env_key_update(Request $request)
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        foreach ($request->types as $key => $type) {
                $this->overWriteEnvFile($type, $request[$type]);
        }

        return back()->with('success','Email update successfully!');
    }
    public static function overWriteEnvFile($type, $val)
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
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
    public function global_template_store(Request $request)
    {
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
        $set = Settings::where('var','email_global_template')->first();
        if($set){
            Settings::updateData("email_global_template", $request->global_template);
            return back()->with('success','Email global template saved successfully!');
        }else{
            $set = new Settings();
            $set->var = "email_global_template";
            $set->val = $request->global_template;
            $set->save();
            return back()->with('success','Email global template saved successfully!');
        }
        
    }
    public function send_email_users(Request $request)
    {
        
        return view('admin.users.send_email');
        
    }
    public function send_email_users_all(Request $request)
    {
        if($request->user_id!=""){
            $emls = User::where("id",$request->user_id)->get();
        }else{
            $emls = User::where("user_type","!=","admin")->get();
        }
        
        foreach($emls as $key => $val){
            $details = [
                'subject' => $request->subjects,
                "message"=>$request->messages,
            ];
            // return view('mail',compact('details'));
            Mail::to($val->email)->send(new \App\Mail\BlankEmail($details));
        }
        
        return back()->with('success','Email send successfully!');
        
    }
}
