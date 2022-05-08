<?php
	/**
	 * Blog model
	 */
	class Quiz_Model extends CI_Model
	{
		
		public function __construct(){
			parent::__construct();
		}

		public function get_qus(){
			// for get random 10 questions
			$this->db->select('*');
			$this->db->from('questions q');
			$this->db->join('options o','q.id = o.qus_id');
			$this->db->where('q.flip_qus !=',1);
			$this->db->order_by('q.id', 'RANDOM');
			$this->db->limit(10);
			$query = $this->db->get();
			
			$questions_data = array();
			foreach ($query->result() as $qustions) {
				$this->db->select('*');
				$this->db->from('option_detail od');
				$this->db->join('options o','o.option_id = od.option_id');
				$this->db->where('o.qus_id',$qustions->id);
				$query = $this->db->get();
				$option_data = $query->result();
				
				$questions_data[] = array(
					'qus_id' => $qustions->id,
					'qus_detail' => $qustions->question,
					'flip_qus' => $qustions->flip_qus,
					'option' => $option_data
				);
			}

			return $questions_data;
		}

		public function get_flip_qus(){
			// for get random 2 flip questions
			$this->db->select('*');
			$this->db->from('questions q');
			$this->db->join('options o','q.id = o.qus_id');
			$this->db->where('q.flip_qus',1);
			$this->db->order_by('q.id', 'RANDOM');
			$this->db->limit(2);
			$query = $this->db->get();
			
			$flip_qus_data = array();
			foreach ($query->result() as $qustions) {
				$this->db->select('*');
				$this->db->from('option_detail od');
				$this->db->join('options o','o.option_id = od.option_id');
				$this->db->where('o.qus_id',$qustions->id);
				$query = $this->db->get();
				$option_data = $query->result();
				
				$flip_qus_data[] = array(
					'qus_id' => $qustions->id,
					'qus_detail' => $qustions->question,
					'flip_qus' => $qustions->flip_qus,
					'option' => $option_data
				);
			}

			return $flip_qus_data;
		}

		public function update_score($qus,$score){
			// fro update score
			$data = array(
				'attempt_qus' => $qus,
				'score' => $score
			);
			$this->db->where('id',1);
			$this->db->update('score',$data);
			return true;
		}

		public function get_score(){
			// get score detail
			$this->db->select('*');
			$query = $this->db->get('score');
			return $query->row();
		}
	}
?>