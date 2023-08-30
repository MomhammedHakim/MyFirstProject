<?php
include "config.php";

if(isset($GET['id'])) {
    $user_id = $GET['id'];
    $sql = "DELETE FROM `users` WHERE `id` = '$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        # code...
        echo "record Deleted succesfully";
    } else {
        echo "Error:" . $sql ."<br>". $conn->error;
    }
}
?>