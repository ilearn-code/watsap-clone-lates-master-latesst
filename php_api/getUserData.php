<?php
session_start();
require "../db_conn.php";

if (isset($_GET['userId']) && isset($_SESSION['sender_id'])) {
  $userId = $_GET['userId'];
  $loggedInUserId = $_SESSION['sender_id'];


  $result = mysqli_query($conn, "SELECT * FROM chat_messages WHERE (`sender_id` = '$loggedInUserId' AND `receiver_id` = '$userId') OR (`sender_id` = '$userId' AND `receiver_id` = '$loggedInUserId') ORDER BY `created_at` ASC");

  $messages = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
  }
} else {
  $messages['error'] = "sender id and userid not found";
}

header('Content-Type: application/json');
echo json_encode($messages);
mysqli_close($conn);
