<?php
require('db_connect.php');
$query_posts = 'SELECT * FROM posts ORDER BY post_id';
$post_statment = $db->prepare($query_posts);
$post_statment->execute();
$db_posts = $post_statment->fetchAll();
$post_statment->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Posts</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>Posts</h3>
            <a href="index.php">Panel</a>

        </div>
        <hr>
        <?php
        foreach ($db_posts as $db_post) :
        ?>
            <p>ID: <?php echo $db_post['post_id'] ?></p>
            <p class="url">URL: <a href="<?php echo $db_post['url'] ?>"><?php echo $db_post['url'] ?></a></p>
            <p class="phone">Phone: <a href="tell:<?php echo $db_post['phone'] ?>"><?php echo $db_post['phone'] ?></a></p>

            <p class="sometext">About: <?php echo $db_post['text'] ?></p>
            <hr>
        <?php endforeach ?>
    </div>
</body>

</html>