<?php

use App\Models\Wallets;
use \App\Settings;
use App\Models\User;
use App\Models\Transaction;
use App\Notificaton;
use App\Models\UserAccount;
use App\Models\Membership;
use App\Seo;
use Illuminate\Support\Facades\Auth;

if (! function_exists('top_brade')) {
    function top_brade($title, $brade_item =array(), $item =null){
        ?>
            <div class="row" style="margin-top: -25px;">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?= $title?></h1>
                        <ol class="breadcrumb float-right">
                            <?php 
                                for($i=0; $i<count($brade_item); $i++){
                                    if(($i+1)==count($brade_item)){
                                        ?>
                                            <li class="breadcrumb-item active"><?= $brade_item[$i]?></li>
                                        <?php
                                    }else{
                                        ?>
                                            <li class="breadcrumb-item"><?= $brade_item[$i]?></li>
                                        <?php
                                    }
                                    
                                }
                            ?>
                            <!-- <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Dashboard</li> -->
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    

                </div>
            </div>
        <?php
    }
}
if (! function_exists('back_link')) {
    function back_link($link = null){
        ?>
            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                </div>    
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3">
                        <a href="<?= $link?>" class="icon-btn"><i class="fa fa-fw fa-backward"></i> Go Back </a>
                    </div>
                </div>
            <?php
    }
}




if(!function_exists('status')){
    function status($status_v = null){
        if($status_v=="Refund"){
            return '<span class="ml-2" style="color:green"><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="pickup"){
            return '<span class="ml-2" style="color:#6021ff"><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="Shiping"){
            return '<span class="ml-2" style="color:#0e92f0"><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="Refunding"){
            return '<span class="ml-2" style="color:#0ef0e1"><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="Approved" || $status_v=="Active" || $status_v=="success" || $status_v=="captured" ){
            return '<span class="badge badge-success" ><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="Inactive" || $status_v=="InActive" || $status_v=="inactive"){
            return '<span class="badge badge-danger" ><strong>'.$status_v.'</strong></span>';
        }else if($status_v=="cancel" || $status_v=="denied"){
            return '<span class="badge badge-danger" style="color:white"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else if($status_v=="delivered"){
            return '<span class="ml-2" style="color:green"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else if($status_v=="on_delivery"){
            return '<span class="ml-2" style="color:#B3B0B0"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else if($status_v=="on_review"){
            return '<span class="ml-2" style="color:#B3B0B0"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else if($status_v=="pending"){
            return '<span class="ml-2" style="color:red"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else if($status_v=="PENDING"){
            return '<span class="ml-2" style="color:#F72818"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }if($status_v=="Credit" || $status_v=="credit" || $status_v=="CREDIT" || $status_v=="Refunded" || $status_v=="refunded" || $status_v=="REFUNDED"){
            return '<span class="ml-2" style="color:green"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }if($status_v=="Debit" || $status_v=="debit" || $status_v=="DEBIT"){
            return '<span class="ml-2" style="color:red"><strong>'.ucfirst(str_replace('_', ' ', $status_v)).'</strong></span>';
        }else{
            return '<span class="ml-2" style="color:#fffb21"><strong>'.$status_v.'</strong></span>';
        }
    }
}

