<?php
session_start();
require_once 'config.php';
require_once 'classes/Forum.php';

$forum = new Forum($mysqli);

// Check if the form to create a new thread is submitted
if (isset($_POST['create_thread'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $user_id = $_SESSION['user_id'] ?? null;

  if ($user_id) {
    $forum->createThread($title, $content, $user_id);

    // Refresh the list of threads after adding the new thread
    $threads = $forum->getThreads();
  } else {
    // Handle the case when the user is not logged in
    header("Location: authenticate.php");
  }
}

// Check if the form to create a new post is submitted
if (isset($_POST['create_post'])) {
  $content = $_POST['content'];
  $thread_id = $_POST['thread_id'];

  $user_id = $_SESSION['user_id'] ?? null;

  if ($user_id) {
    $forum->createPost($content, $user_id, $thread_id);

    // Refresh the list of posts after adding the new post
    $posts = $forum->getPosts($thread_id);
  } else {
    // Handle the case when the user is not logged in
    header("Location: authenticate.php");
  }
}

// Get all threads from the database
$threads = $forum->getThreads();

// Get posts for the selected thread
if (isset($_GET['thread_id'])) {
  $selected_thread_id = $_GET['thread_id'];
  $posts = $forum->getPosts($selected_thread_id);
} else {
  $posts = [];
}

// Handle the update action
if (isset($_GET['edit_thread_id'])) {
  $selected_thread_id = $_GET['edit_thread_id'];
  $selected_thread = $forum->getThread($selected_thread_id);
}

// Handle the delete action
if (isset($_GET['delete_thread_id'])) {
  $selected_thread_id = $_GET['delete_thread_id'];
  $forum->deleteThread($selected_thread_id);
  header("Location: community_forum.php");
}

// Update the thread after the form submission
if (isset($_POST['update_thread'])) {
  $thread_id = $_POST['thread_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $forum->updateThread($thread_id, $content, $title);

  // Refresh the list of threads after updating the thread
  $threads = $forum->getThreads();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'favicon.php' ?>
  <title>FitLife - Community Forum</title>
  <link rel="stylesheet" href="assets/css/community_forum.css">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand">
        <h2 class="brand-title">FitLife</h2>
        <a href="/"><img src="assets/images/fitness-logo.png" alt="brand logo" class="logo"></a>
      </div>
      <ul class="navbar-menu">
        <li><a href="/">Home</a></li>
        <li><a href="workout_plans.php">Workout Plans</a></li>
        <li><a href="nutrition_plans.php">Nutrition Plans</a></li>
        <li><a href="community_forum.php">Community Forum</a></li>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
          <li><a href="authenticate.php">Login</a></li>
        <?php endif ?>
        <li><a href="authenticate.php">Register</a></li>
      </ul>
      <button class="navbar-toggle" type="button">
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
      </button>
    </nav>
  </header>
  <main>
    <section class="forum-container">
      <h1 class="text-gradient">Community Forum</h1>
      <?php if (isset($error)) : ?>
        <div class="alert error"><?= $error ?></div>
      <?php endif; ?>

      <!-- Show updated threads  -->
      <?php if (isset($selected_thread)) : ?>
        <div class="edit-thread-container">
          <h2>Edit Thread</h2>
          <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="hidden" name="thread_id" value="<?= $selected_thread['id'] ?>">
            <div class="form-group">
              <input type="text" name="title" value="<?= $selected_thread['title'] ?>" required>
            </div>
            <div class="form-group">
              <textarea name="content" rows="5" required><?= $selected_thread['content'] ?></textarea>
            </div>
            <button type="submit" name="update_thread">Update Thread</button>
          </form>
        </div>
      <?php endif; ?>

      <div class="new-thread-container">
        <h2>Create New Thread</h2>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <div class="form-group">
            <input type="text" name="title" placeholder="Thread Title" required>
          </div>
          <div class="form-group">
            <textarea name="content" rows="5" placeholder="Thread Content" required></textarea>
          </div>
          <button type="submit" name="create_thread">Create Thread</button>
        </form>

      </div>

      <div class="threads-container">
        <h2>Threads</h2>
        <?php if (!empty($threads)) : ?>
          <?php foreach ($threads as $thread) : ?>
            <div class="thread">
              <h2><a href="?thread_id=<?= $thread['id'] ?>"><?= $thread['title'] ?></a></h2>
              <p><?= $thread['content'] ?></p>
              <p class="thread-details">Posted by <?= $thread['username'] ?> on <?= $thread['created_at'] ?></p>
              <a href="?edit_thread_id=<?= $thread['id'] ?>" class="edit">Edit</a>
              <a href="?delete_thread_id=<?= $thread['id'] ?>" class="delete">Delete</a>
            </div>
          <?php endforeach ?>
        <?php else : ?>
          <p>No threads yet. Be the first to create one!</p>
        <?php endif; ?>
      </div>


      <div class="new-post-container">
        <h2>Create New Post</h2>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <div class="form-group">
            <select name="thread_id" required>
              <option value="">Select a thread</option>
              <?php foreach ($threads as $thread) : ?>
                <option value="<?= $thread['id'] ?>"><?= $thread['title'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <textarea name="content" rows="5" placeholder="Post Content" required></textarea>
          </div>
          <button type="submit" name="create_post">Create Post</button>
        </form>

      </div>

      <div class="posts-container">
        <h2>Posts</h2>
        <?php if (!empty($posts)) : ?>
          <?php foreach ($posts as $post) : ?>
            <div class="post">
              <h2><?= $post['content'] ?></h2>
              <p><?= $post['user_id'] ?></p>
              <p class="post-details">Posted by <?= $post['username'] ?> on <?= $post['created_at'] ?></p>
            </div>
          <?php endforeach ?>
        <?php else : ?>
          <p>No posts yet. Be the first to post!</p>
        <?php endif; ?>
      </div>
    </section>
  </main>
  <?php include_once 'footer.php' ?>