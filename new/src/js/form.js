function validasi() {
	var name = document.getElementById("nama").value;
	var email = document.getElementById("email").value;
	var waktu = document.getElementById("waktu").value;
	var emailValidate = false;
	var salah = 0;
	
	if(preg_match("/^[a-zA-Z ]{1,255}$/", name) {
		document.getElementById("error").innerHTML ="*Nama Maksimal 25 karakter" ;
		salah++;
	}
	
	
	
	for(var i = 0; i < email.length ; i++){
		if(email.charAt(i) == '@' ) {
			emailValidate = true;
		}
	}
	
	if(emailValidate == false ) {
		document.getElementById("error1").innerHTML ="*Masukan alamat email dengan benar!" ;
		salah++;
	}
	
	if(tiket > 10) {
		document.getElementById("error4").innerHTML ="Tiket Maximal hanya 10!" ;
		salah++;
	}

		
}
