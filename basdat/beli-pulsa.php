<!DOCTYPE html>
<html>
<head>
	<title>TokoKeren - Jual beli online mudah</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
</head>
<body>
	<nav class="nav has-shadow">
	  <div class="container">
	    <div class="nav-left">
	      <a class="nav-item">
	        <h3>TokoKeren</h3>
	      </a>
	      <a class="nav-item is-tab is-hidden-mobile" href="index.php">
	      <span class="icon">
			  <i class="fa fa-home"></i>
			</span> Home</a>
	      <a class="nav-item is-tab is-hidden-mobile is-active">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile" href="transaksi-pulsa.php">Transaksi</a>
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
	      <a class="nav-item is-tab"  href='register.php'>Daftar</a>
	    </div>
	  </div>
	</nav>
	<section class="hero is-info">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Belanja Produk</h1>
	  		<h2 class="subtitle">Pilih produk yang akan dibeli.</h2>
	  	</div>
	  </div>
	  <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li>
	            <a href="beli-produk.php">Produk</a>
	          </li>
	          <li class="is-active" >
	            <a href="beli-pulsa.php">Pulsa</a>
	          </li>
	        </ul>
	        </nav>
	      </div>
	     </div>
	</section>

<?php
	$db = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
    or die('Could not connect: ' . pg_last_error());
    pg_query('SET SEARCH_PATH TO tokokeren;');

    $result = pg_query('SELECT pulas.kode_produk, pro.nama, pro.harga, pro.deskripsi, pulas.nominal from produk_pulsa pulas, produk pro where pro.kode_produk = pulas.kode_produk') or die('Query failed: ' . pg_last_error());

    echo "
    <section class='section'>
    	<div class='container'> <div id='belian'>
    		<table class='table is-stripped is-narrow'>
    		<thead><tr>
    		<td>Kode Produk</td>
    		<td>Nama</td>
    		<td>Harga</td>
    		<td>Deskripsi</td>
    		<td>Nominal</td>
    		<td>Beli</td>
    		</tr></thead>
    		";
    while ($row = pg_fetch_row($result)) 
    	{$rowsize = sizeof($row);
			for ($i=0; $i < $rowsize; $i++) { 
				echo "<td>$row[$i]</td>";
			}
			echo "
				<td>
				<a class='button is-warning is-focused' href='#$row[0]' onclick='belipulsa($row[0]);'>Beli</a>
				</td>
				</tr>
			";
    }
    echo "
    	</table>
    	</div></div>
    </section>";
?>

</body>
<script type="text/javascript">
	function belipulsa(str) {
		if (isset($_POST['kode_produk'])) alert('$kode_produk');
			else alert('ERROR');
	}
</script>
</html>