if(!function_exists('democheck')){
    function democheck($yes,$no){
        if ((env('DEMO_MODE')=="ON")){
            return $yes;
        }else{
            return $no;
        }
    }
}
if(!function_exists('not_permit')){
    function not_permit(){
        if(Auth::user()->user_type=="user"){
            return back()->with('error','User not permited!');
        }
    }
}
if(!function_exists('overWriteEnvFile')){
    function overWriteEnvFile($type, $val)
    {
        
    }
}
if(!function_exists('Time_ago')){
    function Time_ago($timestamp)  
	{  
		$time_ago = ($timestamp);  
		$current_time = time();  
		$time_difference = $current_time - $time_ago;  
		$seconds = $time_difference;  
		$minutes      = round($seconds / 60 );           // value 60 is seconds  
		$hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
		$days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
		$weeks          = round($seconds / 604800);          // 7*24*60*60;  
		$months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
		$years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
		if($seconds <= 60)  
		{  
		return "$seconds sec ago";  
	}  
		else if($minutes <=60)  
		{  
		if($minutes==1)  
			{  
		return "one minute ago";  
		}  
		else  
			{  
		return "$minutes minutes ago";  
		}  
	}  
		else if($hours <=24)  
		{  
		if($hours==1)  
			{  
		return "an hour ago";  
		}  
			else  
			{  
		return "$hours hrs ago";  
		}  
	}  
		else if($days <= 7)  
		{  
		if($days==1)  
			{  
		return "yesterday";  
		}  
			else  
			{  
		return "$days days ago";  
		}  
	}  
		else if($weeks <= 4.3) //4.3 == 52/12  
		{  
		if($weeks==1)  
			{  
		return "a week ago";  
		}  
			else  
			{  
		return "$weeks weeks ago";  
		}  
	}  
		else if($months <=12)  
		{  
		if($months==1)  
			{  
		return "a month ago";  
		}  
			else  
			{  
		return "$months months ago";  
		}  
	}  
		else  
		{  
		if($years==1)  
			{  
		return "one year ago";  
		}  
			else  
			{  
		return "$years years ago";  
		}  
	}  
	}
}
if(!function_exists('Time_ago')){
    function Time_ago($timestamp)  
	{  
		$time_ago = ($timestamp);  
		$current_time = time();  
		$time_difference = $current_time - $time_ago;  
		$seconds = $time_difference;  
		$minutes      = round($seconds / 60 );           // value 60 is seconds  
		$hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
		$days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
		$weeks          = round($seconds / 604800);          // 7*24*60*60;  
		$months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
		$years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
		if($seconds <= 60)  
		{  
		return "$seconds sec ago";  
	}  
		else if($minutes <=60)  
		{  
		if($minutes==1)  
			{  
		return "one minute ago";  
		}  
		else  
			{  
		return "$minutes minutes ago";  
		}  
	}  
		else if($hours <=24)  
		{  
		if($hours==1)  
			{  
		return "an hour ago";  
		}  
			else  
			{  
		return "$hours hrs ago";  
		}  
	}  
		else if($days <= 7)  
		{  
		if($days==1)  
			{  
		return "yesterday";  
		}  
			else  
			{  
		return "$days days ago";  
		}  
	}  
		else if($weeks <= 4.3) //4.3 == 52/12  
		{  
		if($weeks==1)  
			{  
		return "a week ago";  
		}  
			else  
			{  
		return "$weeks weeks ago";  
		}  
	}  
		else if($months <=12)  
		{  
		if($months==1)  
			{  
		return "a month ago";  
		}  
			else  
			{  
		return "$months months ago";  
		}  
	}  
		else  
		{  
		if($years==1)  
			{  
		return "one year ago";  
		}  
			else  
			{  
		return "$years years ago";  
		}  
	}  
	}
}
if(!function_exists('Time_return')){
    function Time_return($timestamp,$typ)  
	{  
		$time_ago = ($timestamp);  
		$current_time = time();  
		$time_difference = $current_time - $time_ago;  
		$seconds = $time_difference;  
		$minutes      = round($seconds / 60 );           // value 60 is seconds  
		$hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
		$days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
		$weeks          = round($seconds / 604800);          // 7*24*60*60;  
		$months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
		$years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60 
        
        
        if($typ=="sec"){
            return $seconds;
        }
        if($typ=="minutes"){
            return $minutes;
        }
        if($typ=="hours"){
            return $hours;
        }
        if($typ=="day"){
            return $days."days";
        }
        if($typ=="weeks"){
            return $weeks;
        }
        if($typ=="months"){
            return $months;
        }
        if($typ=="years"){
            return $years;
        }

		
	}
}
if(!function_exists('setting_val')){
    function setting_val($var)  
	{  
		if(\App\Settings::where('var',$var)->first()){
			return \App\Settings::where('var',$var)->first()->val;
		}else{
			return "";
		}
	}
}
if(!function_exists('seo')){
    function seo()  
	{  
		return Seo::first();
	}
}
if(!function_exists('wallet_trans')){
    function wallet_trans($data)  
	{  
		$wallet_user1 = new Wallets();
		$wallet_user1->user_id = $data['uid'];
		$wallet_user1->amount = $data['amount'];
		$wallet_user1->type = $data['type'];
		$wallet_user1->payment_type = $data['pt'];
		$wallet_user1->payment_details = $data['pd'];
		$wallet_user1->save();
	}
}
if(!function_exists('Transaction_insert')){
    function Transaction_insert($data)  
	{  
		$Transaction = new Transaction();
                $Transaction->user_id = $data['uid'];
                $Transaction->credit = $data['credit'];
                $Transaction->debit = $data['debit'];
                $Transaction->final = $data['final'];
                $Transaction->type = $data['type'];
                $Transaction->title = $data['title'];
                $Transaction->description = $data['description'];
                $Transaction->save();
	}
}
if(!function_exists('Notificaton_insert')){
    function Notificaton_insert($data)  
	{
                $notify = new Notificaton();
				$notify->user_id = $data['uid'];
				$notify->title = $data['title'];
				$notify->description = $data['desc'];
				$notify->type = $data['type'];
				$notify->link = $data['link'];
				$notify->status = $data['status'];
				$notify->save();
	}
}

