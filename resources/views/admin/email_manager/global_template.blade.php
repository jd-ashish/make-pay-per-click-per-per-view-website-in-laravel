@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.min.css')}}">
@endsection

@section('content')
{{ top_brade("Global Template",array("home","Email Manager","Global Template","index"),"") }}
<!-- end row -->


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file"></i> Global termpate</h3>
            </div>
            <form action="{{ route('emial.global.template.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <textarea rows="3" class="form-control editor" name="global_template">{{ App\Settings::where('var','email_global_template')->first()->val }}</textarea>
                </div>
                <button class="btn btn-dropbox float-right" type="submit">Save template</button>
            </form>
            
        </div><!-- end card-->
    </div>
</div>
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
