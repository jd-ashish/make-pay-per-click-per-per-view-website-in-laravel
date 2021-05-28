@extends('admin.layouts.app')
@section('title')
Referral Commission overview | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("Referral Commission",array("home","Referral","Commission","overview"),"") }}
<!-- end row -->
@if (Auth::user()->Account)
    @if (\App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first()->referral_commission<1)
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>No any base plane to get level!</strong> Upgrade Level now and get more benift or more level earning.
        </div>
        @else
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Yaah!</strong> You are in {{ \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first()->name }} Your level is {{ \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first()->referral_commission }}.
        </div>
    @endif
@else
    <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>No any plan set!</strong> No any plan .
    </div>
@endif



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Referral Link</label>
                            <div class="input-group">
                                <input type="text" value="{{ url('/') }}/ref/{{ Auth::user()->email }}"
                                class="form-control form-control-lg" id="referralURL"
                                readonly>
                                <div class="input-group-append copytextDiv" style="cursor: pointer">
                                    <span class="input-group-text copytext" id="copyBoard"> <i class="fa fa-copy"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container-fluid row">
                    <div class="col-sm-4">
                        <div class="table-responsive">
                            <table class="table table-borderless" style="width:100%">
                                
                                <body>
                                    @foreach ($ReferralCommissions as $key => $ReferralCommission)
                                        <tr>
                                            <th>{{ $ReferralCommission->level }} Level</th>
                                            <td>{{ $ReferralCommission->commission }} %</td>
                                        </tr>
                                    @endforeach
                                    
                                </body>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <body>
                                    @foreach ($referred_by as $key => $value)
                                        <tr>
                                            <td>{{ ($key+1) }}</td>
                                            <td> {{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if ($value->Account)
                                                    {{ $value->Account->membership_id }}
                                                @else
                                                    <span class="text-danger">User do not setup any plan</span>
                                                @endif
                                            </td>
                                            <td>{{ Time_ago(strtotime($value->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                    
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end table-responsive-->

            </div>
            <!-- end card-body-->

        </div>
        <!-- end card-->

    </div>

</div>
<!-- end row-->
@endsection

@section('script')
<script type="text/javascript">
    (function ($) {
        "use strict";
        $('#copyBoard').click(function(){
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
        });
    })(jQuery);
</script>
@endsection
