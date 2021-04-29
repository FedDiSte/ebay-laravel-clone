<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>
        <label for="cognome">Cognome: </label>
        <input type="text" name="cognome" id="cognome"><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Registrati">
    </form>
    @if ($status == 'email_not_unique')
        <p>bell fratm</p>
    @endif
</body>
</html>
