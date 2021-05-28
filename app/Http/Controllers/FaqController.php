<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(){

        $faq = Faq::where('status','on')->get();
        return view('admin.faq.index',compact('faq'));
    }
    public function store(Request $request){
        $faq = new Faq();
        $faq->user_id = Auth::user()->id;
        $faq->q = $request->q;
        $faq->a = $request->a;
        $faq->save();
        return back()->with("success",'FAQ successfully added!');
    }
    public function destroy($id)
    {
        
        $faq = Faq::findOrFail($id);
        if(faq::destroy($id)){
            return back()->with('success','FAQ deleted successfully!');
        }else{
            return back()->with('error','Something going wrong!');
        }
    }
}
