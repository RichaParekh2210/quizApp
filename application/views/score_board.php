<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quize App</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css'); ?>" />
</head>
<body class="landing-page">
	<div class="result-board">
		<h1 class="title">Score Board</h1>
		<div class="result-detail">
			<h2>Total Score: <?php echo $score_data->score; ?></h2>
			<?php if($score_data->attempt_qus == 5) { ?>
				<h2 class="txt-sucess">You Won!</h2>
			<?php } ?>
			<?php if($score_data->attempt_qus == 7) { ?>
				<h2 class="txt-sucess">Your Won! Congratulations.</h2>
			<?php } ?>
			<?php if($score_data->attempt_qus == 9) { ?>
				<h2 class="txt-sucess">Your Won! Congratulations and Well Done.</h2>
			<?php } ?>
			<?php if($score_data->attempt_qus == 10) { ?>
				<h2 class="txt-sucess">Awesome. You are Genius. Congratulations you won the Game.</h2>
			<?php } ?>
			<?php if($score_data->attempt_qus >= 0 && $score_data->attempt_qus <= 2) { ?>
				<h2 class="txt-danger">Sorry You Failed.</h2>
			<?php } ?>
			<?php if($score_data->attempt_qus == 3 || $score_data->attempt_qus == 4) { ?>
				<h2 class="txt-danger">Well played but you failed. All The Best for Next Game.</h2>
			<?php } ?>
		</div>
		<div class="play-again">
			<a href="<?php echo base_url('play-quiz'); ?>" class='play-again-btn'>Play Again</a>
		</div>
	</div>
</body>
</html>