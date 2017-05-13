<?php
session_start();

function user_login($username, $password){
	if(isset($_SESSION)){
		echo "User already logged in";
		return false;
	}
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	$sql = 'SELECT username,admin FROM table WHERE table.username=$username AND table.password = $password';
	$result = pg_query($conn,$sql);
	$row = pg_fetch_row($result);
	$num_rows = count($row);
	if ($num_rows>0){
		$_SESSION["username"] = "$row[0]";
		$_SESSION["admin"] = "$row[1]";
	}
	pg_close($conn);
}

function user_logout(){
	if(!isset($_SESSION)){
		echo "Not logged in";
		return false;
	}
	session_destroy();
}

?>