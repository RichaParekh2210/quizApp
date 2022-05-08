<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quiz App</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css'); ?>" />
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script> 
	<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</head>
<body class="quiz-container">
	<h1 class="title">:: Quiz ::</h1>
	<div class="instruction">
		<h3>Quiz Instruction</h3>
		<ul>
			<li>Total questions is 10</li>
			<li>Time for each questions is 20 second</li>
			<li>Correct answer score is 10 + Second in which you give the answer
				<ul>
					<li>For e.g, if you give answer in 5 seconds then Score will be 10 + (20 - 5) = 25</li>
				</ul>
			</li>
			<li>Wrong answer and un-attempted question score is 0</li>
			<li>You can flip any 2 questions by click on flip quistion button</li>
			<li>You can remove any one option of any one question using 50:50 option</li>
		</ul>
	</div>
	<div class="start-btn">
		<button class="start">Start Quiz</button>
	</div>
	<div class="quiz-panel">
		<input type="hidden" name="attempt_qus" value="0" class="attempt_qus" />
		<div class="score-timer-wrapper">
			<div class="total-score">
				<h2>Total Score: <span>0</span></h2>
			</div>
			<div class="qus-no">
				<h1>1</h1>
			</div>
			<div class="timer-box">
				<h2 id="timer">Timer</h2>
				<a href="#" class="hide-timer">Hide Timer</a>
				<a href="#" class="show-timer">Show Timer</a>
			</div>
		</div>
		<div class="flip-qus">
			<input type="submit" name="flip-btn" class="btn flip-btn" value="Flip Question" />
		</div>
		<div class="fifty-fifty">
			<input type="submit" name="remove-option" class="btn remove-option" value="50:50" />
		</div>
		<div class="qus-wrapper">
			<?php 
				if($question_data){
				foreach($question_data as $data) { 
					if($data['flip_qus'] != 1){
				?>
				<div class="question">
					<p><?php echo $data['qus_detail'] ?></p>
					<?php 
						if($data['option']){ $data_id = 0; ?>
							<div class="options">
								<ul>
									<?php foreach($data['option'] as $option) { $data_id+=1; ?>
											<li><input type="radio" name="option" value="<?php echo $option->right_option ?>" data-id='<?=$data_id; ?>' class='option'><span><?php echo $option->value ?></span></li>
									<?php } ?>
								</ul>
							</div>
						<?php }  ?>
				</div>
			<?php } } } ?>
		</div>
		<div class="flip-qus-wrapper" style="display: none;">
			<?php 
				if($flip_qus_data){
					$qus_count = 1;
					foreach($flip_qus_data as $data) {
				?>
				<div class="question-<?php echo $qus_count; ?>">
					<div class="question active">
						<p><?php echo $data['qus_detail'] ?></p>
						<?php 
							if($data['option']){ $data_id = 0; ?>
								<div class="options">
									<ul>
										<?php foreach($data['option'] as $option) { $data_id+=1; ?>
											<li><input type="radio" name="option" value="<?php echo $option->right_option ?>" data-id='<?=$data_id; ?>' class='option'><span><?php echo $option->value ?></span></li>
									<?php } ?>
									</ul>
								</div>
							<?php } ?>
					</div>
				</div>
			<?php $qus_count++; } } ?>
		</div>
		<div class="score-board">
			<a class='score-btn'>Score Board</a>
		</div>
	</div>
	<script type="text/javascript">
		$(document).on('click','.score-btn',function(){
			var attempt_qus = $('.attempt_qus').val();
			var score_total = $('.total-score h2 span').html();
			 $.ajax({
			 	url:'<?=base_url()?>score-board',
			     method: 'post',
			     data: {'attempt_qus': attempt_qus,'score_total': score_total},
			     dataType: 'json',
			     success: function(data){
			       window.location.href = data.redirect;
			    }
			});
		});
	</script>
</body>
</html>