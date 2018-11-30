function send_user_msg(text){
	var userText = document.createElement('div');
	userText.id = 'user';
	userText.className = 'well';
	document.getElementByClassName('mid-content')[0].appendChild(userText);
	userText.innerText = text;
}

function send_admin_msg(text){
	var adminText = document.createElement('div');
	adminText.id = 'admin';
	adminText.className = 'well';
	document.getElementByClassName('mid-content')[0].appendChild(adminText);
	adminText.innerText = text;
}