function InstantMessage(){
	if(window.XMLHttpRequest){
		var message_object = new XMLHttpRequest();
	}else{
		var message_object = new ActiveXObject("Microsoft.XMLHTTP");
	}

	message_object.onreadystatechange = function(){
		if( message_object.readyState == 4 && message_object.status == 200 ){
			document.getElementById('message').innerHTML = message_object.responseText;
		}
	};

	message_object.open('GET', 'inc/ajax/ajaxGetMessage.php', true);
	message_object.send();
}


setInterval(function(){InstantMessage();}, 1000);