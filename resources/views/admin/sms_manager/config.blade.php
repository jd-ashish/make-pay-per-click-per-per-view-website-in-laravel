@extends('admin.layouts.app')

@section('title')
    SMS Configurations | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')
{{ top_brade('<i class="fas fa-sms"></i> SMS Configurations',array("home","SMS Manager","Config","index"),"") }}
<!-- end row -->



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-sms"></i> SMS Configurations</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('sms.config.save') }}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('Sms DRIVER')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" name="sms_pkg" onchange="checkSmsPkg()">
                                <option value="">Select sms driver</option>
                                <option value="fast2sms" @if (setting_val('sms_pkg') == "fast2sms") selected @endif>Fast2Sms</option>
                                <option value="twilio" @if (setting_val('sms_pkg') == "twilio") selected @endif>Twilio</option>
                            </select>
                        </div>
                    </div>
                    <div class="fast2sms" style="display: none;">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('DLT TYPE')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="DLT_SLT" onchange="dltSelect()">
                                    {{-- <option value="sendmail" @if (env('MAIL_DRIVER') == "sendmail") selected @endif>Sendmail</option> --}}
                                    <option value="">Select DLT type</option>
                                    <option value="dlt" @if (setting_val('fast2sms_with_dlt') == "on") selected @endif>DLT</option>
                                    <option value="without_dlt" @if (setting_val('fast2sms_without_dlt') == "on") selected @endif>Without DLT</option>
                                    {{-- <option value="mailgun" @if (env('MAIL_DRIVER') == "mailgun") selected @endif>Mailgun</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('FAST2SMS_KEY')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="FAST2SMS_KEY" value="{{  env('FAST2SMS_KEY') }}" placeholder="FAST2SMS KEY">
                            </div>
                        </div>
                        <div class="dlt_sec" style="display: none;">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">{{__('ROUTE')}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="route" value="dlt" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">{{__('sender id')}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="sender_id" value="{{ json_decode(setting_val("fast2sms_dlt_details"))->sender_id }}" placeholder="Enter sender ID">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">{{__('Message id')}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="message" value="{{ json_decode(setting_val("fast2sms_dlt_details"))->message }}" placeholder="Enter message ID">
                                    <small class="text-danger">Message id must contain only Like : Dear user your OTP from {{ env('APP_NAME') }} : {#var#}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="twilio" style="display: none;">
                        


                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('TWILIO SID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_SID" value="{{  env('TWILIO_SID') }}" placeholder="TWILIO SID">
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">{{__('TWILIO TOKEN')}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="TWILIO_TOKEN" value="{{ env('TWILIO_TOKEN') }}" placeholder="TWILIO TOKEN">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">{{__('TWILIO FROM')}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="TWILIO_FROM" value="{{ env('TWILIO_FROM') }}" placeholder="TWILIO FROM">
                                    <small class="text-danger">TWILIO FROM means that it will-be SENDER ID or number like +120*****986</small>
                                </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        checkSmsPkg();
        dltSelect();
    });
    function checkSmsPkg(){
        if($('select[name=sms_pkg]').val() == 'fast2sms'){
            $('.fast2sms').show();
            $('.twilio').hide();
        }
        if($('select[name=sms_pkg]').val() == 'twilio'){
            $('.fast2sms').hide();
            $('.twilio').show();
        }
    }
    function dltSelect(){
        if($('select[name=DLT_SLT]').val() == 'dlt'){
            $('.dlt_sec').show();
        }
        else{
            $('.dlt_sec').hide();
        }
    }
</script>
@endsection
