// JavaScript Document

// code for jquery ajax for fetching all data corresponding to selected category
$('#findjob_category').change(function(){
	categoryData = $('#findjob_category').val();
	if(categoryData == 'all_jobs')
	{
		location.reload();
	}
	else
	{
		sendingData = 'categoryValue='+categoryData+'&refData=category';
		returningPlace = '.job_list_outline';
		sendingRequest(sendingData,returningPlace);
	}
});

//method for ajax call from UI form
function sendingRequest(sendingData,returningPlace){
	$.ajax({
		type: "POST",
		url:"v-includes/class.fetchData.php",
		data: sendingData,
		beforeSend:function(){
			// this is where we append a loading image
			$('').html('');
		  },
		success:function(result){
			console.log(result);
			$(returningPlace).html(result);
			return false;
	}});
}

//code for inserting award id in project
function getAwarded(project_id,award_id){
	sendingData = 'project_id='+project_id+'&award_id='+award_id+'&refData=award';
	returningPlace = '';
	sendingRequest(sendingData,returningPlace);
	location.reload();
}

//code for insering chat message
function insertChatMessage(chat_id,project_id,user_id,bid_id){
	chat_message = $('#chat_message').val();
	sendingData = 'message='+chat_message+'&project_id='+project_id+'&chat_id='+chat_id+'&user_id='+user_id+'&bid_id='+bid_id+'&refData=chatMessage';
	returningPlace = '#message_place';
	sendingRequest(sendingData,returningPlace);
	$('#chat_message').val('');
}

//code for user details search
function userDetailsSearch(user_id){
	search_category = $('#search_category').val();
	search_name = $('#user_search_element').val();
	sendingData = 'search_name='+search_name+'&search_category='+search_category+'&user_id='+user_id+'&refData=user_search';
	returningPlace = '#user_search_result';
	sendingRequest(sendingData,returningPlace);	
}

//code for reloading chat page after certain page
$(document).ready(function() {
    chat_id = $('#chat_id').val();
	user_id = $('#user_id').val();
	//executing the page if there is chat page
	var pageUrl = (window.location.pathname);
	var pos = pageUrl.lastIndexOf("/");
	var pageName = pageUrl.substring(pos+1);
	if(pageName == 'chat.php')
	{
		//setting interval for execution the code for every 5seconds
		setInterval(function() {
			sendingData = '&chat_id='+chat_id+'&user_id='+user_id+'&refData=reloadChat';
			returningPlace = '';
			result = sendingRequest(sendingData,returningPlace);
			//jquery ajax function calling
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					if(result != '')
					{
						//getting old and new message
						oldData = $('#message_place .message_box:first-child').html();
						newData = $(result+'.message_box:first-child').html()
						if(oldData != newData)
						{
							console.log(result);
							$(returningPlace).html(result);
							//append the result in the top of chat history
							$('#message_place').prepend(result);
							return false;
						}
					}
					
			}});
		},10000);
	}	
});

