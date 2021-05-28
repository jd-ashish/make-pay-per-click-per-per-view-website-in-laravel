@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.min.css')}}">
@endsection
@section('title')
@if (isset($_GET['id']))
    Send email to {{ base64_decode($_GET['name']) }} | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@else
    Send email to All users | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endif
    
@endsection
@section('content')
{{ top_brade("Send email to users",array("home","dashbord","users","Send email to users","index"),"") }}
<!-- end row -->

@if (isset($_GET['id']))
{{ back_link(route('user.details',base64_decode($_GET['id']))) }}
@else
{{ back_link(route('users.index')) }}
@endif


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file"></i> Send email to @if (isset($_GET['name'])) {{ base64_decode($_GET['name']) }} @else all users @endif</h3>
            </div>
            <form action="{{ route('send.email.users') }}" method="POST">
                @csrf
                @if (isset($_GET['id']))
                <input type="hidden" name="user_id" value="{{ base64_decode($_GET['id']) }}">
                @endif
                <div class="card-body">
                    <input type="text" name="subjects" class="form-control" placeholder="Enter subjects ">
                </div>
                
                
                <div class="card-body">
                    <textarea rows="3" class="form-control editor" name="messages" placeholder="Enter messages"></textarea>
                </div>
                <button class="btn btn-dropbox float-right" type="submit">Send id</button>
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
