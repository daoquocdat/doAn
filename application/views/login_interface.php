
<?php include'inc/inc_head.php'; ?>
<body>
	<div class="login-interface">

		<img src="<?php echo base_url(); ?>vendor/img/bg_login-interface.jpg" alt="background-login-interface">		
			<div class="link-download-code">
				<a href="https://github.com/daoquocdat/daoquocdat.xyz-admin">
					https://github.com/daoquocdat/daoquocdat.xyz-admin
				</a>
			</div>
			<form action="" method="POST">
				<div class="login">
					<h2>Login</h2>
					<input type="hidden" value="1" name="s">
					<div class="login-textbox">
						<label for="">Username:</label>
						<input type="text" name="username" placeholder="Username" required>
					</div>
					<div class="login-textbox">
						<label for="">Password:</label>
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="center">
						<input class="btn-login" type="submit" name="btn-login" value="Login">
					</div>
					<div class="error-message center"><?= $this->session->flashdata('error'); ?></div>

					
				</div>
			</form>
	</div>
</body>
</html>