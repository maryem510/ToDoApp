<?php
include 'core/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM ToDoApp WHERE id=" . $id;
$result = mysqli_query($conn, $sql);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $title = $row['Title'];
}


?>
<div class="container"></div>
<h1 class="text-center py-4 my-4">Update your list</h1>
<form action="update.php" method="post" autocomplete="off">
  <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="<?php echo $title ?>" placeholder="Edit your list" Required>
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
  </div><br>
  <button class="btn btn-success">Update </button>
  <?php include "core/sessionMessages.php"; ?>
</form>
</div>