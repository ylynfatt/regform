<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Godbit Code Igniter Tutorial: Creating a simple Registration Form</title>
<link rel="stylesheet" media="screen" type="text/css" href="http://localhost/regform/css/regform.css" />
</head>
<body>
<div id="container">
<h1>Registration Form</h1>
<p>Please complete the following form:</p>

<?php echo $this->validation->error_string; ?>

<?php echo form_open('form/index'); ?>
<p><label for="fname">Full Name: </label><br /><?php echo form_input($fname); ?></p>
<p><label for="email">E-mail: </label><br /><?php echo form_input($email); ?></p>

<p>Please select one or more seminars, that you would like to attend</p>
<p><?php echo form_checkbox($purpose); ?> <label for="purpose">Purpose of Prayer</label></p>
<p><?php echo form_checkbox($prepare); ?> <label for="prepare">Prepare for Prayer</label></p>
<p><?php echo form_checkbox($principles); ?> <label for="principles">Principles of Prayer</label></p>
<p><?php echo form_checkbox($power); ?> <label for="power">Power in Prayer</label></p>
<p><label for="comments">Comments: </label><br /><?php echo form_textarea($comments); ?></p>
<?php echo form_submit('submit', 'Submit'); ?>
<?php echo form_close(); ?>
</div>
</body>
</html>