function startLoadingBar() {
	// only add progress bar if added yet.
	$("#loading-bar").show();
	$("#loading-bar").width((50 + Math.random() * 30) + "%");
}
function stopLoadingBar() {
	//End loading animation
	$("#loading-bar").width("101%").delay(200).fadeOut(400, function() {
		$(this).width("0");
	});
}


$(function() {
	$("body").on("click", "a[rel='loadpage']", function(e) {
		// Get the link location that was clicked
		
		startLoadingBar();
		pageurl = $(this).attr('href');
		
		// Replace the path of the url from index to the path with raw content
		var custom = pageurl;
		
		
		// Request the page
		$.ajax({url:custom,success: function(data) {
			// Show the content
			$('#content').html(data);
			// Stop the loading bar
			stopLoadingBar();
			// Set the new title tag
			document.title = $('#page-title').html();
			// Scroll the document at the top of the page
			$(document).scrollTop(0);
			// Reload functions
			reload();
			// Update the Track Information
			updateTrackInfo(nowPlaying);
		}});
		
		// Store the url to the last page accessed
		if(pageurl != window.location){
			window.history.pushState({path:pageurl}, '', pageurl);	
		}
		return false;
	});
});

