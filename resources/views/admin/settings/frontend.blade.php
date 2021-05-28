@extends('admin.layouts.app')
@section('title')
    Frontend settings | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.min.css')}}">
@endsection

@section('content')
{{ top_brade("Frontend settings",array("home","Settings","Frontend settings","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> Frontend setting</h3>
            </div>

            <div class="card-body">


                <form action="{{ route('frontend.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">Map embed html code  </label>
                                <textarea class="form-control" name="map_embed" rows="5"  required >{{ setting_val("map_embed") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">About us  </label>
                                <textarea rows="3" class="form-control editor" name="about_us">{{ setting_val("about_us") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">Privacy and policy  </label>
                                <textarea rows="3" class="form-control editor" name="p_and_p">{{ setting_val("p_and_p") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">Terms & conditions  </label>
                                <textarea rows="3" class="form-control editor" name="t_and_c">{{ setting_val("t_and_c") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>twitter link</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="twitter" type="text" value="{{ setting_val("twitter") }}"   />
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize">Facebook link</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="facebook" type="text" value="{{ setting_val("facebook") }}"   />
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize">Instagram link</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="instagram" type="text" value="{{ setting_val("instagram") }}"   />
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize">google-plus link</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="google_plus" type="text" value="{{ setting_val("google_plus") }}"   />
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fab fa-google-plus-g"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize">linkedin link</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="linkedin" type="text" value="{{ setting_val("linkedin") }}"   />
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize">Footer credit</label>
                                <textarea class="form-control" name="footer_credit" rows="5"    >{{ setting_val("footer_credit") }}</textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                            <button type="submit" class="btn btn-primary">Update settings</button>
                        </div>
                    </div>
                    <hr>
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
                        <img alt="avatar" class="img-fluid" src="assets/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3">Change avatar</button>
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
<script src="{{ asset('assets/plugins/trumbowyg/trumbowyg.min.js') }}"></script>
<script>
    $(document).on('ready',function() {
        'use strict';
        $('.editor').trumbowyg();
    });
</script>
@endsection
