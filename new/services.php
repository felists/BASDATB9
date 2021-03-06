<?php
switch($_POST['submit']) {
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
	
function create_jasa_kirim($nama,$lama,$tarif){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	
	$sql = "INSERT INTO tokokeren.jasa_kirim(nama,lama_kirim,tarif) VALUES ('$nama','$lama','$tarif')"; 
	$result = pg_query($conn,$sql);
	pg_close($conn);
}

function create_promo($awal,$akhir,$kode,$kategori,$subkategori,$deskripsi){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	$sql = "INSERT INTO tokokeren.promo(periode_awal,periode_akhir,kode,deskripsi) VALUES ('$awal','$akhir','$kode','$deskripsi')"; 
	$result = pg_query($conn,$sql);
	pg_close($conn);

}

function create_ulasan($produk,$rating,$komentar){
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	$email = $_SESSION["email"];
	$tanggal = date("Y-m-d");
	$sql = "INSERT INTO tokokeren.ulasan(email_pembeli,kode_produk,tanggal,rating,komentar) VALUES ($_SESSION('$email','$produk','$tanggal','$rating','$komentar')"; 
	$result = pg_query($conn,$sql);
	pg_close($conn);
}


function user_login($email, $password){
	if(isset($_SESSION)){
		echo "User already logged in";
		return false;
	}
	$string = "host=localhost port=5432 dbname=postgres user=postgres password=";
	$conn = pg_connect($string);
	$sql = 'SELECT email FROM pengguna WHERE pengguna.email =$email AND pengguna.password = $password';
	$result = pg_query($conn,$sql);
	$row = pg_fetch_row($result);
	$num_rows = count($row);
	if ($num_rows>0){
		$login_email = $row[0];
		$_SESSION["email"] = $login_email;
		
		$sql = 'SELECT email FROM pelanggan WHERE pelanggan.email  = $login_email';
		$result = pg_query($conn,$sql);
		$row = pg_fetch_row($result);
		$num_rows = count($row);
		if ($num_rows == 0){
			$_SESSION["admin"] = "true";
		}else{
			$_SESSION["admin"] = "false";
		}
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