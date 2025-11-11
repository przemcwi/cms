<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mój CMS' ?></title>

    <!-- Łączenie CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Mój CMS</h1>
        <nav>
            <a href="/">Strona główna</a>
        </nav>
    </header>

    <h3>tan tan z maina</h3>

    <main>
        <!-- literalny string -->
        <?= $content ?? '' ?>
    </main>

    <div><?= $kopytko ?></div>

</body>
</html>