function createTriangle(){
	
	//sets parent element
	var par = document.getElementById('triangle');
	//sets child element
	var chi = document.getElementById('tri-block');
	//remove the child from the parent element 
	//each time it will reload a new triangle block
	par.removeChild(chi);
	
	//ensure the input has a value of at least 0 to avoid null error
	var el = document.getElementById("noOfLines");
	if (el != null) {
		tri = el.value;
	}
	else {
		tri = 0;
	}
	
	//create the tri-block div 
	var div = document.createElement("div");
	div.setAttribute('id','tri-block');
	//add the div to parent triangle
	par.appendChild(div);
	
	
	for (var i =0; i<tri; i++){
		for (var j=0; j<i+1; j++){
			//creates the blocks for the triangle
			var span = document.createElement("span");
			//set class attribute for styling
			span.setAttribute('class','dot');
			//add span element to tri-block
			document.getElementById('tri-block').appendChild(span);
			//complete the calculation for the value to be placed in the span
			//use the math.js library for factorial
			var calc = math.factorial(i)/(math.factorial(j) * math.factorial(i-j))
			//add calclation to the text for span element
			span.appendChild( document.createTextNode(calc) );
		}
		//create a break after each inline span to keep triangle order
		var br = document.createElement("br");
		document.getElementById('tri-block').appendChild(br);
	}
	
	var k=0;
	for (var i =0; i<tri; i++){
		for (var j=0; j<i+1; j++){
			var dots = document.getElementsByClassName('dot');
			var value = dots[k].innerHTML;
			var hexColor = "#"+ value.toString(16);
			alert(hexColor);
			dots[k].style.backgroundColor = hexColor;
			k++;
			
		}
	}
}

