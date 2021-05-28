<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\UserSystemInfoHelper;
use App\Models\UserLoginActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateLastSignIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();
        $arr = json_encode(array(
            'ip' => $getip,
            'ip' => $this->request->ip(),
            'getbrowser' => $getbrowser,
            'getdevice' => $getdevice,
            'getos' => $getos,
            'last_sign_in_at' => Carbon::now(),
        ));
        $event->user->json = $arr;
        $event->user->save();


        $user = $event->user;


        $u_actvity = UserLoginActivity::where("user_id",$user->id)->first();
        if($u_actvity){
            
            UserLoginActivity::updateData(null,['status'=>"off"],$user->id);
        }


        $user_activity = new UserLoginActivity();
        $user_activity->user_id = $user->id;
        $user_activity->json = $arr;
        $user_activity->status = "on";

        $user_activity->save();
        

        // $event->UserLoginActivity->user_id = $event->user->id;
        // $event->UserLoginActivity->json = $arr;
        // $event->UserLoginActivity->status = "on";
        // $event->UserLoginActivity->save();

        
    }
}
