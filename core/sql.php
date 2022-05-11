<?php

function createDB($host, $user, $password, $database)
{


    $link = mysqli_connect($host, $user, $password);

    if (!$link) {
        die("ERROR " . mysqli_connect_error());
    }

    if (!mysqli_select_db($link, $database)) {

        $sql1 = "CREATE DATABASE $database;";

        if (mysqli_query($link, $sql1)) {

            $link = mysqli_connect($host, $user, $password, $database);
            echo "Database Created Successfully";
            echo "<br/>";

            $sql2 = "CREATE TABLE `ToDoApp`(
                `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `Title` VARCHAR(450),
             
            );";

            if (mysqli_query($link, $sql2)) {
                echo "ToDoApp Table Created Successfully";
                echo "<br/>";
            } else {
                echo "Error During Creating todoapp Table " . mysqli_error($link);
            }
        } else {
            echo "Error During Creating Database " . mysqli_error($link);
        }

        mysqli_close($link);
    }
}
