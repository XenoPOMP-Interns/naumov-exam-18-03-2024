<?php

require '../src/php/server.php';
require '../src/php/redirect.php';
require '../src/php/auth.php';

function error_redirect($message)
{
    redirect("/auth/register.php?status=400&errorMessage=" . $message);
    exit;
}

function validate_string_input($input, $min_len, $max_len, $on_error_message)
{
    $len = strlen($input);

    if ($len < $min_len || $len > $max_len) {
        error_redirect($on_error_message);
    }
}

// GET параметры
$login = $_GET['login'];
$password = $_GET['password'];
$re_password = $_GET['rePassword'];

// Валидируем форму
if ($login === null || $login === '') {
    error_redirect("Введите логин!");
}

if ($password === null || $password === '') {
    error_redirect("Введите пароль!");
}

if ($password !== $re_password) {
    error_redirect("Пароли не совпадают!");
}

validate_string_input($login, 3, 20, "Неверный логин!");
validate_string_input($password, 9, 20, "Неверный пароль!");

// Получаем всех пользователей с логином, как
// в запросе
$found_users = find_user_by_login($login);

if ($found_users->num_rows > 0) {
    error_redirect("Пользователь с таким логином уже существует.");
}

// Если пользователя не существует,
// создаем его
$insertionQuery = "INSERT INTO `users` (user_login, user_password) VALUES (?, ?);";
exec_query($insertionQuery, "ss", $login, $password);

$user = find_user($login, $password);

$id = ($user->fetch_row())[0];
redirect("/index.php?status=200&userId=" . $id);
