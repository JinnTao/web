<?php
$i = 10;
while($i > 0){
echo '	

  		<div class="topic-container">
			<a href="http://baidu.com"><h4>本可视化布局程序</h4></a>
			<div  class="topic-content-ellipsis">
			<p>乌克兰国防部长20日则公开宣布，驻克里米亚乌军和家属将迅速而有效地撤离克里米亚，现在正在制定撤军计划，希望联合国能帮助克里米亚半岛成非军事区，好让乌军顺利撤离克里米亚半岛。</p>
			<p>俄罗斯与克里米亚“闪电”签署入俄条约令西方一片惊愕。虽然对俄罗斯的各种谴责不断从西方政客口中传出，但他们心中或许都明白：克里米亚的命运已板上钉钉。对俄罗斯的制裁措施不但遭到克里姆林宫嘲笑，连西方媒体也坦承“无法令俄伤筋动骨”，欧洲可能因为对俄天然气的依赖而无法“一刀切了自己的肉”。</p>
			
			</div>

			<div class="article-foot">
            	<span><i class="icon-thumbs-up"></i><font>512</font></span>&nbsp;
          		<span><i class="icon-thumbs-down"></i><font>22</font></span>&nbsp;
				<span><i class="icon-pencil"></i><font></font></span>&nbsp;
           		<span><i class="icon-trash"></i><font></font></span>
            	<block class="pull-right topic-writer">
                	by&nbsp;:&nbsp;<small class="topic-writer">Dreamweaver</small>
				</block>
          </div>
          <hr size="4" color="#999999"/> 
    	</div> 
';
$i--;
}
?>


<div class="topic-container">
	<input type="text" placeholder="Title" class="input-block-level">
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

    <div id="editor" class="editor">
      Go ahead&hellip;
    </div>
    <a class="btn topic-btn" href="#">发布</a>
  </div>






