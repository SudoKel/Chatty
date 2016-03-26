$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();

	var fName = document.getElementById("fName").value;
	var sName = document.getElementById("sName").value;
	var email = document.getElementById("email").value;
	var pNum = document.getElementById("pNum").value;
	var male = document.getElementById("male");
	var female = document.getElementById("female");
	var other = document.getElementById("other");
	var day = document.getElementById("day");
	var month = document.getElementById("month");
	var year = document.getElementById("year");
	var country = document.getElementById("country");
	var username = document.getElementById("uname").value;
	var password = document.getElementById("pwd").value;

	var dsel = day.options[day.selectedIndex].value;
	var msel = month.options[month.selectedIndex].value;
	var ysel = year.options[year.selectedIndex].value;
	var csel = country.options[country.selectedIndex].value;


	// check if fields are empty [all fields are required]
	if(fName=="" || fName==null) {
		document.getElementById("fErr").innerHTML = "Your first name is required.";
		document.getElementById("fErr").style.display = "inline";
	}
	if(sName=="" || sName==null) {
		document.getElementById("sErr").innerHTML = "Your last name is required.";
		document.getElementById("sErr").style.display = "inline";
	}
	if(email=="" || email==null) {
		document.getElementById("eErr").innerHTML = "Your email is required.";
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(re.test(e)==false) {
			document.getElementById("eErr").innerHTML = "Please specify a valid email.";
		document.getElementById("eErr").style.display = "inline";
		}
	}
	if(pNum=="" || pNum==null) {
		document.getElementById("pErr").innerHTML = "Your phone number is required.";
		if(isNaN(pNum)) {
		document.getElementById("pErr").innerHTML = "You need to specify a number.";
		document.getElementById("pErr").style.display = "inline";
		}
	}
	if(male.checked==false || female.checked==false || other.checked==false) {
		document.getElementById("gErr").innerHTML = "This information is required.";
		document.getElementById("gErr").style.display = "inline";
	}
	if(dsel=="" || msel=="" || ysel=="") {
		document.getElementById("dErr").innerHTML = "Please provide a complete date.";
		document.getElementById("dErr").style.display = "inline";
	}
	if(csel=="") {
		document.getElementById("cErr").innerHTML = "Please select a country.";
		document.getElementById("cErr").style.display = "inline";
	}
	if(username=="") {
		document.getElementById("uErr").innerHTML = "Please create a username.";
		document.getElementById("uErr").style.display = "inline";
	}
	if(password=="") {
		document.getElementById("pdErr").innerHTML = "Please create a password.";
		document.getElementById("pdErr").style.display = "inline";
	}


	});
});