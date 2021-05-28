$(document).ready(function(){
  var base_url = $(".url").val();
  getUsers();
  function getUsers(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".users-resp").html('<tr ><td colspan="7"><div class="loader">Loading...</div></td></tr>');
    $.ajax({
        url: base_url+"getUsers",  //server script to process data
        type: 'POST',
        
        success: function(dataReturend){
            $(".users-resp").html('');
            // console.log(dataReturend);

            var jsonCars = JSON.stringify(dataReturend);
                // var jObject = {"data" : jsonCars};
                // console.log(jsonCars.id);
                $(".getUser").DataTable({
                    data: dataReturend,
                    columns: [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'phone' },
                        { data: 'user_type' },
                        {
                            visible: true,
                            targets: 2,
                            className: "text-center",
                            "mData": null,
                           mRender: function (o) { if(o.email_verified_at==""){ return "Panding"; }else{ return "Approved";} }
                        },
                        {
                            visible: true,
                            targets: 3,
                            className: "text-center",
                            "mData": null,
                           mRender: function (o) { return '<a href="'+base_url+'user/details/'+o.id+'" id="' + o.id + '" class="btn btn-secondary client_detailsssss">Detail</a>'; }
                        }
                    ],
                    
                    retrieve: true,
                    "pagingType": "full_numbers",
                    "paging": true,
                    "lengthMenu": [5,10, 25, 50, 75, 100],
                });
        },
        error: function(data){
            console.log(data);
            Swal.fire('',data.responseJSON.message,'error')
        }

    });
}
});


// var jsonCars = JSON.stringify(dataReturend);
//                 // var jObject = {"data" : jsonCars};
//                 // console.log(jsonCars.id);
//                 $(".getCLientInDatatTable").DataTable({
//                     data: dataReturend,
//                     columns: [
//                         { data: 'id' },
//                         { data: 'name' },
//                         { data: 'email' },
//                         { data: 'phone' },
//                         { data: 'status' },
//                         {
//                             visible: true,
//                             targets: 2,
//                             className: "text-center",
//                             "mData": null,
//                            mRender: function (o) { return '<a href="#" id="' + o.id + '" class="btn btn-secondary client_detailsssss">Detail</a>'; }
//                         }
//                     ],
                    
//                     retrieve: true,
//                     "pagingType": "full_numbers",
//                     "paging": true,
//                     "lengthMenu": [5,10, 25, 50, 75, 100],
//                 });

// function getDynamicModal(id,type,thi){
//   $(".progress_percent").css('width', "1%");
//   $(".dynamic_titile_modal").html(type.replace("_"," ").charAt(0).toUpperCase() + type.replace("_"," ").substring(1));
//   $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//   });
//   $.ajax({
//       url: base_url+"/getDynamicModal",  //server script to process data
//       type: 'POST',
//       xhr: function () {
//           var xhr = new window.XMLHttpRequest();
//           //Download progress
//           xhr.addEventListener("progress", function (evt) {
//               if (evt.lengthComputable) {
//                   var percentComplete = evt.loaded / evt.total;
//                   // progressElem.html(Math.round(percentComplete * 100) + "%");

//                   console.log(Math.round(percentComplete * 100));
                  
//                   $(".progress_percent").css('width',Math.round(percentComplete * 100) + "%");
//               }
//           }, false);
//           return xhr;
//       },
//       data: {'id':id,"type":type},
//       success: function(data){
//           console.log(data);
//           $('#dynamic-modal').modal({backdrop: 'static', keyboard: false})
//           $(".dynamic_body_modal").hide()
//           $(".dynamic_footer_modal").hide()
//           $(".m-body-footer").html(data)
//           thi.html(type.replace("_"," ").replace("_"," "));
//       },
//       error: function(data){
//           // console.log(data.responseJSON.message);
//           Swal.fire('',data.responseJSON.message,'error')
//           thi.html("Details");
//       }

//   });
// }