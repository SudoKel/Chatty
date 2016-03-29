// file: chat.js

// when document is loaded run the following
$(document).ready(function(){
	// SEND MESSAGES
	// attach function to execute on click of submit button
	$("#submit").click(function(e){
		// prevent form from submitting data and resetting fields
		e.preventDefault();
		// retrieve chat message from text field
		var msg = $("#chat").val();
		// reset text field value
		$("#chat").val("");
		// use ajax to send the chat message to post.php
	 	$.ajax({
			type: "POST",
		 	url:  "post.php",
		 	data: {chat: msg},
		 	success: function(data)
		 	{
		 		// update the chat area with data from post.php
		 		$("#chatbox").html(data);
			}
	 	});
	});
				
	// UPLOAD IMAGES
	// attach function to execute on click of upload button
	$("#upload").click(function(e){
		// prevent form from submitting data and resetting fields
		e.preventDefault();
		// retrieve the upload form
		var form = $("form")[1];
		// retrieve the data of the upload form
		var formData = new FormData(form);
		// use ajax to send the image data to upload.php
		$.ajax({
			type: "POST",
			url:  "upload.php",
			cache: false,
			contentType: false, 
			processData: false, 
			data: formData,
			success: function (data) {
				// for debugging
				console.log(data);

				// if file size is > 2mb then alert user
				if(data == 'File too large. File must be less than 2 megabytes.')
					alert(data);
				else
					// update the chat area with data from upload.php
					$("#chatbox").html(data);
			}
		});
	});
});

// chat area should autoscroll by default
var autoScroll = true;

// disable autoscroll
function disableAutoScroll()
{
	autoScroll = false;
}

// enable autoscroll
function enableAutoScroll()
{
	autoScroll = true;
}

// update chat messages every 0.5s
setInterval(function(){
	// use ajax to retrieve data from get.php
	$.ajax({
	 	url:  "get.php",
	 	success: function(data){
	 		// constantly update the chat area messages
	 		$("#chatbox").html(data);
	
			// if mouse cursor is not over chat area then autoscroll
	 		if(autoScroll)
	 		{
	 			var elem = document.getElementById("chatbox");
	 			elem.scrollTop = elem.scrollHeight;
	 		}
		}
	});
}, 500);

// update online users every 0.5s
setInterval(function(){
	// use ajax to retrieve data from online.php
	$.ajax({
	 	url:  "online.php",
	 	success: function(data){
	 		// constantly update online users section
	 		$("#online").html(data);
		}
	});
}, 500);	