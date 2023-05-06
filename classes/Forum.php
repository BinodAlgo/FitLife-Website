<?php 
class Forum {
  private $db;
  public function __construct(mysqli $db)
  {
    $this->db = $db;
  }
  public function getThreads()
  {
    $query = "SELECT threads.id, threads.title, threads.content, threads.created_at, users.username FROM threads INNER JOIN users ON threads.user_id = users.id";
    $result = $this->db->query($query);
    $threads = array();
    while ($row = $result->fetch_assoc()) {
      $threads[] = $row;
    }
    return $threads;
  }

  public function getThread($threadId)
  {
    $query = "SELECT * FROM threads WHERE id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $threadId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }


  public function createThread($title,$content,$userId){
    $query = "INSERT INTO threads (title,content,user_id) VALUES (?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssi",$title,$content,$userId);
    $stmt->execute();

    return $stmt->insert_id;
  }

  public function createPost($content,$userId,$threadId){
    $query = "INSERT INTO posts (content,user_id,thread_id) VALUES (?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("sii",$content,$userId,$threadId);
    $stmt->execute();

    return $stmt->insert_id;
  }

  public function getPosts($threadId)
  {
    $query = "SELECT posts.id, posts.content, posts.user_id, posts.created_at, users.username FROM posts INNER JOIN users ON posts.user_id = users.id WHERE thread_id = $threadId";
    $result = $this->db->query($query);
    $posts = array();
    while ($row = $result->fetch_assoc()) {
      $posts[] = $row;
    }
    return $posts;
  }

  public function getPost($postId)
  {
    $query = "SELECT * FROM posts WHERE id = $postId";
    $result = $this->db->query($query);
    return $result->fetch_assoc();
  }

  public function deleteThread($threadId){
    $query = "DELETE FROM threads WHERE id = $threadId";
    return $this->db->query($query);
  }
  public function deletePost($postId){
    $query = "DELETE FROM posts WHERE id = $postId";
    return $this->db->query($query);
  }

  // Update thread
  public function updateThread($threadId,$content,$title){
    $query = "UPDATE threads SET title = ?, content = ? WHERE id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssi",$title,$content,$threadId);
    $stmt->execute();

    return $stmt->affected_rows;
  }
  // Update post
  public function updatePost($postId,$content){
    $query = "UPDATE threads SET  content = ? WHERE id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("s",$content,$postId);
    $stmt->execute();

    return $stmt->affected_rows;
  }

}



