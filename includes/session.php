<?php
session_start();

if (!isset($_SESSION['username']) && isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}

if (!isset($_SESSION['id']) && isset($_POST['id'])) {
    $_SESSION['id'] = $_POST['id'];
}
?>
