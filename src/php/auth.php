<?php

// Эта функция находит пользователя по его логину и паролю
function find_user($login, $password) {
    $query = "
          SELECT * FROM `users`
          WHERE 
            user_login = ? 
              AND
              user_password = ?
        ";

    return exec_query($query, "ss", $login, $password);
}

// Эта функция находит пользователя по его логину
function find_user_by_login($login) {
    $query = "
          SELECT * FROM `users`
          WHERE 
            user_login = ?
        ";

    return exec_query($query, "s", $login);
}