@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
@endsection

@section('content')
{{ top_brade("Membership",array("Home","Membership","index"),"") }}
<!-- end row -->

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card mb-3">

            <div class="card-header">
                <h3><i class="fas fa-table"></i> Add wallet balance </h3>
            </div>

            <div class="card-body">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="invoice-title text-center mb-3">
                                <h2>ORDER ID : #{{  $order['id'] }}</h2>
                                <strong>Date:</strong> {{ date(setting_val('date_formate')) }}
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5>Billed To:</h5>
                                    <address>
                                        {{ setting_val("APP_NAME") }}<br>
                                        {{ setting_val("address") }}<br>
                                        {{ setting_val("city") }} , {{ setting_val("state") }} <br>
                                        
                                        {{ setting_val("country") }} , {{ setting_val("zip") }}
                                    </address>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                                    <h5>Shipped To:</h5><br>
                                    <address>
                                        {{ Auth::user()->name }}<br>
                                        @if (Auth::user()->details)
                                            {{ Auth::user()->details->address }}<br>
                                            {{ Auth::user()->details->city }} , {{ Auth::user()->details->state }}<br>
                                            {{ Auth::user()->details->country }}, {{ Auth::user()->details->zip }}
                                        @else
                                            <a>You need compelete profile details</a>
                                        @endif
                                    </address>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    {{-- <h5>Payment Method:</h5>
                                    <address>
                                        Visa ending **** 7879<br>
                                        johndoe@email.com
                                    </address> --}}
                                </div>
                                <div class="col-xs-12 col-md-6 text-right">
                                    <h5>Order Date:</h5>
                                    <address>
                                        {{ date(setting_val('date_formate')) }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Price</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Totals</strong>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Add money to wallet</td>
                                                    <td class="text-center"> {{ env('CURRENCY_TYPE') }} {{ $arr['amt'] }}</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">{{ env('CURRENCY_TYPE') }} {{ $arr['amt'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                    <td class="no-line text-right">{{ env('CURRENCY_TYPE') }} {{ $arr['amt'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panal-footer float-right">
                                    @if (Auth::user()->details)
                                    <form action="{{ route('payment.addwallet') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="balance" value="{{ $arr['amt'] }}">
                                        <input type="hidden" name="oid" value="{{  $order['id'] }}">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="{{ env('RZP_api_key') }}"
                                                data-amount="{{ $arr['amt']*100 }}"
                                                data-currency="{{ env('CURRENCY_SYMB') }}"
                                                data-buttontext="Pay {{ $arr['amt'] }} {{ env('CURRENCY_SYMB') }}"
                                                data-name="{{ Auth::user()->name }}"
                                                data-description="Add money to wallet"
                                                data-image="{{ asset('/image/nice.png') }}"
                                                data-order_id= "{{  $order['id'] }}",
                                                data-prefill.name="{{ Auth::user()->name }}"
                                                data-prefill.email="{{ Auth::user()->email }}"
                                                data-theme.color="#9FE2BF">
                                        </script>
                                    </form>
                                        @else
                                            <a href="{{ route('profile') }}" class="btn btn-danger btn-block mt-3">You need compelete profile details</a>
                                        @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end card body -->

        </div>
        <!-- end card-->

    </div>
    <!-- end col-->

</div>
<!-- end row-->


@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->

@endsection

