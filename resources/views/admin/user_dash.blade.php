@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <!-- BEGIN CSS for this page -->
    <link href="{{ asset('assets/css/pricing-tables.css')}}" rel="stylesheet" type="text/css" />
    <!-- END CSS for this page -->
@endsection
<div class="row">
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-1 b-radius--10 box-shadow has--link">
            <a href="{{ route('wallet.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-credit-card"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                    <span class="amount counter">{{ Auth::user()->balance }}</span>
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
                    <span class="amount counter">@if (Auth::user()->Account) {{ Auth::user()->Account->withdraw }} @else 0 @endif </span>
                    
                </div>
                <div class="desciption">
                    <span>Total Withdraw</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-25 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign"></span>
                    <span class="amount counter">@if (Auth::user()->Account) {{ Auth::user()->Account->withdraw_count }} @else 0 @endif </span>
                    
                </div>
                <div class="desciption">
                    <span>Number of Withdraw</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-15 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.request.pending') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                    <span class="amount counter">
                        @php
                            $wiht = \App\Models\Withdraw::where('user_id',Auth::user()->id)->where('status','pending')->get();
                        @endphp
                        @if($wiht)
                            @php
                                $amt_with = 0;
                                $c3 = 0;
                            @endphp
                            @foreach ($wiht as $key => $value)
                                @php
                                    $amt_with += $value->amount;
                                    $c3++;
                                @endphp
                            @endforeach
                            {{ $amt_with }}
                        @endif
                    </span>
                    <span style="float:left; margin-left:-130px; margin-top:-30px; color:white">Total pending : {{ $c3 }}</span>
                    
                </div>
                <div class="desciption">
                    <span>Withdraw pending</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-15 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.request.denied') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                    <span class="amount counter">
                        @php
                            $wiht = \App\Models\Withdraw::where('user_id',Auth::user()->id)->where('status','denied')->get();
                        @endphp
                        @if($wiht)
                            @php
                                $amt_with = 0;
                                $c2 = 0;
                            @endphp
                            @foreach ($wiht as $key => $value)
                                @php
                                    $amt_with += $value->amount;
                                    $c2++;
                                @endphp
                            @endforeach
                            {{ $amt_with }}
                        @endif
                    </span>
                    <span style="float:left; margin-left:-130px; margin-top:-30px; color:white">Total denied : {{ $c2 }}</span>
                </div>
                <div class="desciption">
                    <span>Withdraw denied</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-16 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.request.success') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-thumbs-up"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                    <span class="amount counter">
                        @php
                            $wiht = \App\Models\Withdraw::where('user_id',Auth::user()->id)->where('status','success')->get();
                        @endphp
                        @if($wiht)
                            @php
                                $amt_with = 0;
                                $c4 = 0;
                            @endphp
                            @foreach ($wiht as $key => $value)
                                @php
                                    $amt_with += $value->amount;
                                    $c4++;
                                @endphp
                            @endforeach
                            {{ $amt_with }}
                        @endif
                    </span>
                    <span style="float:left; margin-left:-130px; margin-top:-30px; color:white">Total success : {{ $c4 }}</span>
                </div>
                <div class="desciption">
                    <span>Withdraw success</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->

    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-21 b-radius--10 box-shadow has--link">
            <a href="{{ route('Transaction.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="la la-exchange-alt"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">{{ count(Auth::user()->Transaction) }}</span>
                </div>
                <div class="desciption">
                    <span>Total Transaction</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->

    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-11 b-radius--10 box-shadow has--link">
            <a href="javascript:void(0)" class="item--link"></a>
            <div class="icon">
                <i class="la la-exchange-alt"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">
                        @if (count(Auth::user()->Clicks)>0)
                            <?php
                                $var = 0;
                            ?>
                            @foreach (Auth::user()->Clicks as $key => $item)
                                <?php
                                    $var += $item->clicks;
                                ?>
                            @endforeach
                            {{ $var }}
                        @else
                            {{ count(Auth::user()->Clicks) }}
                        @endif
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>Total Clicks</span>
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
                        {{ count(Auth::user()->UserAdsViewStatus) }}
                        
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

                        @if (Auth::user()->Account) {{ \App\Models\Membership::where('id',Auth::user()->Account->membership_id)->first()->name  }} @else Setup plan @endif
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>My plan</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> Track Today ads click views </h3>
            </div>

            <div class="card-body">
                <canvas id="today_ads" ></canvas>
                {{-- <canvas id="comboBarLineChart" ></canvas> --}}
            </div>
            <div class="card-footer small text-muted">Updated ever 5 to 15 sec</div>
        </div>
        <!-- end card-->
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> Withdrawl in {{ date('Y') }}</h3>
            </div>

            <div class="card-body">
                <canvas id="with_drawl"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated ever 5 to 15 sec</div>
        </div>
        <!-- end card-->
    </div>
