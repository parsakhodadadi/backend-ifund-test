{{--@json([1,2,3])--}}

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
<pre>
    <div class="error">

    </div>
</pre>
<form action="{{ route('panel') }}" method="post">
    <br>
    <label for="user">user:</label>
    <br>
    <input id="user" type="text" name="user">
    <br>
    @if(empty($_POST['user']))
        {{ @$errors['user']['required'] }}
        <br>
    @else
        {{ @$errors['user']['isNumeric'] }}
        <br>
    @endif
    <label for="password">password:</label>
    <br>
    <input id="" type="password" name="password">
    <br>
    @if(empty($_POST['password']))
        {{ @$errors['password']['required'] }}
        <br>
    @else
        {{ @$errors['password']['isNumeric'] }}
        <br>
    @endif
    <label for="email">email:</label>
    <br>
    <input id="email" type="email" name="email">
    <br>
    @if(empty($_POST['email']))
        {{ @$errors['email']['required'] }}
        <br>
    @else
        {{ @$errors['email']['email'] }}
        <br>
    @endif
    <input type="submit" value="submit">
</form>
</body>
</html>
