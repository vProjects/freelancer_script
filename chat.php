<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");
	}
	$pageTitle = 'CONVERSATION';
	//checking for non empty get elements
	if(!empty($GLOBALS['_GET']['p_id']) && !empty($GLOBALS['_GET']['b_id']) && !empty($GLOBALS['_GET']['u_id'])){
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
                <?php
					//checking for null value of chat id
					if(empty($c_id))
					{
						$c_id = $manageContent->getChatId($p_id,$b_id);
					}
				?>
            	<div class="col-md-8 col-md-offset-2 chat_box">
                	<form role="form" class="col-md-12">	
                      <div class="form-group">
                        <textarea rows="2" class="form-control" placeholder="please fill the placeholder" id="chat_message"></textarea>
                        <input type="hidden" id="chat_id" value="<?php echo $c_id ?>" />
                        <input type="hidden" id="user_id" value="<?php echo $u_id ?>" />
                        <input type="button" class="btn btn-danger pull-right chat_submit" value="Send" onclick="insertChatMessage(<?php echo "'".$c_id."','".$p_id."','".$u_id."','".$b_id."'"; ?>)"/>
                      </div>
                    </form>
                
                	<div id="message_place" class="col-md-12">
                    	
                    <?php
						//getting the chat details
						$chat = $manageContent->getChatDetails($c_id);
						//making unread message changing to read message
						$update_message_status = $manageContent->updateMessageStatus($c_id,$u_id);
					?>
                    <div class="clearfix"></div>
                    </div>
                    
            	</div>
            	<!-- chat box has ends here -->
                
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
	} else { echo 'No Conversation Found'; }
?>