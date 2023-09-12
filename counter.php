<?php
// Имя файла для хранения счетчика
$counterFile = 'counter.txt';

// Проверяем, существует ли файл счетчика, и читаем текущее значение
if (file_exists($counterFile)) {
    $counter = (int) file_get_contents($counterFile);
    $counter++;
    // Обновляем значение счетчика в файле
file_put_contents($counterFile, $counter);
} else {
    // Если файл не существует, создаем его и начинаем с 1
    $counter = 1;
    // Обновляем значение счетчика в файле
file_put_contents($counterFile, $counter);
}

// Получаем текущее время
$current_time = date('H:i');

// Отображаем сообщение на странице
echo "Страница была загружена $counter раз. Текущее время $current_time.";
?>