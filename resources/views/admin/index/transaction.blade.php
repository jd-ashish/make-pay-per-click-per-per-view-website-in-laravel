@extends('admin.layouts.app')
@section('title')
    Your all transactions | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("PTC Ads",array("home","PTC","Ads","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-wallet"></i></h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Final</th>
                                <th>Type</th>
                                <th>Short</th>
                                <th>Status</th>
                                <th>Time</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <body>
                            @foreach ($Transaction as $key => $value)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td> {{ $value->title }}</td>
                                    <td>
                                        @if ($value->credit=="")
                                            
                                        @else
                                            <strong> {{ env('CURRENCY_TYPE') }}  {{ $value->credit }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->debit=="")
                                        <strong> {{ env('CURRENCY_TYPE') }}  0</strong>
                                        @else
                                            <strong> {{ env('CURRENCY_TYPE') }}  {{ $value->debit }}</strong>
                                        @endif
                                    </td>
                                    <td><strong> {{ env('CURRENCY_TYPE') }}  {{ $value->final }}</strong></td>
                                    <td>{{ $value->type }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                        @if ($value->status=="on")
                                            <?= status("Active")?>
                                        @else
                                        <?= status("pending")?>
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

@endsection
