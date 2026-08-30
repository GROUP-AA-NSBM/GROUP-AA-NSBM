<?php
require_once __DIR__ . '/../includes/auth.php';

session_unset();
session_destroy();
header("Location: /GROUP-AA-NSBM/index.php");
exit;
?>