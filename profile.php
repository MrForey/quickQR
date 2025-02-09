<?php
    include "components/header.php";

    if(!isset($_SESSION['user']))
    {
        header("Location: index.php");
    }

    $logs = $conn -> query("
        SELECT 
            `id`,
            `size`, 
            `type`, 
            `qrcode`, 
            `date`, 
            `user_id`,
            DAY(`date`) AS day,
            MONTH(`date`) AS month,
            YEAR(`date`) AS year,
            TIME(`date`) AS time

        FROM `qrlogs` WHERE `user_id` = '{$_SESSION['user']['id']}'
    ");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/header.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/profile.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
    <title>QuickQR - Генерация QR-кодов</title>
</head>
<body>
    <div class="container" style="flex: 1;">
        <h1>История создания QR-Кодов</h1>
        <?php if($logs->num_rows != null): ?>
            <?php foreach($logs as $key => $log): ?>
                <div class="log-block">
                    <div class="log-info">
                        <p>Тип: <?php if($log['type'] == 'text'){echo "Простой текст";}elseif($log['type'] == 'link'){echo "Ссылка на сайт";}elseif($log['type'] == 'card'){echo "Визитная карточка";}elseif($log['type'] == 'sms'){echo "SMS-сообщение";}elseif($log['type'] == 'wifi'){echo "Подключение к WIFI";}elseif($log['type'] == 'gps'){echo "Местоположение на карте";}elseif($log['type'] == 'email'){echo "E-Mail сообщение";}elseif($log['type'] == 'event'){echo "Мероприятие";} ?></p>
                        <p>Размер: <?= $log['size'] ?>x<?= $log['size'] ?></p>
                        <p>Дата создания: <?= $log['day'] ?>.<?= $log['month'] ?>.<?= $log['year'] ?></p>
                        <p>Время создания: <?= $log['time'] ?></p>
                    </div>
                    <div class="log-buttons">
                        <form action="/controllers/func/delete_from_logs.php" method="post" id="form">
                            <input type="hidden" name="imagePath" value="<?= $log['qrcode'] ?>">
                            <input type="hidden" name="logId" value="<?= $log['id'] ?>">
                            <button type="button" class="download-button" data-image="/assets/images/uploads/<?= $log['qrcode'] ?>">Скачать QR-код</button>
                            <button class="danger">Удалить</button>
                        </form>
                    </div>
                    <img src="/assets/images/uploads/<?= $log['qrcode'] ?>" id="image" alt="qrcode">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="non-result">Тут еще ничего нет :)</p>
        <?php endif; ?>
    </div>
    <?php include "components/footer.php"; ?>
    <script>
        document.querySelectorAll('.download-button').forEach(button => {
            button.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                const link = document.createElement('a');
                link.href = imageUrl;
                link.download = 'qrcode.png';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    </script>
</body>
</html>