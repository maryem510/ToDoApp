<?php
include 'core/database.php';
include 'core/Session.php';


if ($_SERVER['REQUEST_METHOD']) {
    $id = $_GET['id'];

    $sql = "DELETE FROM ToDoApp WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    //create instance from session class
    $session = new Session();

    if ($result) {
        $session->setSession('success', "task Deleted Successfully");
        header("location: view.php");
    }
}
