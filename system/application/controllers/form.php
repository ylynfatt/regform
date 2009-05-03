<?php
class Form extends Controller {

	function index()
	{
	  	# Validations

	  	$this->load->library('validation');
	  	
	  	$rules['fname'] = "required";
	  	$rules['email'] = "required|valid_email";

		$this->validation->set_rules($rules);	  	
	  	
		# Input and textarea field attributes
		$data["fname"] = array('name' => 'fname', 'id' => 'fname');
		$data['email'] = array('name' => 'email', 'id' => 'email');
		$data['comments'] = array('name' => 'comments', 'id' => 'comments', 'rows' => 3, 'cols' => 40);
		
		# Checkbox attributes
		$data['purpose'] = array('name' => 'seminar[]', 'id' => 'purpose', 'value' => 'Purpose of Prayer', 'checked' => FALSE);
		$data['prepare'] = array('name' => 'seminar[]', 'id' => 'prepare', 'value' => 'Prepare for Prayer', 'checked' => FALSE);
		$data['principles'] = array('name' => 'seminar[]', 'id' => 'principles', 'value' => 'Principles of Prayer', 'checked' => FALSE);
		$data['power'] = array('name' => 'seminar[]', 'id' => 'power', 'value' => 'Power in Prayer', 'checked' => FALSE);
		
		
		if ($this->validation->run() == FALSE)
		{
			$this->load->view('form_view', $data);
		}
		else
		{

			$fname = $this->input->post('fname');
			$email = $this->input->post('email');
			$comments = $this->input->post('comments');
			$seminars = "";
			
			foreach($this->input->post('seminar') as $value){
			$seminars .= "$value\n";
			} 
			
			$message = "$fname ($email) would like to register for the following seminars:\n$seminars and had this to say:\n\n$comments";
			$this->email->from($email, $fname);
			$this->email->to('john.doe@welovejesus.com'); # Change to a valid e-mail address
			
			$this->email->subject('Seminar Registration');
			$this->email->message($message);
			
			$this->email->send();

            
			$this->load->model('Form_model','', TRUE);
			$this->Form_model->add_participant();
					
			$this->load->view('formsuccess');
			
		}	
	}

	
	function results()
	{
		$this->load->model('Form_model', '', TRUE);
		$data['query'] = $this->Form_model->list_participants();
		
		$this->load->view('results', $data);
	}
}
?>