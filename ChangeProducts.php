<?php

session_start();
include "inc/dbconn.php";

if ($_GET['action'] == 'add') {
    $id = $_GET['id'];
    $sql = "update users set state='deactivate' where id='$id'";
    $result = $dbconn->query($sql);

    if ($result == true) {
        header("Location: index.php?page=customerinfo");
        exit;
    }
}


/*
if ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "update users set state='deactivate' where id='$id'";
    $result = $dbconn->query($sql);

    if ($result == true) {
        header("Location: index.php?page=customerinfo");
        exit;
    }
}

if ($_GET['action'] == 'activate') {
    $id = $_GET['id'];
    $sql = "update users set state='active' where id='$id'";
    $result = $dbconn->query($sql);

    if ($result == true) {
        header("Location: index.php?page=customerinfo");
        exit;
    }
}




