<?php require_once 'app/views/templates/headerPublic.php' ?>
<div class="container">
		<div class="login-container">
				<h1 class="text-center mb-4">Login</h1>
				<?php if (!empty($error)): ?>
						<div class='error-message'><?php echo htmlspecialchars($error); ?></div>
				<?php endif; ?>
				<?php if (!empty($success)): ?>
						<div class='success-message'><?php echo htmlspecialchars($success); ?></div>
				<?php endif; ?>
				<form action="/login/verify" method="post">
						<div class="mb-3">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
						<div class="mb-3">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
				<p class="mt-3 text-center">Don't have an account? <a href="/register">Register</a></p>
		</div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>