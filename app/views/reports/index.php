<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
    <h1 class="text-center mb-5">Admin Reports</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">All Reminders</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Username</th>
                                    <th>Reminder</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_reminders as $reminder): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($reminder['username']); ?></td>
                                        <td><?php echo htmlspecialchars($reminder['subject']); ?></td>
                                        <td><?php echo htmlspecialchars($reminder['created_at']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h2 class="h4 mb-0">User with Most Reminders</h2>
                </div>
                <div class="card-body">
                    <p class="lead mb-0">
                        <strong><?php echo htmlspecialchars($most_reminders['username']); ?></strong> 
                        with <?php echo $most_reminders['reminder_count']; ?> reminders
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h2 class="h4 mb-0">Login Counts by Username</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Login Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($login_counts as $login): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($login['username']); ?></td>
                                        <td><?php echo $login['login_count']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-warning text-dark">
                    <h2 class="h4 mb-0">Login Counts Chart</h2>
                </div>
                <div class="card-body">
                    <canvas id="loginChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('loginChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($login_counts, 'username')); ?>,
            datasets: [{
                label: 'Login Count',
                data: <?php echo json_encode(array_column($login_counts, 'login_count')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
});
</script>

<?php require_once 'app/views/templates/footer.php' ?>