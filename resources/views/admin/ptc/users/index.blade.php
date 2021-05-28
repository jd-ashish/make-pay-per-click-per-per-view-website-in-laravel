@extends('admin.layouts.app')
@section('title')
    PCC your all earning ads| {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("PPC Ads",array("home","PPC","Ads","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Till time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($ads as $key => $ad)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->duration }} sec</td>
                                    <td><a href="{{ route('ptc.user.ads.view',$ad->id) }}" class="icon-btn"><i class="fa fa-eye"></i></a> </td>
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
