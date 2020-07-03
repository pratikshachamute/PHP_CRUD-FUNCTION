<?php
error_reporting(0);
        session_start();
    // Creating Connection
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $name = '';
    $surname = '';
    $location = '';
    $update = false;
    $id = 0;
    // Inseting values
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        // $location = $_POST['location'];

        
        $mysqli->query("INSERT INTO data (name , surname) values('$name','$surname')") or die($mysqli->error);
        $_SESSION['message'] = "Record has been Added!";
        $_SESSION['msg_type'] = "success";
        header('location: index.php');
     }

    // Deleting Records
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);
        $_SESSION['message'] = "Record has been Deleted!";
        $_SESSION['msg_type'] = "danger";
        header('location: index.php');
    }

    // Updating Record
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
        if(count($result) >0){
            $row = $result->fetch_array();
            $name = $row['name'];
            $surname = $row['surname'];
            // $location = $row['location'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        // $location = $_POST['location'];

        $mysqli->query("UPDATE data SET name= '$name', surname = '$surname' WHERE id=$id") or die($mysqli->error);
        $_SESSION['message'] = "Record has been Updated!";
        $_SESSION['msg_type'] = "warning";
        header('location: index.php');
    }
?>