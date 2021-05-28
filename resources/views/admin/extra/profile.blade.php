@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <style>
        input.hidden {
            position: absolute;
            left: -9999px;
        }
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

.select2-selection__rendered {
    line-height: 38px !important;
    border-radius: 0px;
}
.select2-container .select2-selection--single {
    height: 38px !important;
    border-radius: 0px;
}
.select2-selection__arrow {
    height: 38px !important;
    border-radius: 0px;
}


        </style>
@endsection

@section('content')

{{ top_brade("Profile ",array("Home","dashbord","Profile","index"),"") }}
<!-- end row -->
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> Profile details</h3>
            </div>

            <div class="card-body">


                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Full name (required)</label>
                                <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}" required />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Valid Email (required)</label>
                                <input class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" value="" autocomplete="off" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" name="password2" type="password" value="" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <div class="input-group mb-3">
                                    @if (!empty($idd))
                                        <div class="input-group-append">
                                            <select class="select2 country_code" name="country_code" style="width: 75%; " >
                                                
                                                @foreach ($idd as $key => $val)
                                                            <option value="+{{ $val->callingCodes[0] }}" @if($val->callingCodes[0]=="91") selected @endif>+{{ $val->callingCodes[0] }} {{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                    @endif
                                    
                                    <input class="form-control verify-phone-number" name="number" type="number" value="{{ Auth::user()->phone }}" @if (Auth::user()->sms_verified_at==""  || Auth::user()->sms_verified_at=="0000-00-00 00:00:00") @else readonly @endif/>
                                    <div class="input-group-append">
                                        @if (Auth::user()->sms_verified_at==""  || Auth::user()->sms_verified_at=="0000-00-00 00:00:00")
                                            <span class="input-group-text verify-phone btn btn--primary btn--shadow btn-block btn-lg" style="cursor: pointer">Verify me</span>
                                        @else
                                            <span class="input-group-text btn btn--success btn--shadow btn-block btn-lg" style="cursor: pointer" title="verified"><i class="fas fa-check-double"></i></span>
                                        @endif 
                                      
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select country:</label>
                                <select class="select2" name="country" style="width: 100%; " >
                                    @if (Auth::user()->details)
                                        @foreach ($contry as $contr)
                                                <option value="{{ $contr->id }}" @if (Auth::user()->details->country==$contr->id)
                                                    selected
                                                @endif>{{ $contr->country }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($contry as $contr)
                                            <option value="{{ $contr->id }}">{{ $contr->country }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" type="text" value="@if( Auth::user()->details) {{ Auth::user()->details->address }} @endif" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" name="city" type="text" value="@if( Auth::user()->details) {{ Auth::user()->details->city }} @endif" />
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>State</label>
                                <input class="form-control" name="state" type="text" value="@if( Auth::user()->details) {{ Auth::user()->details->state }} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Zip / code</label>
                                <input class="form-control" name="zip" type="text" value="@if( Auth::user()->details) {{ Auth::user()->details->zip }} @endif" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                            <button type="submit" class="btn btn-primary">Update me</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Avatar</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        {{-- <img src="{{ asset('assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded"> --}}
                        <img alt="avatar" class="img-fluid avatar-rounded" src="@if( Auth::user()->details) @if(Auth::user()->details->avtar_image != "") {{ url('/') }}/{{ Auth::user()->details->avtar_image }} @else {{ asset('assets/images/avatars/avatar.png') }} @endif @else {{ asset('assets/images/avatars/avatar.png') }} @endif">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{ route('profile.avtar.delete') }}" >
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                        </form>
                        
                    </div>
                    

                    <div class="col-lg-12">
                        {{-- <input id="profile-image-upload" class="hidden" type="file"> --}}
                            <form method="post" action="" enctype="multipart/form-data"
                                    id="myform">
                    
                                <div >
                                    <input type="file" id="file" name="file" class="hidden" />
                                    {{-- <input type="button" class="button" value="Upload"
                                            id="but_upload"> --}}
                                </div>
                                <button type="button" id="but_upload" class="btn btn-info btn-block mt-3">Change avatar</button>
                            </form>
                        
                    </div>
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-dribbble btn-block mt-3 getUserLog" route="{{ route('User.login.logs') }}" title="User log details" id="{{ Auth::user()->id }}" >Login logs</button>
                        
                    </div>
                </div>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->


</div>
<!-- end row -->

@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<script>
    $(function() {
        $('#but_upload').on('click', function() {
            $('#file').click();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $("#file").change(function() {
            $(".progress_percent").css('width', "1%");
            $("#but_upload").text("Uploading ")
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);
   
            $.ajax({
                url: '{{ route("profile.update_dp") }}',
                type: 'post',
                data: fd,
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    //Download progress
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            // progressElem.html(Math.round(percentComplete * 100) + "%");

                            console.log(Math.round(percentComplete * 100));
                            
                            $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                            $("#but_upload").text("Uploading "+Math.round(percentComplete * 100) + " %")
                        }
                    }, false);
                    return xhr;
                },
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                    if(response=="success"){
                        window.location.replace("{{ route('profile') }}");
                    }
                },
            });
        });
        $(".verify-phone").click(function() {
            $(".progress_percent").css('width', "1%");
            $(".verify-phone").text("Sending OTP to Phone ");

            var country_code = "";
            @if (!empty($idd))
                country_code = $(".country_code").val();
            @else
                country_code = "";
            @endif
            
            var num = (country_code+$(".verify-phone-number").val());

            
   
            $.ajax({
                url: '{{ route("profile.verify.phone") }}',
                type: 'post',
                data: {num:num},
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    //Download progress
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;

                            console.log(Math.round(percentComplete * 100));
                            
                            $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                        }
                    }, false);
                    return xhr;
                },
                success: function(response){
                    $(".verify-phone").text("Verify now");
                    var myObj = JSON.parse(response);
                    console.log(response);
                    if(myObj.error==true){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: myObj.message
                        })
                        
                    }else{
                        
                        Swal.fire({
                            title: 'OTP successfully send to '+num,
                            input: 'text',
                            inputAttributes: {
                                autocapitalize: 'off',
                                placeholder: 'Enter OTP',
                            },
                            icon: 'success',
                            showCancelButton:true,
                            confirmButtonText: 'Verify OTP',
                            showLoaderOnConfirm: true,
                            preConfirm: (login) => {
                                if(myObj.otp==login){
                                    // Swal.fire("phone number verifyed successfully!")
                                    $.ajax({
                                        url: '{{ route("profile.update.phone") }}',
                                        type: 'post',
                                        data: {num:num},
                                        xhr: function () {
                                            var xhr = new window.XMLHttpRequest();
                                            //Download progress
                                            xhr.addEventListener("progress", function (evt) {
                                                if (evt.lengthComputable) {
                                                    var percentComplete = evt.loaded / evt.total;

                                                    console.log(Math.round(percentComplete * 100));
                                                    
                                                    $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                                                }
                                            }, false);
                                            return xhr;
                                        },
                                        success: function(response){
                                            Swal.fire("phone number verifyed successfully!")
                                            location.reload();
                                        },
                                    });
                                    
                                }else{
                                    Swal.showValidationMessage(
                                    `OTP ${login} not match`
                                    )
                                }
                                // Swal.fire(login)
                            },
                            allowOutsideClick: false,
                            allowEscapeKey: false
                        })
                    }
                    
                },
            });
        });
    });
</script>
@endsection
