<?php
require "../db_conn.php";

$query = "SELECT * FROM `user`";
$run = mysqli_query($conn, $query);


while ($row = mysqli_fetch_array($run)) {
    if (isset($row['user'])) {

        $user_id = $row['id'];
        $user_name = $row['user'];
        $img_path = $row['img_path'];

        $response[$user_id] = array(
            'name' => $user_name,
            'img_path' => $img_path
        );
    }
}
header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($conn);
