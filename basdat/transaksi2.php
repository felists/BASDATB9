<?php
	
	/**
		INISIASI KONEKSI DATABASE & SET ke TOKOKEREN
	**/
	$db = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
    or die('Could not connect: ' . pg_last_error());
    pg_query('SET SEARCH_PATH TO tokokeren;');
    $page = intval($_GET['page'])-1;
	    $size = 10;

	    $query = 'SELECT t.no_invoice, p.nama, t.tanggal, status, total_bayar, nominal, t.nomor FROM transaksi_pulsa t, produk p where p.kode_produk = t.kode_produk limit ' . $size . ' offset ' . $page*10 . ';';

		$result = pg_query($query) or die('Query failed: ' . pg_last_error());

		echo "<table class='table is-stripped is-narrow'>\n
		<thead>
			<tr>
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
		while ($row = pg_fetch_row($result)) {
			$rowsize = sizeof($row);
			for ($i=0; $i < $rowsize; $i++) { 
				echo "<td>$row[$i]</td>";
			}
			echo "
				<td>
				<a class='button is-warning is-focused' href='#'>ULASAN</a>
				</td>
				</tr>
			";
		}
?>