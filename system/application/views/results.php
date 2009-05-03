<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Godbit Code Igniter Tutorial: Creating a simple Registration Form</title>
<link rel="stylesheet" media="screen" type="text/css" href="http://localhost/regform/css/regform.css" />
</head>
<body>
<div id="container">
<h1>Participants</h1>
<p>Here is our wonderful list of participants:</p>

<table>
	<tr>
		<th>Name</th>
		<th>E-mail Address</th>
		<th>Seminar 1</th>
		<th>Seminar 2</th>
		<th>Seminar 3</th>
		<th>Seminar 4</th>
		<th>Comments</th>
	</tr>
<?php
if($query->num_rows() > 0):
   foreach ($query->result() as $row):
?>	
	<tr>
		<td><?php echo $row->fname; ?></td>
		<td><?php echo $row->email; ?></td>
		<td><?php echo $row->seminar_1; ?></td>
		<td><?php echo $row->seminar_2; ?></td>
		<td><?php echo $row->seminar_3; ?></td>
		<td><?php echo $row->seminar_4; ?></td>
		<td><?php echo $row->comments; ?></td>
	</tr>
<?php
	endforeach;
endif;
?>
</table>
</div>
</body>
</html>