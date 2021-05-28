<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', env('APP_NAME', setting_val('APP_NAME')) )</title>

      

    <meta name="description" content="{{ seo()->description }}">
    <meta name="author" content="{{ seo()->author }}">
    <meta name="sitemap_link" content="{{ seo()->sitemap_link }}">

    <meta name="keywords" content="@yield('meta_keywords', seo()->keyword)">
    <meta itemprop="name" content="{{ seo()->app_title }}">
    <meta itemprop="description" content="{{ seo()->description }}">
    <meta itemprop="image" content="{{ url('/') }}/{{ setting_val('fevicon_image') }}">
    <!-- Favicon -->
    <link type="image/x-icon" href="{{ url('/') }}/{{ setting_val('fevicon_thumbnail') }}" rel="shortcut icon" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="{{ asset('assets/font-awesome/css/all.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/chart.js/Chart.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css" />
    <!-- END CSS for this page -->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <style>
    
        /* width */
    ::-webkit-scrollbar {
      width: 5px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px grey; 
      border-radius: 5px;
    }
     
    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #6777EF; 
      border-radius: 5px;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #b30000; 
    }
        .volume {
          position: fixed;
          top: 0px;
          left: 0px;
          width: calc(100% - 0px);
          z-index: 999985555;
          height: 2px;
          border-radius: 0px;
      }
      </style>
  @yield('style')
  <style>
    @include('admin.extra.css')
</style>
<style>
    /*Right*/
	
    .modal-dialog {
    position: fixed;
    margin: auto;
    width: 85% !important;
    height: 100%;
    right: 0px;
}
.modal-content {
    height: 100%;
}
.loader,
.loader:before,
.loader:after {
  background: #0b13ea;
  -webkit-animation: load1 1s infinite ease-in-out;
  animation: load1 1s infinite ease-in-out;
  width: 1em;
  height: 4em;
}
.loader {
  color: #FB7E6D;
  text-indent: -9999em;
  margin: 88px auto;
  position: relative;
  font-size: 11px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
.loader:before,
.loader:after {
  position: absolute;
  top: 0;
  content: '';
}
.loader:before {
  left: -1.5em;
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.loader:after {
  left: 1.5em;
}
@-webkit-keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em;
    height: 5em;
  }
}
@keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em;
    height: 5em;
  }
}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}
</style>
</head>
<body>
    <input type="text" class="url" value="{{ env('APP_URL') }}">
    <input type="text" class="cr" value="{{ env('CURRENCY_TYPE') }}">
    
    <div id="main">
        
        @include('admin.extra.top_bar')

        @include('admin.extra.left _sidebar')

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">
                    <div class="progress volume" >
                        <div class="progress-bar progress_percent" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @yield('content')
                    

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        @include('admin.extra.footer')
      
        <div class="modal fade bd-example-modal-lg right animate__animated animate__backInRight animate__faster" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width: 85% !important">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="background: #E9ECEF">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </div>
        </div> 

    </div>

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>

    <!-- BEGIN Java Script for this page -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- Counter-Up-->
    <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- dataTabled data -->
    <script src="{{ asset('assets/data/data_datatables.js') }}"></script>

    <!-- Charts data -->
    <script src="{{ asset('assets/data/data_charts_dashboard.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    
    @include('message')
    
    
    <script>
        $(document).on('ready', function() {
            // data-tables
            $('#dataTable').DataTable({
                 
            });
            

            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'element',
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $(document).ready(function() {
            $(".nofify-view").click(function(){
                Swal.fire({
                    icon: '',
                    title: $(this).attr('title'),
                    text: $(this).attr('desc'),
                    footer: '<span style="float:right;">'+$(this).attr('cat')+'</span>'
                })
                $("#"+$(this).attr('id')).removeClass("nofify-view");
                $("."+$(this).attr('id')).css(({"font-size": "12px","font-weight": "normal"}));
                $("."+$(this).attr('id')+"b").css(({"font-size": "12px","font-weight": "normal"}));
                $('.ntfy-cnt').html(($('.ntfy-cnt').attr('nf-cnt')-1))
                $('.ntfy-cnt').attr('nf-cnt',($('.ntfy-cnt').attr('nf-cnt')-1))
                            $.ajax({
                                url: '{{ route("notification.views.change.status") }}',
                                type: 'post',
                                data: {id:$(this).attr('id')},
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
                                    
                                },
                            });
            })

            $(".NotificationViewAll").click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Read all notifications!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, read all!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                url: '{{ route("NotificationViewAll") }}',
                                type: 'post',
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
                                    $('.sss').html("<h4>View all notification successfully</h4>");
                                    $('.ntfy-cnt').html("0");
                                    Swal.fire(
                                        'Done!',
                                        'Read notifications successfully.',
                                        'success'
                                    )
                                    
                                },
                            });
                        
                    }
                })
                
                            
            })



            $(".getUserLog").click(function(){
                /* console.log($(this).attr('title'));
                console.log($(this).attr('route'));
                console.log($(this).attr('id')); */
                modl($(this).attr('title'),$(this).attr('route'),$(this).attr('id'));
            })
            $(".reate-us").click(function(){
                /* console.log($(this).attr('title'));
                console.log($(this).attr('route'));
                console.log($(this).attr('id')); */
                modl("Rate us","{{ route('rate.us') }}","");
            })
            
            function modl(title,url,id){
                $("#dynamicModal").modal()
                $("#dynamicModal .modal-header h5").html(title);
                $("#dynamicModal .modal-content .modal-body").html('<div class="loader">Loading...</div>');
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {id:id},
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
                        $("#dynamicModal .modal-content .modal-body").html(response);
                        $('#dynamicModal .modal-content .modal-body table').DataTable({

                        });
                        
                    },
                });
            }

           
        });

    </script>
    @yield('script')
    <!-- END Java Script for this page -->
</body>
</html>
