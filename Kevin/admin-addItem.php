<?php
	session_start();

	function connectDB(){
		// Create connection
		$dbconn = pg_connect("host=localhost port=5432 dbname= user=postgres password=");
		
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
	<title>TokoKeren</title>
	<script src="src/js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
	
<body>
	<nav class="nav has-shadow">
	  <div class="container">
	    <div class="nav-left">
	      <a class="nav-item">
	        <h3>TokoKeren</h3>
	      </a>
		 <?php if(isset($_SESSION["username"])){ ?>
        
	      <a class="nav-item is-tab is-hidden-mobile ">Home</a>
		   <?php if( $_SESSION['isAdmin'] == "false"){ ?>
	      <a class="nav-item is-tab is-hidden-mobile">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile" href="transaksi-pulsa.php">Transaksi</a> 
		   <?php } if( $_SESSION['isAdmin'] == "true"){ ?>
		   <a class="nav-item is-tab is-hidden-mobile is-active" href="admin-jasa.php">Admin</a>
		 <?php } }?>
		</div>
	    <span class="nav-toggle">
	      <span></span>
	      <span></span>
	      <span></span>
	    </span>
	    <div class="nav-right nav-menu">
	      <a class="nav-item is-tab is-hidden-mobile">Keranjang</a>
	      <a class="nav-item is-tab" href="profile.php">
	        <figure class="image is-16x16" style="margin-right: 8px;">
	          <img src="http://bulma.io/images/jgthms.png">
	        </figure>
	        Profile
	      </a>
	      <a class="nav-item is-tab"  href='logout.php'>Logout</a>
	    </div>
	  </div>
	</nav>
	<section class="hero is-info">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Pembuatan Item Baru</h1>
	  		<h2 class="subtitle">Buat Kategori dan Subkategori baru.</h2>
	  	</div>
	  </div>
	   <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li >
	            <a href="admin-promo.php">Promo</a>
	          </li>
	          <li>
	            <a href="admin-jasa.php">Jasa</a>
	          </li>
	          <li class="is-active" >
	            <a href="admin-addItem.php"> Tambah Item </a>
	          </li>
	        </ul>
	        </nav>
	      </div>
			
	     </div>
	</section>

<section class="section">
	<div class="container">
	<form name="jasa" class="form-horizontal" method="post">	
		<div class="field is-horizontal">
		  <div class="field-label is-normal">
		    <label class="label">Kode Kategori</label>
		  </div>
		  <div class="field-body">
		    <div class="field is-grouped">
		      <p class="control is-expanded has-icons-left">
		        <input type="text" class="input" <?php echo 'placeholder="Kode Kategori (Kode Terakhir : K'.$lastkodeKU.')"'; ?> name="kode" required>
		        <span class="icon is-small is-left">
		          <i class="fa fa-ticket"></i>
		        </span>
		      </p>
		    </div>
		  </div>
		</div>

		<div class="field is-horizontal">
		  <div class="field-label is-normal">
		    <label class="label">Nama Kategori</label>
		  </div>
		  <div class="field-body">
		    <div class="field is-grouped">
		      <p class="control is-expanded has-icons-left">
		        <input type="text" class="input" placeholder="Nama kategori" name="knama" required>
		        <span class="icon is-small is-left">
		          <i class="fa fa-briefcase"></i>
		        </span>
		      </p>
		    </div>
		  </div>
		</div>

		<div class="field is-horizontal">
		  <div class="field-label is-normal">
		    <label class="label">Subkategori 1</label>
		  </div>
		</div>

		<div class="field is-horizontal">
		  <div class="field-label is-normal">
		    <label class="label">Kode Subkategori 1:</label>
		  </div>
		  <div class="field-body">
		    <div class="field is-grouped">
		      <p class="control is-expanded has-icons-left">
		        <input type="text" class="input" <?php echo 'placeholder="Kode Subkategori (Kode Terakhir : SK'.$lastkode.')"'; ?> name="skode" required>
		        <span class="icon is-small is-left">
		          <i class="fa fa-ticket"></i>
		        </span>
		      </p>
		    </div>
		  </div>
		</div>

		<div class="field is-horizontal">
		  <div class="field-label is-normal">
		    <label class="label">Nama Subkategori:</label>
		  </div>
		  <div class="field-body">
		    <div class="field is-grouped">
		      <p class="control is-expanded has-icons-left">
		        <input type="text" class="input" placeholder="Nama Subkategori" name="snama" required>
		        <span class="icon is-small is-left">
		          <i class="fa fa-briefcase"></i>
		        </span>
		      </p>
		    </div>
		  </div>
		</div>

		<div id="add">
		</div>	
		<br>
		<div class="field is-horizontal" style="margin-left: 100px">
		  <div class="field-label"></div>
		  <div class="field-body">
		    <div class="field">
		      <div class="control">
		        <button type="button" id="counter" class="btn btn-primary">Add Item</button>
		      </div>
		    </div>
		  </div>
		  <div class="field-body">
		    <div class="field">
		      <div class="control">
			  	<button type="submit" class="btn btn-success" name="submit">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
</div>
	
</section>

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
		$("#add").append("'<div class='field is-horizontal'><div class='field-label is-normal'><label class='label'>Subkategori "+jml+"</label></div></div><div class='field is-horizontal'><div class='field-label is-normal'><label class='label'>Kode Subkategori "+jml+":</label></div><div class='field-body'><div class='field is-grouped'><p class='control is-expanded has-icons-left'><input type='text' class='input' name='skode"+jml+"' placeholder='Kode Subkategori' required><span class='icon is-small is-left'><i class='fa fa-ticket'></i></span></p></div></div></div>"+" <div class='field is-horizontal'><div class='field-label is-normal'> <label class='label'>Nama Subkategori "+jml+":</label></div><div class='field-body'><div class='field is-grouped'><p class='control is-expanded has-icons-left'><input type='text' class='input' placeholder='Nama Subkategori' name='snama"+jml+"' required><span class='icon is-small is-left'><i class='fa fa-briefcase'></i></span></p></div></div></div>");

		}
	});
</script>

</body>

</html>

