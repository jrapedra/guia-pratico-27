<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  	<title>Guia Prático 27 - Companhia internacional de rent-a-car</title>
	<!-- Minified bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">

	<?php
	if($css_files ?? false) {
		foreach($css_files as $css_file) {
		?>
			<link rel="stylesheet" href="<?php echo base_url('assets/css/'.$css_file) ?>">
		<?php
		}
	}
	?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
	<!-- Bootstrap js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- App js -->
	<script src="<?=base_url('assets/js/scripts.js')?>"></script>
 </head>