</div>
<!-- end row -->
@php
    $OS = \App\Models\UserLoginActivity::where('user_id',Auth::user()->id)->get();
    $os_name = array();
    $device_name = array();
    $browser_name = array();
@endphp
@foreach ($OS as $k => $item)
@php
    $os_name[] = json_decode($item->json)->getos;
    $device_name[] = json_decode($item->json)->getdevice;
    $browser_name[] = json_decode($item->json)->getbrowser;
@endphp
    {{-- <tr>
        <td>#{{ ($k+1) }}</td>
        <td>{{ json_decode($item->json)->ip }}</td>
        <td>{{ json_decode($item->json)->getbrowser }}</td>
        <td>{{ json_decode($item->json)->getdevice }}</td>
        <td>{{ json_decode($item->json)->getos }}</td>
        <td>{{ Time_ago(strtotime($item->created_at)) }}</td>
        <td>{{ $item->status }}</td>
    </tr> --}}
@endforeach
@php
    $k = array_keys(array_count_values($os_name));
    $v = array_values(array_count_values($os_name));

    $k1 = array_keys(array_count_values($device_name));
    $v1 = array_values(array_count_values($device_name));

    $k2 = array_keys(array_count_values($browser_name));
    $v2 = array_values(array_count_values($browser_name));
@endphp
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        
        <div class="card mb-3">
            <div class="card-header">
                <h3>Login via OS</h3>
            </div>

            <div class="card-body">
                <div id="OsLoginChart"></div>
            </div>
        </div>
        <!-- end card-->
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Login via browser</h3>
            </div>

            <div class="card-body">
                <div id="Browser"></div>
            </div>
        </div>
        <!-- end card-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Login via Device</h3>
            </div>

            <div class="card-body">
                <div id="Device"></div>
            </div>
        </div>
        <!-- end card-->
    </div>
</div>
<!-- end row -->



<div id="create_membership_form" style="display: none; padding: 40px ; max-width: 85%;">
    
    @switch(\App\Settings::where('var','price_table')->first()->val)
        @case(1)
                @include('admin.price_table.p1')
            @break
        @case(2)
                @include('admin.price_table.p2')
            @break
    @endswitch
    
</div>
<div id="get_selected_plan_details" style="display: none; padding: 40px ; max-width: 85%;">
    
    @switch(\App\Settings::where('var','price_table')->first()->val)
        @case(1)
                @include('admin.price_table.p1_view')
            @break
        @case(2)
                @include('admin.price_table.p2_view')
            @break
    @endswitch
    
</div>
@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var key = [<?php echo '"'.implode('","', $k).'"' ?>];
    var value = [<?php echo implode(',', $v) ?>];

    var key1 = [<?php echo '"'.implode('","', $k1).'"' ?>];
    var value1 = [<?php echo implode(',', $v1) ?>];

    var key2 = [<?php echo '"'.implode('","', $k2).'"' ?>];
    var value2 = [<?php echo implode(',', $v2) ?>];

    var options = {
          series: value,
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: key,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#OsLoginChart"), options);
        chart.render();
      
      
      
        
        
        var options = {
          series: value2,
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: key2,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#Browser"), options);
        chart.render();

        var options = {
          series: value1,
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: key1,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };


        var chart = new ApexCharts(document.querySelector("#Device"), options);
        chart.render();
      
      
        
      
        
    </script>
@endsection

