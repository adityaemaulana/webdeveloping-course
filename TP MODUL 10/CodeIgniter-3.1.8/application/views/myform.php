<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>	
	<?php echo validation_errors(); ?>
	<h1>Registrasi Mahasiswa</h1>
	<?php echo form_open('form'); ?>

	<div><input type="text" name="nim" size="50" placeholder="NIM" value="<?php echo set_value('nim');?>" class="rounded my-3 p-1"></div>
	
	<?php echo form_error('nim', '<div class="error">', '</div>');?>

	<div><input type="text" name="nama" size="50" placeholder="Nama" value="<?php echo set_value('nama');?>" class="rounded mb-3 p-1"	></div>
	
	<?php echo form_error('nama', '<div class="error">', '</div>');?>

	<div>
		<input type="submit" value="Daftar" class="btn btn-warning p-3">
		<p><?php echo $msg; ?></p>
	</div>

	
	</form>
</body>
</html>