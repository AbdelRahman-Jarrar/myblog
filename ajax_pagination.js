$(document).ready(function(){	
	function hideLoading() {
		$("#loading").fadeOut('slow');
	};	
	$("#paginate li:first").css({'color' : '#ffffff'}).css({'border' : 'none'});
	$("#content_container").load("data.php?page=1", hideLoading());
	$("#paginate li").click(function(){		
		$("#paginate li").css({'color' : '#000000'});
		$(this).css({'color' : '#ffffff'}).css({'border' : 'none'});
		var page_num = this.id;
		$("#content_container").load("data.php?page=" + page_num, hideLoading());
	});
});