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
    <link rel="stylesheet" href="/assets/styles/register.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
    <title>QuickQR - Генерация QR-кодов</title>
</head>
<body>
    <div class="container">
        <form action="/controllers/auth/add_user.php" method="post">
            <h1>Регистрация</h1>
            <div class="input-group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" maxlength="30" pattern="[A-z]{6,30}" minlength="6" placeholder="Введите логин..." required>
                <span>от 6 до 30 символов на латинице</span>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" minlength="6" placeholder="Введите пароль..." required>
                <span class="password-toggle-icon">
                    <img src="/assets/images/eye.svg" class="toggle-eye" alt="toggleshowpassword" id="toggle-icon">
                </span>
                <span>от 6 символов</span>
            </div>
            <div class="input-group">
                <label for="repeatpassword">Повторите пароль</label>
                <input type="password" name="repeatpassword" id="repeatpassword" minlength="6" placeholder="Повторно введите пароль..." required>
                <span class="password-toggle-icon">
                    <img src="/assets/images/eye.svg" class="toggle-eye" alt="toggleshowpassword" id="toggle-icon1">
                </span>
                <span>от 6 символов</span>
            </div>
            <?php if(isset($_SESSION['errors']['register']['empty_field']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['register']['empty_field'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['register']['minLeght']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['register']['minLeght'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['register']['maxLeght']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['register']['maxLeght'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['register']['checklogin']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['register']['checklogin'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <?php if(isset($_SESSION['errors']['register']['errorPassword']))
            {
                echo "<p style='color:#ff0000; font-size:14px; margin:0 auto; text-align:center;'>". $_SESSION['errors']['register']['errorPassword'] . "</p>";
                unset($_SESSION['errors']);
            } 
            ?>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <p class="authText">Уже были у нас? <a href="/login.php">Войдите!</a></p>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const passwordRepeatInput = document.getElementById('repeatpassword');
        const toggleIcon = document.getElementById('toggle-icon');
        const toggleIcon1 = document.getElementById('toggle-icon1');

        toggleIcon.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.src = '/assets/images/eye-slash.svg';
        } else {
            passwordInput.type = 'password';
            toggleIcon.src = '/assets/images/eye.svg';
        }
        });
        toggleIcon1.addEventListener('click', () => {
        if (passwordRepeatInput.type === 'password') {
            passwordRepeatInput.type = 'text';
            toggleIcon1.src = '/assets/images/eye-slash.svg';
        } else {
            passwordRepeatInput.type = 'password';
            toggleIcon1.src = '/assets/images/eye.svg';
        }
        });
    </script>
</body>
</html>