function callSubmit(answer)
{
	var f = document.createElement("form");
	f.setAttribute('method',"post");
	
	var i = document.createElement("input");
	i.value = answer;
	i.type = "hidden";
	i.name = "answer";
	
	f.appendChild(i);
	document.getElementsByTagName('body')[0].appendChild(f);
	f.submit();
}