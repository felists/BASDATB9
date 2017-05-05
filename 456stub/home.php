<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
	
	
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"/></script>		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
	.panel{
		margin-left:20px;
		margin-right:20px;
		padding:10px;
	}
	.panel-body{
		padding:10px;
	}
	.navbar {
		background-color: #4CAF50;
		padding-top:5px;
	}
	.navbar-brand{
		color:white;
	}
	.navbar-nav {
		background-color: white;
	}
	
	#home{
		margin:20px;
	
	}
	.carousel-inner img{
		margin:auto;
	}
	.card-container{
		display: flex;
		flex-flow: row nowrap;
		margin-top:10px;
		overflow-x:scroll;
	}
	.card{
		margin:20px;
	}
	
	
html{
	font-family: calibri;
}
.transaksi {
    background-color: crimson;
    color: white;
    padding: 16px;
    font-size: 16px;
    cursor: pointer;
    font-family: calibri;
}

.lihat-trs {
    position: relative;
    display: inline-block;
}

.content-trs {
    display: none;
    position: absolute;
    background-color: ivory;
    min-width: 160px;
    box-shadow: 0px 5px 10px 0px gray;
    z-index: 1;
}

.content-trs a {
    color: crimson;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.content-trs a:hover {background-color: salmon;}

.lihat-trs:hover .content-trs {
    display: block;
}

.lihat-trs:hover .dropbtn {
    background-color: crimson;
    color: ivory;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px 4px 10px 4px;
    text-align: left;
    border-bottom: 1px solid crimson;
}

th {
	background-color: crimson;
	color: ivory;
}

tr:hover {
	background-color: salmon;
}

#belum {
	background-color: yellow;
	text-align: center;
	cursor: pointer;

}

#sudah {
	background-color: #c4c9d1;
	color: #5e6166;
	text-align: center;
}

	</style>
