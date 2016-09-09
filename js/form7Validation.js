function validateForm7() {
$('#numMembersMale').on("click",function() {
	
	var groupStartDate = $('#dateGroupStarted').val();
	var startDate = $('#startDate').val();
	var endDate = $('#endDate').val();
	var StatusValue = ((groupStartDate >= startDate) && (groupStartDate <= endDate)) ? "New" : "Old" ;
	$("#groupStatus").val(StatusValue);
	
});
	
} 