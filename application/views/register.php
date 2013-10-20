
<div class="form-group col-lg-4 col-lg-offset-2" style="margin-top:5%;">
	<h3>Register</h3>
	<p><?=  isset($message) ? $message : "" ?></p>
	<p><?= isset($success) ? $success : ""?></p>
	<form role="form" action="<?= base_url('login/process_register')?>" method="post" id="register">
		<label>First Name</label>
		<input class="form-control" type="text" name="first_name" placeholder="First Name">
		<label>Last Name</label>
		<input class="form-control" type="text" name="last_name" placeholder="Last Name">
		<label>Email</label>
		<input class="form-control" type="text" name="email_register" placeholder="Email">
		<label>Password</label>
		<input class="form-control" type="password" name="first_password" placeholder="Password">
		<label>Confirm Password</label>
		<input class="form-control" type="password" name="last_password" placeholder="Confirm password">
		<input class="form-control" type="submit" value="Submit">
	</form>
</div>
