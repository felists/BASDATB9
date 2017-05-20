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
	
 <section class="section">
	<div class="container">
	<form name="jasa" class="form-horizontal" action="services.php" method="post">

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Kode Produk</label>
  </div>
  <div class="field-body">
    <div class="field is-grouped">
      <p class="control is-expanded has-icons-left">
        <input  class="input" type="text" class="input" id="kode" name="kode"  maxlength="20" required disabled>
        <span class="icon is-small is-left">
          <i class="fa fa-ticket"></i>
        </span>
      </p>
    </div>
  
  </div>
</div>

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
	

</body>
</html>

