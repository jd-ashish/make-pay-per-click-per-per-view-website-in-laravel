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
                <h3><i class="fas fa-table"></i> Invoice Upgrade to {{ $member->name }}</h3>
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
                                                    <td>{{ $member->name }}</td>
                                                    <td class="text-center"> {{ env('CURRENCY_TYPE') }} {{ $member->price }}</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">{{ env('CURRENCY_TYPE') }} {{ $member->price*1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                    <td class="no-line text-right">{{ env('CURRENCY_TYPE') }} {{ $member->price*1 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panal-footer float-right">
                                    @if (!Auth::user()->details)
                                    <form action="{{ route('payment') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="member_id" value="{{ $member->id }}">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="{{ env('RZP_api_key') }}"
                                                data-amount="{{ $arr['amt']*100 }}"
                                                data-currency="{{ env('CURRENCY_SYMB') }}"
                                                data-buttontext="Pay {{ $arr['amt'] }} {{ env('CURRENCY_SYMB') }}"
                                                data-name="{{ Auth::user()->name }}"
                                                data-description="{{ $member->name }}"
                                                data-image="{{ asset('/image/nice.png') }}"
                                                data-order_id= "{{  $order['id'] }}",
                                                data-prefill.name="{{ Auth::user()->name }}"
                                                data-prefill.email="{{ Auth::user()->email }}"
                                                data-theme.color="#9FE2BF">
                                        </script>
                                    </form>
                                        @else
                                            <a>You need compelete profile details</a>
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

{{-- <div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif
                    <div class="card card-default">
                        <div class="card-header">
                            Upgrade to {{ $member->name }}
                            <p style="font-size: 11px">ORDER ID : #{{  $order['id'] }}</p>
                            <p class="float-right" style="font-size: 11px">Customer name : {{ Auth::user()->name }}</p>
                        </div>

                        <div class="card-body text-center">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div> --}}

@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection



{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 8 - Razorpay Payment Gateway Integration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html> --}}