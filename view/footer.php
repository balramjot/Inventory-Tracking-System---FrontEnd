<footer class="container-fluid footer_stl1">
    <p class="text-right">© Boston University</p>
</footer>
</body>
</html>
<?php
	// unsetting the sessions used for alerts to display

	if(!empty($_SESSION['error_user'])) { unset($_SESSION['error_user']); }
	if(!empty($_SESSION['success_user'])) { unset($_SESSION['success_user']); }
?>