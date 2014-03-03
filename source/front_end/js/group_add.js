// jQuery.post( url, [data], [callback function], [type])
$('document').ready(function(){
    $("#create").click(function(){
         $.post(
             "index.php?rt=group/manage_add", 
             {group_name:$('#group_name').val(),group_desc:$('#group_desc').val()}, 
             function(data){
                 $("#inform").innerhtml = data;
                 alert(data);
             },
             "text");
    });
});


