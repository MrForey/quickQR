<?php
    include "../../components/core.php";

    if(!(empty($_POST['login']) && empty($_POST['password'])))
    {
        if(mb_strlen($_POST['login']) >= 6 && mb_strlen($_POST['password']) >= 6)
        {
            if(mb_strlen($_POST['login']) <= 30)
            {
                $auth = $conn -> query("
                    SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' AND `password` = '{$_POST['password']}'
                ");
                if($auth->num_rows > 0)
                {
                    foreach($auth as $row)
                    {
                        $_SESSION['user']['id'] = $row['id'];
                    }
                    header("Location: ../../profile.php");
                }
                else
                {
                    $_SESSION['errors']['login']['errorValidation'] = "Не верный логин или пароль!";
                    header("Location: ". $_SERVER['HTTP_REFERER']);
                }
            }
            else
            {
                $_SESSION['errors']['login']['maxLeght'] = "Максимальное количество символов 30!";
                header("Location: ". $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $_SESSION['errors']['login']['minLeght'] = "Минимальное количество символов 6!";
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
    else
    {
        $_SESSION['errors']['login']['empty_field'] = "Все поля обязательны!";
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
?>