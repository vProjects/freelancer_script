// JavaScript Document

// code for jquery ajax for fetching all data corresponding to selected category
$('#findjob_category').change(function(){
	categoryData = $('#findjob_category').val();
	sendingData = 'categoryValue='+categoryData+'&refData=category';
	sendingRequest(sendingData);

});

//method for ajax call from UI form
function sendingRequest(sendingData){
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
			$(".job_list_outline").html(result);
			return false;
	}});
}
