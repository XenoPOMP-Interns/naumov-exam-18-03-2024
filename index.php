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

  <section class="groups__summaries">
      <?php
      require 'src/php/server.php';

      $query = '
      SELECT 
        group_id, group_name, COUNT(student_group_id) as total_students 
      FROM `groups`
      LEFT JOIN `students` 
        on students.student_group_id = groups.group_id
          
      GROUP BY group_id
    ';

      // Получаем список групп с аггрегированными данными
      $records = exec_query($query, null);

      // Обрабатываем ошибку.
      if (!$records) {
          echo '<p class="main__page__error">Произошла ошибка!</p>';
      }
      else {
          // Обрабатываем все входы
          foreach ($records as $record) {
              $group_id = $record['group_id'];
              $group_name = $record['group_name'];
              $total_students = $record['total_students'];

              echo sprintf('
              <a href="groups/index.php?groupId=%d">
                <div class="group__summary__card">
                  <header>
                    <h3>%s</h3>
                  </header>
          
                  <section class="summary__info">
                    <div>Студентов в группе: <strong>%d</strong></div>
                  </section>
                </div>
              </a>
              ', $group_id, $group_name, $total_students);
          }
      }
      ?>
  </section>


<!--  <button onclick="logout()">Выйти</button>-->
</body>

</html>