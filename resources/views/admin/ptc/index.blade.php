@extends('admin.layouts.app')
@section('title')
    PPC ads overview | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("PPC Ads overview",array("home","PPC","Ads","overview"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> <a href="{{ route('ptc.newads') }}">Create New</a></h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>type</th>
                                <th>Duration</th>
                                <th>Maximum View</th>
                                <th>Viewed</th>
                                <th>Remain</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($ads as $key => $ad)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>
                                        @switch($ad->type)
                                            @case('1')
                                                    <span class="font-weight-normal text--small badge badge-success"><i class="fa fa-link"></i> URL</span>
                                                @break
                                            @case('2')
                                                    <span class="font-weight-normal text--small badge badge-success"><i class="fa fa-image"></i> Image</span>
                                                @break
                                            @case('3')
                                                    <span class="font-weight-normal text--small badge badge-success"><i class="fa fa-code"></i> Code</span>
                                                @break
                                            @default
                                                
                                        @endswitch</td>
                                    <td>{{ $ad->duration }} sec</td>
                                    <td>{{ $ad->max_show }}</td>
                                    <td>{{ $ad->views }}</td>
                                    <td>{{ ((int)$ad->max_show - (int)$ad->views) }}</td>
                                    <td>{{ $ad->amount }} {{ env('CURRENCY_TYPE') }}</td>
                                    <td>@if ($ad->status=="on")
                                        <?= status("Active")?>
                                    @else
                                        <?= status("Inactive")?>
                                    @endif</td>
                                    <td class="btn-group"><a href="{{ route('ptc.edit',$ad->id) }}" class="icon-btn"><i class="fa fa-pencil-alt"></i></a> &nbsp; <a href="{{ route('ptc.destroy',$ad->id) }}" class="icon-btn-danger"><i class="fa fa-trash"></i></a></td>
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
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection
