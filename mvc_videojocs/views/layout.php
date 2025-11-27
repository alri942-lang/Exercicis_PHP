<?php

session_start();
$flash = $_SESSION['flash'] ?? null;
if (isset($_SESSION['flash'])) unset($_SESSION['flash']);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? "Videojocs MVC") ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
        }
        header, footer {
            background: #eee;
            padding: 10px;
            margin-bottom: 20px;
        }
        .flash {
            background: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .errors { color: #a94442; background: #f2dede; padding: 10px; border-radius:4px; margin-bottom:10px; }
    </style>
</head>

<body>

<header>
    <h1>Gestió de Videojocs</h1>

</header>

<?php if ($flash): ?>
    <div class="flash"><?php echo htmlspecialchars($flash) ?></div>
<?php endif; ?>

<main>
    
    <?= $content ?>
    
</main>

<footer>
    <p>Miniaplicació MVC - M7</p>
</footer>

</body>
</html>