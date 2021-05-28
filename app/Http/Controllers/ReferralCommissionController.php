<?php

namespace App\Http\Controllers;

use App\Models\ReferralUser;
use App\ReferralCommission;
use App\Settings;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReferralCommissionController extends Controller
{
    public function index()
    {
        $ReferralCommissions = ReferralCommission::get();

        return view('admin.refer.index',compact('ReferralCommissions'));
    }
    #store
    public function store(Request $request){

        $this->validate($request, [
            'percent' => 'required'
        ]);
        ReferralCommission::trun();
        foreach ($request->percent as $key => $value) {
            // echo $request->level[$key];
            $ReferralCommission = new ReferralCommission();
            $ReferralCommission->level = $request->level[$key];
            $ReferralCommission->commission = $request->percent[$key];
            $ReferralCommission->save();
        }
        
        Settings::updateData("referral_commission_level", array('val'=>count($request->percent)));
        return back()->with('success','Referral Commission created successfully!');
            
    }
    #deleteData
    public function destroy($id)
    {
        ReferralCommission::deleteData($id);
        return back()->with('success','Referral Commission deleted successfully!');
    }
    public function RefRegester($id)
    {
        $uid = User::where('email',$id)->first();
        $arr = array('ref_id'=>$uid->id);
        return view('auth.ref_regerster',compact('arr'));
    }
    public function Referral_user()
    {
        $ReferralUser = ReferralUser::where('refer_id',Auth::user()->id)->get();
        return view('admin.Referral.ReferralUser',compact('ReferralUser'));
    }
}
