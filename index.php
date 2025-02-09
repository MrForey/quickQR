<?php
    include "components/header.php";

    if(isset($_GET['target']))
    {
        if($_GET['target'] == 'link')
        {
            $coder = array(
                "h1" => "Ссылка в виде QR-Кода",
                "input" => '<div><input type="text" id="dataLink" name="dataLink" placeholder="Введите url..." value="https://"></div>'
            );
        }
        elseif($_GET['target'] == 'card')
        {
            $coder = array(
                "h1" => "Визитная карточка в виде QR-Кода",
                "input" => '<div id="card">
                <label for="card_first_name">Имя</label>
                <input type="text" id="card_first_name" name="card_first_name" placeholder="Введите имя...">
                </div>
                <div>
                <label for="card_second_name">Фамилия</label>
                <input type="text" id="card_second_name" name="card_second_name" placeholder="Введите фамилию...">
                </div>
                <div>
                <label for="card_phone">Номер телефона</label>
                <input type="text" id="card_phone" name="card_phone" class="mask-phone-card" placeholder="Введите номер телефона...">
                </div>
                <div>
                <label for="card_email">Электронная почта</label>
                <input type="email" id="card_email" name="card_email" class="mask-email-card" placeholder="Введите E-mail...">
                </div>
                <div>
                <label for="card_org">Организация</label>
                <input type="text" id="card_org" name="card_org" placeholder="Введите название органищзации...">
                </div>
                <div>
                <label for="card_rank">Должность</label>
                <input type="text" id="card_rank" name="card_rank" placeholder="Введите должность в организации...">
                </div>
                <div>
                <label for="card_adress">Адрес</label>
                <input type="text" id="card_adress" name="card_adress" placeholder="Введите адрес...">
                </div>
                <div>
                <label for="card_url">Адрес сайта</label>
                <input type="text" id="card_url" name="card_url" placeholder="Введите адрес сайта...">
                </div>
                <div>
                <label for="card_desc">Заметка</label>
                <textarea type="text" id="card_desc" name="card_desc" placeholder="Введите заметку..."></textarea>
                </div>'
            );
        }
        elseif($_GET['target'] == 'sms')
        {
            $coder = array(
                "h1" => "SMS-сообщение в виде QR-Кода",
                "input" => '<div id="sms"><label for="sms_phone">Номер телефона</label><input type="text" id="sms_phone" class="mask-phone-sms" name="sms_phone" placeholder="Введите номер телефона..."></div><div><label for="sms_message">Сообщение</label><textarea type="text" id="sms_message" name="sms_message" placeholder="Введите sms-сообщение..."></textarea></div>'
            );
        }
        elseif($_GET['target'] == 'wifi')
        {
            $coder = array(
                "h1" => "Подключение к WIFI в виде QR-Кода",
                "input" => '<div id="wifi"><label for="wifi_name">Название WIFI</label><input type="text" id="wifi_name" name="wifi_name" placeholder="Введите название WIFI..."></div><div><label for="wifi_password">Пароль от WIFI</label><input type="password" id="wifi_password" name="wifi_password" placeholder="Введите пароль от WIFI..."></div><div><label for="wifi_enctype">Тип шифрования WIFI</label><select name="wifi_enctype" id="wifi_enctype">
            <option value="WEP">WEP</option>
            <option value="WPA">WPA</option>
            <option value="WPA2" selected>WPA2</option>
            <option value="WPA3">WPA3</option>
        </select></div>'
            );
        }
        elseif($_GET['target'] == 'gps')
        {
            $coder = array(
                "h1" => "Местонахождение по карте в виде QR-Кода",
                "input" => '<div id="location">
                <label for="location_latitude">Широта</label>
                <input type="text" id="location_latitude" name="location_latitude" placeholder="Введите широту..." required>
                </div>
                <div>
                <label for="location_longitude">Долгота</label>
                <input type="text" id="location_longitude" name="location_longitude" placeholder="Введите долготу..." required>
                </div>'
            );
        }
        elseif($_GET['target'] == 'email')
        {
            $coder = array(
                "h1" => "Отправить E-Mail в виде QR-Кода",
                "input" => '<div id="email">
                <label for="email_subject">Тема сообщения</label>
                <input type="text" id="email_subject" name="email_subject" placeholder="Введите тему сообщения..." required>
                </div>
                <div>
                <label for="email_to">E-Mail получателя</label>
                <input type="email" id="email_to" class="mask-email-email" name="email_to" placeholder="Введите E-Mail получателя..." required>
                </div>
                <div>
                <label for="email_body">Сообщение</label>
                <textarea id="email_body" name="email_body" placeholder="Введите сообщение..." required></textarea>
                </div>'
            );
        }
        elseif($_GET['target'] == 'event')
        {
            $coder = array(
                "h1" => "Мероприятие в виде QR-Кода",
                "input" => '
                <div id="event">
                <label for="eventName">Название мероприятия</label>
                <input type="text" id="eventName" name="eventName" placeholder="Введите название мероприятия..." required>
                </div>
                <div>
                <label for="eventDescription">Описание мероприятия</label>
                <textarea id="eventDescription" name="eventDescription" placeholder="Введите описание мероприятия..." required></textarea>
                </div>
                <div>
                <label for="eventLocation">Место проведения</label>
                <input type="text" id="eventLocation" name="eventLocation" placeholder="Введите место проведения мероприятия..." required>
                </div>
                <div>
                <label for="eventStart">Дата и время начала</label>
                <input type="datetime-local" id="eventStart" name="eventStart" required>
                </div>
                <div>
                <label for="eventEnd">Дата и время окончания</label>
                <input type="datetime-local" id="eventEnd" name="eventEnd" required>
                </div>'
            );
        }
        elseif($_GET['target'] == 'bank')
        {
            $coder = array(
                "h1" => "Оплата по счету в виде QR-Кода",
                "input" => '
                <div id="bank">
                <label for="bankName">ФИО получателя</label>
                <input type="text" id="bankName" name="bankName" placeholder="Введите ФИО получателя..." required>
                </div>
                <div>
                <label for="bankNumber">Номер счета получателя</label>
                <input type="text" id="bankNumber" name="bankNumber" placeholder="Введите нормер счета получателя..." required>
                </div>
                <div>
                <label for="bankBank">Банк</label>
                <select id="bankBank" name="bankBank">
                    <option value="tbank">Т-Банк (Тинькофф)</option>
                    <option value="sber">Сбербанк</option>
                    <option value="vtb">ВТБ</option>
                </select>
                </div>
                <div>
                <label for="bankSum">Сумма в рублях</label>
                <input type="number" id="bankSum" name="bankSum" placeholder="Введите сумму платежа..." required>
                </div>
                <div>
                <label for="bankPurpose">Назначение платежа</label>
                <textarea id="bankPurpose" name="bankPurpose" placeholder="Введите назначение платежа..." required></textarea>
                </div>'
            );
        }
    }
    else
    {
        $coder = array(
            "h1" => "Генерация QR-кода",
            "input" => "<textarea type='text' class='input' name='dataInput' id='dataInput' placeholder='Введите текст...' cols='50'></textarea>"
        );
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
    <title>QuickQR - Генерация QR-кодов</title>
</head>
<body>
    <div class="container" style="flex:1;">
        <nav class="coder-menu">
            <a href="/index.php">Обычный текст</a>
            <a href="/index.php?target=link">Ссылка на сайт</a>
            <a href="/index.php?target=card">Визитная карточка</a>
            <a href="/index.php?target=sms">SMS-сообщение</a>
            <a href="/index.php?target=wifi">Подключение к WIFI</a>
            <a href="/index.php?target=gps">Местоположение на карте</a>
            <a href="/index.php?target=email">E-Mail сообщение</a>
            <a href="/index.php?target=event">Мероприятие</a>
            <a href="/index.php?target=bank">Оплата по счету</a>
        </nav>
        <div class="row">
            <div class="col">
                
                <form action="/controllers/func/add_qrcode_log.php" method="post" id="logForm" enctype="multipart/form-data">
                    <input type="hidden" name="target" value="<?php if(isset($_GET['target'])){echo $_GET['target'];} ?>">
                    <h1><?= $coder['h1'] ?></h1>
                    <div class="inputs">
                        <?= $coder['input'] ?>
                    </div>
                    <button id="generateBtn">Сгенерировать QR-код</button>
                    <span class="main-texts">Размер QR-кода: </span>
                    <div>
                        <span class="main-texts">50x50</span>
                        <input type="range" name="radioSize" id="radioSize" value="120" min="50" max="1000" oninput="changeSize()">
                        <span class="main-texts">1000x1000</span>
                    </div>
                    <p class="main-texts" id="container">120х120</p>
                    
                    <div class="color-group">
                        <p class="main-texts">Фон QR-Кода <input type="color" name="qrColorBG" id="qrColorBG" value="#ffffff"></p>
                        <p class="main-texts">Элементы QR-Кода <input type="color" name="qrColorEL" id="qrColorEL" value="#000000"></p>
                    </div>
                    <input type="file" name="qr_image" id="fileInput" style="display:none;">
                </form>
            </div>
            <div class="col">
                <p>
                    <span>Что такое QR-Код?</span>
                    <br>
                    QR код «QR - Quick Response - Быстрый Отклик» — это двухмерный штрихкод (бар-код), предоставляющий информацию для быстрого ее распознавания с помощью камеры на мобильном телефоне.<br><br>
                    При помощи QR-кода можно закодировать любую информацию, например: текст, номер телефона, ссылку на сайт или визитную карточку.</p>
                <span>Здесь будет ваш QR-Код:</span>
                <div class="qrcodeblock">
                    <div id="qrcode"></div>
                </div>
            </div>
        </div>
    </div>
<?php include "components/footer.php"; ?>
    <script src="/assets/scripts/jquery-3.7.1.min.js"></script>
    <script src="/assets/scripts/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <script>
        function changeSize () 
        { 
            const range = document.getElementById('radioSize').value;
            const container = document.getElementById('container');
            container.innerHTML = range + "x" + range;
        }

    </script>
    <script>
        $.mask.definitions['h']='[A-Za-z0-9]';
        $(".mask-phone-card").mask("+7 (999) 999-99-99");
        $(".mask-phone-sms").mask("+7 (999) 999-99-99");
        $(".mask-email-email").on("input", function () {
            const value = $(this).val();
            const sanitizedValue = value.replace(/[^a-zA-Z0-9@._-]/g, "");
            $(this).val(sanitizedValue);
        });
        $(".mask-email-card").on("input", function () {
            const value = $(this).val();
            const sanitizedValue = value.replace(/[^a-zA-Z0-9@._-]/g, "");
            $(this).val(sanitizedValue);
        });
    </script>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('generateBtn').addEventListener('click', async function() {
            event.preventDefault();
            let data = "";

            const smsField = document.getElementById('sms');
            const cardField = document.getElementById('card');
            const linkField = document.getElementById('dataLink');
            const textField = document.getElementById('dataInput');
            const wifiField = document.getElementById('wifi');
            const locationField = document.getElementById('location');
            const emailField = document.getElementById('email');
            const eventField = document.getElementById('event');
            const bankField = document.getElementById('bank');

            if (smsField && smsField.value !== "") {
                const phone = document.getElementById('sms_phone')?.value || '';
                const message = document.getElementById('sms_message')?.value || '';
                data = `sms:${phone}?body=${encodeURIComponent(message)}`;
            } else if (cardField && cardField.value !== "") {
                const firstName = document.getElementById('card_first_name').value || '';
                const secondName = document.getElementById('card_second_name').value || '';
                const phone = document.getElementById('card_phone').value || '';
                const email = document.getElementById('card_email').value || '';
                const org = document.getElementById('card_org').value || '';
                const rank = document.getElementById('card_rank').value || '';
                const address = document.getElementById('card_adress').value || '';
                const url = document.getElementById('card_url').value || '';
                const desc = document.getElementById('card_desc').value || '';

                data = `BEGIN:VCARD
VERSION:3.0
FN;CHARSET=UTF-8:${firstName} ${secondName}
N;CHARSET=UTF-8:${secondName};${firstName};;;
EMAIL;CHARSET=UTF-8;type=HOME,INTERNET:${email}
TEL;TYPE=HOME,VOICE:${phone}
ADR;CHARSET=UTF-8;TYPE=HOME:;;${address};;;;
TITLE;CHARSET=UTF-8:${rank}
ORG;CHARSET=UTF-8:${org}
URL;type=WORK;CHARSET=UTF-8:${url}
NOTE;CHARSET=UTF-8:${desc}
END:VCARD`;

            } else if (linkField && linkField.value !== "") {
                data = linkField.value;
                
            } 
            else if (wifiField && wifiField.value !== "") {
                const wifi_name = document.getElementById('wifi_name').value || '';
                const wifi_password = document.getElementById('wifi_password').value || '';
                const wifi_enctype = document.getElementById('wifi_enctype').value || '';

                data = `WIFI:T:${wifi_enctype};S:${wifi_name};P:${wifi_password};;`;
            }
            else if (locationField && locationField.value !== "") {
                const latitude = document.getElementById('location_latitude').value || '';
                const longitude = document.getElementById('location_longitude').value || '';
                if (latitude && longitude) 
                {
                    data = `https://www.google.com/maps?q=${latitude},${longitude}`;
                } 
                else 
                {
                    console.log("Пожалуйста, заполните широту и долготу для местоположения!");
                    return;
                }
            }
            else if (emailField && emailField.value !== "") 
            {
                const emailTo = document.getElementById('email_to').value || '';
                const emailSubject = document.getElementById('email_subject').value || '';
                const emailBody = document.getElementById('email_body').value || '';

                data = `mailto:${emailTo}?subject=${encodeURIComponent(emailSubject)}&body=${encodeURIComponent(emailBody)}`;
            }
            else if (textField && textField.value !== "") {
                data = textField.value;
            }
            else if (eventField && eventField.value !== "")
            {
                const eventName = document.getElementById("eventName").value;
                const eventDescription = document.getElementById("eventDescription").value;
                const eventLocation = document.getElementById("eventLocation").value;
                const eventStart = document.getElementById("eventStart").value;
                const eventEnd = document.getElementById("eventEnd").value;

                const formatDate = (dateString) => {
                    const date = new Date(dateString);
                    return date.toISOString().replace(/[-:]/g, "").split(".")[0] + "Z";
                };

                const formattedStart = formatDate(eventStart);
                const formattedEnd = formatDate(eventEnd);
            data = `
BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
SUMMARY:${eventName}
DESCRIPTION:${eventDescription}
LOCATION:${eventLocation}
DTSTART:${formattedStart}
DTEND:${formattedEnd}
END:VEVENT
END:VCALENDAR
            `;
                }
                else if (bankField && bankField.value !== "")
                {
                    const name = document.getElementById('bankName').value.trim();
                    const account = document.getElementById('bankNumber').value.trim();
                    const bank = document.getElementById('bankBank').value;
                    const sum = document.getElementById('bankSum').value.trim();
                    const purpose = document.getElementById('bankPurpose').value.trim();

                    if (!name || !account || !sum || !purpose) {
                        console.log('Пожалуйста, заполните все поля!');
                        return;
                    }
                    else
                    {
                        if(bank == "tbank")
                        {
                            var bankname = "АО Тинькофф Банк";
                            var bic = "044525974";
                            var corresp = "30101810145250000974";
                        }
                        else if(bank == "sber")
                        {
                            var bankname = "ПАО Сбербанк";
                            var bic = "044525225";
                            var corresp = "30101810400000000225";
                        }
                        else if (bank == "vtb")
                        {
                            var bankname = "ВТБ";
                            var bic = "044525745";
                            var corresp = "30101810345250000745";
                        }
                    }
                    data = `ST00012|Name=${name}|PersonalAcc=${account}|BankName=${bankname}|BIC=${bic}|CorrespAcc=${corresp}|Sum=${sum * 100}|Purpose=${purpose}`
                }
                else {
                    console.log("Пожалуйста, заполните хотя бы одно поле!");
                    return;
                }

            const size = parseInt(document.getElementById('radioSize').value, 10);

            const qrCodeBG = document.getElementById('qrColorBG').value || "#ffffff";
            const qrCodeEl = document.getElementById('qrColorEL').value || "#000000";

            if (!size) {
                console.log("Пожалуйста, выберите размер QR-кода!");
                return;
            }

            const qrCodeContainer = document.getElementById('qrcode');
            qrCodeContainer.innerHTML = "";

            try {
                const qrCodeCanvas = await QRCode.toCanvas(data, {
                    width: size,
                    margin: 1,
                    color: {
                        dark: qrCodeEl,
                        light: qrCodeBG
                    }
                });

                qrCodeContainer.appendChild(qrCodeCanvas);

                const dataURL = qrCodeCanvas.toDataURL('image/png');
                const file = dataURLtoFile(dataURL, 'qrcode.png');
                const fileInput = document.getElementById('fileInput');
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;

                console.log('QR-код успешно добавлен в input');

                const form = document.getElementById('logForm');
                const formData = new FormData(form);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/controllers/func/add_qrcode_log.php', true);

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        console.log('Данные успешно отправлены');
                    } else {
                        console.error('Ошибка при отправке данных:', xhr.statusText);
                    }
                };

                xhr.send(formData);
            } catch (error) {
                console.error("Ошибка при генерации QR-кода:", error);
            }
        });

        function dataURLtoFile(dataURL, filename) {
            const arr = dataURL.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        }
    });
</script>
</body>
</html>