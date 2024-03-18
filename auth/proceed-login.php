<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <?php
        require '../src/php/server.php';
        require '../src/php/redirect.php';
        require '../src/php/auth.php';

        // GET параметры
        $login = $_GET['login'];
        $password = $_GET['password'];

        // Получаем всех пользователей с логином и паролем, как
        // в запросе
        $found_users = find_user($login, $password);

        if ($found_users -> num_rows <= 0) {
          $message = "Ошибка, пользователь не найден.";

           redirect("/auth/login.php?status=400&errorMessage=" . $message);
           exit;
        }

        $id = ($found_users -> fetch_row())[0];

        redirect("/index.php?status=200&userId=" . $id);
        exit;
    ?>
</body>
</html>