<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function quizdisplay()
	{
		$this->load->model('quizmodel');
		$this->data['questions'] = $this->quizmodel->getQuestions();
		$this->load->view('play_quiz', $this->data);
	}

		public function resultdisplay()
	{
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid1'),
		     'ques2' => $this->input->post('quizid2'),
			 'ques3' => $this->input->post('quizid3'),
			 'ques4' => $this->input->post('quizid4'),
		     'ques5' => $this->input->post('quizid5'),
		);

        $this->load->model('quizmodel');
		$this->data['results'] = $this->quizmodel->getQuestions();
		$this->load->view('result_display', $this->data);
	}
}