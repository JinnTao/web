
window.onload = function(){	
	submit = document.getElementById("sub");
	submit.disabled = true;
	submit.style.backgroundColor = "#999999";
	document.getElementById("agree").checked = false;
	document.getElementById("agree").onclick = agreeCheck;
	document.getElementById("name").onblur = addHandlerToNameCheck;
	document.getElementById("name").onfocus = wanring1Prohibited;
	document.getElementById("pw").onblur = passwordCheck;
	document.getElementById("pw").onfocus = wanring2Prohibited;
	document.getElementById("pw2").onblur = passwordConfirmCheck;
	document.getElementById("pw2").onfocus = wanring3Prohibited;
}
 
function agreeCheck(event){
	if ( event.target.checked ){
		submit.disabled = false;
		submit.style.backgroundColor = "#3366FF";
	}
	else{
		submit.disabled = true;
		submit.style.backgroundColor = "#999999";
	}
}

function addHandlerToNameCheck(event){
	event.target.style.borderColor = "#999999";
	if (event.target.value != "")
		sendRequirement(event);
}

function createXMLHttpRequest(){
	var xmlHttp;
	if(window.ActiveXObject){ //to dicide whether it is browsers of IE series
		xmlHttp = ActiveXObject("Microsoft.XMLHTTP");
	}
	else if (window.XMLHttpRequest){ // firefox or safari 
		xmlHttp = new XMLHttpRequest();
	}       
	return xmlHttp;
}

function sendRequirement(event){
	var o = createXMLHttpRequest();//new an ajax object
	var url	= "index.php?rt=index/register_manager&username=" + event.target.value;//url for require page register-manager.php
	o.open("post",url,true);
	o.onreadystatechange = function(){
		if (o.readyState == 4){ //only the readystate is 4 can we get the value of xmlHttp.status
			if (o.status == 200){
				var check = o.responseText;
				if (check == true){
					var warn = document.getElementById("warn1");
					warn.style.visibility = "visible";
					warn.getElementById("warn1").textContent = 
									"The name <" + name + "> is occupied,please change";
				}
			}
			else alert("error!\n\n"+o.responseText);
		}
	}
	o.send(null);//send requirement;
}

function wanring1Prohibited(event){ 
	document.getElementById("warn1").style.visibility = "hidden";
	event.target.style.borderColor = "#339900";
}

function passwordCheck(event){
	event.target.style.borderColor = "999999";
	if (event.target.value.length < 6)
		document.getElementById("warn2").style.visibility = "visible";
}

function wanring2Prohibited(event){ 
	document.getElementById("warn2").style.visibility = "hidden";
	event.target.style.borderColor = "#339900";
}

function passwordConfirmCheck(event){
	event.target.style.borderColor = "999999";
	if (event.target.value != document.getElementById("pw").value) //not match
		document.getElementById("warn3").style.visibility = "visible";
}

function wanring3Prohibited(event){ 
	document.getElementById("warn3").style.visibility = "hidden";
	event.target.style.borderColor = "#339900";
}