<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="<?= asset("bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= asset("error.css") ?>">
</head>
<body>
    <div class="container">
        <h1>Error</h1>
        <h3><?= $error_message ?></h3>
    </div>
</body>
</html>