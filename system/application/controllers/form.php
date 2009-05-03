<?php
class Form extends Controller {

	function index()
	{
	  	// Validations

	  	$this->load->library('form_validation');
	  	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	  	
	  	$rules = array(
	  	            array(
	  	                'field' => 'fname',
	  	                'label' => 'Full Name',
	  	                'rules' => 'required',
	  	                ),
	  	            array(
	  	                'field' => 'email',
	  	                'label' => 'E-mail',
	  	                'rules' => 'required|valid_email',
	  	                ),
	  	            array(
	  	                'field' => 'seminar[]',
	  	                'label' => 'Seminars',
	  	                'rules' => 'required',
	  	                ),
	  	          );

		$this->form_validation->set_rules($rules);	  	
		
		
		if ($this->form_validation->run() == FALSE)
		{
		    // Input and textarea field attributes
		    $data["fname"] = array(
		                        'name' => 'fname',
		                        'id' => 'fname',
		                        'value' => set_value('fname')
		                        );
		    $data['email'] = array(
		                        'name' => 'email',
		                        'id' => 'email',
		                        'value' => set_value('email')
		                        );
		    $data['comments'] = array(
		                        'name' => 'comments',
		                        'id' => 'comments',
		                        'rows' => 3,
		                        'cols' => 40
		                        );
		
		    // Checkbox attributes
		    $data['purpose'] = array(
		                        'name' => 'seminar[]',
		                        'id' => 'purpose',
		                        'value' => 'Purpose of Prayer',
		                        'checked' => set_checkbox('seminar[]', 'Purpose of Prayer')
		                        );
		    $data['prepare'] = array(
		                        'name' => 'seminar[]',
		                        'id' => 'prepare',
		                        'value' => 'Prepare for Prayer',
		                        'checked' => set_checkbox('seminar[]', 'Prepare for Prayer')
		                        );
		    $data['principles'] = array(
		                        'name' => 'seminar[]',
		                        'id' => 'principles',
		                        'value' => 'Principles of Prayer',
		                        'checked' => set_checkbox('seminar[]', 'Principles of Prayer')
		                        );
		    $data['power'] = array(
		                        'name' => 'seminar[]',
		                        'id' => 'power',
		                        'value' => 'Power in Prayer',
		                        'checked' => set_checkbox('seminar[]', 'Power in Prayer')
		                        );
		
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
			
			// Format Email
			$message = "$fname ($email) would like to register for the following seminars:\n$seminars and had this to say:\n\n$comments";
			$this->email->from($email, $fname);
			$this->email->to('john.doe@welovejesus.com'); // Change to a valid e-mail address
			
			$this->email->subject('Seminar Registration');
			$this->email->message($message);
			
			// Send Email
			$this->email->send();

            // Add to database
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
