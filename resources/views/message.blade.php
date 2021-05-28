@if ($message = Session::get('success'))
<script type="text/javascript">
    $(document).ready(function(){
        iziToast['success']({
                    message: "{{ $message }}",
                    position: "topRight"
                });
    });
</script>
@endif
  
@if ($message = Session::get('error'))
<script type="text/javascript">
    $(document).ready(function(){
        iziToast['error']({
                    message: "{{ $message }}",
                    position: "topRight"
                });
    });
</script>
@endif
   
@if ($message = Session::get('warning'))
<script type="text/javascript">
    $(document).ready(function(){
        iziToast['warning']({
                    message: "{{ $message }}",
                    position: "topRight"
                });
    });
</script>
@endif
   
@if ($message = Session::get('info'))
<script type="text/javascript">
    $(document).ready(function(){
        iziToast['info']({
                    message: "{{ $message }}",
                    position: "topRight"
                });
    });
</script>
@endif
  
@if ($errors->any())
<script type="text/javascript">
    $(document).ready(function(){
        iziToast['error']({
                    message: "Please check the form below for errors",
                    position: "topRight"
                });
    });
</script>
@endif

