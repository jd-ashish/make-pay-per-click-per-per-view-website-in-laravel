@extends('admin.layouts.app')
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
        </style>

@endsection

@section('content')
{{ top_brade("Wallet",array("home","user","wallet"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <form method="POST" action="{{ route('wallet.add.money') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append same-height">
                            <span class="input-group-text"><h3><i class="fas fa-wallet"></i> {{ env('CURRENCY_TYPE') }} {{ Auth::user()->balance }}</h3></span>
                        </div>
                        <input type="number" name="balance" class="form-control same-height" placeholder="Enter amount" min="1">
                        <div class="input-group-append same-height">
                          <button type="submit" class="input-group-text">Add money</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Payment Type</th>
                                <th>Check</th>
                                <th>Time</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <body>
                            @foreach ($wallet as $key => $value)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td> {{ env('CURRENCY_TYPE') }} {{ $value->amount }}</td>
                                    <td><strong>{{ $value->type }}</strong></td>
                                    <td>{{ $value->payment_type }}</td>
                                    <td>@if($value->payment_details!="")
                                            <a href="javascript::void();" data-fancybox="modal" data-src="#get_wallet_statement_details" role="button" >Check</a>
                                            <div id="get_wallet_statement_details" style="display: none; padding: 40px ; max-width: 85%;">
                                                <div class="card-body">

                                                    <div class="table-responsive">
                                                    <table class="table table-condensed table-hover table-bordered table-responsive-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="tabco1" style="min-width:200px">Tag</th>
                                                                <th class="tabco2" style="min-width:200px">Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="tabco1">ID</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->id }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Order ID</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->order_id }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Amount</td>
                                                                <td class="tabco2">
                                                                    {{ env('CURRENCY_TYPE') }} {{ json_decode($value->payment_details)->amount/100 }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Method</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->method }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Status</td>
                                                                <td class="tabco2">
                                                                    @if(json_decode($value->payment_details)->captured==true)
                                                                        <i class="fas fa-check rightSign" aria-hidden="true"></i>
                                                                    @else
                                                                        <i class="fas fa-check crossSign" aria-hidden="true"></i>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Description</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->description }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Email</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->email }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Phone</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->contact }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Bank</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->bank }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">card ID</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->card_id }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Wallet</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->wallet }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">UPI</td>
                                                                <td class="tabco2">
                                                                    {{ json_decode($value->payment_details)->vpa }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Transaction</td>
                                                                <td class="tabco2">
                                                                    <?= status(json_decode($value->payment_details)->status)?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tabco1">Created at</td>
                                                                <td class="tabco2">
                                                                    {{ Time_ago((json_decode($value->payment_details)->created_at)) }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        @endif
                                    </td>
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
@endsection
