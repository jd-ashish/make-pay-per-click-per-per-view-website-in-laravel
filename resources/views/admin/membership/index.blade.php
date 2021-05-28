@extends('admin.layouts.app')
@section('title')
    Membership management or overview | {{ env('APP_NAME',setting_val('APP_NAME')) }}
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
{{ top_brade("Membership",array("Home","Membership","index"),"") }}
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
                                <th>name</th>
                                <th>price</th>
                                <th>Daily Limit</th>
                                <th>Referral Commission</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($membership as $key => $member)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->price }} {{ env('CURRENCY_TYPE') }}</td>
                                    <td>{{ $member->daily_limit }} PTC</td>
                                    <td>up-to {{ $member->referral_commission }} level</td>
                                    <td>@if ($member->status=="on")
                                        <?= status("Active")?>
                                    @else
                                        <?= status("Inactive")?>
                                    @endif</td>
                                    <td class="btn-group"><a data-fancybox="modal" data-src="#update{{ $member->id }}" role="button" href="javascript:;" class="icon-btn"><i class="fa fa-pencil-alt"></i></a> &nbsp; <a href="{{ route('membership.destroy',$member->id) }}" class="icon-btn-danger"><i class="fa fa-trash"></i></a></td>
                                </tr>



                                <div id="update{{ $member->id }}" style="display: none; padding: 40px ; max-width: 900px;">
                                    
                                    <form action="{{ route('membership.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $member->id }}" name="id" >
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="name44" name="name" value="{{ $member->name }}" placeholder="Name">
                                          </div>
                                          <div class="form-group col-md-6">
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="price44" name="price" value="{{ $member->price }}" placeholder="Price ">
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="basic-addon2">{{ env('CURRENCY_TYPE') }}</span>
                                                </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          
                                        </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="dalimit" name="daliylimit" value="{{ $member->daily_limit }}" placeholder="Daily Ad Limit">
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="basic-addon2">PTC</span>
                                                </div>
                                            </div>
                                          
                                          </div>
                                          <div class="form-group col-md-6">
                                                <select class="form-control" name="ReferralCommission" required>
                                                    
                                                    @if (\App\Settings::where('var','referral_commission_level')->first()->val>0)
                                                        @for ($i = 0; $i <= \App\Settings::where('var','referral_commission_level')->first()->val; $i++)
                                                            
                                                            <option value="{{ $i }}" @if ($member->referral_commission==$i) selected @endif> Up to {{ $i }}  Level</option>
                                                        @endfor
                                                    @else
                                                        <option value="0"> NO Referral Commission</option>
                                                    @endif
                                                </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="switch">
                                                
                                                <input type="checkbox" value="on" name="status" @if ($member->status=="on")
                                                    checked
                                                @endif>
                                                <span class="slider round"></span>

                                            </label>
                                            
                                            {{-- <input type="checkbox" data-height="46"  value="{{ $member->id }}" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Inactive" data-width="100%"  data-toggle="toggle" name="status"> --}}
                                        </div>
                                        <p style="text-align: right;">
                                            <button class="btn btn-danger" role="button" type="submit">Add Membership <i class="fa fa-plus"></i></button>
                                        </p>
                                      </form>
                                </div>
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


<div id="create_membership_form" style="display: none; padding: 40px ; max-width: 900px;">
    <form action="{{ route('membership.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control" id="name44" name="name" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="price44" name="price" placeholder="Price ">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">{{ env('CURRENCY_TYPE') }}</span>
                </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="dalimit" name="daliylimit" placeholder="Daily Ad Limit">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">PTC</span>
                </div>
            </div>
          </div>
          <div class="form-group col-md-6">
                <select class="form-control" name="ReferralCommission" required>
                    
                    @if (\App\Settings::where('var','referral_commission_level')->first()->val>0)
                        @for ($i = 0; $i <= \App\Settings::where('var','referral_commission_level')->first()->val; $i++)
                            <option value="{{ $i }}"> Up to {{ $i }}  Level</option>
                        @endfor
                    @else
                        <option value="0"> NO Referral Commission</option>
                    @endif
                </select>
          </div>
        </div>
        <div class="form-group">
            <input type="checkbox" data-height="46" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Inactive" data-width="100%"  data-toggle="toggle" name="status">
        </div>
        <p style="text-align: right;">
            <button class="btn btn-danger" role="button" type="submit">Add Membership <i class="fa fa-plus"></i></button>
        </p>
      </form>
</div>
@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection
