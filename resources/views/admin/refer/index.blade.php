@extends('admin.layouts.app')
@section('title')
    Manage Referral Commission | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        
        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #2196F3;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
        </style>
@endsection

@section('content')
{{ top_brade("Manage Referral Commission",array("Home","Manage Referral Commission","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> <a data-fancybox="modal" data-src="#create_membership_form" class="btn btn-danger btn-sm mb-3" role="button" href="javascript:;" >Create New</a></h3>
                
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Level</th>
                                <th>Commision</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($ReferralCommissions as $key => $ReferralCommission)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $ReferralCommission->level }}</td>
                                    <td>{{ $ReferralCommission->commission }} %</td>
                                    <td class=""><a href="{{ route('refer.destroy',$ReferralCommission->id) }}" class="icon-btn-danger"><i class="fa fa-trash"></i></a></td>
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


<div id="create_membership_form" style="display: none; padding: 40px ; width: 55%;">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">CHANGE SETTING</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="level" id="levelGenerate" placeholder="HOW MANY LEVEL"
                        class="form-control input-lg">
                    </div>
                    <div class="col-md-6">

                        <button type="button" id="generate" class="btn btn--success btn-block btn-md">
                            GENERATE                                </button>
                    </div>
                </div>

                <br>
                <div id="prantoForm" class="d-none" >
                    <form action="{{ route('refer.store') }}"        method="post">
                            @csrf
                            <div class="form-group">
                                <label class="text-success"> Level & Commission :
                                    <small>(Old Levels will Remove After Generate)</small>
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description ref-desc">
                                        <div class="row">
                                            <div class="col-md-12" id="planDescriptionContainer">

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn--primary btn-block">Submit</button>
                    </form>
                </div>

                

            </div>
</div>
@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->
<script src="{{ asset('js/users/users.js') }}"></script>

<script>
    (function($,document){
        "use strict";
        var max = 1;
        $(document).ready(function () {
            $("#generate").on('click', function () {

                var da = $('#levelGenerate').val();
                var a = 0;
                var val = 1;
                var guu = '';
                if (da !== '' && da > 0) {
                    $('#prantoForm').addClass('d-block');

                    for (a; a < parseInt(da); a++) {


                        guu += '<div class="input-group mt-2">\n' +
                        '<input name="level[]" class="form-control margin-top-10" type="number" readonly value="' + val++ + '" required placeholder="Level">\n' +
                        '<input name="percent[]" class="form-control margin-top-10" type="text" required placeholder="Commission % on Level '+ val +'">\n' +
                        '<span class="input-group-btn">\n' +
                        '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class=\'fa fa-times\'></i></button></span>\n' +
                        '</div>'
                    }
                    $('#planDescriptionContainer').html(guu);

                } else {
                    alert('Level Field Is Required')
                }

            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
            });
        });
            
    })(jQuery,document);

</script>
@endsection
