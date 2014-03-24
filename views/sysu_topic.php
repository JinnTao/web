
<?php
foreach($topic_array as $topic){
echo '	
 <div class="well">
  		<div class="topic-container">
			<a href="index.php?rt=sysu_index/topic_view&topic_id='.$topic['id'].'"><h4>'.$topic['title'].'</h4></a>
			<div  class="topic-content-ellipsis">
			'.$topic['content'].'
			</div>
 <hr size="4" color="#999999"/> 
			<div class="article-foot">
            	<span><i class="icon-thumbs-up"></i><font>512</font></span>&nbsp;
				<a href="index.php?rt=sysu_index/topic_update&topic_id='.$topic['id'].'"><i class="icon-pencil"></i><font></font></a>&nbsp;
           		<a href="index.php?rt=sysu_index/topic_del&topic_id='.$topic['id'].'"><i class="icon-trash"></i><font></font></a>
            	<block class="pull-right topic-writer">
                	by&nbsp;:&nbsp;<small class="topic-writer">'.$topic['start_time'].'</small>
					<small class="topic-writer">'.$topic['start_id'].'</small>
				</block>
          </div>
         
    	</div> 
	</div> 
';

}
?>

<form action="index.php?rt=sysu_index/topic_manager" onsubmit="return formSubmit(this)" method="post">
  <input type="text" placeholder="Title" class="input-block-level" id="topic_title" name="topic_title">
  <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
		    <div class="dropdown-menu input-append">
			    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
			    <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>

    <div id="editor" class="editor" name="topic_content">
      Go ahead&hellip;
    </div>
    
     <button id="publish" type="submit" class="btn topic-btn">发布</button>
</form>





