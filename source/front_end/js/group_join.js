// jQuery.post( url, [data], [callback function], [type])
$('document').ready(function(){
    $("#join_this_group").click(function(){
          $.post(
              "index.php?rt=group/manage_join", 
              {group_name:$("#group_name").html()}, 
              function(data){
                  alert(data);
              },
              "text");
    });
});

