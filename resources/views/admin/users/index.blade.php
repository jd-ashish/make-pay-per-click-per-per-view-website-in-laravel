@extends('admin.layouts.app')
@section('title')
    All user informations | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade("Users",array("home","Users","View"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> Users</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered table-hover display getUser" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Role</th>
                                <th>Verifyed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-resp">

                        </tbody>
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
@endsection

@section('script')
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection
