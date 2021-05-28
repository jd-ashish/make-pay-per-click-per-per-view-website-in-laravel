<?php

namespace App\Http\Controllers;

use App\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index(){
        $seo = Seo::first();
        return view('admin.seo.index',compact('seo'));
    }
    public function store(Request $request)
    {
        // return $_POST;
        $seosetting = Seo::first();
        $seosetting->keyword = implode('|',$request->tags);
        $seosetting->author = $request->author;
        $seosetting->revisit = $request->revisit;
        $seosetting->sitemap_link = $request->sitemap_link;
        $seosetting->description = $request->description;
        $seosetting->app_title = $request->app_title;
        if($seosetting->save()){
            return back()->with('success',"SEO Updates");
        }
        else{
            return back()->with('error',"Somethings wrongs");
        }
    }
}
