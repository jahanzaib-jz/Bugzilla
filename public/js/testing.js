$(document).ready(function() {
  console.log("acha")
  // $("#developer").append('<option>Select</option>');
  $('#project').change(function(){
    
    var projectID = $(this).val();
    console.log(projectID);
    if(projectID){
      $.ajax({
        type:"GET",
        
        url:"/get-developer-list",
        data:{projectID:projectID},
        async: true,
        cache: false,
        success:function(res){   
           console.log(res);
           console.log(Object.keys(res).length);
           window.a = res
           
            if(Object.keys(res).length>0){
            
          $("#developer").empty();
          $("#developer").append('<option>Select</option>');
          $.each(res,function(key,value){
          $("#developer").append('<option value="'+key+'">'+value+'</option>');
         
          });

          }
          else{
          
          window.alert("sometext");
          $("#developer").empty();

           
          }
        }
      });
    }else{
      $("#developer").empty();
    }
  });

   $('#type').change(function(){
    $("#status").empty();
    $("#status").append('<option>Select</option>');
    $("#status").append('<option value="New">New</option>');
    $("#status").append('<option value="Started">Started</option>');
    // $("#developer").append('<option>Select</option>');
    var type = $(this).val();
    if(type=='bug'){
      $("#status").append('<option value="Resolved">Resolved</option>');
    }
    else{
            $("#status").append('<option value="Completed">Completed</option>');

    }
  });

  //     $('#status').click(function(){
  //   $("#status").empty();
  //   $("#status").append('<option value="New">New</option>');
  //   $("#status").append('<option value="Started">Started</option>');
  //   // $("#developer").append('<option>Select</option>');
  //   var type = $(this).val();
  //   if(type=='bug'){
  //     $("#status").append('<option value="Resolved">Resolved</option>');
  //   }
  //   else{
  //           $("#status").append('<option value="Completed">Completed</option>');

  //   }
  // });


});
