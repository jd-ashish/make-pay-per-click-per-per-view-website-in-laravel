@extends('admin.layouts.app')
@section('title')
    Referral User overview | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("Referral User",array("home","Referral","users","Earn by level"),"") }}
<!-- end row -->



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
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>You</th>
                                        <th>level</th>
                                        <th>Earn from</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <body>
                                    @foreach ($ReferralUser as $key => $value)
                                        <tr>
                                            <th>{{ ($key+1) }}</th>
                                            <td class="text-success"> {{ \App\Models\User::where('id',$value->refer_id)->first()->name }}</td>
                                            <td class="text-bold" style="color: green">{{ $value->level }} Level</td>
                                            <td>{{ \App\Models\User::where('id',$value->auth_id)->first()->name }}</td>
                                            <th>{{ env('CURRENCY_TYPE') }} {{ $value->amount }}</th>
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
