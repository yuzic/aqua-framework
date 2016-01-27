<?php

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

$app = new \App\Controller\Index;
$app->index();



//$sql = 'SELECT *
//        FROM "user"
//        WHERE "id"<?limit';
//
//
//$sql = 'SELECT max("order"."id") "id",
//                      "order"."email",
//                      max("prod_sub"."duration") "duration",
//                      max("order"."activated_at") "activated_at",
//                      max("order"."User__id") "User__id"
//                FROM "order"
//                LEFT JOIN "product_subscribe" "prod_sub"
//                  ON ("order".model_id = "prod_sub".id)
//                WHERE "order"."model_name"=\'product_subscribe\'
//                AND "order"."activated" = 1
//                AND  "order"."email"<>\'\'
//                AND ("order"."activated_at" + "prod_sub"."duration") >=?curentTime
//                GROUP BY "order"."email"
//                ';
//
//
//
//$insert = '
//INSERT INTO "user" ("email","password") VALUES (?email, ?password) returning *';
//
//
//$query = (new \Aqua\Db\Query)->instances($insert, [
//    'email' => 'prototypenk@gmail.com',
//    'password' => '78979798',
//]);
//
//
//$connection = \Aqua\Db\Connection::query($query);
//
//$lsit = $connection->asArray();
//
//
//
//print_r($lsit);