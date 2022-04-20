<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2 align="center">فرم ثبت نام</h2>
<form action="{{ route('register') }}" method="post">
    <table align="center">
        <tr>
            <td>
                <input type="text" placeholder="نام کاربری" name="username">
            </td>
            <td>
                <label for="username">:نام کاربری</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" placeholder="کلمه عبور" name="password">
            </td>
            <td>
                <label for="username">:کلمه عبور</label>
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="submit">
            </td>
        </tr>
    </table>
</form>
</body>
</html>