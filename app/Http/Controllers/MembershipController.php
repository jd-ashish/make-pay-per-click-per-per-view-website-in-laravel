<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $membership = Membership::get();

        return view('admin.membership.index',compact('membership'));
    }
    public function store(Request $request){

        // $this->validate($request, [
        //     'name' => 'required',
        //     'price' => 'required',
        //     'daily_limit' => 'required',
        //     'referral_commission' => 'required',
        // ]);

        $membership = new Membership();
        $membership->name = $request->name;
        $membership->price = $request->price;
        $membership->daily_limit = $request->daliylimit;
        $membership->referral_commission = $request->ReferralCommission;
        if($request->status==""){
            $membership->status = "off";
        }else{
            $membership->status = $request->status;
        }
        if($membership->save()){
            return back()->with('success','Ads created successfully!');
        }else{
            return back()->with('error','Something going wrong!');
        }
    }
    public function update(Request $request){
        $membership = Membership::findOrFail($request->id);
        $membership->name = $request->name;
        $membership->price = $request->price;
        $membership->daily_limit = $request->daliylimit;
        $membership->referral_commission = $request->ReferralCommission;
        if($request->status==""){
            $membership->status = "off";
        }else{
            $membership->status = $request->status;
        }
        if($membership->save()){
            return back()->with('success','Membership update successfully!');
        }else{
            return back()->with('error','Something going wrong!');
        }
    }
    public function destroy($id)
    {
        $Ads = Membership::findOrFail($id);
        if(Membership::destroy($id)){
            return back()->with('success','Membership deleted successfully!');
        }else{
            return back()->with('error','Something going wrong!');
        }
    }
}
