<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasan Esmailie</title>
</head>
<body>

<table border="1" width="80%">
    <tr>
        <td>
            <h3>
                <p align="center">Number</p>
            </h3>
        </td>
        <td>
            <h3>
                <p align="center">Name</p>
            </h3>
        </td>
        <td>
            <h3>
                <p align="center">Password</p>
            </h3>
        </td>
        <td>
            <h3>
                <p align="center">Settings</p>
            </h3>
        </td>
    </tr>
    <?php foreach ($users as $index=>$user): ?>
    <tr>
        <td><?php echo ++$index ?></td>
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->password ?></td>
        <td>
            <p align="right">
                <button>حذف</button>
                <button>ویرایش</button>
            </p>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>