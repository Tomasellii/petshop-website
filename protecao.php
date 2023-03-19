<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    session_destroy();
    die("<script>location.href='index.php';</script>");
}
?>