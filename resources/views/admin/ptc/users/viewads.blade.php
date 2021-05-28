<style>
    


[style*="--aspect-ratio"] > :first-child {
  width: 100%;
}
[style*="--aspect-ratio"] > img {  
  height: auto;
} 
@supports (--custom:property) {
  [style*="--aspect-ratio"] {
    position: relative;
  }
  [style*="--aspect-ratio"]::before {
    content: "";
    display: block;
    padding-bottom: calc(100% / (var(--aspect-ratio)));
  }  
  [style*="--aspect-ratio"] > :first-child {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
  }  
}

body {
  margin: 0;
  padding: 0;
  font-family: "Lato", sans-serif;
  font-size: 20pt;
  font-weight: normal;
  background: lightblue; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(
    -90deg,
    orange,
    red
  ); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(
    -90deg,
    orange,
    red
  ); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(
    -90deg,
    orange,
    red
  ); /* For Firefox 3.6 to 15 */
  background: linear-gradient(-90deg, orange, red); /* Standard syntax */
}

.main {
  margin: 100px auto;
  text-align: center;
  color:white;
}

button {
  padding: 20px;
  background: transparent;
  text-shadow: 1px 1px 1px #202020;
  font-family: "Lato", sans-serif;
  font-size: 18pt;
  border: 1px solid lightblue;
  color: lightblue;
}

</style>


@extends('layouts.app')
@section('title')
    Ads view sections | {{ env('APP_NAME',setting_val('APP_NAME')) }}
@endsection
@section('content')

{{-- {{ $ads->type_data }} --}}

@switch($ads->type)
    @case(1)
        <html>

          <head>
            <meta charset="UTF-8">
            <title></title>
            <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css" integrity="sha512-/D4S05MnQx/q7V0+15CCVZIeJcV+Z+ejL1ZgkAcXE1KZxTE4cYDvu+Fz+cQO9GopKrDzMNNgGK+dbuqza54jgw==" crossorigin="anonymous" />
          </head>

          <body>
            <div class="main">

              <h3>Don't close or refresh page until Ads load or finish</h3>
              <button id="counter"></button>

              <h5 class="mt-5">note : Bee patient everythings automatic Don't ever try to close any windows other wise you will not able to earn</h5>
              <iframe src="https://www.google.com/"></iframe>
            </div>
          </body>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js" integrity="sha512-CrNI25BFwyQ47q3MiZbfATg0ZoG6zuNh2ANn/WjyqvN4ShWfwPeoCOi9pjmX4DoNioMQ5gPcphKKF+oVz3UjRw==" crossorigin="anonymous"></script>
        </html>

        <form method="post" id="sbmit" action="{{route('ptc.ern')}}">
            @csrf
            <input type="hidden" value="{{$ads->id}}" name="adid" >
        </form>
        <form method="post" id="fail" action="{{route('ptc.fail')}}">
            @csrf
            <input type="hidden" value="You have not earn due to miss timeing" name="fail" >
        </form>


        <script>
            function openChecking(){
                // alert("open");
                var width = Number(screen.width-(screen.width*0.25));  
                var height = Number(screen.height-(screen.height*0.25));
                var leftscr = Number((screen.width/2)-(width/2)); // center the window
                var topscr = Number((screen.height/2)-(height/2));
                var url = "{{ $ads->type_data }}";
                var title = 'popup';
                var properties = 'width='+width+', height='+height+', top='+topscr+', left='+leftscr;
                var popup = window.open(url, title, properties);
                
                var ref = 250;
                var crono;
                crono = window.setInterval(function() {
                    
                  console.log(popup);
                  if (popup == null || typeof(popup)=='undefined') {  
                      // alert('Please disable your pop-up blocker and click the "Open" link again.');
                      Swal.fire(
                        'pop-up blocker!',
                        'Please disable your pop-up blocker and click the "Open" link again.',
                        'warning'
                      )
                      stopCount22();
                  }else{
                        if (popup.closed !== false) { // !== opera compatibility reasons
                            window.clearInterval(crono);
                            checkClosed();
                        }
                        // console.log(popup);


                        count_ads = 0;
                        function iin(limit_ads) {
                        count_ads += 1;
                        if(count_ads>=limit_ads){
                            // document.getElementById("counter").innerHTML = "Click me not: " + count;
                            // openChecking();
                        }else{
                            document.getElementById("counter").innerHTML = "Ads Open with in : " + count_ads;
                        }
                        if(count_ads==limit_ads){
                            // document.getElementById("counter").innerHTML = "Click me not: " + count;
                            popup.close();

                            

                            if (popup.closed !== false) { // !== opera compatibility reasons
                                window.clearInterval(crono);
                                console.log('Time up')
                                //user win

                                // document.getElementById('sbmit').submit(); 
                            }
                        }
                        if(count_ads<limit_ads){
                            // document.getElementById("counter").innerHTML = "Click me not: " + count;
                            if (popup.closed !== false) { // !== opera compatibility reasons
                                window.clearInterval(crono);
                                console.log('Time down')
                                document.getElementById('fail').submit(); 
                            }
                        }
                        
                        };
                        setInterval(function(){ iin("{{$ads->duration}}") }, 1000);


                  }
                    


                }, ref); //we check if the window is closed every 1/4 second

                function stopCount22() {
                  clearTimeout(crono);
                  ref = 0;
                }
            }   
            function checkClosed(){
                window.onbeforeunload = function() {
                    if (data_needs_saving()) {
                        return "Do you really want to leave our brilliant application?";
                    } else {
                        return;
                    }
                };
                console.log('Time down');//User faild to win user loos
            }



            window.onbeforeunload = function() {
                    if (data_needs_saving()) {
                        return "Do you really want to leave our brilliant application?";
                    } else {
                        return "noooo";
                    }
                };
        </script>    

