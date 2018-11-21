function getPowerball()
{
	var gone = [];
	var picked = [];
	var counter;
	var pick;
	var dots = document.getElementsByClassName("dot");

	for(counter=0;counter<=69;++counter)
	{
		gone[counter]=false;
	}

	counter=0;

	while(counter < 5)
	{
		pick = Math.floor((Math.random()*69)+1);
		if (gone[pick]==false)
		{
			gone[pick]=true;
			picked[counter]=pick;
			counter++;
		}
		else{}
	}
	
	picked.sort(function(a,b){return(a-b)});

	for(counter=0; counter<=4;++counter)
	{
		dots[counter].innerHTML = picked[counter];
	}

	var pb= Math.floor((Math.random()*26)+1);
	dots[5].innerHTML = pb;
}