<?php require_once 'app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="register-container">
        <h1 class="text-center mb-4">Register</h1>
        <?php if (isset($_SESSION['error'])): ?>
            <div class='error-message'><?php echo htmlspecialchars($_SESSION['error']); ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class='success-message'><?php echo htmlspecialchars($_SESSION['success']); ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <form action="/register/create" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="/login">Login</a></p>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>