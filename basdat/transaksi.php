<?php
	
	/**
		INISIASI KONEKSI DATABASE & SET ke TOKOKEREN
	**/
	$db = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
    or die('Could not connect: ' . pg_last_error());
    pg_query('SET SEARCH_PATH TO tokokeren;');
    $page = intval($_GET['page'])-1;
	    $size = 10;

	    $query = 'SELECT no_invoice, nama_toko, tanggal, status, total_bayar, alamat_kirim, biaya_kirim, no_resi, nama_jasa_kirim FROM transaksi_shipped t limit ' . $size . ' offset ' . $page*10 . ';';

		$result = pg_query($query) or die('Query failed: ' . pg_last_error());

		echo "<table class='table is-stripped is-narrow'>\n
		<thead>
			<tr>
				<th>No. Invoice</th>
				<th>Nama Toko</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Total Bayar(Rp)</th>
				<th>Alamat</th>
				<th>Biaya Kirim</th>
				<th>Nomor Resi</th>
				<th>Jasa Kirim</th>
				<th></th>
			</tr>
		</thead>
		";
		while ($row = pg_fetch_row($result)) {
			$rowsize = sizeof($row);
			for ($i=0; $i < $rowsize; $i++) { 
				echo "<td>$row[$i]</td>";
			}
			echo "
				<td><a class='button is-primary is-focused' href='produk_daftar.php'>DAFTAR PRODUK</a></td></tr>
			";
		}
?>