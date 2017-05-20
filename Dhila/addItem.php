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

	$conn = connectDB();
	$set = "SET search_path to TOKOKEREN";
    $result = pg_query($conn, $set);
	$selectKU = pg_query($conn, "SELECT COUNT(*) FROM KATEGORI_UTAMA");
	$numKU = pg_fetch_array($selectKU);
    $lastkodeKU =$numKU['count'];
    $select = pg_query($conn, "SELECT COUNT(*) FROM SUB_KATEGORI");
	$num = pg_fetch_array($select);
    $lastkode ='';

    if(strlen($num['count'])<3) {
    	$lastkode = "0".$num['count'];
    }
	
	if (isset($_POST['submit'])) {
		$kode = $_POST["kode"];
		$knama = $_POST["knama"];
		$skode = $_POST["skode"];
		$snama = $_POST["snama"];
		
		$selectKode = pg_query($conn, "SELECT COUNT(*) FROM KATEGORI_UTAMA WHERE kode = '$kode'");
		$rows = pg_num_rows($select); 

		if($rows != 1) {
			$result1 = pg_query($conn, "INSERT INTO KATEGORI_UTAMA(kode,nama) values ('$kode','$knama')");
		}

		$result2 = pg_query($conn, "INSERT INTO SUB_KATEGORI(kode,kode_kategori,nama) values ('$skode','$kode','$snama')");
		header("Location: index.php");


    }

 ?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="src/js/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  	<link rel="stylesheet" type="text/css" href="src/css/addItem.css">
</head>
	<h2>Tambahkan Kategori dan Subkategori</h2>
<body>
	
	<div class="row">
  		<div class="form">
  			<form class="col-xs-6" method="POST" action="addItem.php">
  				<div id="add">
			  <div class="form-group">
			    <label>Kode Kategori</label>
			    <input type="text" class="form-control" <?php echo 'placeholder="Kode Kategori (Kode Terakhir : K'.$lastkodeKU.')"'; ?> name="kode" required>
			  </div>
			  <div class="form-group">
			    <label>Nama Kategori</label>
			    <input type="text" class="form-control" placeholder="Nama kategori" name="knama" required>
			  </div>
			  <div class="form-group">
			    <label>Subkategori 1</label>
			  </div>
			  <div class="form-group">
			    <label>Kode Subkategori:</label>
			    <input type="text" class="form-control" <?php echo 'placeholder="Kode Subkategori (Kode Terakhir : SK'.$lastkode.')"'; ?> name="skode">
			  </div>
			  <div class="form-group">
			    <label>Nama Subkategori:</label>
			    <input type="text" class="form-control" placeholder="Nama Subkategori" name="snama">
			  </div>
			  	</div>
			  <div>
			  		<button type="button" id="counter" class="btn btn-primary">Add Item</button>
			  		<button type="submit" class="btn btn-success" name="submit">Submit</button>
			  </div>
			</form>
				
  		</div>

	</div>

<script>
$(document).ready(function() {
	localStorage.removeItem("count");
	if(localStorage.getItem("count") === null){
		var count = {'jml':'1'};
		localStorage.setItem("count",JSON.stringify(count));
	}
	$("#counter").click(AddItem);
function AddItem() {
	var i = JSON.parse(localStorage.getItem("count"));
	var jml = parseInt(i.jml)+1;
	var count = {'jml':jml}
	localStorage.setItem("count",JSON.stringify(count));
	$("#add").append("<div class='form-group'> <label>Subkategori "+jml+" </label></div><div class='form-group'> <label>Kode Subkategori "+jml+": </label> <input type='text' class='form-control' placeholder='Kode Subkategori' name='skode'"+jml+" required> </div> <div class='form-group'> <label>Nama Subkategori "+jml+": </label> <input type='text' class='form-control' placeholder='Nama Subkategori' name='snama'"+jml+" required> </div>");

	}
});
</script>
</body>

</html>