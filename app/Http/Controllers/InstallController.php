<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersDetails;
use App\Seo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function install(Type $var = null)
    {
        try {
            return view('admin.install.install');
        } catch (\Throwable $th) {
            return dd($th);
        }

    }
    public function store(Request $request)
    {
        ini_set('max_execution_time', 180); //3 minutes
        try {
            $this->validate($request,[
                'purch_code'=>'required',
                'Host'=>'required',
                'DB_PORT'=>'required',
                'Database_user_name'=>'required',
                'Database_name'=>'required',
            ]);
        } catch (Exception $th) {
            // return dd($th->validator->messages()->messages());
            foreach ($th->validator->messages()->messages() as $key => $value) {
                return redirect(route('install'))->with('info', $value[0]);
            }
            // return redirect(route('install')."/?final=true")->with('info', cSpace(explode("::",$th->getMessage())[1]));
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://softechcon.xyz/verify/verify.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"purchase_code\"\r\n\r\n".$request->purch_code."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 72e88640-a69d-a59e-a7f2-a06be7db36f7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return back()->with('error', "cURL Error #:" . $err);
            // echo "cURL Error #:" . $err;
        } else {
            $res = json_decode($response);
            if($res->error){
                return redirect(route('install')."/?step=sql_setup")->with('success', $res->message);
                
            }else{
                try {
                    if (!file_exists('sql')) {
                        mkdir('sql', 0777, true);
                    }
                    if(copy($res->sql."_pcc","sql/db.sql")){
                        SettingsController::overWriteEnvFile("DB_HOST",$request->Host);
                        SettingsController::overWriteEnvFile("DB_PORT",$request->DB_PORT);
                        SettingsController::overWriteEnvFile("DB_PASSWORD",$request->Database_password);
                        SettingsController::overWriteEnvFile("DB_DATABASE",$request->Database_name);
                        SettingsController::overWriteEnvFile("DB_USERNAME",$request->Database_user_name);

                        return redirect(route('install')."/?step=sql_setup")->with('success', $res->message);

                    }else{
                        return back()->with('error', "Some thing wrong or main not bee internet connections");
                    }
                } catch (\Throwable $th) {
                    //return error message
                    // return ($th->getMessage());
                    return back()->with('error', $th->getMessage());
                }
            }
        }
        return back()->with('error', "try again");
    }
    public function account_setup(Request $request){



        try {
            $this->validate($request,[
                'APP_NAME'=>'required',
                'app_tag'=>'required',
                'APP_URL'=>'required|url',
                'account_email'=>'required|email',
                'password'=>'required|min:8',
                'cnf_pass'=>'required_with:password|same:password|min:8',
                'address'=>'required',
                'phone'=>'required|integer',
                'state'=>'required',
                'zip'=>'required',
            ]);
        } catch (Exception $th) {
            // return dd($th);
            foreach ($th->validator->messages()->messages() as $key => $value) {
                return redirect(route('install')."/?final=true")->with('info', $value[0]);
            }
            // return redirect(route('install')."/?final=true")->with('info', cSpace(explode("::",$th->getMessage())[1]));
        }



        try {
            // return $_POST;

            SettingsController::setng("APP_DESC",$request->app_tag);
            $seosetting = Seo::first();
            $seosetting->app_title = $request->app_tag;
            $seosetting->save();

            $user = User::create([
                'name' => $request->APP_NAME,
                'user_type' => "admin",
                'email_verified_at' => date('Y-m-d H:m:s'),
                'email' => $request->account_email,
                'password' => Hash::make($request->password),
            ]);

            $UsersDetails = new UsersDetails();
            $UsersDetails->uid = $user->id;
            $UsersDetails->state = $request->state;
            $UsersDetails->address = $request->address;
            $UsersDetails->zip = $request->zip;
            $UsersDetails->save();

            $Notificaton_insert = array(
                "uid"=>$user->id,
                "link"=>"",
                "status"=>1,
                "type"=>"success",
                "title"=>"App install successfully successfully",
                "desc"=>"App install successfully successfully",
            );
            Notificaton_insert($Notificaton_insert);
            SettingsController::overWriteEnvFile("APP_NAME",$request->APP_NAME);
            SettingsController::overWriteEnvFile("INSTALL",time());
            SettingsController::overWriteEnvFile("APP_DESC",$request->app_tag);
            SettingsController::overWriteEnvFile("APP_URL",$request->APP_URL);


        } catch (Exception $th) {
            foreach ($th->validator->messages()->messages() as $key => $value) {
                return redirect(route('install')."/?final=true")->with('info', $value[0]);
            }
            // return redirect(route('install')."/?final=true")->with('info', cSpace(explode("::",$th->getMessage())[1]));
        }


        return redirect(route('login'))->with('success', "App install successfully");
    }
    public function setEnvironmentValue($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($value),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
