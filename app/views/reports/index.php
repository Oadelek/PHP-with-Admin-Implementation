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

<?php require_once 'app/views/templates/footer.php' ?>