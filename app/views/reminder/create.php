<?php require_once 'app/views/templates/header.php' ?>

<div class="container">
    <div class="reminder-form">
        <h1><?php echo isset($note) ? 'Edit' : 'Create'; ?> Reminder</h1>
        <form action="<?php echo isset($note) ? "/reminder/edit/{$note['id']}" : '/reminder/create'; ?>" method="post">
            <div class="mb-4">
                <label for="subject" class="form-label">Reminder Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo isset($note) ? htmlspecialchars($note['subject']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo isset($note) ? 'Update Reminder' : 'Create Reminder'; ?>
            </button>
        </form>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>