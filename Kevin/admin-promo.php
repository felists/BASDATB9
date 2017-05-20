<!DOCTYPE html>
<html>
<head>
	<title>TokoKeren</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			
			$.post( "services.php", {submit: "main_category"}, function(result){
				var arr = JSON.parse(result);
				 $('#kategori').empty()
				for (var i = 0, len = arr.length; i < len; i+=2) {
				 $('#kategori').append($("<option></option>").attr("value",arr[i]).text(arr[i+1])); 
				}
				
				var option = $("#kategori").first().val();
				$.post( "services.php", {submit: "sub_category", main:option}, function(result){
					var arr = JSON.parse(result);
					  $('#subkategori').empty()
					for (var i = 0, len = arr.length; i < len; i+=2) {
						$('#subkategori').append($("<option></option>").attr("value",arr[i]).text(arr[i+1])); 
					}
			});
			
			});
			
			
			$(document).on('change', '#kategori', function() {
				var option = $(this).val()
				$.post( "services.php", {submit: "sub_category", main:option}, function(result){
					var arr = JSON.parse(result);
					  $('#subkategori').empty()
					for (var i = 0, len = arr.length; i < len; i+=2) {
						$('#subkategori').append($("<option></option>").attr("value",arr[i]).text(arr[i+1])); 
					}
				});
			});
			
			$(document).on('click', '.modal-background', function() {
				$("#modal").removeClass( "is-active" );
				$("#modal-title").empty();
				$("#modal-body").empty();
			});
			
			
			function showModal(title,text) {
				$("#modal").addClass( "is-active" );
				$("#modal-title").html(title);
				$("#modal-body").html(text);
			}
		});
	</script>
<body>
	<nav class="nav has-shadow">
	  <div class="container">
	    <div class="nav-left">
	      <a class="nav-item">
	        <h3>TokoKeren</h3>
	      </a>
	      <a class="nav-item is-tab is-hidden-mobile"  href="index.php">Home</a>
	      <a class="nav-item is-tab is-hidden-mobile">Produk</a>
	      <a class="nav-item is-tab is-hidden-mobile " href="transaksi-pulsa.php">Transaksi</a>
		  <a class="nav-item is-tab is-hidden-mobile is-active" href="admin-jasa.php">Admin</a>
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
	  		<h1 class="title">Pembuatan Promo</h1>
	  		<h2 class="subtitle">Buat promo baru.</h2>
	  	</div>
	  </div>
	   <div class="hero-foot">
	    <div class="container">
	      <nav class="tabs is-boxed">
	        <ul>
	          <li class="is-active" >
	            <a href="admin-promo.php">Promo</a>
	          </li>
	          <li >
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
    <label class="label">Periode</label>
  </div>
  <div class="field-body">
    <div class="field">
		<p class="control has-icons-left">
			<input class="input" type="date"  id="awal" name="awal" required >					
			<span class="icon is-small is-left">
				<i class="fa fa-hourglass-start"></i>
			</span>
		</p>
	</div>

    <div class="field">
		<p class="control has-icons-left">
			<input class="input" type="date" id="akhir" name="akhir" required >
			<span class="icon is-small is-left">
				<i class="fa fa-hourglass-end"></i>
			</span>
		</p>
	</div>

  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Kode Promo</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input  class="input" type="text" class="form-control" id="kode" name="kode"  maxlength="20" required>
        <span class="icon is-small is-left">
          <i class="fa fa-ticket"></i>
        </span>
      </p>
    </div>
  
  </div>
</div>


<div class="field is-horizontal">
<div class="field-label is-normal">
    <label class="label">Kategori</label>
  </div>
  <div class="field-body">
    <div class="field">
		 <label class="label">Main Kategori</label>
  <p class="control">
    <span class="select">
    <select class="input" id="kategori" name="kategori"> 
      </select>
    </span>
  </p>
	</div>
    <div class="field">
		 <label class="label">Subkategori</label>
  <p class="control">
    <span class="select">
      <select class="input" id="subkategori" name="subkategori">
      </select>
    </span>
  </p>
	</div>

  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Deskripsi</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <textarea class="textarea" id="deskripsi" name="deskripsi" placeholder="deskripsi" rows="4"></textarea>
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
        <button type="submit" name="submit" value="promo" class="button is-primary">
          Buat
        </button>
      </div>
    </div>
  </div>
</div>
	</div>
	</form>
	</section>
	
<div id="modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header  class="modal-card-head">
      <p id="modal-title" class="modal-card-title"></p>
    </header>
    <section id="modal-body" class="modal-card-body">
    </section>
   
  </div>
</div>
</body>
</html>