</head>
<body>	
<?php
$_SESSION['ADMIN'] = 'FALSE';
?>
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Tokokeren</a>
				<span><?echo $_SESSION['ADMIN']?></span>
			</div>
			<?php if (isset($_SESSION['ADMIN'])){?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, username</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
			<ul class="nav navbar-nav nav-tabs">
				
				<li class="active">
					<a href="#home" data-toggle="tab">Home</a>
				</li>
				<?php if ($_SESSION['ADMIN'] == 'TRUE'){?>
					
				<li class="dropdown ">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Buat Baru...
					<span class="caret"/>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#jasa" data-toggle="tab">Kategori</a>
						</li>
						<li>
							<a href="#jasa" data-toggle="tab">Jasa Kirim</a>
						</li>
						<li>
							<a href="#promo" data-toggle="tab">Promo</a>
						</li>
					</ul>
						
				</li>
					
				<?php }else{?>
					<li class="dropdown ">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Lihat Transaksi...
					<span class="caret"/>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#shipped" data-toggle="tab">Shipable Produk</a>
						</li>
						<li>
							<a href="#pulsa" data-toggle="tab">Pulsa</a>
						</li>
					</ul>
						
					</li>
					<li>
						<a href="#ulasan" data-toggle="tab">Ulasan</a>
					</li>
				<?php }}else{?>
					 <ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				<?php }?>		
			</ul>	
		</div>
	</nav>
	<div class="tab-content">
		<div id="jasa" class="tab-pane fade ">
			<div class="panel panel-default">
				<div class="panel-heading">Buat Jasa Kirim Baru</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama Jasa Kirim</label>
							<div class="col-sm-10 input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicons-shop"></i></span>
								<input type="text" class="form-control" id="nama" placeholder="Nama" maxlength="100">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="lama">Lama Kirim</label>
							<div class="col-sm-10 input-group"> 
								<span class="input-group-addon"><i class="glyphicon glyphicon-clock"></i></span>
								<input type="text" class="form-control" id="lama" placeholder="a - a" maxlength="10">
							</div>
						</div>
						<div class="form-group"> 
							<label class="control-label col-sm-2" for="tarif">Tarif Pengiriman</label>
							<div class="col-sm-10 input-group"> 
								<span class="input-group-addon"><i class="glyphicon glyphicon-coins"></i></span>
								<input type="number" class="form-control" id="tarif" placeholder="(Rp)iiiiiiiiii.ii" min="1" max="9999999999" step="0.01" maxlength="10">
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="promo" class="tab-pane fade ">
			<div class="panel panel-default">
				<div class="panel-heading">Buat Promo Baru</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="awal">Periode Awal Promo</label>
							<div class="col-sm-10 input-group"> 
								 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" class="form-control" id="awal" placeholder="awal">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="akhir">Periode Akhir Promo</label>
							<div class="col-sm-10 input-group">
								 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" class="form-control" id="akhir" placeholder="akhir">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="kode">Kode Promo</label>
							<div class="col-sm-10 input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
								<input type="text" class="form-control" id="kode" placeholder="kode" maxlength="20">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="kategori">Kategori Produk</label>
							<div class="col-sm-10 input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<select class="form-control" id="kategori"> 
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="subkategori">Sub Kategori Produk</label>
							<div class="col-sm-10 input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<select class="form-control" id="subkategori">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="deskripsi">Deskripsi Promo</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="deskripsi" placeholder="deskripsi" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="pulsa" class="tab-pane fade ">
			<div class="panel panel-default">
				<div class="panel-heading">Transaksi Pulsa</div>
				<div class="panel-body">
					<table> <tr> <th>No.Invoice</th> <th>Nama Produk</th> <th>Tanggal</th> <th>Status</th> <th>Total Bayar</th> <th>Nominal</th> <th>Nomor</th> <th>Ulasan</th> </tr> <tr> <td>D000000001</td> <td>1/4/2016</td> <td>4/1/2016 12:00</td> <td>2</td> <td>12000</td><td>johnpeter@ymail.com</td><td>085723456255</td><td id='sudah'>ULAS</td></tr> <tr> <td>D000000002</td> <td>28/122016</td> <td>12/28/2016 12:00</td> <td>2</td> <td>12000</td><td>ryangordon@ymail.com</td><td>085723456256</td><td id='belum'>ULAS</td></tr></table>
					<div class="pagination-centered text-center">
			<ul class="pagination ">
				<li class="active">
					<a href="#">1</a>
				</li>
				<li >
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
			</ul>
		</div>
				</div>
			</div>
		</div>
		<div id="shipped" class="tab-pane fade ">
			<div class="panel panel-default">
				<div class="panel-heading">Transaksi</div>
				<div class="panel-body">
					<table><tr> <th>No. Invoice</th><th>Nama Toko</th><th>Tanggal</th><th>Status</th><th>Total Bayar</th><th>Alamat Kirim</th><th>Biaya Kirim</th><th>Nomor Resi</th><th>Jasa Kirim</th><th>ULASAN</th> </tr><tr><td>V000000001</td><td>John&#39;s Sport</td><td>1/4/2016</td><td>2</td><td>1175000</td><td>Jl Perwira Utama 14, Depo 16421</td><td>13000</td><td> </td><td>JNE REG</td><td><div id='sudah'>DAFTAR PRODUK</div></td></tr><tr><td>V000000002</td><td>abalium</td><td>12/28/2016</td><td>3</td><td>1236000</td><td>Jln Lumut Hijau 311/L, Mega Cinere, Depok</td><td>17000</td><td>BDG12345679</td><td>POS PAKET KILAT</td><td><div id='belum' onclick='dftProduk();'>DAFTAR PRODUK</div></td></tr></table>
					<div class="pagination-centered text-center">
			<ul class="pagination ">
				<li class="active">
					<a href="#">1</a>
				</li>
				<li >
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
			</ul>
		</div>
				</div>
			</div>
		</div>
		<div id="ulasan" class="tab-pane fade ">
			<div class="panel panel-default">
				<div class="panel-heading">Buat Ulasan</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="produk">Kode Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="produk" placeholder="Produk" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="rating">Rating:</label>
							<div class="col-sm-10"> 
								<input type="number" class="form-control" id="rating" placeholder="rating" min="0" max="5" step="1" maxlength="1">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="komentar">Komentar</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="komentar" placeholder="komentar anda..." rows="4"></textarea>
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="home" class="tab-pane fade in active row ">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="http://lorempixel.com/1200/200/technics/6" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="http://lorempixel.com/1200/200/technics/7" alt="Chicago">
    </div>

    <div class="item">
      <img src="http://lorempixel.com/1200/200/technics/8" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	<div class="card-container"	>		
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://lorempixel.com/200/300/technics/1" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://lorempixel.com/200/300/technics/2" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://lorempixel.com/200/300/technics/3" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://lorempixel.com/200/300/technics/4" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://lorempixel.com/200/300/technics" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
		<div class="pagination-centered text-center">
			<ul class="pagination ">
				<li class="active">
					<a href="#">1</a>
				</li>
				<li >
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
			</ul>
		</div>
		</div>
	</div>
</body>
</html>
			