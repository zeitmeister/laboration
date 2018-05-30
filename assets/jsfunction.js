function formCheck() {
	const regex1 = RegExp(/@([^.]+)\./g);
	const regex2 = RegExp(/@\./g);
	const x = document.forms["registerform"]["loginmail"].value.trim();
	const y = document.forms["registerform"]["loginpassword"].value.trim();
	if (x == "" || y == "") {
		alert("Fields can not be left blank");
		return false;
	}
	else if (regex1.test(x)){
		return true;
	}
	else if (regex2.test(x)) {
		return true;
	}
	else {
		alert("You must enter a valid email adress");
		return false;
	}
}

function passCheck() {
  const x = document.forms["registerform"]["2password"].value.trim();
  const y = document.forms["registerform"]["password"].value.trim();
  if (x==y) {
    return true;
  }
  else {
    alert("Your passwords do not match");
    return false;
  }
}

function formCheck2() {
	const regex1 = RegExp(/@([^.]+)\./g);
	const regex2 = RegExp(/@\./g);
	const x = document.forms["commentform"]["fname"].value.trim();
	const y = document.forms["commentform"]["fmail"].value.trim();
	const z = document.forms["commentform"]["comment"].value.trim();
	if (x == "" || y == "" || z == "") {
		alert("Fields can not be left blank");
		return false;
	}
	else if (regex1.test(y)){
		return true;
	}
	else if (regex2.test(y)) {
		return true;
	}
	else {
		alert("You must enter a valid email adress");
		return false;
	}
}

function formCheck3() {
	const regex1 = RegExp(/@([^.]+)\./g);
	const regex2 = RegExp(/@\./g);
	const x = document.forms["registerform"]["username"].value.trim();
	const y = document.forms["registerform"]["mail"].value.trim();
	const z = document.forms["registerform"]["password"].value.trim();
	const c = document.forms["registerform"]["2password"].value.trim();
	if (x == "" || y == "" || z == "" || c == "") {
		alert("Fields can not be left blank");
		return false;
	}
	else if (regex1.test(y)){
		return true;
	}
	else if (regex2.test(y)) {
		return true;
	}
	else {
		alert("You must enter a valid email adress");
		return false;
	}
}

function alerter () {
	alert("Password or username doesn't match");
}
