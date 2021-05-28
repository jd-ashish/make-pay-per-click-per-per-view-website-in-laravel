@extends('admin.layouts.app')
@section('title')
    Account Settings | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('style')
    <style>
        .select2-selection__rendered {
    line-height: 38px !important;
    border-radius: 0px;
}
.select2-container .select2-selection--single {
    height: 38px !important;
    border-radius: 0px;
}
.select2-selection__arrow {
    height: 38px !important;
    border-radius: 0px;
}
    </style>
@endsection
@section('content')
{{ top_brade("Account settings",array("home","Settings","Account settings","index"),"") }}
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

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> Referal commission settings</h3>
            </div>

            <div class="card-body">


                <form action="{{ route('account.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">App name  </label>
                                <input class="form-control" name="APP_NAME" type="text" value="{{ setting_val("APP_NAME") }}" required />
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>App descriptions</label>
                                <input class="form-control" name="APP_DESC" type="text" value="{{ setting_val("APP_DESC") }}" required />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">Referal commission  </label>
                                    
                                    <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                           data-toggle="toggle" data-on="Active" data-off="Inactive" data-width="100%"
                                           name="status_ref"
                                           @if (setting_val("status_ref")=="on")
                                               checked
                                           @endif
                                           >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Commission amount</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="CommissionAmount_ref" type="number" value="{{ setting_val("CommissionAmount_ref") }}" required />
                                    <div class="input-group-append">
                                      <span class="input-group-text">{{ env('CURRENCY_TYPE') }}</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>User 1 commission %</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="user1CommissionPercent_ref" type="number" value="{{ setting_val("user1CommissionPercent_ref") }}"  required />
                                    <div class="input-group-append">
                                      <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>User 2 commission %</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="user2CommissionPercent_ref" type="number" value="{{ setting_val("user2CommissionPercent_ref") }}" required />
                                    <div class="input-group-append">
                                      <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>currencies code</label>
                                <div class="input-group mb-3">
                                    <select class="select2" name="currencies_code" style="width: 100%">
                                        <option>Select currencies code</option>
                                        @foreach (json_data() as $key => $value)
                                            <option value="<?= $value->currencies[0]->code?>" @if(env('CURRENCY_SYMB')== $value->currencies[0]->code) selected @endif><?= $value->currencies[0]->code." , ".$value->currencies[0]->name?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>currencies symbol</label>
                                <div class="input-group mb-3">
                                    <select class="select2" name="currencies_sumb" style="width: 100%">
                                        <option>Select currencies symbol </option>
                                        @foreach (json_data() as $key => $value)
                                            <option value="<?= $value->currencies[0]->symbol?>" @if(setting_val('CURRENCY_TYPE')== $value->currencies[0]->symbol) selected @endif ><?= $value->currencies[0]->symbol." , ".$value->currencies[0]->name?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Select price table</label>
                                <div class="input-group mb-3">
                                    <select class="select2" name="price_table" style="width: 100%">
                                        <option>Select price tables</option>
                                        <option value="1" @if (setting_val("price_table")=="1") selected @endif>Price table 1</option>
                                        <option value="2" @if (setting_val("price_table")=="2") selected @endif>Price table 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                @php
                                    echo config(['app.timezone']);

                                @endphp
                                <?= select_Timezone()?>
                            </div>
                        </div>
                    </div>
                        
                        <div class="form-group">
                          <label for="inputAddress">Billing Address</label>
                          <input type="text" class="form-control" id="inputAddress" name="address" value="{{ setting_val("address") }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputCity">Billing City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" value="{{ setting_val("city") }}">
                            </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Billing State</label>
                            <input type="text" class="form-control" name="state" id="inputCity" value="{{ setting_val("state") }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Billing Zip</label>
                            <input type="text" class="form-control" name="zip" id="inputZip" value="{{ setting_val("zip") }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-control-label font-weight-bold">Billing Country </label>
                            
                            <select name="country" class="form-control select2" style="width: 100%"> 
                                <option value="Afghanistan"> Select Country</option>
                                @foreach ($contry as $contr)
                                    <option value="{{ $contr->id }}" @if (setting_val("country")==$contr->id) selected @endif>{{ $contr->country }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Withdraw limit set</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="withdraw_limit" type="number" value="{{ setting_val("withdraw_limit") }}"  required />
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ env("CURRENCY_TYPE") }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Withdraw options</label>
                                <div class="input-group mb-3">
                                    <select name="Withdraw_options[]" multiple="multiple" class="select2" style="width: 100%">
                                        <option value="PayTm" @if (json_decode(setting_val("Withdraw_options"),true)[0]=="PayTm") selected @endif>PayTm</option>
                                        <option value="UPI" @if (json_decode(setting_val("Withdraw_options"),true)[1]=="UPI") selected @endif>UPI</option>
                                        <option value="BANK" @if (json_decode(setting_val("Withdraw_options"),true)[2]=="BANK") selected @endif>BANK</option>
                                        <option value="Paypal" @if (json_decode(setting_val("Withdraw_options"),true)[3]=="Paypal") selected @endif>Paypal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Instant withdrawl</label>
                                <div class="input-group mb-3">
                                    <select class="select2" name="instant_withdraw" style="width: 100%">
                                        <option value="no" @if (setting_val("instant_withdraw")=="no") selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                            <button type="submit" class="btn btn-primary">Update settings</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Avatar</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="assets/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3">Change avatar</button>
                    </div>
                </div>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->


</div>
<!-- end row -->
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