$llv = array();
$llv2 = array();
if(!function_exists('level')){
    function level($uid)  
	{
		global $llv,$llv2;
		
		function test2($iid){
			$user_level3 = User::where('id',$iid)->first();
			if($user_level3){
				$uad3 = UserAccount::where('user_id',$user_level3->id)->first();
				if($uad3){
					$mem3 = Membership::where('id',$uad3->membership_id)->first();
					if($mem3){
						if($mem3->referral_commission > 0){
							//start lavel-2 earning
							$llv[] = array(
								'level'=>2,
								'refid'=>$user_level3,
								'auth'=>Auth::user()->id
							);
							
						}else{
							$llv[] = test2($user_level3->referred_by);
						}
					}else{
						$llv[] = array(
							'member'=>true
						);
					}
				}else{
					$llv[] = array(
						'error'=>true
					);
				}
				
			}
			return $llv;
		}
		function level_n($ref_id,$level){
			$user_level3 = User::where('referred_by',$ref_id)->first();
			if($user_level3){
				$uad3 = UserAccount::where('user_id',$user_level3->id)->first();
				if($uad3){
					$mem3 = Membership::where('id',$uad3->membership_id)->first();
					if($mem3){
						if($mem3->referral_commission > 0){
							//start lavel-2 earning
							$llv2[] = array(
								'level'=>$level,
								'refid'=>$ref_id,
								'auth'=>Auth::user()->id
							);
							
						}else{
							$llv2[] = array(
								'level'=>$level,
								'refid'=>$ref_id,
								'auth'=>Auth::user()->id
							);
						}
					}else{
						$llv2[] = array(
							'level'=>$level,
							'refid'=>"",
							'auth'=>Auth::user()->id,
							'error'=>true
						);
					}
				}else{
					$llv2[] = array(
						'level'=>$level,
						'refid'=>"",
						'auth'=>Auth::user()->id,
						'error'=>true
					);
				}
				
			}
			return $llv2;
		}
		function level_n_ById($ref_id,$level){
			
			$user_level3 = User::where('id',$ref_id)->first();
			if($user_level3){
				$uad3 = UserAccount::where('user_id',$user_level3->id)->first();
				if($uad3){
					$mem3 = Membership::where('id',$uad3->membership_id)->first();
					if($mem3){
						if($mem3->referral_commission > 0){
							//start lavel-2 earning
							$llv2[] = array(
								'level'=>$level,
								'refid'=>$user_level3->referred_by,
								'auth'=>Auth::user()->id
							);
							
						}else{
							$llv2[] = array(
								'level'=>$level,
								'refid'=>$user_level3->referred_by,
								'auth'=>Auth::user()->id
							);
						}
					}else{
						$llv2[] = array(
							'level'=>$level,
							'refid'=>"",
							'auth'=>Auth::user()->id,
							'error'=>true
						);
					}
				}else{
					$llv2[] = array(
						'level'=>$level,
						'refid'=>"",
						'auth'=>Auth::user()->id,
						'error'=>true
					);
				}
				
			}else{
				if($ref_id==""){
					$llv2[] = array(
						'level'=>$level,
						'refid'=>"",
						'auth'=>Auth::user()->id,
						'error'=>true
					);
				}else{
					$llv2[] = array(
						'level'=>$level,
						'refid'=>"",
						'auth'=>Auth::user()->id,
						'error'=>true
					);
				}
				
			}
			return $llv2;
		}
		$user_level2 = User::where('id',$uid)->first();
		if($user_level2){
			$uad2 = UserAccount::where('user_id',$user_level2->id)->first();
			if($uad2){
				$mem2 = Membership::where('id',$uad2->membership_id)->first();
				if($mem2){
					if($mem2->referral_commission > 0){
						//start lavel-2 earning
						// $llv[] = array(
						// 	'level'=>1,
						// 	'refid'=>$uid,
						// 	'auth'=>Auth::user()->id
						// );
						$llv[]  = level_n($uid,1);
						$llv[]  = level_n($user_level2->referred_by,2);
						$llv[]  = level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3);
						$llv[]  = level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4)[0]['refid'],5);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5)[0]['refid'],6);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6)[0]['refid'],7);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7)[0]['refid'],8);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8)[0]['refid'],9);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23)[0]['refid'],24);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23)[0]['refid'],24)[0]['refid'],25);
					}else{
						// $llv[] = array(
						// 	'level'=>1,
						// 	'refid'=>$uid,
						// 	// 'refid_test'=>level_n($user_level2->referred_by,2)[0]['refid'],
						// 	'auth'=>Auth::user()->id
						// );
						// $llv[]  = test2($user_level2->referred_by);
						$llv[]  = level_n($uid,1);
						$llv[]  = level_n($user_level2->referred_by,2);
						$llv[]  = level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3);
						$llv[]  = level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4)[0]['refid'],5);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5)[0]['refid'],6);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6)[0]['refid'],7);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7)[0]['refid'],8);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8)[0]['refid'],9);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23)[0]['refid'],24);
						$llv[]  = level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n_ById(level_n($user_level2->referred_by,2)[0]['refid'],3)[0]['refid'],4),5),6),7),8),9)[0]['refid'],10)[0]['refid'],11)[0]['refid'],12)[0]['refid'],13)[0]['refid'],14)[0]['refid'],15)[0]['refid'],16)[0]['refid'],17)[0]['refid'],18)[0]['refid'],19)[0]['refid'],20)[0]['refid'],21)[0]['refid'],22)[0]['refid'],23)[0]['refid'],24)[0]['refid'],25);
					}
				}
			}else{
				$llv[]  = test2($user_level2->referred_by);
			}
			
		}
		return ($llv);
	}
}

