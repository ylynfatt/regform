<?php
class Form_model extends Model
{
	function Form_model()
	{
		parent::Model();
	}

	function add_participant()
	{
		$fname = $this->input->post('fname');
		$email = $this->input->post('email');
//		$comments = mysql_real_escape_string($this->input->post('comments', TRUE));
        $comments = $this->input->post('comments', TRUE);
		$seminars = array_pad($this->input->post('seminar'), 4, "none chosen");
		$seminar_1 = $seminars[0];
		$seminar_2 = $seminars[1];
		$seminar_3 = $seminars[2];
		$seminar_4 = $seminars[3];
		
		$sql = "INSERT INTO participants (id, fname, email, comments, seminar_1, seminar_2, seminar_3, seminar_4) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, array(NULL, $fname, $email, $comments, $seminar_1, $seminar_2, $seminar_3, $seminar_4));
	}

	function list_participants()
	{
		$query = $this->db->query("SELECT * FROM participants");
		return $query;
	}
}
?>