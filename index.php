<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="src/css/main.css">

    <script src="src/js/storage.js" ></script>
    <script src="src/js/navigation.js" ></script>
    <script src="src/js/http.js" ></script>
    <script src="src/js/auth.js" ></script>
    <script src="src/js/auth-required.js"></script>

    <title>Главная</title>
</head>

<body class="mainPage">
  <h1 class="main__page__heading">Список групп</h1>

  <a href="groups/index.php?groupId=1">
    <div class="group__summary__card">
      <header>
        <h3>Group name</h3>
      </header>

      <section class="summary__info">
        <div>Студентов в группе: <strong>12</strong></div>
        <div>Средняя успеваемость: <strong>4.9</strong></div>
      </section>
    </div>
  </a>

<!--  <button onclick="logout()">Выйти</button>-->
</body>

</html>