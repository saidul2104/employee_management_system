<?php
    session_start();
    // // remove all session variables
    session_unset();

    // // destroy the session
    session_destroy();
    // setcookie("id", "", time() - (86400 * 30), "/");
    header("Location: login.php");
?>