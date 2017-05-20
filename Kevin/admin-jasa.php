<?php
 session_start();
	
	
?><!DOCTYPE html>
<html>
<head>
	<title>TokoKeren</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
	
<body>
	<nav class="nav has-shadow">
	  <div class="container">
	    <div class="nav-left">
	      <a class="nav-item">
	        <h3>TokoKeren</h3>
	      </a>
		 <?php if(isset($_SESSION["username"])){ ?>
        
	      <a class="nav-item is-tab is-hidden-mobile ">Home</a>
		   <?php if( $_SESSION['isAdmin'] == "false"){ ?>
	      <a class="nav-item is-tab is-hidden-mobile">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile" href="transaksi-pulsa.php">Transaksi</a> 
		   <?php } if( $_SESSION['isAdmin'] == "true"){ ?>
		   <a class="nav-item is-tab is-hidden-mobile is-active" href="admin-jasa.php">Admin</a>
		 <?php } }?>
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
	      <a class="nav-item is-tab"  href='logout.php'>Logout</a>
	    </div>
	  </div>
	</nav>
	<section class="hero is-info">
	  <div class="hero-body">
	  	<div class="container">
	  		<h1 class="title">Pembuatan Jasa Kirim</h1>
	  		<h2 class="subtitle">Buat pilihan jasa kirim baru.</h2>
	  	</div>
	  </div>
	   <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li >
	            <a href="admin-promo.php">Promo</a>
	          </li>
	          <li class="is-active" >
	            <a href="admin-jasa.php">Jasa</a>
	          </li>
	        </ul>
	        </nav>
	      </div>
			
	     </div>
	</section>
 <section class="section">
	<div class="container">
	<form name="jasa" class="form-horizontal" action="services.php" method="post">

	<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Identitas</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="nama" type="text" placeholder="Nama Jasa Kirim"  maxlength="100" required>
        <span class="icon is-small is-left">
          <i class="fa fa-briefcase"></i>
        </span>
      </p>
    </div>
    
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Informasi Jasa	</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input class="input" type="text" name="lama" placeholder="Lama Kirim dalam hitungan hari ( format: x atau x-y )" pattern="([0-9]+-[0-9]+|[0-9]+)"  maxlength="10"required>
        <span class="icon is-small is-left">
          <i class="fa fa-clock-o"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input class="input" type="number" name="tarif" placeholder="Tarif Pengiriman (IDR)" min="1" max="9999999999" step="0.01" maxlength="10"required>
        <span class="icon is-small is-left">
          <i class="fa fa-tags"></i>
        </span>
      </p>
    </div>
    </div>
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label">
    
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <button type="submit" name="submit" value="jasa"class="button is-primary">
          Buat
        </button>
      </div>
    </div>
  </div>
</div>
</form>
	</div>
	
	</section>
</body>
</html>

