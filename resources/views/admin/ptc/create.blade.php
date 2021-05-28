@extends('admin.layouts.app')
@section('title')
    Create PPC ads | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("PPC Ads create",array("home","PPC","Ads","create"),"") }}
<!-- end row -->

{{ back_link(route('ptc.index')) }}

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">

                <form role="form" method="POST" action="{{ route('ptc.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                       <div class="form-group col-md-8">
                        <label>Title of the Ad <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg" value="" placeholder="Title" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Amount <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="amount" class="form-control form-control-lg" value="" placeholder="User will get ..." required>
                            <div class="input-group-append">
                                <div class="input-group-text"> {{ env('CURRENCY_TYPE') }} </div>
                            </div>
                        </div>
                    </div>  


                    <div class="form-group col-md-4">
                        <label>Duration <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="duration" class="form-control form-control-lg" value="" placeholder="Duration" required>
                            <div class="input-group-append">
                                <div class="input-group-text">SECONDS</div>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group col-md-4">
                        <label>Maximum Show <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="max_show" class="form-control form-control-lg" value="" placeholder="Maximum Show " required>
                            <div class="input-group-append">
                                <div class="input-group-text">Times</div>
                            </div>
                        </div>
                    </div>  




                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="Active" data-off="Inactive" name="status">
                    </div>
                </div>






                <div class="row pt-5 mt-5 border-top">

                    <div class="form-group col-md-4">
                        <label for="ads_type">Advertisement Type</label>
                        <select class="form-control form-control-lg" id="ads_type" onchange="onChange(this.value)" name="ads_type" >
                            <option value="1" >Link / URL</option>
                            <option value="2" >Banner / Image</option>
                            <option value="3" >Script / Code</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8" id="websiteLink">
                        <label>Link <span class="text-danger">*</span></label>
                        <input type="text" name="website_link" class="form-control form-control-lg" value="" placeholder="http://example.com">
                    </div>
                    <div class="form-group col-md-8 d-none" id="bannerImage">
                        <label>Banner <span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-lg"  name="banner_image">

                    </div>
                    <div class="form-group col-md-8 d-none" id="script">
                        <label>Script <span class="text-danger">*</span></label>
                        <textarea  name="script" class="form-control form-control-lg"></textarea>
                    </div>
                </div>

                <div class="row pt-5 mt-5 border-top">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn--primary btn-block btn-lg">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/users/users.js') }}"></script>
<script>
    (function($){
        "use strict";
        $('#ads_type').change(function(){
            var adType = $(this).val();
            if (adType == 1) {
                $("#websiteLink").removeClass('d-none');
                $("#bannerImage").addClass('d-none');
                $("#script").addClass('d-none');
            } else if (adType == 2) {
                $("#bannerImage").removeClass('d-none');
                $("#websiteLink").addClass('d-none');
                $("#script").addClass('d-none');
            } else {
                $("#bannerImage").addClass('d-none');
                $("#websiteLink").addClass('d-none');
                $("#script").removeClass('d-none');
            }
        });
    })(jQuery);
</script>
@endsection
