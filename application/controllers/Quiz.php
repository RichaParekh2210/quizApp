<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Controller for Start Game */
class Quiz extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('quiz_model');
	}

	// for display questions (Screen 2)
	public function index()
	{
		$data['question_data'] = $this->quiz_model->get_qus();
		$data['flip_qus_data'] = $this->quiz_model->get_flip_qus();
		$this->load->view('quiz',$data);
	}

	// for inser score and attempted question count to database
	public function score_board(){
		$attempt_qus = $this->input->post('attempt_qus');
		$total_score = $this->input->post('score_total');
		if(isset($attempt_qus) && isset($total_score)){
			$update = $this->quiz_model->update_score($attempt_qus,$total_score);
			if($update = 1){
				$response['redirect'] = base_url().'score';
				echo json_encode($response);
				die;
			}
		}
	}

	// for display score view (Screen 3)
	public function score(){
		$result = $this->quiz_model->get_score();
		$data['score_data'] = $result;
		$this->load->view('score_board',$data);
	}
}
