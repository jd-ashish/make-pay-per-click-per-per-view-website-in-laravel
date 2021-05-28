@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <link href="{{ asset('assets/css/pricing-tables.css" rel="stylesheet')}}" type="text/css" />
    <style>
        .same-height{
            height: 42px !important;
        }
        .tabco1{
            font-weight: bold;
        }

        .select2-selection__rendered {
    line-height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
.select2-container .select2-selection--single {
    height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
.select2-selection__arrow {
    height: 42px !important;
    border-radius: 0px !important;
    background: #E9ECEF !important;
}
        </style>

@endsection

@section('content')
{{ top_brade("Withdraw section",array("home","dashbort","withdraw","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    @php
                        $denid = false;
                    @endphp
                    @foreach ($Withdraw as $key => $value)
                        @if ($value->status == "denied")
                            @php
                                $denid = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Amount</th>
                                <th>payment method</th>
                                <th>Payment description</th>
                                @if ($denid)
                                    <th>Descriptions</th>
                                @endif
                                
                                <th>Status</th>
                                <th>Time</th>
                                @if(Auth::user()->user_type=="admin")
                                    <th>Action</th>
                                @else
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <body>
                            @foreach ($Withdraw as $key => $value)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td> {{ env('CURRENCY_TYPE') }} {{ $value->amount }}</td>
                                    <td><strong>{{ $value->payment_method }}</strong></td>
                                    <td class="">{{ $value->payment_details }}</td>
                                    @if ($value->status == "denied")
                                        <td class="">{{ $value->description }}</td>
                                    
                                    @endif
                                    <td class="{{ $value->id }}"><?= status($value->status)?></td>
                                    <td>{{ Time_ago(strtotime($value->created_at)) }}</td>
                                    @if(Auth::user()->user_type=="admin")
                                        <td>
                                            <select class="form-control changepr" id="{{ $value->id }}" pm="{{ $value->payment_method }}" pd="{{ $value->payment_details }}">
                                                <option value="pending" @if($value->status=="pending") selected @endif>Pending</option>
                                                <option value="success" @if($value->status=="success") selected @endif>Success</option>
                                                <option value="denied" @if($value->status=="denied") selected @endif>Denide</option>
                                            </select>
                                        </td>
                                    @else
                                        <td>
                                            <select class="form-control upm" id="{{ $value->id }}">
                                                <option>Update</option>
                                                <option value="upm">Update payment method</option>
                                            </select>
                                        </td>
                                    @endif
                                    
                                    
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
@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
@if(Auth::user()->user_type=="user")
<script>
    $(".upm").change(function(){
            $(".progress_percent").css('width',"0%");
            var val = $(this).val();
            var id = $(this).attr('id');
            var p_m = $(this).attr('pm');
            var p_d = $(this).attr('pd');
            
            if(val=="upm"){
                
                $("."+id).html("processing...");
                Swal.fire({
                title: 'Update payment method',
                html: `<select class="select2-selection__rendered js-example-basic-multiple js-states form-control select2 pm2" name="pm" id="id_label_multiple" style="width: 100%" required>
                            <option value="">Select payment method</option>    
                                @foreach (json_decode(setting_val("Withdraw_options"),true) as $item)
                                
                                    <option value="{{ $item }}">{{ $item }} </option>
                                @endforeach
                          </select>
                          <textarea placeholder="Payment details" name="pd" class="swal2-input form-control pd2" required></textarea>`,
                confirmButtonText: 'Update payment method',
                focusConfirm: false,
                preConfirm: () => {
                    const pm = Swal.getPopup().querySelector('.pm2').value
                    const pd = Swal.getPopup().querySelector('.pd2').value
                    
                    return { pm: pm, pd: pd }
                }
                }).then((result) => {
                    if(result.isDismissed){
                        $(".progress_percent").css('width',"100%");
                        $("."+id).html("TryAgain...");
                        Swal.fire(
                                            "Opps",
                                            "Request canceled by you",
                                            'warning'
                                        )
                    }
                    console.log(result);
                    if(result.value.pm==""){
                        Swal.fire(
                            'Opps...',
                            'Select payment method!',
                            'warning'
                        )
                    }else{
                        if(result.value.pd==""){
                            Swal.fire(
                                'Opps...',
                                'Select payment descriptions!',
                                'warning'
                            )
                        }else{
                            $.ajaxSetup({
                                headers:
                                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                            });
                            $.ajax({
                                url: '{{ route("change.withdrawl.request.status") }}',
                                type: 'post',
                                data: {pm:result.value.pm,id:id,pd:result.value.pd},
                                xhr: function() {
                                    var xhr = new window.XMLHttpRequest();

                                    // Upload progress
                                    xhr.upload.addEventListener("progress", function(evt){
                                        if (evt.lengthComputable) {
                                            var percentComplete = evt.loaded / evt.total;
                                            //Do something with upload progress
                                            console.log(percentComplete);
                                            $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                                        }
                                }, false);
                                
                                // Download progress
                                xhr.addEventListener("progress", function(evt){
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        // Do something with download progress
                                        console.log(percentComplete);
                                        $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                                    }
                                }, false);
                                
                                return xhr;
                                },
                                success: function(response){
                                    console.log(response);
                                    $("."+id).html("success");

                                    Swal.fire(
                                            "Withdrawl in "+result.value.pm,
                                            "Response has been recorded!",
                                            'success'
                                        )
                                    
                                },
                            });
                        }
                    }
                    
                });


            }
            
    })
</script>
@endif
@if(Auth::user()->user_type=="admin")
    <script>
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $(".changepr").change(function(){
            $(".progress_percent").css('width',"0 %");
            var val = $(this).val();
            var id = $(this).attr('id');
            $("."+id).html("processing...");
            if(val=="denied"){
                var denied = prompt("Say why denied this payment", "");
                if (denied === "") {
                    // user pressed OK, but the input field was empty
                    Swal.fire(
                                    "prompt input filed is empty write something in entry box",
                                    "Enter details then process next!",
                                    'warning'
                                )
                    $("."+id).html("Try again");
                } else if (denied) {
                    // user typed something and hit OK
                    $.ajax({
                        url: '{{ route("change.withdrawl.request.status") }}',
                        type: 'post',
                        data: {val:val,id:id,desc:denied},
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();

                            // Upload progress
                            xhr.upload.addEventListener("progress", function(evt){
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with upload progress
                                    console.log(percentComplete);
                                    $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                                }
                        }, false);
                        
                        // Download progress
                        xhr.addEventListener("progress", function(evt){
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                // Do something with download progress
                                console.log(percentComplete);
                                $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                            }
                        }, false);
                        
                        return xhr;
                        },
                        success: function(response){
                            console.log(response);
                            $("."+id).html(val);

                            Swal.fire(
                                    "Withdrawl is "+val,
                                    "Response has been recorded!",
                                    'error'
                                )
                            
                        },
                    });
                } else {
                    // user hit cancel
                    $("."+id).html("Try again");
                    Swal.fire(
                                    "prompt input filed is empty",
                                    "Enter details then process next!",
                                    'warning'
                                )
                }
                
            }else{
                $.ajax({
                    url: '{{ route("change.withdrawl.request.status") }}',
                    type: 'post',
                    data: {val:val,id:id,desc:""},
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        // Upload progress
                        xhr.upload.addEventListener("progress", function(evt){
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                //Do something with upload progress
                                console.log(percentComplete);
                                $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                            }
                    }, false);
                    
                    // Download progress
                    xhr.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            // Do something with download progress
                            console.log(percentComplete);
                            $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
                        }
                    }, false);
                    
                    return xhr;
                    },
                    success: function(response){
                        console.log(response);
                        $("."+id).html(val);

                        if(val=="success"){
                            Swal.fire(
                            "Successfully withdrawl!",
                            "Response has been recorded!",
                            'success'
                            )
                        }else{
                            Swal.fire(
                                "Withdrawl stil pending!",
                                "Response has been recorded!",
                                'error'
                            )
                        }
                        
                    },
                });
            }
            
        })
    </script>
@endif


@endsection
