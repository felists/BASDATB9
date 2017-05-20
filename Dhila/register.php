<?php
	session_start();
		function connectDB(){
			// Create connection
			$dbconn = pg_connect("host=localhost port=5432 dbname=fadhilahkhairatun user=postgres password=DhilaKaha09091997");
			
			// Check connection
			if (!$dbconn) {
				$res1 = pg_get_result($dbconn);
				die("Connection failed: ".pg_result_error($res1));
			}
			return $dbconn;
		}

		if (isset($_POST['submit'])) {

			$conn = connectDB();
			$email =$_POST["email"];
			$fullname = $_POST["name"];
			$password = $_POST["psw"];
			$repass = $_POST["psw-repeat"];
			$bday = $_POST["bday"];
			$phone = $_POST["phone"];
			$addr = $_POST["address"];
			$gender = $PassErr =  $PassErr2 = $msg1 = $msg2 ='';
			$error = false;

			$xplod = explode('-', $bday);
			//print_r($xplod);
			$bday = "$xplod[2]/$xplod[1]/$xplod[0]";
			//echo $bday;
			
			if($_POST["inGender"] == "Male") {
				$gender = "L";
			} else {
				$gender = "P";
			}

			if($password != $repass) {
				$PassErr = "Password do not match!";
				$error = true;
				$msg2 = "Registration failed!";
			}

			if(strlen($password)<6) {
				$PassErr2 = "Password min 6 character!";
				$error = true;
				$msg2 = "Registration failed!";
			}

			// periksa apakah ada email yang sama
			$select = pg_query($conn, "SELECT email FROM TOKOKEREN.PENGGUNA WHERE email='$email'");
			$rows = pg_num_rows($select);
			//echo $rows . " row(s) returned.\n";

			if (!$error) {
				if($rows == 1) {
					echo "<script>alert('Sorry this email alredy exists');</script>";
				} else {
					$set = "SET search_path to TOKOKEREN";
	        		$result = pg_query($conn, $set);
	        		$insert = "INSERT INTO PENGGUNA (email,password,nama,jenis_kelamin,tgl_lahir,no_telp,alamat) values ('$email','$password','$fullname','$gender','$bday','$phone','$addr')";
	        		$result1 = pg_query($conn, $insert);

			        if($result1){
				        $msg1 = "User Created Successfully";
				        $_SESSION['username'] = $fullname;
				        header("Location: index.php");
			        } else {
			            $msg2 = "Registration failed!";
			            die("Error: $insert");
			        }
				}
			}
			
			
    	}

 ?> 

<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<title> TOKOKEREN </title>
	<script src="src/js/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="src/css/register.css">
<body>

	<?php if(isset($msg)) { ?> <div class="alert alert-success" role="alert"> <?php echo $msg; ?></div> <?php } ?>
	<?php if(isset($msg2) && $msg2 != '') { ?> <div class="alert alert-danger" role="alert"> <?php echo $msg2; ?></div> <?php } ?>
 
	<div id="signUp">
	  <form method="POST" action="register.php">
	    <div class="container">
	    <div class="row">
  			<div class="col-sm-8" style="text-align: center;"><h3>Create a New Account</h3></div><br>
  			<div class="col-sm-4"><span class="signIn pull-right"> Alredy a member? <a href="login.php" id="member-login"> Sign in </a></span> </div>
		</div><br>

		    <div class="form-group">
				<label class="col-sm-2 control-label"><b>Email</b></label>
			    <input type="email" class="form-control"  placeholder="Please enter a valid Email address" name="email" id="email" required>
			</div>

		    <p id="error" style="color : red"> </p>
		    <div class="form-group">
		    	<p><span class="error"> <?php if (isset($PassErr2)) { echo $PassErr2;} ?> </span></p>
			    <label class="col-sm-2 control-label"><b>Password</b></label>
			    <input type="password" class="form-control" placeholder="Please Enter Password" name="psw" id="psw" required>
		    </div>

		    <div class="form-group">
		    	<p><span class="error"> <?php if (isset($PassErr)) { echo $PassErr;} ?> </span></p>
			    <label class="col-sm-2 control-label"><b>Repeat Password</b></label>
			    <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
		    </div>

		    <div class="form-group">
			    <label class="col-sm-2 control-label"><b>Full Name</b></label>
			    <input type="text" class="form-control" placeholder="Please Enter a Full Name" name="name" id="name" required>
		    </div>

		    <div class="form-group">
		    <label class="col-sm-2 control-label"><b>Gender</b></label> <br>
			<input list="gender" name="inGender" />
				<datalist id="gender">
				  <option value="Male">
				  <option value="Famale">
				</datalist> <br><br>
			</div>

			<div class="form-group">
			<label class="col-sm-2 control-label"><b>Birthday</b></label>
			<input type="date" class="form-control" name="bday" required>
  			</div>

			<div class="form-group">
		    <label class="col-sm-2 control-label"><b>Phone Number</b></label>
		    <input type="text" class="form-control" placeholder="Enter Phone Number" pattern="[0-9]{1,15}" name="phone" id="phone" required>
		    </div>

		    <div class="form-group">
		    <label class="col-sm-2 control-label"><b>Address</b></label>
		    <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
		    </div>

	      <div class="clearfix">
	      	<button type="submit" class="btn btn-primary" value="Submit" name="submit" style="margin-left: 185px">Register</button>
	        <button type="button" class="btn btn-danger pull-right" style="margin-right:15%">Cancel</button>
	      </div>

	      <div>
	      	<br><input type="checkbox" style="margin-left: 185px"> Remember me 
	      	<p style="margin-left: 55%">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
	      </div>

	    </div>
	  </form>
</div>

</body>
</html>
