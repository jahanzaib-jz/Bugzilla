$(document).ready(function() {
  console.log("acha")
  // $("#developer").append('<option>Select</option>');
  $('#project').change(function(){
    
    var projectID = $(this).val();
    console.log(projectID);
    if(projectID){
      $.ajax({
        type:"GET",
        url:"{{url('get-developer-list')}}?project_id="+projectID,
        
        success:function(res){   
           
            if(res){
            
          $("#developer").empty();
          $("#developer").append('<option>Select</option>');
          $.each(res,function(key,value){
          $("#developer").append('<option value="'+key+'">'+value+'</option>');
         
          });

          }
          else{
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
    $("#status").append('<option value="new">New</option>');
    $("#status").append('<option value="started">Started</option>');
    // $("#developer").append('<option>Select</option>');
    var type = $(this).val();
    if(type=='bug'){
      $("#status").append('<option value="resolved">Resolved</option>');
    }
    else{
            $("#status").append('<option value="completed">Completed</option>');

    }
  });


});
