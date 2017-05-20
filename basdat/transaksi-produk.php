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
	      <a class="nav-item is-tab is-hidden-mobile" href="index.php">
	      <span class="icon">
			  <i class="fa fa-home"></i>
			</span> Home</a>
	      <a class="nav-item is-tab is-hidden-mobile" href="index.php">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile is-active">Transaksi</a>
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
	      <a class="nav-item is-tab href='register.html'">Daftar</a>
	    </div>
	  </div>
	</nav>
	
	<section class="hero is-primary">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Transaksi Produk</h1>
	  		<h2 class="subtitle">Detail transaksi pembelian produk yang pernah dilakukan.</h2>
	  	</div>
	  </div>
	   <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li class="is-active" >
	            <a href="#transaksi-produk">Produk</a>
	          </li>
	          <li >
	            <a href="transaksi-pulsa.php">Pulsa</a>
	          </li>
	        </ul>
	        </nav>
	      </div>
	     </div>
	</section>
	<section class="section">
			<select onchange="changePage(this.value)">
				<option value="" class="is-active">#</option>
				<?php
					$db = pg_connect("host=localhost dbname=felisitas.sindiana user=felisitas.sindiana password=padmakara168")
				    or die('Could not connect: ' . pg_last_error());
				    pg_query('SET SEARCH_PATH TO tokokeren;');
					$res = pg_query('SELECT count(*) from transaksi_shipped;');
					$size = pg_fetch_result($res, 0, 0);
					$last; if ($size%10 == 0) $last = $size/10;
					else $last = ceil($size/10);
					$laman = 1;
					while ($laman <= $last) {
						echo "<option value='$laman'>$laman</option>";
						$laman++;
					}
				?>
			</select>
			<p id="txtHint"></p>
	</section>
</body>
<script type="text/javascript">
	function changePage(str) {
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
	        xmlhttp.open("GET","transaksi.php?page="+str,true);
	        xmlhttp.send();
	    }
	}
</script>
</html>
