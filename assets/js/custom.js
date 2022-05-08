$(document).ready(function(){

	// for hide one option out of 4
	var random_num = Math.floor(Math.random() * 2) + 1;
	var remove_option = $('.question').find('.options :radio');
	remove_option.each(function(){
	   if($(this).data("id") == random_num){
		   	if($(this).val() == 1){
		   		$(this).parent().next().remove();
		   	}else{
		   		$(this).parent().remove();
		   	}
	   }
	});

	// for start game
	$(".start").on("click", function(e){
		$('.quiz-panel').show();
		startTimer(time);
		$('.start-btn').hide();
	});

	//For timer
	let creatTimer;
	var count_time = 20;
	let time = 20;
	var total_score = 0;
	function startTimer(count_time) {
		$('.question').removeClass('disable-qus');
		creatTimer = setInterval( function(){
			if(count_time <= 0){
	    			clearInterval(creatTimer);
	    			$("#timer").html("Time is over!");
					$("#timer").addClass('warning');
	    			setTimeout(time_over, 1000);
		  		} else {
		  			$("#timer").removeClass('warning');
		    		$("#timer").html('<span class="count-time">'+count_time+'</span> Seconds');
		  		}
		  		count_time -= 1;
		}, 1000);
	}
	
	// dispaly next question after time is over
	var qus_no_count = 1;
	function time_over(){
		qus_no_count +=1;
		$('.qus-no h1').html(qus_no_count);
		$('.qus-wrapper .question.active').addClass('disable-qus');
		$('.qus-wrapper .question').removeClass('active');
		$('body').find('.qus-wrapper .disable-qus + .question').addClass('active');
		if(qus_no_count > 10){
			$('.qus-no h1').hide();
			$('.flip-qus').hide();
			$('.fifty-fifty').hide();
			$('.score-btn').show();
			clearInterval(creatTimer);
		}else{
			startTimer(time);
		}
	}

	// display first question by default when load page
	var first_question = $('.qus-wrapper .question:first');
	first_question.addClass('active');

	// for click on options
	var score = 0;
	var attempt_qus = 0;
	$(document).on('change','.option', function(){
	    if ($(this).is(':checked')) {
	      if($(this).val() == 1){
	      	var time_count = parseInt($('#timer .count-time').html());
	      	score = score + (10 + (time - time_count));
	      	$('.total-score h2 span').text(score);
	      	attempt_qus = attempt_qus + 1;
	      	$('.attempt_qus').val(attempt_qus);
	      	$('.options li').find('span').removeClass('wrong');
	      	$(this).closest('.options li').find('span').addClass('right');
	      	clearInterval(creatTimer);
	      	setTimeout(time_over, 1000);
	      }else{
	      	$('.options li').find('span').removeClass('right');
	      	$(this).closest('.options li').find('span').addClass('wrong');
	      	clearInterval(creatTimer);
	      	setTimeout(time_over, 1000);
	      }
	    }
	});

	// hide and show timer
	$(".hide-timer").on("click", function(){
	  	$('#timer').hide();
	  	$(".hide-timer").hide();
	  	$('.show-timer').show();
	});
	$(".show-timer").on("click", function(){
	  	$('#timer').show();
	  	$(".hide-timer").show();
	  	$('.show-timer').hide();
	});

	// for flip question
	var count_clicks = 0;
	$(".flip-btn").on("click", function(e){
		$('.qus-wrapper .question').removeClass('disable-qus');
			count_clicks++;
    		var flip_1 = $('.flip-qus-wrapper .question-1').html();
    		var flip_2 = $('.flip-qus-wrapper .question-2').html();
		if(count_clicks == 1){
			$('.qus-wrapper .question.active').replaceWith(flip_1);
		}
		if(count_clicks == 2){
			$('.qus-wrapper .question.active').replaceWith(flip_2);
		}
	});

	// for 50:50 option
	var count_remove = 0;
	$(document).on('click','.remove-option',function(){
		count_remove++;
		let array = [];
		if(count_remove == 1){
			var inputs =$('.qus-wrapper .question.active').find('.options :radio');
			 inputs.each(function(){
			 	array.push($(this).data("id"));
			});
			 
		 	var chose_option =  array[Math.floor(Math.random() * array.length)];
			 inputs.each(function(){
			 if($(this).data("id") == chose_option){
				   	if($(this).val() == 1){
				   		$(this).parent().next().remove();
				   	}else{
				   		$(this).parent().remove();
				   	}
			   }
		  	});
		}
	});
});	