<!DOCTYPE html>
<html>
<head>
	<title>Daftar Produk</title>
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
	      <a class="nav-item" href="transaksi-produk.php">
	        <h1>Back</h1>
	      </a>
	    </div>
	</nav>

	<section class="hero is-danger">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Daftar Produk</h1>
	  		<h2 class="subtitle">Detail produk yang dibeli dalam ialah,</h2>
	  	</div>
	  </div>
	</section>

</body>
</html>

<?php
	$dbconn = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
    or die('Could not connect: ' . pg_last_error());

    pg_query('SET SEARCH_PATH TO tokokeren;');
	$query = 'SELECT p.nama, l.berat, l.kuantitas, l.harga, l.sub_total FROM list_item l, produk p where l.kode_produk = p.kode_produk';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	// Printing results in HTML
	echo "<section class='section'>\n<div class='container'><table class='table is-stripped is-narrow'>\n
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Berat</th>
				<th>Kuantitas</th>
				<th>Harga</th>
				<th>Subtotal</th>
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
	    echo "<td><a class='button is-warning is-focused' href='#ulasan'>ULASAN</a></td>\t</tr>\n";
	}
	echo "</table>\n</div></section>\n";

	// Free resultset
	pg_free_result($result);

	// Closing connection
	pg_close($dbconn);
?>