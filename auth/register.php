<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="../src/css/main.css">

  <title>Document</title>
</head>

<body class="authPage">
  <form action="proceed-registration.php" name="registerForm">
    <h2>Зарегистрироваться</h2>

      <?php require '../src/php/auth-validation.php' ?>

    <label for="login">Логин</label>
    <input id="login" name="login" />

    <label for="password">Пароль</label>
    <input id="password" name="password" type="password" />

    <label for="rePassword">Повторите пароль</label>
    <input id="rePassword" name="rePassword" type="password" />

    <button type="submit">Зарегистрироваться</button>

    <a class="redirect" href="login.php">Уже есть аккаунт? Войдите</a>
  </form>
</body>

</html>