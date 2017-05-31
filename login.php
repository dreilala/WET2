<?php
session_start();
//include "dbconn.php";
?>
<?php
include "dbconn.php";

if (isset($_POST['InputUser']) && isset($_POST['InputPassword']) && $_POST['check'] == true) {
    $email = $_POST["InputUser"];
    $password = md5($_POST["InputPassword"]);

    $ergebnis = $dbconn->query("SELECT passwd FROM users WHERE mail LIKE '" . $email . "' LIMIT 1");
    $row = $ergebnis->fetch_object();
    if ($row->passwd == $password) {

        $erg = $dbconn->query("SELECT id FROM users WHERE mail ='" . $email . "' LIMIT 1");
        $getid = $erg->fetch_object();
        $id = $getid->id;
        setcookie("userid", $id, time() + 9999);
        //print_r($_SESSION["userid"]);
        header("Location: index.php");
        exit;
    }
} else {
    if (isset($_POST['InputUser']) && isset($_POST['InputPassword'])) {
        $email = $_POST["InputUser"];
        $password = md5($_POST["InputPassword"]);

        $ergebnis = $dbconn->query("SELECT passwd FROM users WHERE mail LIKE '" . $email . "' LIMIT 1");
        $row = $ergebnis->fetch_object();
        if ($row->passwd == $password) {
            $erg = $dbconn->query("SELECT id FROM users WHERE mail ='" . $email . "' LIMIT 1");
            $getid = $erg->fetch_object();
            $id = $getid->id;
            $_SESSION["userid"] = $id;
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    </head>
    <body>

        <h1>Login</h1>
        <form class='col-md-8' action='login.php' method='Post'>
            <div class='form-group'>
                User
                <input type='text' class='form-control' name='InputUser' placeholder='User'>
            </div>
            <div class='form-group'>
                Password
                <input type='password' class='form-control' name='InputPassword' placeholder='Password'>
            </div>
            <div class='checkbox'>
                <label><input type='checkbox' name='check'>Login merken</label>
            </div>
            <button type='submit' class='btn btn-default'>Submit</button>
        </form>

    </body>
</html>
