<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="card">
        <h1>My Reminders</h1>
        <a href="/reminder/create" class="btn btn-primary mb-3">Create New Reminder</a>
        <ul class="list-group">
            <?php foreach ($notes as $note): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo htmlspecialchars($note['subject']); ?>
                    <span>
                        <a href="/reminder/edit/<?php echo $note['id']; ?>" class="btn btn-sm btn-warning me-2">Edit</a>
                        <a href="/reminder/delete/<?php echo $note['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>