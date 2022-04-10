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
<h2 align="center">افزودن منو جدید</h2>
<br>
<form action="<?php echo e(route('add-menu')); ?>" method="post">
    <table align="center">
        <tr>
            <td>
                <input name="name" type="text" id="menu" placeholder="منوی جدید">
            </td>
            <td>
                <label for="menu">:نام منو</label>
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
</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/Backend/main/layout/menus.blade.php ENDPATH**/ ?>