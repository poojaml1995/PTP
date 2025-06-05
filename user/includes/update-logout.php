<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
    <body>
        <script>
            window.location='../../login.php';
        </script>

    </body>
</html>