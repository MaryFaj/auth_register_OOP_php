//logout
	let btnLogout = document.getElementById('logout_btn');
			btnLogout.onclick = function () {
		
				let data = 'logout=true';
				let request = new XMLHttpRequest();
				let url = '/?module=logoutHandle';
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
			