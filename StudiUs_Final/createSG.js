let groupName = document.getElementById("groupName").value;
let groupFocus = document.getElementById("groupFocus").value;
let groupLocation = document.getElementById("groupLocation").value;
let groupDate = document.getElementById("groupDate").value;
let groupTime = document.getElementById("groupTime").value;
let groupCategory = document.getElementById("groupCategory").value;

sessionStorage.setItem("groupName", groupName);
sessionStorage.setItem("groupFocus", groupFocus);
sessionStorage.setItem("groupLocation", groupLocation);
sessionStorage.setItem("groupDate", groupDate);
sessionStorage.setItem("groupTime", groupTime);
sessionStorage.setItem("groupCategory", groupCategory);

