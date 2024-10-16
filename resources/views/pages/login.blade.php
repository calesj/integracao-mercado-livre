<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <form>
        @csrf
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit">
    </form>
    <button>Entrar pelo mercado livre</button>
</body>
</html>
