<?php
    include "../../components/core.php";

    $delImage = "../../assets/images/uploads/". $_POST['imagePath'];
    unlink($delImage);
    $conn-> query("
        DELETE FROM `qrlogs` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `id` = '{$_POST['logId']}'
    ");
    header("Location: ". $_SERVER['HTTP_REFERER']);
?>