<?php
    if (!$_REQUEST)
        $_REQUEST["view"] = str_replace("/", "", $_SERVER["REQUEST_URI"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <link rel="stylesheet" href="/build/styles/home.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Wela-Events</title>
</head>
<body>
    <?php include_once "header.php"; ?>
    <main class="main">
        <?php
            if ($_REQUEST["view"] == "" || $_REQUEST["view"] == "home") 
                include_once "inicio.php";
            else if (file_exists(__DIR__ . "/" . $_REQUEST["view"] . ".php")) 
                include_once $_REQUEST["view"] . ".php";
        ?>
    </main>
    <?php include_once "footer.php"; ?>
</body>
</html>