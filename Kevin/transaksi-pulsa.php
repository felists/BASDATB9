<!DOCTYPE html>
<html>
<head>
	<title>TokoKeren</title>
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
	      <a class="nav-item is-tab is-hidden-mobile"  href="index.php">Home</a>
	      <a class="nav-item is-tab is-hidden-mobile">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile is-active" href="transaksi-pulsa.php">Transaksi</a>
		  <a class="nav-item is-tab is-hidden-mobile" href="admin-jasa.php">Admin</a>
		
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
	      <a class="nav-item is-tab" href="register.html">Daftar</a>
	    </div>
	  </div>
	</nav>
	<section class="hero is-info">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Transaksi Pulsa</h1>
	  		<h2 class="subtitle">Detail transaksi pembelian pulsa yang pernah dilakukan.</h2>
	  	</div>
	  </div>
	   <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li >
	            <a href="transaksi-produk.php">Produk</a>
	          </li>
	          <li class="is-active" >
	            <a href="#transaksi-pulsa">Pulsa</a>
	          </li>
	        </ul>
	        </nav>
	      </div>
	     </div>
	</section>
</body>
</html>


<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
pg_query('SET SEARCH_PATH TO tokokeren;');
$query = 'SELECT t.no_invoice, p.nama, t.tanggal, status, total_bayar, nominal, t.nomor FROM transaksi_pulsa t, produk p where p.kode_produk = t.kode_produk';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<section class='section'>\n<div class='container'><table class='table is-stripped is-narrow'>\n
	<thead>
		<tr>
			<th>No.</th>
			<th>No. Invoice</th>
			<th>Nama Produk</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total Bayar(Rp)</th>
			<th>Nominal</th>
			<th>Nomor</th>
			<th>Ulasan</th>
		</tr>
	</thead>
";
$numm = 0;
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$numm += 1;
    echo "\t<tr><td>$numm</td>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "<td><a class='button is-warning is-focused";
    if ($numm%2 == 1) echo " title='Disabled button' disabled";
    echo "'>ULASAN</a></td>\t</tr>\n";
}
echo "</table>\n</div></section>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
