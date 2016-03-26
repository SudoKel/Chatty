	var backgroundImages = new Array();
	backgroundImages[0] = "img/bg-main.jpg";
	backgroundImages[1] = "img/unsplash-1.jpg";
	backgroundImages[2] = "img/unsplash-2.jpg";
	backgroundImages[3] = "img/unsplash-3.jpg";
	backgroundImages[4] = "img/unsplash-4.jpg";

	var speed = 2000;	// interval between slide (in miliseconds)

	// preload images
	var imgLoc = new Array();
	for (i = 0; i < backgroundImages.length; i++){
		imgLoc[i] = new Image();
		imgLoc.onload = function() {
			alert('working');
		}
		imgLoc[i].src = backgroundImages[i];
	}

	var inc = -1;

	function slideback() {
		if (inc < backgroundImages.length-1) inc++;
		else inc = 0;
		console.log(imgLoc[inc]);	// debug
		document.body.background = imgLoc[inc];
	}

	if (document.all || document.getElementById)
		window.onload = setInterval(slideback(), speed);