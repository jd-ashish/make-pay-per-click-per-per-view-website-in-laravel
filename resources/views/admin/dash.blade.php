@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder" style="margin-top: -25px;">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="clearfix"></div>
        </div>
        @include('admin.extra.alert')
        

    </div>
</div>
<!-- end row -->
@if (Auth::user()->user_type=="user")
    @include('admin.user_dash')
@else
    @include('admin.admin_dash') 
@endif

@endsection
