@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('title')
    {{ $user->name." Details" }} | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("Users",array("home","Users","View","Users details"),"") }}
<!-- end row -->
<div class="row mb-none-30">
    <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

        <div class="card b-radius--10 overflow-hidden box--shadow1">
            <div class="card-body p-0">
                <div class="p-3 bg--white">
                    <div class="">
                        <img src="@if ($user->details){{ url('/').'/'.$user->details->avtar_image }}@endif" alt="profile-image" class="b-radius--10 w-100">
                    </div>
                    <div class="mt-15">
                        <h4 class="">{{ $user->name }}</h4>
                        <span class="text--small">Joined At <strong>{{ $user->created_at }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
            <div class="card-body">
                <h5 class="mb-20 text-muted">User information</h5>
                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Username                            <span class="font-weight-bold text-decoration-none">[Email-Id]</span>
                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center">Status
                    @if ($user->email_verified_at=="")
                        <?= status("pending")?>
                    @else
                        <?= status("Active")?>
                    @endif
                    </li>
                    @php
                        $ru = 0;
                        $rc = 0;
                    @endphp
                    @foreach ($ReferralUser as $key => $value)
                        @php
                            $ru++;
                            $rc += $value->amount;
                        @endphp
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Balance                            <span class="font-weight-bold">{{ $user->balance }}  {{ env('CURRENCY_TYPE') }}</span>
                    </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Referral                            <span class="font-weight-bold">
                           <a href="javascript:void();"> {{ $ru }} User</a>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Commissions                            <span class="font-weight-bold">
                           <a href="javascript:void();"> {{ $rc }}  {{ env('CURRENCY_TYPE') }}</a>
                        </span>
                    </li>
                                        </ul>
            </div>
        </div>
        <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
            <div class="card-body">
                <h5 class="mb-20 text-muted">User action</h5>
                <a href="javascript:void();" route="{{ route('User.login.logs') }}" title="User log details" id="{{ $user->id }}" class="btn btn--primary btn--shadow btn-block btn-lg getUserLog">
                    Login Logs                    </a>
                <a href="{{ route('send_email.users') }}/?id={{ base64_encode($user->id) }}&name={{ base64_encode($user->name) }}" class="btn btn--danger btn--shadow btn-block btn-lg">
                    Send Email                    </a>
                <form action="{{ route('account.user.delete') }}" method="post" class="mt-2">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="uid">
                    <button type="submit" class="btn btn--danger btn--shadow btn-block btn-lg"> Account delete </button>
                </form>
                
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

        <div class="row mb-none-30">
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--gradi-1 b-radius--10 box-shadow has--link">
                    <a href="{{ route('wallet.index') }}" class="item--link"></a>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                            <span class="amount counter">{{ $user->balance }}</span>
                        </div>
                        <div class="desciption">
                            <span>My Ballance</span>
                        </div>
                    </div>
                </div>
            </div><!-- dashboard-w1 end -->
        
        
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--gradi-15 b-radius--10 box-shadow has--link">
                    <a href="{{ route('withdraw.index') }}" class="item--link"></a>
                    <div class="icon">
                        <i class="fa fa-wallet"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                            <span class="amount counter">@if ($user->Account) {{ $user->Account->withdraw }} @else 0 @endif </span>
                            
                        </div>
                        <div class="desciption">
                            <span>Total Withdraw</span>
                        </div>
                    </div>
                </div>
            </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--gradi-13 b-radius--10 box-shadow has--link">
                    <a href="javascript:void(0)" class="item--link"></a>
                    <div class="icon">
                        <i class="la la-exchange-alt"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount counter">
                                {{ count($user->UserAdsViewStatus) }}
                                
                            </span>
                        </div>
                        <div class="desciption">
                            <span>Total Ads views</span>
                        </div>
                    </div>
                </div>
            </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--gradi-11 b-radius--10 box-shadow has--link">
                    <a @if (Auth::user()->Account) data-fancybox="modal" data-src="#get_selected_plan_details" role="button" @else data-fancybox="modal" data-src="#create_membership_form" role="button" @endif href="javascript:void(0)" class="item--link"></a>
                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">
        
                                @if ($user->Account) {{ \App\Models\Membership::where('id',$user->Account->membership_id)->first()->name  }} @else Setup plan @endif
                                
                            </span>
                        </div>
                        <div class="desciption">
                            <span>My plan</span>
                        </div>
                    </div>
                </div>
            </div><!-- dashboard-w1 end -->


        </div>


        <div class="card mt-50">
            <div class="card-body">
                <h5 class="card-title mb-50 border-bottom pb-2">{{ $user->name }} Information</h5>

                <form action="{{ route('profile.update.ById') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">User Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">Email <span class="text-danger">*</span></label>
                                
                                <?php
                                    echo democheck('<input class="form-control" type="email" name="email" value="  [Email Protected For Demo]">',' <input class="form-control" type="email" name="email" value="'.$user->email.'">');
                                    
                                ?>
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label  font-weight-bold">Mobile Number <span class="text-danger">*</span></label>
                                <?php
                                    echo democheck('<input class="form-control" type="text" name="email" value="  [Phone Protected For Demo]">',' <input class="form-control" type="number" name="phone" value="'.$user->phone.'">');
                                    
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">Address </label>
                                <input class="form-control" type="text" name="address" value="@if ($user->details){{ $user->details->address }}@endif">
                                <small class="form-text text-muted"><i class="las la-info-circle"></i> House number,
                                    street address                                    </small>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">City </label>
                                <input class="form-control" type="text" name="city" value="@if ($user->details){{ $user->details->city }}@endif">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">State </label>
                                <input class="form-control" type="text" name="state" value="@if ($user->details){{ $user->details->state }}@endif">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">Zip/Postal </label>
                                <input class="form-control" type="text" name="zip" value="@if ($user->details){{ $user->details->zip }}@endif">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">Country </label>
                                
                                <select name="country" class="form-control select2" style="width: 100%"> 
                                    <option value="Afghanistan"> Select Country</option>
                                    @foreach ($contry as $contr)
                                        <option value="{{ $contr->id }}" @if ($user->details) @if($user->details->country==$contr->id) selected @endif @endif>{{ $contr->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">
                            <label class="form-control-label font-weight-bold">Status </label>
                            
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="Active" data-off="Banned" data-width="100%"
                                   name="status"
                                   @if ($user->status!="on")
                                        
                                    @else
                                        checked
                                    @endif >
                        </div>

                        <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                            <label class="form-control-label font-weight-bold">Email Verification </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ev"
                                   @if ($user->email_verified_at==""  || $user->email_verified_at=="0000-00-00 00:00:00")
                                        
                                   @else
                                       checked
                                   @endif >

                        </div>

                        <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                            <label class="form-control-label font-weight-bold">SMS Verification </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="Verified" data-off="Unverified" name="sv"
                                   @if ($user->sms_verified_at=="" || $user->sms_verified_at=="0000-00-00 00:00:00")
                                        
                                   @else
                                       checked
                                   @endif >

                        </div>
                        {{-- <div class="form-group  col-md-6  col-sm-3 col-12">
                            <label class="form-control-label font-weight-bold">2FA Status </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="Enable" data-off="Disable" name="ts"
                                   >
                        </div>

                        <div class="form-group  col-md-6  col-sm-3 col-12">
                            <label class="form-control-label font-weight-bold">2FA Verification </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                   data-toggle="toggle" data-on="Verified" data-off="Unverified" name="tv"
                                    checked >
                        </div> --}}
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary btn-block btn-lg">Save Changes                                    </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection
