@extends('admin.layouts.app')

@section('content')
{{ top_brade("Email configuration",array("home","Email Manager","Config","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> <a href="{{ route('ptc.newads') }}">Create New</a></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('env_key_update.update') }}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('MAIL DRIVER')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" name="MAIL_DRIVER" onchange="checkMailDriver()">
                                {{-- <option value="sendmail" @if (env('MAIL_DRIVER') == "sendmail") selected @endif>Sendmail</option> --}}
                                <option value="smtp" @if (env('MAIL_DRIVER') == "smtp") selected @endif>SMTP</option>
                                {{-- <option value="mailgun" @if (env('MAIL_DRIVER') == "mailgun") selected @endif>Mailgun</option> --}}
                            </select>
                        </div>
                    </div>
                    <div id="smtp">
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL HOST')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_HOST" value="{{  env('MAIL_HOST') }}" placeholder="MAIL HOST">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_PORT">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL PORT')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_PORT" value="{{  env('MAIL_PORT') }}" placeholder="MAIL PORT">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_USERNAME">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL USERNAME')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_USERNAME" value="{{  env('MAIL_USERNAME') }}" placeholder="MAIL USERNAME">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL PASSWORD')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{  env('MAIL_PASSWORD') }}" placeholder="MAIL PASSWORD">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL ENCRYPTION')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{  env('MAIL_ENCRYPTION') }}" placeholder="MAIL ENCRYPTION">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL FROM ADDRESS')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{  env('MAIL_FROM_ADDRESS') }}" placeholder="MAIL FROM ADDRESS">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAIL FROM NAME')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{  env('MAIL_FROM_NAME') }}" placeholder="MAIL FROM NAME">
                            </div>
                        </div>
                    </div>
                    <div id="mailgun">
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAILGUN DOMAIN')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="{{  env('MAILGUN_DOMAIN') }}" placeholder="MAILGUN DOMAIN">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('MAILGUN SECRET')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MAILGUN_SECRET" value="{{  env('MAILGUN_SECRET') }}" placeholder="MAILGUN SECRET">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-googleplus" type="submit">{{__('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            

        </div>
        <!-- end card-->

    </div>

</div>
<!-- end row-->
@endsection

@section('script')
<script src="{{ asset('js/users/users.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        checkMailDriver();
    });
    function checkMailDriver(){
        if($('select[name=MAIL_DRIVER]').val() == 'mailgun'){
            $('#mailgun').show();
            $('#smtp').hide();
        }
        else{
            $('#mailgun').hide();
            $('#smtp').show();
        }
    }
</script>
@endsection
