$(document).ready(function() {

	$("#submit").click(function(e) {

		e.preventDefault();

		var fName = document.getElementById("fName").value;
		var sName = document.getElementById("sName").value;
		var email = document.getElementById("email").value;
		var pNum = document.getElementById("pNum").value;
		var gender = document.getElementsByClassName("gender");
		var day = document.getElementById("day");
		var month = document.getElementById("month");
		var year = document.getElementById("year");
		var country = document.getElementById("country");
		var username = document.getElementById("uname").value;
		var password = document.getElementById("pwd").value;

		var dsel = day[day.selectedIndex].value;
		var msel = month[month.selectedIndex].value;
		var ysel = year[year.selectedIndex].value;
		var csel = country[country.selectedIndex].value;

		var filled = true;


		// check if fields are empty [all fields are required]
	if(fName=="" || fName==null) {
		document.getElementById("fErr").innerHTML = "*Your first name is required.";
		document.getElementById("fErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("fErr").style.display = "none";
	}

	if(sName=="" || sName==null) {
		document.getElementById("sErr").innerHTML = "*Your last name is required.";
		document.getElementById("sErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("sErr").style.display = "none";
	}

	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if(re.test(email)==false) {
		document.getElementById("eErr").innerHTML = "*Please specify a valid email.";
		document.getElementById("eErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("eErr").style.display = "none";
	}

	if(email=="" || email==null) {
		document.getElementById("eErr").innerHTML = "*Your email is required.";
		document.getElementById("eErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("eErr").style.display = "none";
	}

	if(pNum=="" || pNum==null) {
		document.getElementById("pErr").innerHTML = "*Your phone number is required.";
		document.getElementById("pErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("pErr").style.display = "none";
	}

	if(isNaN(pNum)) {
		document.getElementById("pErr").innerHTML = "*You need to specify a number.";
		document.getElementById("pErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("pErr").style.display = "none";
	}

	if(!gender[0].checked && !gender[1].checked && !gender[2].checked) {
		document.getElementById("gErr").innerHTML = "*Please select an option.";
		document.getElementById("gErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("gErr").style.display = "none";
	}

	if(dsel=="" || msel=="" || ysel=="") {
		document.getElementById("dErr").innerHTML = "*Please provide a complete date.";
		document.getElementById("dErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("dErr").style.display = "none";
	}

	if(csel=="") {
		document.getElementById("cErr").innerHTML = "*Please select a country.";
		document.getElementById("cErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("cErr").style.display = "none";
	}

	if(username=="") {
		document.getElementById("uErr").innerHTML = "*Please create a username.";
		document.getElementById("uErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("uErr").style.display = "none";
	}
	
	if(password=="") {
		document.getElementById("pdErr").innerHTML = "*Please create a password.";
		document.getElementById("pdErr").style.display = "inline";
		filled = false;
	}
	else{
		document.getElementById("pdErr").style.display = "none";
	}


		if(filled)
		{
			if(gender[0].checked)
				var sex = "Male";
			else if(gender[1].checked)
				var sex = "Female";
			else
				var sex = "Other";

			$.ajax({
				type: "POST",
				url:  "reg.php",
				data: {first_name: fName, last_name: sName, email: email, phone_num: pNum, 
					   gender: sex, DOBYear: ysel, DOBMonth: msel, DOBDay: dsel, 
					   country: csel, username: username, password: password},
				success: function(data){
					console.log(data);
					if(data == 'true')
						window.location = "index.php";
				}
			});
		}

	});

	$("#reset").click(function(f) {

		document.getElementById("fErr").style.display = "none";
		document.getElementById("sErr").style.display = "none";
		document.getElementById("eErr").style.display = "none";
		document.getElementById("pErr").style.display = "none";
		document.getElementById("pErr").style.display = "none";
		document.getElementById("gErr").style.display = "none";
		document.getElementById("dErr").style.display = "none";
		document.getElementById("cErr").style.display = "none";
		document.getElementById("uErr").style.display = "none";
		document.getElementById("pdErr").style.display = "none";

	});

});