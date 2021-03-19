<?php
$url = filter_input(INPUT_POST, 'url');
$phone = filter_input(INPUT_POST, 'phone');
$text = filter_input(INPUT_POST, 'text');
if ($url == null || $phone == null || $text == null) {
    $err_msg = "ALL VALUES NOT ENTERED";
    include('db_error.php');
} else {
    require_once('db_connect.php');
    $query = 'INSERT INTO posts(url,phone,text,post_id) VALUES (:url,:phone,:text,:post_id)';
    $stm = $db->prepare($query);
    $stm->bindValue(':url', $url);
    $stm->bindValue(':phone', $phone);
    $stm->bindValue(':text', $text);
    $stm->bindValue(':post_id', null, PDO::PARAM_INT);
    $execute_success = $stm->execute();
    $stm->closeCursor();
}
require_once('db_connect.php');
$query_posts = 'SELECT * FROM posts ORDER BY posts_id';
$post_statment = $db->prepare($query_posts);
$post_statment->execute();
$posts = $post_statment->fetchAll();
$post_statment->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Admin Panel</title>
</head>

<body>

    <div class="container">
        <div class="header">
            <h4>ADMIN PANEL</h4>
            <a href="user.php">Posts</a>

        </div>
        <hr>
        <form action="index.php" method="POST">
            <label for="url">URL</label>
            <input type="text" name="url" placeholder="URL">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" placeholder="0665320098">
            <input type="file">
            <label for="text">About </label>
            <textarea name="text" id="" cols="30" rows="10" placeholder="enter your text"></textarea>
            <button type="submit">Post</button>

        </form>
        <?php
        if (isset($_POST['url'])) {
            if (!filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)) {
                echo "<p>Enter an URL</p>";
            } else {
                echo "<p>SAVED</P>";
            }
        }
        if (isset($_POST['phone']) && !empty($_POST['text'])) {
        }
        ?>
    </div>

</body>

</html>