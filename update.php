<?php include 'core/database.php';
include 'core/Validation.php';
include 'core/Session.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //form inputs
    $title = ['name' => 'Title Name', 'value' => $_POST['title']];
    $id = $_POST['id'];

    //create instance from session class
    $session = new Session();

    //create instance from validation class
    $validate = new Validation();

    //validate inputs
    $validate->stringVal($title['name'], $title['value']);
    $validate->requiredVal($title['name'], $title['value']);
    $validate->minVal($title['name'], $title['value'], 3);
    $validate->maxVal($title['name'], $title['value'], 50);

    if (!$validate->isSuccess()) {
        $session->setSession('errors', $validate->getErrors());
        header("Location:view.php");
        die();
    } else {

        $sql = "UPDATE ToDoApp SET  title = '" . $title['value'] . "' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        $session->setSession('success', "task updated Successfully");
        header("Location: view.php");

        header("location: view.php");
    }
}
