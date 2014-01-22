<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");
	}
	$pageTitle = 'CONVERSATION';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            	<!-- chat box has added here -->
            	<div class="col-md-8 col-md-offset-2 chat_box">
                    <div class="col-md-12">
                        <div class="alert alert-info col-md-10 chat-thread">This is my chat log</div> 
                        <img src="http://placehold.it/50x50/ffcdff" alt="userImage" class="img-circle col-md-2 chat-image">
                    </div>
                    <div class="col-md-12">
                        <img src="http://placehold.it/50x50/ffcdff" alt="userImage" class="img-circle col-md-2 chat-image">
                         <div class="alert alert-success col-md-10 chat-thread">This is my chat log</div> 
                    </div>
            		<form role="form" class="col-md-12">	
					  <div class="form-group">
					    <input class="form-control" placeholder="please fill the placeholder">
					  </div>
					</form>
            	</div>
            	<!-- chat box has ends here -->
            	
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>