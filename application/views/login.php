	<div class="content-main" style="margin-top:9%;">
		<div class="form-group col-md-3 col-md-offset-2 form-horizontal">
			<h3>Signin</h3>
			<p><?php echo isset($message) ? $message : ""?></p>
			<form class="form-horizontal" role="form" action="<?= base_url('login/process_login') ?>" id="login" method="post">
				<label>Email</label>
				<input class="form-control" type="text" name="email">
				<label>Password</label>
				<input class="form-control" type="password" name="password">
				<input class="form-control" type="submit" value="Sign In">
			</form>
			<a href="<?= base_url('login/register') ?>">Don't have an account? Register</a>
		</div>
	</div>
