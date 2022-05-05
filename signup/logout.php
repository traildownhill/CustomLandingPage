<?php
session_start();
if (!empty($_SESSION['id'])) {
    session_destroy();
    header("Location: ../login/login.php");
}
if (empty($_SESSION['id'])) {
    session_destroy();
    header("Location: ../login/login.php");
}
?>