<?php

require "../db_conn.php";
session_start();

if (isset($_SESSION['sender_id']) && isset($_POST["receiver_id"]) && isset($_POST['msg'])) {
    $m = $_POST['msg'];
    $receiver_id = $_POST["receiver_id"];
    $sender_id = $_SESSION['sender_id'];

    // Sanitize input values
    $m = htmlspecialchars($m);
    $receiver_id = htmlspecialchars($receiver_id);
    $sender_id = htmlspecialchars($sender_id);

    // Prepare the query using prepared statements
    $query = "INSERT INTO `chat_messages`(`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES (null,?,?,?,?)";
    $statement = mysqli_prepare($conn, $query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($statement, 'ssss', $sender_id, $receiver_id, $m, $ts);

    $ts = date('Y-m-d H:i:s');
    date_default_timezone_set('Asia/Kolkata');

    if (mysqli_stmt_execute($statement)) {
        echo "Success=> id:".$_POST['receiver_id'];
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    mysqli_stmt_close($statement);
}

mysqli_close($conn);

?>
