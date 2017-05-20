<?php
session_start();
switch($_POST['submit']) {
	
	case 'login':
		login($_POST["email"],$_POST["password"]);
	break;
	
	case 'main_category':
		get_main_category();
	break;
	case 'sub_category':
		get_sub_category($_POST["main"]);
	break;
	case 'sub_category':
		
	break;
	case 'jasa':
		create_jasa_kirim($_POST["nama"],$_POST["lama"],$_POST["tarif"]);
	break;
	case 'promo':
		create_promo($_POST["awal"],$_POST["akhir"],$_POST["kode"],$_POST["kategori"],$_POST["subkategori"],$_POST["deskripsi"]);
	break;
	
	case 'ulasan':
		create_ulasan($_POST["produk"],$_POST["rating"],$_POST["komentar"]);
	break;
}

function get_main_category(){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	
	$sql = "SELECT * FROM tokokeren.kategori_utama;"; 
	$result = pg_query($conn,$sql);
	$array = array();
	while($row = pg_fetch_array($result)) { 
		$array[] = $row["kode"];
		$array[] = $row["nama"];
	} 
	
	$json = json_encode($array);
	echo $json;
	
}

function get_sub_category($kode){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	
	$sql = "SELECT * FROM tokokeren.sub_kategori WHERE kode_kategori = '$kode' ;"; 
	$result = pg_query($conn,$sql);
	$array = array();
	while($row = pg_fetch_array($result)) { 
		$array[] = $row["kode"];
		$array[] = $row["nama"];
	} 
	
	$json = json_encode($array);
	echo $json;
	
}
	
function create_jasa_kirim($nama,$lama,$tarif){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	
	$sql = "INSERT INTO tokokeren.jasa_kirim(nama,lama_kirim,tarif) VALUES ('$nama','$lama','$tarif')"; 
	$result = pg_query($conn,$sql);
	pg_close($conn);
	header('Location:admin-jasa.php');
	echo $result;
	if(!$result){
		if (preg_match('/duplicate/i', $error)){
			echo "this value already exists";
		}
		else{
			print pg_last_error($conn);
		}
	}
}

function create_promo($awal,$akhir,$kode,$kategori,$subkategori,$deskripsi){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	
	$id = substr(md5(microtime()),rand(0,26),6);
	$sql = "INSERT INTO tokokeren.promo(id,periode_awal,periode_akhir,kode,deskripsi) VALUES ('$id','$awal','$akhir','$kode','$deskripsi')"; 
	
	$result = pg_query($conn,$sql);
	
	
	pg_close($conn);
	
	header('Location:admin-promo.php');
	if(!result){
		echo "error";
	}
}

function create_ulasan($produk,$rating,$komentar){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	$email = $_SESSION["email"];
	$tanggal = date("m-d-Y");
	$sql = "INSERT INTO tokokeren.ulasan(email_pembeli,kode_produk,tanggal,rating,komentar) VALUES ('$email','$produk','$tanggal','$rating','$komentar')"; 
	$result = pg_query($conn,$sql);
	pg_close($conn);
	header("Location:produk_daftar.php?thanks=yes");
}


function login($email, $pass){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	if (!$conn) {
        $res1 = pg_get_result($conn);
        die("Connection failed: ".pg_result_error($res1));
    }
	
    $isAdmin = false;

    $set = "SET search_path to TOKOKEREN";
    $result = pg_query($conn, $set);
    $result1 = pg_query($conn, "SELECT email, password, nama FROM PENGGUNA WHERE email = '$email'");

    $result2 = pg_query($conn, "SELECT count(email) AS id FROM PELANGGAN WHERE email= '$email'");

    $role = pg_fetch_array($result2);
        echo $role['id'];

    if($role['id'] == '0') {
      $isAdmin = true;
    }

    $row = pg_fetch_array($result1);
    
      if($row["email"]==$email && $row["password"]==$pass)  {
        if($isAdmin) {
          $_SESSION['isAdmin'] = "true";
        }else{
			$_SESSION['isAdmin'] = "false";
		}
          echo"Login successful!";
          $_SESSION['username'] = $row["nama"];
		   $_SESSION['email'] = $row["email"];
          header("Location: index.php");
        } else {
			header("Location:login.php?registered=no");
        }
    
	
	pg_close($conn);
}

function logout(){
	session_destroy();
	header("Location: index.php");
}

?>