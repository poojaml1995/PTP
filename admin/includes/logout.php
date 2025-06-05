<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['admin_email']);
?>

<!DOCTYPE html>
<html>
    <body>
        <script>
            window.location='../index.php';
        </script>

    </body>
</html>