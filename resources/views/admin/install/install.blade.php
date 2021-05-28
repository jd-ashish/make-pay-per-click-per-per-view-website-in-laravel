<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Install App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
</head>

<body style="padding: 10%">
<div class="card" id="accordion">
    <div class="card-header" style="padding: 0px !important;">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-toggle="collapse" href="#collapseOne" >Start <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
            <button type="button" class="btn btn-primary  " >App validate <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
            <button type="button" class="btn btn-primary " >Database setup <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
            <button type="button" class="btn btn-primary " >Database setup <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
            <button type="button" class="btn btn-primary " >SQL setup <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
            <button type="button" class="btn btn-primary " >Account setup <i class="fa fa-chevron-right" aria-hidden="true" style="margin-left: 15px"></i></button>
        </div>
    </div>
    <div class="card-body">
        @if (isset($_GET['step']) || isset($_GET['final']))

        @else
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <center>
                    <button style="margin: 10px auto" class="btn btn-success btn-lg collapsed" data-toggle="collapse" href="#collapseTwo"><i class="fa fa-download"></i> Start installations</button>
                </center>
            </div>
            <form method="post" action="{{ route('install.store') }}">
                @csrf
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <center>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control verify-envato-purchase-text" name="purch_code" placeholder="Your Purchace code">
                            <div class="input-group-append collapsed" data-toggle="collapse" href="#db_setup">
                                <span class="input-group-text verify-envato-purchase" style="cursor: pointer">next</span>
                            </div>
                            {{-- <div class="input-group-append">
                            <span class="input-group-text verify-envato-purchase" style="cursor: pointer">Purchace code validate</span>
                            </div> --}}
                        </div>
                    </center>
                </div>
                <div id="db_setup" class="collapse" data-parent="#accordion">
                    <center>
                        <div class="form-group">
                            <label for="host"></label>
                            <input type="text" class="form-control" placeholder="Host" id="host" name="Host" value="localhost">
                        </div>
                        <div class="form-group">
                            <label for="DB_PORT"></label>
                            <input type="text" class="form-control" placeholder="DB_PORT" id="DB_PORT" name="DB_PORT" value="3306">
                        </div>
                        <div class="form-group">
                            <label for="pwd"></label>
                            <input type="text" class="form-control" placeholder="Database password" name="Database_password" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="uname"></label>
                            <input type="text" class="form-control" placeholder="Database username" name="Database_user_name" id="uname">
                        </div>
                        <div class="form-group">
                            <label for="dbn"></label>
                            <input type="text" class="form-control" placeholder="Database name" name="Database_name" id="dbn">
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-2">Submit</button>
                    </center>
                </div>
            </form>
        @endif

        @if (isset($_GET['final']))
            <div id="assount_setup" class="collapse show" data-parent="#accordion">
                <small class="text-danger"> ALl (*) mark mandatory field</small>
                <form method="post" action="{{ route('install.account.setup') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="APP_NAME">App name <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" name="APP_NAME" id="APP_NAME">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descriptions">App tag or descriptions  <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" name="app_tag" id="descriptions">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="appurl">App URL  <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" id="appurl" name="APP_URL">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="email" class="form-control" name="account_email" id="inputEmail4" autocomplete="off" placeholder="Admin login email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="password" class="form-control" id="inputPassword4" name="password" autocomplete="off" placeholder="Admin login password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cnf-pass">Confirm my Password <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="password" class="form-control" id="cnf-pass" name="cnf_pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone_2">phone <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone_2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" name="state" id="inputState">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip <span class="test-danger" style="color: red; font-size: 21px; font: bold">*</span></label>
                            <input type="text" class="form-control" id="inputZip" name="zip">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Install</button>
                </form>
            </div>
        @endif

        @if (isset($_GET['step']))
            <div class="text-center" id="initFeedBack" style="display: none">
                <h3><img src="{{url('loader.gif')}}" /> Initiatizing sql ....</h3>
                <hr />
            </div>

            <center>
                <button id="installApp" style="margin: 10px auto" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> Install SQL APP!</button>
            </center>

        @endif


    </div>
</div>
<div class="text-center" id="initFeedBack" style="display: none">
    <h3><img src="{{url('img/loader.gif')}}" /> Initiatizing System ....</h3>
    <hr />
</div>

<center>
    {{-- <button id="installApp" style="margin: 10px auto" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> Install App!</button> --}}
</center>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready( function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.verify-envato-purchase').click(function(e){
            e.preventDefault();
            var form = new FormData();
            form.append("purchase_code", $('.verify-envato-purchase-text').val());

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://softechcon.xyz/verify/verify.php",
                "method": "POST",
                "headers": {
                    "cache-control": "no-cache",
                    "postman-token": "39878dfa-920b-be44-ab4d-3cb2cbe26244"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            }
            $.ajax(settings).done(function (response) {
                console.log(response);
                // if(response.error){
                //       alert("yes")
                //   }else{
                //       alert("no")
                //   }
            });
        });


    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

@include('message')

<script>
    function showFeedBack(el, str, error = true, url = null) {

        if (url != null) {
            if (!error) {
                var newDiv = $('<div/>').addClass('alert alert-success flush').html('<h5><i class="fa fa-check-circle"></i> ' + str + '</h5>').delay(8000).fadeOut('normal', function() {
                    window.location = url;
                });
            } else {
                var newDiv = $('<div/>').addClass('alert alert-danger flush').html('<h5><i class="fa fa-close"></i> ' + str + '</h5>').delay(8000).fadeOut('normal', function() {
                    window.location = url;
                });
            }
            $(el).before(newDiv);
        } else {

            if (!error) {
                var newDiv = $('<div/>').addClass('alert alert-success flush').html('<h5><i class="fa fa-check-circle"></i> ' + str + '</h5>').delay(8000).fadeOut();
            } else {
                var newDiv = $('<div/>').addClass('alert alert-danger flush').html('<h5><i class="fa fa-close"></i> ' + str + '</h5>').delay(8000).fadeOut();
            }
            $(el).before(newDiv);

        }
    }

    $(function() {

        $('body').on('click', '#installApp', function() {

            $('#initFeedBack').css('display', 'block');
            $('#installApp').attr("disabled", true);
            $.ajax({
                url: '{{route("app.systemInt")}}',

                success: function(data) {
                    console.log(data);
                    $('#installApp').attr("disabled", false);
                    if (data == 1) {
                        $('#initFeedBack').css('display', 'none');
                        showFeedBack('#initFeedBack', 'Make Sure, DB connection is working,<br/><br/><i>Tip: check your .env file</i>');
                        setTimeout(function() {
                            $('#systemInt').attr("disabled", false);
                        }, 2000);
                    } else if (data == 2) {
                        $('#initFeedBack').css('display', 'none');
                        showFeedBack('#initFeedBack', 'Make Sure, DB connection is working,<br/><br/><i>Tip: check your .env file</i>');
                    } else if (data == "success"){
                        $('#initFeedBack').css('display', 'none');
                        showFeedBack('#initFeedBack', 'Successfully initialised!', false);
                        // window.location = "{{ route('install') }}"+"/?final=true";
                        // Simulate an HTTP redirect:
                        window.location.replace("{{ route('install') }}"+"/?final=true");
                    }


                },
                type: 'GET',
                error: function(data){
                    console.log(data);
                    showFeedBack('#initFeedBack', data.responseJSON.message);
                    setTimeout(function() {
                        $('#systemInt').attr("disabled", false);
                    }, 2000);
                }
            });
        });
    });
</script>
</body>

</html>