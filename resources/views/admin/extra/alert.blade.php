@if (Auth::user()->email_verified_at!="")
    
@else
{{-- <div class="animate__animated animate__bounce animate__infinite	infinite">Example</div> --}}


<div class="alert alert-danger alert-dismissible animate__animated animate__bounce animate__repeat-3	3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Email not verify!</strong> You will not use some function Verify now.
</div>
@endif

