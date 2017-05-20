<?php

 session_start();
	if(!isset($_SESSION["username"])){ 
		header("Location:login.php");
	}
?>
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
		 <?php if(isset($_SESSION["username"])){ ?>
        
	      <a class="nav-item is-tab is-hidden-mobile is-active">Home</a>
		   <?php if( $_SESSION['isAdmin'] == "false"){ ?>
	      <a class="nav-item is-tab is-hidden-mobile">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile" href="transaksi-pulsa.php">Transaksi</a> 
		   <?php } if( $_SESSION['isAdmin'] == "true"){ ?>
		   <a class="nav-item is-tab is-hidden-mobile" href="admin-jasa.php">Admin</a>
		 <?php } }?>
		</div>
	    <span class="nav-toggle">
	      <span></span>
	      <span></span>
	      <span></span>
	    </span>

	    <div class="nav-right nav-menu">
		 <?php if(isset($_SESSION["username"]) ){ ?>
	      <a class="nav-item is-tab is-hidden-mobile">Keranjang</a>
	      <a class="nav-item is-tab" href="profile.php">
	        <figure class="image is-16x16" style="margin-right: 8px;">
	          <img src="http://bulma.io/images/jgthms.png">
	        </figure>
	        Profile
	      </a>
			
		  <a class="nav-item is-tab"  href='logout.php'>Logout</a>
		 <?php } ?>
		 <?php if(!isset($_SESSION["username"])){ ?>
	      <a class="nav-item is-tab"  href='register.html'>Daftar</a>
		 <?php } ?>
	    </div>
	  </div>
	</nav>
	<section class="hero is-info">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">TokoKeren</h1>
	  		<h2 class="subtitle">Jual Beli Online Produk Rumahan.</h2>
	  	</div>
	  </div>
	</section>
</body>
</html>