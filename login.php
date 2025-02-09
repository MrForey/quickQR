<?php
    include "components/header.php";

    if(isset($_SESSION['user']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/header.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
    <title>QuickQR - Генерация QR-кодов</title>
</head>
<body>
    <div class="container">
        <form action="/controllers/auth/auth.php" method="post">
            <h1>Вход</h1>
            <div class="input-group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" maxlength="30" minlength="6" placeholder="Введите логин..." required>
                <span>от 6 до 30 символов на латинице</span>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" minlength="6" placeholder="Введите пароль..." required>
                <span class="password-toggle-icon">
                    <img src="/assets/images/eye.svg" alt="toggleshowpassword" class="toggle-eye" id="toggle-icon">
                </span>
                <span>от 6 символов</span>
            </div>
            <?php if(isset($_SESSION['errors']['login']['empty_field']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['login']['empty_field'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['login']['minLeght']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['login']['minLeght'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['login']['maxLeght']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['login']['maxLeght'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['login']['errorValidation']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['login']['errorValidation'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <button type="submit">Войти</button>
        </form>
        <p class="authText">Ещё не были у нас? <a href="/register.php">Зарегистрируйтесь!</a></p>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggle-icon');

        toggleIcon.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.src = '/assets/images/eye-slash.svg';
        } else {
            passwordInput.type = 'password';
            toggleIcon.src = '/assets/images/eye.svg';
        }
        });
    </script>
</body>
</html>