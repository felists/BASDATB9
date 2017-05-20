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
	          <li class="is-active" >
	            <a href="beli-produk.php">Produk</a>
	          </li>
	          <li >
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

	    $result = pg_query('SELECT nama from toko') or die('Query failed: ' . pg_last_error());
	   	echo "<section class='hero is-light'>\n<div class='hero-body'> <div class='container'>";
	   	echo "<span class='select'> <select onchange='pilihToko(this.value)'> <option value=''>Pilih toko:</option>";
	    while ($row = pg_fetch_row($result)) {
	    	echo "<option value=$row[0]>$row[0]</option>";
	    }
	    echo "</select></span>";
	    echo "</div></div></section>";
	?>
</body>
<script type="text/javascript">
	function pilihToko(str) {
		if (str == "") {
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET","list-produk.php?page="+str,true);
	        xmlhttp.send();
	    }
	}
</script>
	
</html>