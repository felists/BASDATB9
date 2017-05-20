	function trsPulsa() {
		document.getElementById("tabelnya").innerHTML = "<table class='table'> <tr> <th>No.Invoice</th> <th>Nama Produk</th> <th>Tanggal</th> <th>Status</th> <th>Total Bayar</th> <th>Nominal</th> <th>Nomor</th> <th>Ulasan</th> </tr> <tr> <td>D000000001</td> <td>1/4/2016</td> <td>4/1/2016 12:00</td> <td>2</td> <td>12000</td><td>johnpeter@ymail.com</td><td>085723456255</td><td id='sudah'>ULAS</td></tr> <tr> <td>D000000002</td> <td>28/122016</td> <td>12/28/2016 12:00</td> <td>2</td> <td>12000</td><td>ryangordon@ymail.com</td><td>085723456256</td><td id='belum'>ULAS</td></tr></table><br> <div class='pagination'><a href='#' onclick='trsPulsa();'>&laquo;</a> <a href='#' onclick='trsPulsa();'>1</a> <a href='#' onclick='trsPulsa2();'>2</a> <a href='#' onclick='trsPulsa2();'>&raquo;</a></div>";
	}

	function trsPulsa2() {
		document.getElementById("tabelnya").innerHTML = "<table class='table'> <tr> <th>No.Invoice</th> <th>Nama Produk</th> <th>Tanggal</th> <th>Status</th> <th>Total Bayar</th> <th>Nominal</th> <th>Nomor</th> <th>Ulasan</th> </tr> <tr> <td>D000000003</td> <td>27/2/2016</td> <td>2/27/2016 8:14</td> <td>2</td> <td>12000</td><td>susanangela@ymail.com</td><td>085723456257</td><td id='belum'>ULAS</td></tr> <tr> <td>D000000004</td> <td>11/11/2016</td> <td>11/11/2016 8:24</td> <td>2</td> <td>12000</td><td>codyishii@ymail.com</td><td>085723456258</td><td id='sudah'>ULAS</td></tr></table><br> <div class='pagination'><a href='#' onclick='trsPulsa();'>&laquo;</a> <a href='#' onclick='trsPulsa();'>1</a> <a href='#' onclick='trsPulsa2();'>2</a> <a href='#' onclick='trsPulsa2();'>&raquo;</a></div>";
	}

	function trsProduk() {
		document.getElementById("tabelnya").innerHTML = "<table class='table'><tr> <th>No. Invoice</th><th>Nama Toko</th><th>Tanggal</th><th>Status</th><th>Total Bayar</th><th>Alamat Kirim</th><th>Biaya Kirim</th><th>Nomor Resi</th><th>Jasa Kirim</th><th>ULASAN</th> </tr><tr><td>V000000001</td><td>John&#39;s Sport</td><td>1/4/2016</td><td>2</td><td>1175000</td><td>Jl Perwira Utama 14, Depo 16421</td><td>13000</td><td> </td><td>JNE REG</td><td><div id='sudah'>DAFTAR PRODUK</div></td></tr><tr><td>V000000002</td><td>abalium</td><td>12/28/2016</td><td>3</td><td>1236000</td><td>Jln Lumut Hijau 311/L, Mega Cinere, Depok</td><td>17000</td><td>BDG12345679</td><td>POS PAKET KILAT</td><td><div id='belum' onclick='dftProduk();'>DAFTAR PRODUK</div></td></tr></table><br> <div class='pagination'><a href='#' onclick='trsProduk();'>&laquo;</a> <a href='#' onclick='trsProduk();'>1</a> <a href='#' onclick='trsProduk2();'>2</a> <a href='#' onclick='trsProduk2();'>&raquo;</a></div>";
	}

	function trsProduk2() {
		document.getElementById("tabelnya").innerHTML = "<table class='table'><tr> <th>No. Invoice</th><th>Nama Toko</th><th>Tanggal</th><th>Status</th><th>Total Bayar</th><th>Alamat Kirim</th><th>Biaya Kirim</th><th>Nomor Resi</th><th>Jasa Kirim</th><th>ULASAN</th> </tr> <td>V000000003</td><td>conist</td><td>2/27/2017</td><td>4</td><td>1297000</td><td>Jl. Bango III no.4, Pondok Labu, Cilandak, Jakarta</td><td>13000</td><td> </td><td>WAHANA</td><td><div id='sudah'>DAFTAR PRODUK</div></td></tr><td>V000000004</td><td>suricious</td><td>11/11/2016</td><td>4</td><td>206000</td><td>Jl. Lembur Tengah no.14A, Depok</td><td>14000</td><td> </td><td>JNE OKE</td><td><div id='sudah'>DAFTAR PRODUK</div></td></tr></table><br> <div class='pagination'><a href='#' onclick='trsProduk();'>&laquo;</a> <a href='#' onclick='trsProduk();'>1</a> <a href='#' onclick='trsProduk2();'>2</a> <a href='#' onclick='trsProduk2();'>&raquo;</a></div>";
	}

	function dftProduk() {
		document.getElementById("tabelnya").innerHTML = "<h2> No. Invoice: V000000002</h2> <table class='table'> <tr> <th>Nama Produk</th> <th>Berat (gram)</th> <th>Kuantitas</th> <th>Harga</th> <th>Subtotal</th> <th>Ulasan</th> </tr> <tr> <td>Tas Bagus Spesial</td> <td>1500</td> <td>1</td><td>325500</td><td>325500</td><td id='sudah'>ULAS</td></tr> <tr> <td>Akkuarium plastik mini</td> <td>800</td> <td>3</td><td>23000</td><td>69000</td><td id='belum'>ULAS</td></tr></table><br> <div class='pagination'><a href='#' onclick='dftProduk();'>&laquo;</a> <a href='#' onclick='dftProduk();'>1</a> <a href='#' onclick='dftProduk2();'>2</a> <a href='#' onclick='dftProduk2();'>&raquo;</a></div>";
	}

	function dftProduk2() {
		document.getElementById("tabelnya").innerHTML = "<h2> No. Invoice: V000000002</h2> <table class='table'> <tr> <th>Nama Produk</th> <th>Berat (gram)</th> <th>Kuantitas</th> <th>Harga</th> <th>Subtotal</th> <th>Ulasan</th> </tr><tr> <td>Makanan kucing usia 0-3 bulan</td> <td>7</td> <td>1</td><td>250000</td><td>250000</td><td id='belum'>ULAS</td></tr> <tr> <td>Shampoo Kucing anti-kutu</td> <td>1500</td> <td>2</td><td>37000</td><td>74000</td><td id='sudah'>ULAS</td></tr></table><br> <div class='pagination'><a href='#' onclick='dftProduk();'>&laquo;</a> <a href='#' onclick='dftProduk();'>1</a> <a href='#' onclick='dftProduk2();'>2</a> <a href='#' onclick='dftProduk2();'>&raquo;</a></div>";
	}

	function belanja() {
		document.getElementById("badan").innerHTML = " <div class='dropdown'> <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Pilih Toko<span class='caret'></span></button>  <ul class='dropdown-menu'>    <li><a href='#'>Johns Jewerly Shop</a></li>    <li><a href='#'>ARTOPEDIA</a></li><li><a href='#'>JavaSink & Bathroom</a></li>  </ul></div> ";
	}

	function belanjaPulsa() {
		document.getElementById("badan").innerHTML = "<table class='table'><thead><tr><th title='Field #1'>kode_produk</th><th title='Field #2'>nama_produk</th><th title='Field #3'>harga</th><th title='Field #4'>deskripsi</th><th title='Field #5'>nominal</th><th title='Field #6'>beli</th></tr></thead><tbody><tr><td id='k1'>P0000001</td><td id='p1'>Pulsa IM3 Ooreo</td><td align='right' id='h1'>12000</td><td> </td><td align='right' id='n1'>10</td><td id='beli' onclick='getPulsa1();'>BELI</td></tr><tr><td id='k2'>P0000002</td><td id='p2'>Pulsa Empati</td><td align='right' id='h2'>12500</td><td> </td><td align='right' id='n2'>10</td><td><a href='#beli' id='beli' onclick='getPulsa2();'>BELI</a></td></tr></tbody></table>";
	}

	function getPulsa1() {
		localStorage.setItem('kode', document.getElementById('k1'));
		getKodePulsa();
}

	function getPulsa2() {
		localStorage.setItem('kode', document.getElementById('k2'));
		getKodePulsa();
	}

	function getKodePulsa() {		
		document.getElementById("kodepulsa").innerHTML = localStorage.getItem('kode');
		document.getElementById("badan").innerHTML = "<h4 id='kodepulsa'></h4>";
	}