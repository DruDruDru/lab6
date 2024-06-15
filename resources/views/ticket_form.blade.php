<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Проблема</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div>
            <label for="problem_theme"></label>
            <select name="problem_theme" id="problem_theme">
                <option value="product">Вопросы по продуктам и услугам</option>
                <option value="recovery">Возвраты и обмены</option>
                <option value="complaint">Жалобы и претензии</option>
                <option value="more_info">Запросы на дополнительную информацию</option>
                <option value="tech_support">Техническая поддержка для клиентов</option>
            </select>
        </div>
        <div>
            <label for="description">Описание проблемы:</label>
            <input type="text" name="description" id="description" />
        </div>
        <div>
            <label for="photo">Фотоотчёт (Необязательно):</label>
            <input type="file" name="photo" id="photo" />
        </div>
        <div>
            <label for="importance">Важность:</label>
            <select name="importance" id="importance">
                <option value="low">Низкая</option>
                <option value="normal">Средняя</option>
                <option value="high">Высокая</option>
            </select>
        </div>
    </form>
</body>
</html>
