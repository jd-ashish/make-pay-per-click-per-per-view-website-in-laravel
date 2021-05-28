<div class="row">
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-1 b-radius--10 box-shadow has--link">
            <a href="{{ route('wallet.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign"></span>
                    <span class="amount counter">{{ count(\App\Models\User::where('user_type',"!=","admin")->get()) }}</span>
                </div>
                <div class="desciption">
                    <span>Users</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->


    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-14 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.request.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign">{{ env('CURRENCY_TYPE') }}</span>
                    <span class="amount counter">
                        @php
                            $wiht = \App\Models\Withdraw::get();
                        @endphp
                        @if($wiht)
                            @php
                                $amt_with = 0;
                            @endphp
                            @foreach ($wiht as $key => $value)
                                @php
                                    $amt_with += $value->amount;
                                @endphp
                            @endforeach
                            {{ $amt_with }}
                        @endif
                    </span>
                    
                </div>
                <div class="desciption">
                    <span>Total Withdraw</span>
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
                            $wiht = \App\Models\Withdraw::where('status','pending')->get();
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
                            $wiht = \App\Models\Withdraw::where('status','denied')->get();
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
                            $wiht = \App\Models\Withdraw::where('status','success')->get();
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
        <div class="dashboard-w1 bg--gradi-31 b-radius--10 box-shadow has--link">
            <a href="{{ route('withdraw.request.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="currency-sign"></span>
                    <span class="amount counter">
                        @php
                            $wiht_cr = \App\Models\Withdraw::get();
                        @endphp
                        @if($wiht_cr)
                            @php
                                $amt_with_cr = 0;
                            @endphp
                            @foreach ($wiht_cr as $key => $value)
                                @php
                                    $amt_with_cr ++;
                                @endphp
                            @endforeach
                            {{ $amt_with_cr }}
                        @endif
                    </span>
                    
                </div>
                <div class="desciption">
                    <span>Number of Withdraw</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->

    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-21 b-radius--10 box-shadow has--link">
            <a href="{{ route('Transaction.index') }}" class="item--link"></a>
            <div class="icon">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">{{ count(\App\Models\Transaction::get()) }}</span>
                </div>
                <div class="desciption">
                    <span>Total Transaction</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->

    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-25 b-radius--10 box-shadow has--link">
            <a href="javascript:void(0)" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">
                        {{ count(\App\Models\UserAdsViewStatus::get()) }}
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>Total Ads views</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-28 b-radius--10 box-shadow has--link">
            <a href="javascript:void(0)" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-bell"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">
                        {{ count(\App\Notificaton::get()) }}
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>Total Notifications</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-29 b-radius--10 box-shadow has--link">
            <a href="javascript:void(0)" class="item--link"></a>
            <div class="icon">
                <i class="fa fa-wallet"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount">
                        @php
                            $user_st = \App\Models\User::get();
                        @endphp
                        @if($user_st)
                            @php
                                $u_bal = 0;
                            @endphp
                            @foreach ($user_st as $key => $value)
                                @php
                                    $u_bal += $value->balance;
                                @endphp
                            @endforeach
                            {{ env('CURRENCY_TYPE') }} {{ $u_bal }}
                        @endif
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>Total balance</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
        <div class="dashboard-w1 bg--gradi-28 b-radius--10 box-shadow has--link">
            <a href="javascript:void(0)" class="item--link"></a>
            <div class="icon">
                <i class="fas fa-signal"></i>
            </div>
            <div class="details">
                <div class="numbers">
                    <span class="amount counter">
                        @php
                            $c=0;
                        @endphp
                        @foreach (\App\Models\User::get() as $key => $value)
                            @if ($value->isOnline()==1)
                                
                            @php
                                $c++;
                                continue;
                            @endphp
                            @else
                                
                            @endif
                        @endforeach
                        {{ $c }}
                        
                    </span>
                </div>
                <div class="desciption">
                    <span>Total online user</span>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
</div>
<!-- end row -->

@php
$c=0;
        $na = 0;
        foreach(\App\Models\User::get() as $key => $value){
            if ($value->isOnline()==1){
                $c++;
                continue;
            }
            $na++;
        }
        $u = array("active"=>$c,"noneActive"=>$na);
        



// $users = \App\Models\User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

// $months = \App\Models\User::select (DB::raw("Month(created_at) as month"))->whereYear('created_at',date("Y"))->groupBy (DB::raw("Month(created_at)"))->pluck("month");

// $datas = array(0,0,0,0,0,0,0,0,0,0,0,0); 
// foreach($months as $index=> $month){
//     $datas [($month-1)] = $users[$index];
// }

// print_r($datas);
    
@endphp
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> New users growth in {{ date('Y') }}</h3>
            </div>

            <div class="card-body">
                <canvas id="au" ></canvas>
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





<!-- end row-->
@section('script')
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