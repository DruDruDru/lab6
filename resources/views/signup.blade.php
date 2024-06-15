<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <style>
        body {
            padding: 100px 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            padding: 1em 2em;
            background-color: cornflowerblue;
            color: white;
            border-radius: 15px;
            width: 20vw;
            height: 40vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .data-form-block {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        input {
            margin-bottom: 2.5em;
        }
        .data-form-block input {
            width: 300px;
            height: 25px;
            border-radius: 10px;
        }
        .submit-button {
            height: 50px;
            width: 150px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div class="data-form-block">
            <label for="name">Логин</label>
            <input type="text" name="name" id="name" />
        </div>
        <div class="data-form-block">
            <label for="email">Почта</label>
            <input type="email" name="email" id="email" />
        </div>
        <div class="data-form-block">
            <label for="password">Пароль</label>
            <input type="text" name="password" id="password" />
        </div>
        <div>
            <input type="submit" value="Регистрация" class="submit-button" />
        </div>
    </form>
</body>
</html>
