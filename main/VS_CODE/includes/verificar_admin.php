<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../index.php");
    exit;
}