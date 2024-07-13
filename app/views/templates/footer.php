</div>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; <?php echo date('Y'); ?> Reminder App. All rights reserved.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
</script>
</body>
</html>