<?php
header('Content-type: text/html; charset=utf-8');
require "vendor/autoload.php";

spl_autoload_register(function ($class) {

    // префикс пространства имён проекта
    $prefix = 'App\\';
    $prefix2 = 'Aqua\\';

    // базовая директория для этого префикса
    $base_dir = __DIR__;

    // класс использует префикс?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0 && strncmp($prefix2, $class, $len) !== 0) {
        // нет. Пусть попытается другой автозагрузчик
        echo "Not found Prefix";
        return;
    }
    // получаем относительное имя класса
    $relative_class = substr($class, $len);

    // заменяем префикс базовой директорией, заменяем разделители пространства имён
    // на разделители директорий в относительном имени класса, добавляем .php
    $file = $base_dir . '/' . str_replace('\\', '/', $class) . '.php';


    // если файл существует, подключаем его
    if (file_exists($file)) {
        require $file;
    }
});