if (! function_exists('send_otp')) {
    function send_otp($phone="",$otp=""){
        switch (setting_val('sms_pkg')) {
			case 'fast2sms':
				print_r(json_decode(setting_val("fast2sms_dlt_details")));

				if(setting_val('fast2sms_without_dlt')=="on"){
					$field = array(
						"route" => "v3",
						"sender_id" => "TXTIND",
						"message" => "Your OTP from ".env('APP_NAME')." ".$otp,
						"language" => "english",
						"flash" => 0,
						"numbers" => $phone,
					);
					$curl = curl_init();
					
					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_SSL_VERIFYHOST => 0,
					  CURLOPT_SSL_VERIFYPEER => 0,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => json_encode($field),
					  CURLOPT_HTTPHEADER => array(
						"authorization: ".env('FAST2SMS_KEY'),
						"cache-control: no-cache",
						"accept: */*",
						"content-type: application/json"
					  ),
					));
					
					$response = curl_exec($curl);
					$err = curl_error($curl);
					
					curl_close($curl);
						
						if ($err) {
						return "cURL Error #:" . $err;
						} else {
						return true;
						}
				}
				if(setting_val('fast2sms_with_dlt')=="on"){
					$field = array(
						"route" => json_decode(setting_val("fast2sms_dlt_details"))->route,
						"sender_id" => json_decode(setting_val("fast2sms_dlt_details"))->sender_id,
						"message" => json_decode(setting_val("fast2sms_dlt_details"))->message,
						"variables_values" => $otp,
						"language" => "english",
						"flash" => 0,
						"numbers" => $phone,
					);
					$curl = curl_init();
					
					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_SSL_VERIFYHOST => 0,
					  CURLOPT_SSL_VERIFYPEER => 0,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => json_encode($field),
					  CURLOPT_HTTPHEADER => array(
						"authorization: ".env('FAST2SMS_KEY'),
						"cache-control: no-cache",
						"accept: */*",
						"content-type: application/json"
					  ),
					));
					
					$response = curl_exec($curl);
					$err = curl_error($curl);
					
					curl_close($curl);
						
						if ($err) {
						return false;
						} else {
						return true;
						}
				}
				
				break;
			case 'twilio':
				
				Twilio::message($phone, "Your OTP from ".env('APP_NAME')." ".$otp);
					break;
			
			default:
					echo setting_val('sms_pkg');
				break;
		}

    }
}
if (! function_exists('OTP_G')) {
    function OTP_G($n) {
	
		$generator = "1357902468";
	
	
		$result = "";
	
		for ($i = 1; $i <= $n; $i++) {
			$result .= substr($generator, (rand()%(strlen($generator))), 1);
		}
	
		return $result;
	}

}
if (! function_exists('json_data')) {
    function json_data() {
	
		$string = file_get_contents("count.json");
        return json_decode($string);
	}

}
if (! function_exists('cSpace')) {
    function cSpace($string) {
	
		return preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
	}

}
if (! function_exists('select_Timezone')) {
    function select_Timezone($selected = '') {
		$OptionsArray = timezone_identifiers_list();
			$select= '<label>Select timezone</label><select name="time_zoon" class="select2" style="width:100%">';
			foreach ($OptionsArray as $key => $val ){
				$select .='<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : '');
				$select .= '>'.$val.'</option>';
			}  // endwhile;
			$select.='</select>';
	return $select;
	}

}

