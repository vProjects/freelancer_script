<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");
	}
	$pageTitle = 'CONVERSATION';
	include 'v-templates/header.php';
	$p_id = $GLOBALS['_GET']['p_id'];
	$b_id = $GLOBALS['_GET']['b_id'];
	$u_id = $GLOBALS['_GET']['u_id'];
	$c_id = $GLOBALS['_GET']['c_id'];
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            	<!-- chat box has added here -->
                
            	<div class="col-md-8 col-md-offset-2 chat_box">
                	<div id="message_place">
                    <?php
						//checking for null value of chat id
						if(empty($c_id))
						{
							$c_id = $manageContent->getChatId($p_id,$b_id);
						}
						//getting the chat details
						$chat = $manageContent->getChatDetails($c_id);
					?>
                    </div>
                    
            		<form role="form" class="col-md-12">	
					  <div class="form-group">
					    <textarea rows="2" class="form-control" placeholder="please fill the placeholder" id="chat_message"></textarea>
                        <input type="button" class="btn btn-danger pull-right chat_submit" value="Send" onclick="insertChatMessage(<?php echo "'".$c_id."','".$p_id."','".$u_id."','".$b_id."'"; ?>)"/>
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