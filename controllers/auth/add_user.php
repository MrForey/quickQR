<?php
    include "../../components/core.php";

    if(!(empty($_POST['login']) && empty($_POST['password']) && empty($_POST['repeatpassword'])))
    {
        if(mb_strlen($_POST['login']) >= 6 || mb_strlen($_POST['password']) >= 6 || mb_strlen($_POST['repeatpassword']) >= 6)
        {
            if(mb_strlen($_POST['login']) <= 30)
            {
                $checkLogin = $conn -> query("
                    SELECT * FROM `users` WHERE `login` = '{$_POST['login']}'
                ");
                if($checkLogin->num_rows == 0)
                {
                    if($_POST['password'] == $_POST['repeatpassword'])
                    {
                        $pass = $_POST['password'];
                        $passhash = password_hash($pass, PASSWORD_BCRYPT);
                        $conn -> query("
                        INSERT INTO `users`(
                        `login`, 
                        `password`
                        ) VALUES (
                         '{$_POST['login']}',
                         '$passhash'
                         )
                        ");
                        header("Location: ../../login.php");
                    }
                    else
                    {
                        $_SESSION['errors']['register']['errorPassword'] = "Пароли не совпадают!";
                        header("Location: ". $_SERVER['HTTP_REFERER']);
                    }
                }
                else
                {
                    $_SESSION['errors']['register']['checklogin'] = "Такой логин уже существует!";
                    header("Location: ". $_SERVER['HTTP_REFERER']);
                }
            }
            else
            {
                $_SESSION['errors']['register']['maxLeght'] = "Максимальное количество символов 30!";
                header("Location: ". $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $_SESSION['errors']['register']['minLeght'] = "Минимальное количество символов 6!";
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
    else
    {
        $_SESSION['errors']['register']['empty_field'] = "Все поля обязательны!";
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
?>