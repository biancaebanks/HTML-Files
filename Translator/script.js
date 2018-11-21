var vowels = 'aeiouAEIOU';
var special = 'yY';

function pigTranslate(){
	var v,y,i,j;
	var trans;
	var transValue = "";
	var textValue = document.getElementById("regText").value;
	
	//split the sentence into words
	var word = textValue.split(" ");
	for (j=0; j<word.length;j++)
	{
		
		for(i = 0;i<word[j].length;i++){
			//checks for y occurence
			if (special.includes(word[j].charAt(i))){
				y = i;
				break;
			}
			//checks for vowel occurence
			if (vowels.includes(word[j].charAt(i))){
				v = i;
				break;
			}
		}
		//my = y may yellow = ellow yay
		if ((y==0)||(y==1)){
			trans = word[j].substr(1) + " "+word[j].substr(0,1) + "ay";
		}
		//rhythm = ythm ray
		else if (y>1){
			trans = word[j].substr(y) + " "+word[j].substr(0,y) + "ay";
		}
		//apple = apple yay
		else if (v==0){
			trans = word[j] + " yay";
		}
		//pizza = izza pay
		else if (v>0){
			trans = word[j].substr(v) + " "+word[j].substr(0,v) + "ay";
		}
	//concat each word back together
	transValue = transValue + " " + trans;
	}
	//paste into html input block
	document.getElementById("transText").value = transValue;
	
}