<?php
$post = $_GET;
if (isset($post['userName'])) {
    include('connection.php');
    $username = $post['userName'];
    $sql = "UPDATE employee SET status = 1 WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    echo '{"status": true}';
} else {
    echo '{"status": false}';
}


?>