<script>
    //open new windows in jquer base in javascritp types
    function open_app(){
        var width = Number(screen.width-(screen.width*0.25));  
        var height = Number(screen.height-(screen.height*0.25));
        var leftscr = Number((screen.width/2)-(width/2)); // center the window
        var topscr = Number((screen.height/2)-(height/2));
        var title = 'popup';
        var properties = 'width='+width+', height='+height+', top='+topscr+', left='+leftscr;

        var w = window.open('https://www.google.com/', "Action ads view", properties);
                    //alert(ICJX_JXPath);
            console.log(w);

        var ref = 250;
        function data(){
            alert()
        }
        setInterval(function(){ console.log(w) }, 3000);
        // var pop_time = setInterval(data {
                    
        //     console.log(w);
        //     // if (popup == null || typeof(popup)=='undefined') {  
        //     //     // alert('Please disable your pop-up blocker and click the "Open" link again.');
        //     //     Swal.fire(
        //     //       'pop-up blocker!',
        //     //       'Please disable your pop-up blocker and click the "Open" link again.',
        //     //       'warning'
        //     //     )
        //     //     stopCount22();
        //     // }else{
                    

        //     // }
                


        // }, ref); //we check if the window is closed every 1/4 second
            // var html = $("#modeltext").html();

            //     $(w.document.body).html("html");
            
    }
</script>

          <script>
          // var button = document.getElementById("clickme"),
            count = 0;
          function incre(limit) {
                count += 1;
                if(count>=limit){
                // document.getElementById("counter").innerHTML = "Click me not: " + count;
                // openChecking();
                }else{
                document.getElementById("counter").innerHTML = "Ads Open with in : " + count;
                }
                if(count==limit){
                // document.getElementById("counter").innerHTML = "Click me not: " + count;
                //   openChecking(); // real open 
                open_app();
                
                
            }
          };
          setInterval(function(){ incre(3) }, 1000);
          </script>
        @break
    @case(2)
    <div class="main" style="margin-top: -10px">
        <div class="container">          
            <img src="{{ url('/') }}/images/{{ $ads->type_data }}" class="rounded" alt="Cinque Terre" width="400" height="296"> 
          </div>
        <h3>Don't close or refresh page until Ads load or finish</h3>
        <button id="txt"></button>
    
        <h5 class="mt-5">note : Bee patient everythings automatic Don't ever try to close any windows other wise you will not able to earn</h5>
    
      </div>
    {{-- image section  --}}
    {{-- {{ $ads->type_data }} --}}
      

      {{-- <button onclick="startCount()">Start count!</button>
      <input type="text" id="txt">
      <button onclick="stopCount()">Stop count!</button> --}}

        <form method="post" id="sbmit2" action="{{route('ptc.ern')}}">
            @csrf
            <input type="hidden" value="{{$ads->id}}" name="adid" >
        </form>

          <script>

startCount();



            var c = 0;
            var t;
            var timer_is_on = 0;
            
            function timedCount() {
              document.getElementById("txt").innerHTML = c+" Wait Up to "+"{{$ads->duration}} second";
              c = c + 1;
              if(c=="{{$ads->duration}}"){
                  document.getElementById('sbmit2').submit(); 
              }
              t = setTimeout(timedCount, 1000);
            }
            
            function startCount() {
              if (!timer_is_on) {
                timer_is_on = 1;
                timedCount();
              }
            }
            
            function stopCount() {
              clearTimeout(t);
              timer_is_on = 0;
            }
          </script>
        @break
        @case(3)

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<div class="main" style="margin-top: -10px">
    <div id = "CompTwo">
        <div id="click" onclick="click()">
            <?= $ads->type_data?>
          </div>
    </div>
    <h3>Don't close or refresh page until Ads load or finish</h3>
    <button id="txt"></button>

    <h5 class="mt-5">note : Bee patient everythings automatic Don't ever try to close any windows other wise you will not able to earn</h5>
    <div id = "CompTwo">
        <div id="click" onclick="click()">
            <?= $ads->type_data?>
          </div>
    </div>
    <div id = "CompTwo">
        <div id="click" onclick="click()">
            <?= $ads->type_data?>
          </div>
    </div>
  </div>
          {{-- <div id="click" onclick="click()">
            <?= $ads->type_data?>
          </div> --}}
          <form method="post" id="sbmit2" action="{{route('ptc.ern')}}">
            @csrf
            <input type="hidden" value="{{$ads->id}}" name="adid" >
        </form>

          <script>

startCount();



            var c = 0;
            var t;
            var timer_is_on = 0;
            
            function timedCount() {
              document.getElementById("txt").innerHTML = c+" Wait Up to "+"{{$ads->duration}} second";
              c = c + 1;
              if(c=="{{$ads->duration}}"){
                  document.getElementById('sbmit2').submit(); 
              }
              t = setTimeout(timedCount, 1000);
            }
            
            function startCount() {
              if (!timer_is_on) {
                timer_is_on = 1;
                timedCount();
              }
            }
            
            function stopCount() {
              clearTimeout(t);
              timer_is_on = 0;
            }
          </script>
        @break
    @default
    {{ $ads->type_data }}
@endswitch


{{-- <iframe src="https://www.maniyarbangles.com/" style="width: 100%; height: 100%;"
frameborder="0">
</iframe> --}}
<!-- HTML -->




@endsection
