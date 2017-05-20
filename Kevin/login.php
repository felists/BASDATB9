<?php
 session_start();
	
	
?>
<html>
<head>
	<title>TokoKeren - Jual beli online mudah</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css.map">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
			$(document).on('click', '.modal-background', function() {
				$("#modal").removeClass( "is-active" );
				$("#modal-title").empty();
				$("#modal-body").empty();
			});
			
	</script>
	
</head>
<body>
	<nav class="nav has-shadow">
	  <div class="container">
	    <div class="nav-left">
	      <a class="nav-item">
	        <h3>TokoKeren </h3>
	      </a>
		</div>
	    <div class="nav-right nav-menu">
	      <a class="nav-item is-tab"  href='register.html'>Daftar</a>
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
	 <section class="section">
	<div class="container">
	<form name="jasa" class="form-horizontal" action="services.php" method="post">

	<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Email</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input class="input" name="email" type="email" required>
        <span class="icon is-small is-left">
          <i class="fa fa-briefcase"></i>
        </span>
      </p>
    </div>
    
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Password</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input class="input" type="password" name="password" required>
        <span class="icon is-small is-left">
          <i class="fa fa-clock-o"></i>
        </span>
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
        <button type="submit" name="submit" value="login"class="button is-primary">
			Login
        </button>
      </div>
    </div>
  </div>
</div>
</form>
	</div>
	
	</section>
	
<?php if(isset($_GET['registered'])){ if($_GET['registered']){ ?>
  

	<div id="modal" class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header  class="modal-card-head">
      <p id="modal-title" class="modal-card-title"> Error</p>
    </header>
    <section id="modal-body" class="modal-card-body">Your are not registered.please register
    </section>
   
  </div>
</div>

<?php } }?>
</body>
</html>