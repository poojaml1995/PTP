<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['email']);
?>

<!DOCTYPE html>
<html>

<body>
    <script>
    window.location = '../../index.php';
    </script>

</body>

<script>
// Find the first element with the specified class
var element = document.querySelector(".active");
if (element) {
    var element = document.getElementById(element.id);
    element.classList.remove("active");

    var profileelement = document.getElementById("logout-link");
    profileelement.classList.add("active");
}
</script>

</html>