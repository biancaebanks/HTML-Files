var log = document.getElementById("log-link");
var sign = document.getElementById("sign-link");
var logs = document.getElementById("log-sec");
var signs = document.getElementById("sign-sec");
var g1 = document.getElementsByClassName("giffy");
var f = document.getElementsByClassName("f1");


function login(){
	sign.className = sign.className.replace("active"," ");
	log.className += " active";
	logs.className = logs.className.replace("col-sm-4","col-sm-8");
	signs.className = signs.className.replace("col-sm-8","col-sm-4");
	logs.style.backgroundColor = "#256c7c";
	signs.style.backgroundColor = "black";
	g1[0].style.display = "none";
	g1[1].style.display = "block";
	f[0].style.display = "block";
	f[1].style.display = "none";
}

function signup(){
	log.className = log.className.replace("active"," ");
	sign.className += " active";
	logs.className = logs.className.replace("col-sm-8","col-sm-4");
	signs.className = signs.className.replace("col-sm-4","col-sm-8");
	logs.style.backgroundColor = "black";
	signs.style.backgroundColor = "#256c7c";
	g1[1].style.display = "none";
	g1[0].style.display = "block";
	f[1].style.display = "block";
	f[0].style.display = "none";
}

function getUsername(){
	let username = document.getElementById("usernameLogin").value;
	let pwdval = document.getElementById("pwdLogin").value;
	sessionStorage.setItem("currentUser", username);
	sessionStorage.setItem("PasswordValue", pwdval);
}

function getUnP(){
	let username = document.getElementById("usernameSignup").value;
	let pwdval = document.getElementById("pwdSignup").value;
	sessionStorage.setItem("currentUser", username);
	sessionStorage.setItem("PasswordValue", pwdval);
}
