<?php
    include "core.php";
?>
<link rel="shortcut icon" href="assets/images/logo.ico" type="image/x-icon">
<link rel="stylesheet" href="/assets/styles/header.css">
<header>
    <div class="container header-container">
        <div class="logo" onclick="location.href='index.php';">
            <img src="/assets/images/header-logo.webp" alt="logotype">
            <div class="title">
                <p>QuickQR</p>
                <p>Генератор QR-кодов / QR Code Generator</p>
            </div>
        </div>
        <?php if(isset($_SESSION['user'])): ?>
            <div class="m-block">
                <div class="m-link" onclick="location.href='profile.php';">
                    <img src="/assets/images/person-fill.svg" alt="profile">
                </div>
                <a href="/logout.php">Выйти</a>
            </div>
        <?php else: ?>
            <div class="m-link" onclick="location.href='login.php';">
                <img src="/assets/images/box-arrow-in-right.svg" alt="auth">
            </div>
        <?php endif; ?>
        <nav>
            <ul>
                <?php if(!isset($_SESSION['user'])): ?>
                    <li class="header_links"><a href="/login.php">Вход</a> / <a href="/register.php">Регистрация</a></li>
                <?php else: ?>
                    <li class="header_links"><a href="/profile.php">Личный кабинет</a> / <a href="/logout.php">Выйти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>