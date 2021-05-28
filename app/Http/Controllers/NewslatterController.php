<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewslatterController extends Controller
{
    public function newsletter_join(Request $request)
    {
        if(Newsletter::where('email',$request->email)->first()){

        }else{
            $nlj = new Newsletter();
            $nlj->email = $request->email;
            $nlj->save();
        }
        
        return back()->with('success','Join successfully!');
    }
}
