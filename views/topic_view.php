<?php
echo '	

  		<div class="topic-container">
			<a href="index.php?rt=sysu_index/topic_view&topic_id='.$topic['id'].'"><h4>'.$topic['title'].'</h4></a>
			<div  class="topic-content-ellipsis">
			'.$topic['content'].'
			</div>

			<div class="article-foot">
            	<span><i class="icon-thumbs-up"></i><font>512</font></span>&nbsp;
				<a href="index.php?rt=sysu_index/topic_update&topic_id='.$topic['id'].'"><i class="icon-pencil"></i><font></font></a>&nbsp;
           		<span><i class="icon-trash"></i><font></font></span>
            	<block class="pull-right topic-writer">
                	by&nbsp;:&nbsp;<small class="topic-writer">'.$topic['start_time'].'</small>
					<small class="topic-writer">'.$topic['start_id'].'</small>
				</block>
          </div>
          <hr size="4" color="#999999"/> 
    	</div> 
';
?>