<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include '../../../../includes/auth.php';
include '../../../../includes/functions.php';
include '../../../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../../../login.php');
 	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>Slides, A Slideshow Plugin for jQuery</title>
	
	<link rel="stylesheet" href="css/inst_slider.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../../../javascripts/forms.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
</head>
<body>

<?php

	echo $_SESSION['stu_ID'] . '<br>';
	echo $_SESSION['stu_name'] . '<br>';

?>

	<div id="container">
		<div id="example">
			
			<div id="slides">
				<div class="slides_container">
					<a href="process_instrument.php?inst=guitar"><img src="img/guitar.png" width="570" height="270" alt="Slide 1"></a> 
					<a href="process_instrument.php?inst=bass"><img src="img/bass.png" width="570" height="270" alt="Slide 2" onlclick="">
					<a href="process_instrument.php?inst=drums"><img src="img/drums.png" width="570" height="270" alt="Slide 3" onlclick="">
					<a href="process_instrument.php?inst=keys"><img src="img/piano.png" width="570" height="270" alt="Slide 4" onlclick="">
					<a href="process_instrument.php?inst=vox"><img src="img/vox.png" width="570" height="270" alt="Slide 5" onlclick="">
					<a href="process_instrument.php?inst=horns"><img src="img/horns.png" width="570" height="270" alt="Slide 6" onlclick="">
					<a href="process_instrument.php?inst=strings"><img src="img/strings.png" width="570" height="270" alt="Slide 7" onlclick="">
					<a href="process_instrument.php?inst=production"><img src="img/production.png" width="570" height="270" alt="Slide 7" onlclick="">
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>
	</div>
</body>
</html>
