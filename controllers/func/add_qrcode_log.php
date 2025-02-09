<?php
    include "../../components/core.php";

    if(isset($_SESSION['user']))
    {
        $target = $_POST['target'];

        if($target != null)
        {
            if($target == 'link')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';
                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'link',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'sms')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'sms',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'card')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'card',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'wifi')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'wifi',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'gps')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'gps',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'email')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'email',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'event')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'event',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
            elseif($target == 'bank')
            {
                $img = $_FILES['qr_image'];

                $uploadDir = '../../assets/images/uploads/';

                $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
                $uploadFile = $uploadDir . $randomFileName;
                move_uploaded_file($img['tmp_name'], $uploadFile);
                $conn->query("
                    INSERT INTO `qrlogs`(
                    `size`, 
                    `type`, 
                    `qrcode`, 
                    `user_id`
                    ) VALUES (
                    '{$_POST['radioSize']}',
                    'bank',
                    '{$randomFileName}',
                    '{$_SESSION['user']['id']}'
                    )
                ");
            }
        }
        else
        {
            $img = $_FILES['qr_image'];
            $uploadDir = '../../assets/images/uploads/';

            $randomFileName = 'qr_' . uniqid('', true) . '_' . mt_rand(1000, 9999) . '.png';
            $uploadFile = $uploadDir . $randomFileName;
            move_uploaded_file($img['tmp_name'], $uploadFile);
            $conn->query("
                INSERT INTO `qrlogs`(
                `size`, 
                `type`, 
                `qrcode`, 
                `user_id`
                ) VALUES (
                '{$_POST['radioSize']}',
                'text',
                '{$randomFileName}',
                '{$_SESSION['user']['id']}'
                )
            ");
        }
    }
?>