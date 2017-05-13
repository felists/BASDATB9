<?php
	session_start();
		function connectDB() {
			// Create connection
			$dbconn = pg_connect("host=localhost port=5432 dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168");
			
			// Check connection
			if (!$dbconn) {
				$res1 = pg_get_result($dbconn);
				die("Connection failed: " + pg_result_error($res1));
			}
			return $dbconn;
		}

			$conn = connectDB();
			$email =$_POST["email"];
			$fullname = $_POST["name"];
			$password = $_POST["psw"];
			$gender ='';
			$bday = $POST["bday"];
			$phone = $_POST["phone"];
			$addr = $_POST["address"];
			
			if($_POST["inGender"] == "Male") {
				$gender = "L";
			} else {
				$gender = "P";
			}

			$set = "SET search_path TO tokokeren";
			$result = pg_query($conn, $set);
			$insert = "INSERT INTO PENGGUNA (email,password,nama,jenis_kelamin,tgl_lahir,no_telp,alamat) values ('$email','$password','$fullname','$gender','$bday','$phone','$addr')";
			$result1 = pg_query($conn, $insert);

			if($result){
				echo "User Created Successfully";
				$_SESSION['username'] = $fullname;
        	}else{
            	die("Error: $insert");
        	}

?>
