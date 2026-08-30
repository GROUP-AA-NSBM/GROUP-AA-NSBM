<?php
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];


    
    header("Location: manage-events.php?status=deleted");
    exit();
} else {
    header("Location: manage-events.php");
    exit();
}