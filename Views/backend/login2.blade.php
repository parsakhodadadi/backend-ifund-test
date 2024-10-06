<html>
<head>
    <title>
        ورود
    </title>
</head>
<body>
<form action="{{ route('login') }}" method="post">
    <input type="email" name="name">
    <br>
    <input type="password" name="password">
    <br>
    <input type="submit" value="submit">
</form>
</body>
</html>