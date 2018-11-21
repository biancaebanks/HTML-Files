var frame = document.getElementById("iframe");
var mopen = document.getElementById("menu");
var menuO= document.getElementById("menuO");
var frameO = document.getElementById("frame");
var menuC= document.getElementById("menuC");
document.getElementById("menuUser").innerHTML = sessionStorage.getItem("currentUser").toUpperCase();

function closeMenu(){
	mopen.className = mopen.className.replace("col-sm-2"," ");
	frameO.className = frameO.className.replace("col-sm-10","col-sm-12");
	menuO.style.display = "none";
	menuC.style.display="block";
	mopen.style.display="none";
}

function openMenu(){
	mopen.className = mopen.className.replace(" ","col-sm-2");
	frameO.className = frameO.className.replace("col-sm-12","col-sm-10");
	menuO.style.display = "block";
	mopen.style.display="block";
	//menuC.style.display="none";
}


function createGroupIFrame(){
	frame.src="createSG.html";
}

function findGroupIFrame(){
	frame.src="findSG.php";
}

function yourGroupIFrame(){
	frame.src="yourSG.php";
}



