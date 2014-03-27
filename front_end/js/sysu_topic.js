// JavaScript Document

 $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      $('#voiceBtn').hide();
      // if ("onwebkitspeechchange"  in document.createElement("input")) {
      //   var editorOffset = $('#editor').offset();
      //   $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      // } else {
      //   $('#voiceBtn').hide();
      // }
    };
    initToolbarBootstrapBindings();  
    $('#editor').wysiwyg();
	
    window.prettyPrint && prettyPrint();
  });
  
  function formSubmit(form){
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'topic_content';
    input.value = document.getElementById('editor').innerHTML;
	input.id = 'topic_content';
    form.appendChild(input);

    return true;
  }

window.onload=function(){
	fresh_topic_like();
}
  
function fresh_topic_like(){
	var like = document.getElementsByName("topic_like");
	var like_number;
	for(var i = 0;i < like.length;i++){
		$.ajax({
			type:"POST",
			async:false,
       		cache:false,
			url:"index.php?rt=sysu_topic/count_like_ajax&topic_id="+like[i].getAttribute("topic_id"),
            success: function(result) { 
			   //like[i].innerHTML = result;
			   like_number = result;
			   //like[i].innerHTML = '123';
            }
		});
		like[i].innerHTML = like_number;		
	}

}

  function topic_add_like(topic_id){
	var like_number;
	$.ajax({
			type:"POST",
			async:false,
       		cache:false,
			url:"index.php?rt=sysu_topic/add_like&topic_id="+topic_id,
            success: function(result) { 
			   like_number = result;
            }
	});	
	var current_topic_id = "topic_like"+topic_id;
	var topic_likes = document.getElementById(current_topic_id);
	topic_likes.innerHTML = like_number;
  }


