// JavaScript Document

// code for jquery ajax for fetching all data corresponding to selected category
$('#findjob_category').change(function(){
	categoryData = $('#findjob_category').val();
	sendingData = 'categoryValue='+categoryData+'&refData=category';
	returningPlace = '.job_list_outline';
	sendingRequest(sendingData,returningPlace);

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
