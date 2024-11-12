<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h1>Puste Okna</h1>
    <table border="1">
        <tr>
            <th>ID Okna</th>
            <th>Nazwa Okna</th>
        </tr>
        <?php foreach ($pusteOkna as $okno): ?>
            <tr>
                <td><?= esc($okno->id) ?></td>
                <td><?= esc($okno->nazwa) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>