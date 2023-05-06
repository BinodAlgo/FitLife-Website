<?php
session_start();
require_once 'config.php';

if (isset($_POST['subscribe'])) {
  $email = $_POST['email'];

  $query = "INSERT INTO newsletter_subscription (email) VALUES (?)";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    $_SESSION['success_message'] = "You have successfully subscribed to our newsletter!";
  } else {
    $_SESSION['error_message'] = "There was an error while subscribing to the newsletter. Please try again.";
  }

  header("Location: index.php");
}
