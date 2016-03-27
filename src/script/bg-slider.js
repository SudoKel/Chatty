	var backgroundImages = new Array();
	backgroundImages[0] = "img/bg-main.jpg";
	backgroundImages[1] = "img/unsplash-1.jpg";
	backgroundImages[2] = "img/unsplash-2.jpg";
	backgroundImages[3] = "img/unsplash-3.jpg";
	backgroundImages[4] = "img/unsplash-4.jpg";

	var speed = 10000;	// interval between slide (in miliseconds)

	// preload images
	var imgLoc = new Array();
	for (i = 0; i < backgroundImages.length; i++){
		imgLoc[i] = new Image();
		imgLoc[i].src = backgroundImages[i];
	}

	var cntr = -1;

	function slideback() {
		if (cntr < backgroundImages.length-1) cntr++;
		else cntr = 0;
		document.body.background = imgLoc[cntr].src;
	}

	if (document.all || document.getElementById)
		window.onload=function(){slideback(); setInterval(slideback, speed);};
