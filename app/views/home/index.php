<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h1>Welcome, <?php echo $username; ?></h1>
                <p>Today is: <?php echo $currentDate; ?></p>
                <p><a href="/logout" class="btn btn-primary">Logout</a></p>
            </div>
        </div>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>