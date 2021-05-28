@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}" />
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        
        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #2196F3;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
        </style>
@endsection

@section('content')
{{ top_brade("Membership",array("Home","Membership","index"),"") }}
<!-- end row -->


<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form method="post" id="fail" action="{{ route("rzp.fail") }}">

</form>
<form method="post" id="success" action="{{ route("rzp.fail") }}">

</form>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    
<script>
var options = {
    "key": "{{ env('RZP_api_key') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{ $arr['amt']*100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{ env('CURRENCY_SYMB') }}",
    "name": "{{ Auth::user()->name }}",
    "description": "{{ $member->name }}",
    "image": "https://example.com/your_logo",
    "order_id": "{{  $order['id'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    callback_url: '{{ route("rzp.fail") }}',
    redirect: true,
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)

        // var success_form = document.getElementById('success');
        // var input = "";
        // input += '<input type="text" name="from" value="buy_membership">';
        // input += '<input type="text" name="razorpay_payment_id" value="'+response.razorpay_payment_id+'">';
        // input += '<input type="text" name="razorpay_order_id" value="'+response.razorpay_order_id+'">';
        // input += '<input type="text" name="razorpay_signature" value="'+response.razorpay_signature+'">';
        
        // success_form.appendChild(input);
        // success_form.submit(); 
    },
    "prefill": {
        "name": "{{ Auth::user()->name }}",
        "email": "{{ Auth::user()->email }}",
        "contact": "{{ Auth::user()->phone }}"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){

        // var fail_form = document.getElementById('fail');
        // var input = "";
        // input += '<input type="text" name="from" value="buy_membership">';
        // input += '<input type="text" name="code" value="'+response.error.code+'">';
        // input += '<input type="text" name="description" value="'+response.error.description+'">';
        // input += '<input type="text" name="source" value="'+response.error.source+'">';
        // input += '<input type="text" name="step" value="'+response.error.step+'">';
        // input += '<input type="text" name="reason" value="'+response.error.reason+'">';
        // input += '<input type="text" name="metadata_order_id" value="'+response.error.metadata.order_id+'">';
        // input += '<input type="text" name="metadata_payment_id" value="'+response.error.metadata.payment_id+'">';
        
        // fail_form.appendChild(input);
        // fail_form.submit(); 
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>


@endsection

@section('script')
<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<!-- END Java Script for this page -->
<script src="{{ asset('js/users/users.js') }}"></script>
@endsection

