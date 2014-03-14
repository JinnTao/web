<div class="container-narrow">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li> <a href="#Modal_login" class="register_protocol" data-toggle="modal" >Sign In</a></li>
        </ul>
        <h3 >Project name</h3>
      </div>
</div>


<div id="main">    
<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit-index">
      <div class="container">
      <h1>Welcome to Sun Yat-Sen University!</h1>
      <br/>
      		<div class="row">
      			<div class="span8">
       	 			
        			<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>			
         		</div>
            	<div class="span4">
            	<p>
       				<?php include 'registe.php' ?>
    			</p>
			
            	</div>
        	</div>
      	</div>
</div><!-- end of hero unit -->
   
<div class="container">
        <footer>
        2014 &copy; All rights reserved.          

        </footer> 
 </div>

</div><!-- end of main -->


<!-- Modal -->
<div id="Modal_login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 	<?php include 'login.php' ?>
</div>
</div>