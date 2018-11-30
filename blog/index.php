<?php 
    $page = $_GET['page'] ?? 'home';

    // page Whitelist
    $pages = [
        'home', 
        'makeblog', 
        'otherblogs',
        'neu',
        '404'
    ];
?>

<!DOCTYPE html>
 <html lang="de">
 <head>
    <link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body class = "wrapper">
    <?php 
        if (!in_array($page, $pages)) {
            include 'views/view.404.php';
        }
        else { 
            include 'views/view.' . $page . '.php';
        }
    ?>
</body>
</html>