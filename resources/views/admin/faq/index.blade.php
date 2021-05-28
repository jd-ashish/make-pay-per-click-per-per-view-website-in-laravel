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
{{ top_brade("Faq",array("home","user","faq"),"") }}
<!-- end row -->

{{ back_link(route('home')) }}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3 data-fancybox="modal" data-src="#faq" role="button"><i class="fas fa-table"></i> Ask</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>User id</th>
                                <th>Questions</th>
                                <th>Answeres</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>
                           @foreach ($faq as $key => $item)
                               <tr>
                                   <td>{{ ($key+1) }}</td>
                                   <td>{{ $item->user_id }}</td>
                                   <td>{{ $item->q }}</td>
                                   <td>{{ $item->a }}</td>
                                   <td>{{ Time_ago(strtotime($item->created_at)) }}</td>
                                   <td><a href="{{ route('faq.delete',$item->id) }}" class="btn btn-facebook btn-sm">Delete</a></td>
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

<div id="faq" style="display: none; padding: 40px ; max-width: 85%;">
    
    <form action="{{ route('faq.store') }}" style="width: 1222px" method="POST">
        @csrf
        <div class="form-group">
          <label for="q">Enter questions:</label>
          <textarea class="form-control" placeholder="Enter questions" rows="5" id="q" name="q" required></textarea>
        </div>
        <div class="form-group">
          <label for="a">Answere:</label>
          <textarea class="form-control" placeholder="Enter questions related answere" role="5" id="a" name="a"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>
@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
@endsection
