<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'quickqr');
    $conn -> set_charset('utf8mb4');
?>