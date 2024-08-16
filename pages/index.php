<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web phụ kiện Gaming</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body> 
    <div class="warpper">
        <?php
            session_start();
            include("../admincp/config/config.php");
            include("main/header.php");
            include("main/main.php");
            include("main/footer.php");
        ?>
    </div>
</body>