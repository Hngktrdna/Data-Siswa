<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

// Redirect to session 5
header("Location: session5.php");
?>

</body>
</html>