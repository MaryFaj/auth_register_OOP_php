//auth
	let btnAuthSend = document.getElementById('send_auth');
			btnAuthSend.onclick = function () {
				let email = document.getElementById('email_auth');	
				let passwd = document.getElementById('passwd_auth');
				
				if(!validateAuthForm(email,passwd)){
					return false;
				}
			
				let data = 'email='+email.value+'&password='+passwd.value;
				let request = new XMLHttpRequest();
				let url = '/?module=authHandle';
				request.open("POST", url, true);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.addEventListener("readystatechange", () => {

    				if(request.readyState === 4 && request.status === 200) {       
						console.log(request.responseText);
						alert(request.responseText);
						location.reload();
    				}
				});
				request.send(data);
			
			}
		
		function validateAuthForm(elemEmail,elemPasswd){
			if((isFieldNotEmpty(elemEmail))&&(isFieldNotEmpty(elemPasswd))){
				if(isEmailCorrect(elemEmail.value)){
					return true;
				}
			}
			return false;
		}
		
		function isFieldNotEmpty(elem){ 
			if (elem.value==null || elem.value==""){ 
  				alert("не заполнено поле "+elem.dataset.name);
  				return false;
  			}
  			return true;
		}
	
		function isEmailCorrect(email){
			var atpos=email.indexOf("@");
			var dotpos=email.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
  				alert("Некорректный email");
  				return false;
  			}
  			return true;
		}
	
	
	