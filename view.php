<?php include "inc/header.php" ?>
<?php include 'core/database.php'; ?>
<?php include 'core/Session.php'; ?>
<?php include "inc/footer.php" ?>


<div class="w-50 m-auto">
  <h1 class="text-center py-4 my-4">ToDo List App</h1>
  <form action="AddData.php" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" type="text" name="title" id="title" placeholder="Type content" Required>

    </div><br>
    <button class="btn btn-success">Add Task</button>

    <?php include "core/sessionMessages.php"; ?>

  </form>

</div><br>
<div class="lists w-50 m-auto my-4">
  <h1>Your Lists</h1>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col" name="id">id</th>
        <th scope="col">Tasks</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM ToDoApp";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $title = $row['Title'];
      ?>
          <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $title  ?></td>
            <td>
              <a class="btn  btn-info text-light" href="edit.php?id=<?php echo $id ?>" role="button">Edit</a>
              <a class="btn  btn-danger text-light" href="delete.php?id=<?php echo $id ?>" role="button">Delete</a>

            </td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>
</div>