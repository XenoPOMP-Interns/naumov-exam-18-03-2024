<?php

// Возвращает именнованный массив с данными для подключения
function get_connection_data() {
    // Данные для входа в БД
    $host = "localhost";
    $user = "root";
    $password = "";
    $name = "exam_app_2024";

    return [
        "host" => $host,
        "user" => $user,
        "password" => $password,
        "name" => $name
    ];
}

// Эта функция выполняет запрос к БД.
function exec_query($query, $binding, ...$params) {
    // Получаем данные для БД
    $data = get_connection_data();

    // Разворачиваем эти данные
    $host = $data['host'];
    $user = $data['user'];
    $password = $data['password'];
    $name = $data['name'];

    // Подключение к БД
    $con = new mysqli(
        $host,
        $user,
        $password,
        $name
    );

    // Обработка ошибок
    if ($con -> connect_error) {
        die("Ошибка подключения: " . $con -> connect_error);
    }

    // Выполняем запрос
    $statement = $con -> prepare($query);

    // Делаем бинлинг данных через символ ? в тексте запроса
    if ($binding !== null) {
        $statement -> bind_param($binding, ...$params);
    }

    // Исполняем запрос
    $statement -> execute();
    $result = $statement -> get_result();

    // Отключаем все подключения
    $statement -> close();
    $con -> close();

    // Возвращаем результат
    return $result;
}
