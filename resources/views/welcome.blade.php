<!DOCTYPE html>
<html>
<head>
    <title>Parse 1688</title>
</head>
<body>
<form action="/parse-1688" method="post">
    @csrf
    <input type="text" name="url" placeholder="Введите ссылку на товар">
    <button type="submit">Парсить</button>
</form>
</body>
</html>
