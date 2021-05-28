@extends('admin.layouts.app')
@section('title')
    Withdrawl section | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <link href="{{ asset('assets/css/pricing-tables.css" rel="stylesheet')}}" type="text/css" />
    <style>
        .same-height{
            height: 42px !important;
        }
        .tabco1{
            font-weight: bold;
        }

        .select2-selection__rendered {
    line-height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
.select2-container .select2-selection--single {
    height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
.select2-selection__arrow {
    height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
        </style>

@endsection

@section('content')
{{ top_brade("Withdraw section",array("home","dashbort","withdraw","index"),"") }}
<!-- end row -->

<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ env('CURRENCY_TYPE') }} {{ setting_val('withdraw_limit') }} !</strong> Minimum withdrawl.
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <form method="POST" action="{{ route('withdrawl.request') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append same-height">
                            <span class="input-group-text"><h3><i class="fas fa-wallet"></i> {{ env('CURRENCY_TYPE') }} {{ Auth::user()->balance }}</h3></span>
                        </div>
                        <input type="number" name="balance" class="form-control same-height" placeholder="Enter amount" min="{{ setting_val('withdraw_limit') }}" max="{{ Auth::user()->balance }}" required>
                        <div class="input-group-append same-height">
                          <select class="select2-selection__rendered js-example-basic-multiple js-states form-control select2 pm" name="pm" id="id_label_multiple" style="width: 100%" required>
                            <option value="">Select payment method</option>    
                                @foreach (json_decode(setting_val("Withdraw_options"),true) as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="input-group-append same-height">
                          <button type="submit" class="input-group-text">Withdrawl now</button>
                        </div>
                    </div>
                    <input type="text" placeholder="Payment details" name="pd" class="form-control pd" style="resize: both; display: none;" required>
                </form>
            </div>
@php
    setting_val("")
@endphp
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Amount</th>
                                <th>payment method</th>
                                <th>Payment description</th>
                                <th>Status</th>
                                <th>Time</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <body>
                            @foreach ($Withdraw as $key => $value)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td> {{ env('CURRENCY_TYPE') }} {{ $value->amount }}</td>
                                    <td><strong>{{ $value->payment_method }}</strong></td>
                                    <td>{{ $value->payment_details }}</td>
                                    <td><?= status($value->status)?></td>
                                    <td>{{ Time_ago(strtotime($value->created_at)) }}</td>
                                    {{-- <td><a href="{{ route('ptc.user.ads.view',$value->id) }}" class="icon-btn"><i class="fa fa-eye"></i></a> </td> --}}
                                </tr>
                            @endforeach
                            
                        </body>
                    </table>
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
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script>
    $(".pm").change(function(){
        var val = $(this).val();
        if(val!=""){
            $(".pd").show();
            $(".pd").attr('placeholder', 'Enter Payment details of '+val );
        }else{
            $(".pd").show();
            $(".pd").attr('placeholder', "Please select payment options" );
        }
        
    })
    </script>

@endsection
