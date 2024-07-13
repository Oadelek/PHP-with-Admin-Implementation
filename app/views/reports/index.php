<?php require_once 'app/views/templates/header.php' ?>

<h1>Admin Reports</h1>

<h2>All Reminders</h2>
<table class="table">
    <thead>
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

<h2>User with Most Reminders</h2>
<p><?php echo htmlspecialchars($most_reminders['username']); ?> with <?php echo $most_reminders['reminder_count']; ?> reminders</p>

<h2>Login Counts by Username</h2>
<table class="table">
    <thead>
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

<h2>Login Counts Chart</h2>
<canvas id="loginChart"></canvas>


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
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<?php require_once 'app/views/templates/footer.php' ?>