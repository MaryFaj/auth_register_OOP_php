//register
	let btnRegisterSend = document.getElementById('send_register');
			btnRegisterSend.onclick = function () {
				let email = document.getElementById('email_register');	
				let passwd = document.getElementById('passwd_register');
				let name = document.getElementById('name_register');	
				let sirname = document.getElementById('sirname_register');
				
				if(!validateRegisterForm(email, passwd, name, sirname)){
					return false;
				}
			
				let data = 'email='+email.value+'&password='+passwd.value+'&name='+name.value+'&sirname='+sirname.value;
				let request = new XMLHttpRequest();
				let url = '/?module=registerHandle';
				request.open("POST", url, true);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.addEventListener("readystatechange", () => {

    				if(request.readyState === 4 && request.status === 200) {       
						console.log(request.responseText);
						alert(request.responseText);
    				}
				});
				request.send(data);
			
			}
			
			function validateRegisterForm(elemEmail,elemPasswd,elemName, elemSirname){
				if((isFieldNotEmpty(elemEmail))&&(isFieldNotEmpty(elemPasswd))&&(isFieldNotEmpty(elemName))&&(isFieldNotEmpty(elemSirname))){
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
	