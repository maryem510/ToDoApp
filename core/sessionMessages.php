<?php

include_once "Session.php";

$session1 = new Session();

if ($session1->getSession('success')) {
?>
    <div class="alert alert-success"><?= $_SESSION['success']; ?>
    </div>
<?php $session1->deleteSession('success');
} elseif ($session1->getSession('errors')) {
?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error) {
                echo "<li>" . $error . "</li>";
            }
            $session1->deleteSession('errors');
            ?>
        </ul>
    </div>
<?php }  ?>