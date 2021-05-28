@extends('admin.layouts.app')
@section('title')
    Seo setting | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-tagsinput.min.css') }}"></link>
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
        .bootstrap-tagsinput .tag {
  background: gray;
  border: 1px solid black;
  padding: 0 6px;
  margin-right: 2px;
  color: white;
  border-radius: 4px;
}
        </style>
@endsection

@section('content')

{{ top_brade("SEO settings ",array("Home","dashbord","SEO settings","index"),"") }}
<!-- end row -->
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> SEO settings</h3>
            </div>

            <div class="card-body">


                <form action="{{ route('seo.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Keyword</label>
                                <input class="form-control" style="color: red" name="tags[]" type="text" value="{{ $seo->keyword }}" placeholder="Type and Hit Enter" data-role="tagsinput" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Author</label>
                                <input class="form-control" name="author" type="text" value="{{ $seo->author }}" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Revisit</label>
                                
                                <div class="input-group mb-3">
                                    <input class="form-control" name="revisit" type="text" value="{{ $seo->revisit }}" />
                                    <div class="input-group-append">
                                      <span class="input-group-text">Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Sitemap Link</label>
                                <input class="form-control" name="sitemap_link" type="text" value="{{ $seo->sitemap_link }}" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Descriptions</label>
                                <input class="form-control" name="description" type="text" value="{{ $seo->description }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>App title or tag line for meta</label>
                                <input class="form-control" name="app_title" type="text" value="{{ $seo->app_title }}" />
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
                <h3><i class="far fa-file-image"></i> Fevicon (32X32) Automatic</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        {{-- <img src="{{ asset('assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded"> --}}
                        <img alt="avatar" class="img-fluid avatar-rounded" src="@if( setting_val('fevicon_thumbnail')!="") {{ url('/') }}/{{ setting_val('fevicon_thumbnail') }} @else  {{ asset('assets/images/avatars/avatar.png') }} @endif">
                    </div>
                </div>

                <div class="row">
                    
                    

                    <div class="col-lg-12">
                        {{-- <input id="profile-image-upload" class="hidden" type="file"> --}}
                            <form method="post" action="" enctype="multipart/form-data"
                                    id="myform">
                    
                                <div >
                                    <input type="file" id="file" name="file" class="hidden" />
                                    {{-- <input type="button" class="button" value="Upload"
                                            id="but_upload"> --}}
                                </div>
                                <button type="button" id="but_upload" class="btn btn-info btn-block mt-3">Change fevicon</button>
                            </form>
                        
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
<script src="{{ asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

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
                url: '{{ route("setting.fevicon.update") }}',
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
                        window.location.replace("{{ route('seo.index') }}");
                    }
                },
            });
        });
    });
</script>
@endsection
