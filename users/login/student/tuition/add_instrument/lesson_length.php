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

if(!isset($_SESSION['availability']))
	{
			echo "<script>";
			echo "window.location = \"../tuition_process_fail.php\";";
			echo "</script>";
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
					<a href="process_length.php?length=half"><img src="img/hour.png" width="570" height="270" alt="Slide 1"></a> 
					<a href="process_length.php?length=hour"><img src="img/halfhour.png" width="570" height="270" alt="Slide 2" onlclick="">
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>
	</div>
</body>
</html>