<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <?php if (!isset($_COOKIE['user'])):?>
    <div class="row">
        <div class="col">
            <h1 class="mb-3">Форма регистрации</h1>
            <form action="validation-form/check.php" method="post" class="w-50">
                <input type="text" class="form-control mb-3" name="login" id="login" placeholder="Введите логин">
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Введите имя">
                <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Введите пароль">
                <button class="btn btn-success" type="submit">Зарегистрироваться</button>
            </form>
        </div>
        <div class="col">
            <h1 class="mb-3">Форма авторизации</h1>
            <form action="validation-form/auth.php" method="post" class="w-50">
                <input type="text" class="form-control mb-3" name="login" placeholder="Введите логин">
                <input type="password" class="form-control mb-3" name="password" placeholder="Введите пароль">
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
        </div>
    </div>

    <?php else: ?>
    <h1>Привет, <?=$_COOKIE['user']?>! Вы авторизованы!</h1>
        <form action="logout.php">
            <button class="btn btn-outline-danger">Выйти</button>
        </form>
    <?php endif;?>
</div>
</body>
</html>