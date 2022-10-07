<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bacteria</title>
</head>
<body>
<?php
// Деление зеленых бактерий
const GREEN_INTO_GREEN = 3;
const GREEN_INTO_RED = 4;

// Деление красных бактерий
const RED_INTO_GREEN = 7;
const RED_INTO_RED = 5;

$message = '';

if (isset($_POST['name'], $_POST['tel'], $_POST['email'], $_POST['tact'])) {
    if (ctype_alpha($_POST['name'])) {
        $greenBacteria = 1;
        $redBacteria = 1;

        for ($i = 0; $i < $_POST['tact']; $i++) {
            $genus = [
                $greenBacteria * GREEN_INTO_GREEN + $redBacteria * RED_INTO_GREEN,
                $greenBacteria * GREEN_INTO_RED + $redBacteria * RED_INTO_RED
            ];

            list($greenBacteria, $redBacteria) = $genus;
        }
    } else {
        $message = 'Имя должно состоять только из букв!';
    }
}
?>
<form method="post">
    <div>
        <label>Имя:</label>
        <input type="text" name="name" placeholder="Введите имя..." required>
        <span style="color: red;"><?= $message ?></span>
    </div>
    <div>
        <label>Номер телефона:</label>
        <input type="tel" name="tel" placeholder="Формат:+xxx xx xxx-xx-xx" title="Формат:+xxx xx xxx-xx-xx"
               pattern="^\+[0-9]{3} [0-9]{2} [0-9]{3}-[0-9]{2}-[0-9]{2}" required>
    </div>
    <div>
        <label>Почта:</label>
        <input type="email" name="email" placeholder="Введите почту..." required>
    </div>
    <div>
        <label>Число тактов:</label>
        <input type="number" min="1" name="tact" placeholder="Введите число тактов..." required>
    </div>
    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
<?php if (isset($greenBacteria, $redBacteria)): ?>
    <div>
        <p>Количество зеленых бактерий: <?= $greenBacteria ?></p>
        <p>Количество красных бактерий: <?= $redBacteria ?></p>
        <p>Общее количество бактерий: <?= $greenBacteria + $redBacteria ?></p>
    </div>
<?php endif; ?>
</body>
</html>