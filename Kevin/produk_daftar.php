<!DOCTYPE html>
<html>
<head>
	<title>Daftar Produk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			function showModal(kode) {
				var string = "Buat ulasan anda untuk " + kode +". ";
				$("#modal-title").empty();
				$("#modal").addClass( "is-active" );
				$("#modal-title").html(string);
			}
			
		
			$(document).on('click', '.modal-background', function() {
				$("#modal").removeClass( "is-active" );
			});
			
			$(document).on('click', '.button-ulasan', function() {
				$("#kode").val($(this).data('kode-produk'));
				showModal($(this).data('nama-produk'));
			});
			
	});
	</script>
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
	
	
	
<div id="modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header  class="modal-card-head">
      <p id="modal-title" class="modal-card-title"></p>
    </header>
    <section id="modal-body" class="modal-card-body">
	<section class="section">
	<div class="container">
	<form name="jasa" class="form-horizontal" action="services.php" method="post">
	<input  class="input" type="hidden" class="input" id="kode" name="produk"  maxlength="20">
 
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Rating</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input type="number" class="input" name="rating" id="rating" min="0" max="5" step="1" maxlength="1" required>
        <span class="icon is-small is-left">
          <i class="fa fa-star"></i>
        </span>
      </p>
    </div>
  
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Komentar</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
		<textarea class="textarea"  name="komentar" id="komentar" placeholder="komentar anda..." rows="4" required></textarea>
        
      </p>
    </div>
  
  </div>
</div>


<div class="field is-horizontal">
  <div class="field-label">
   
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <button type="submit" name="submit" value="ulasan" class="button is-primary">
          Buat
        </button>
      </div>
    </div>
  </div>
</div>
	</div>
	</form>
	</section>
    </section>
   
  </div>
</div>


</body>

</html>

<?php
	$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=")
    or die('Could not connect: ' . pg_last_error());

    pg_query('SET SEARCH_PATH TO tokokeren;');
	$query = 'SELECT p.kode_produk, p.nama, l.berat, l.kuantitas, l.harga, l.sub_total FROM list_item l, produk p where l.kode_produk = p.kode_produk';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	// Printing results in HTML
	echo "<section class='section'>\n<div class='container'><table class='table is-stripped is-narrow'>\n
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode</th>
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
		$kode = $line["kode_produk"];
		$nama = $line["nama"];
	    echo "<td><a data-nama-produk='$nama' data-kode-produk='$kode' class='button button-ulasan is-warning is-focused' >ULASAN</a></td>\t</tr>\n";
	}
	echo "</table>\n</div></section>\n";

	// Free resultset
	pg_free_result($result);

	// Closing connection
	pg_close($dbconn);
?>