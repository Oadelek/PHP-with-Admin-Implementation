    <?php
    if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
        header('Location: /home');
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="app/style.css" rel="stylesheet">
        <link rel="icon" href="/favicon.png">
        <title>My PHP-MVC!</title>
    </head>
    <body>
    <div class="content-wrapper">