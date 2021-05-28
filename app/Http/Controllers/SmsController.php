<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function config()
    {
        return view('admin.sms_manager.config');
    }
    public function save(Request $request)
    {

        // return $_POST;
        $request->validate([
            'sms_pkg' => 'required'
        ]);
        if($request->sms_pkg=="fast2sms"){
            if($request->DLT_SLT!=""){
                if($request->DLT_SLT=="without_dlt"){
                    //without_dlt
                    if($request->FAST2SMS_KEY!=""){
                        EmailManagerController::overWriteEnvFile("FAST2SMS_KEY",$request->FAST2SMS_KEY);
                        SettingsController::setng("sms_pkg",$request->sms_pkg);
                        SettingsController::setng("fast2sms_without_dlt","on");
                        SettingsController::setng("fast2sms_with_dlt","off");

                        return back()->with('success', 'SMS configuration successfully saved!');
                    }else{
                        return back()->with('warning', 'Enter FAST2SMS KEY');
                    }
                }else{
                    //with DLT
                     $arr = json_encode(array(
                        "route" => $request->route,
                        "sender_id" => $request->sender_id,
                        "message" => $request->message
                    ));
                   
                    if($request->FAST2SMS_KEY!=""){
                        EmailManagerController::overWriteEnvFile("FAST2SMS_KEY",$request->FAST2SMS_KEY);
                        
                        SettingsController::setng("sms_pkg",$request->sms_pkg);
                        SettingsController::setng("fast2sms_without_dlt","off");
                        SettingsController::setng("fast2sms_with_dlt","on");
    
                        SettingsController::setng("fast2sms_dlt_details",$arr);

                        return back()->with('success', 'SMS configuration successfully saved!');
                    }else{
                        return back()->with('warning', 'Enter FAST2SMS KEY');
                    }
                }
                
            }else{
                return back()->with('warning', 'Select DLT types');
            }
        }elseif($request->sms_pkg=="twilio"){
            if($request->TWILIO_SID!=""){
                if($request->TWILIO_TOKEN!=""){
                    if($request->TWILIO_FROM!=""){
                        EmailManagerController::overWriteEnvFile("TWILIO_SID",$request->TWILIO_SID);
                        EmailManagerController::overWriteEnvFile("TWILIO_TOKEN",$request->TWILIO_TOKEN);
                        EmailManagerController::overWriteEnvFile("TWILIO_FROM",$request->TWILIO_FROM);
                        SettingsController::setng("sms_pkg",$request->sms_pkg);

                        return back()->with('success', 'SMS configuration successfully saved!');
                    }else{
                        return back()->with('warning', 'Enter TWILIO FROM!');
                    }
                }else{
                    return back()->with('warning', 'Enter TWILIO TOKEN!');
                }
            }else{
                return back()->with('warning', 'Enter TWILIO SID!');
            }
        }
        return back()->with('error', 'Something going wrong!');
    }
}
