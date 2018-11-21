sessionStorage.getItem("currentUser");

var sgs = document.getElementById("yourSGs");
var card = document.createElement("div");
card.className = "card";
sgs.appendChild(card);
var div1 = document.createElement("div");
div1.className = "card-body";
var atag = document.createElement("a");
atag.className = "float-right";
atag.setAttribute("href","javascript:closeMenu()");
div1.appendChild(atag);
var itag = document.createElement("i");
itag.className = "material-icons";
itag.innerHTML = "delete_sweep";
atag.appendChild(itag);
var div2 = document.createElement("div");
div1.appendChild(div2);
var head = document.createElement("h3");
head.className("float-left");
head.createTextNode(sessionStorage.getItem("groupName"));
div2.appendChild(head);
var br = document.createElement("br");
div1.appendChild(br);
div1.appendChild(br);
var time = document.createElement("div");
time.className("float-right");
var l1 = document.createTextNode("Time: " + sessionStorage.getItem("groupTime"));
time.appendChild(l1);
div1.appendChild(time);
var locate = document.createElement("div");
locate.className("float-left");
var l2 = document.createTextNode("Location: " + sessionStorage.getItem("groupLocation"));
locate.appendChild(l2);
div1.appendChild(locate);
var date = document.createElement("div");
date.style.textAlign = "center";
var l3 = document.createTextNode("Date: " + sessionStorage.getItem("groupDate"));
date.appendChild(l3);
div1.appendChild(date);
div1.appendChild(br);
var l4 = document.createTextNode(sessionStorage.getItem("groupFocus").toUpperCase());
div1.appendChild(l4);
card.appendChild(div1);
//now do footer




				
